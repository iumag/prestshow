<?php

namespace App\Support;

use Validator;

trait FilterPaginateOrder
{
    protected $operators = [
        'equal_to' => '=',
        'not_equal' => '<>',
        'less_than' => '<',
        'greater_than' => '>',
        'less_than_or_equal_to' => '<=',
        'greater_than_or_equal_to' => '>=',
        'in' => 'IN',
        'not_in' => 'NOT_IN',
        'like' => 'LIKE',
        'between' => 'BETWEEN'
    ];

    public function scopeFilterPaginateOrder($query)
    {
        $request = request();

        $v = Validator::make($request->all(), [
            'column' => 'required|in:' . implode(',', $this->filter),
            'direction' => 'required|in:asc,desc',
            'search_operator' => 'required|in:' . implode(',', array_keys($this->operators)),
            'search_column' => 'required|in:' . implode(',', $this->filter),
            'search_column2' => 'in:' . implode(',', $this->filter),
            'search_query_1' => 'max:255',
            'search_query_2' => 'max:255',
            'search_query_3' => 'max:255'
        ]);
        if ($v->fails()) {
            //for debug
            dd($v->messages());
        }
        return $query->orderBy($request->column, $request->direction)
            ->where(function ($query) use ($request) {

                // check if search query is empty
                if ($request->has('search_query_1')) {
                    // determine the type of search_column
                    // check if its related model, eg: customer.id
                    if ($this->isRelatedColumn($request)) {
                        list($relation, $relatedColumn) = explode('.', $request->search_column);
                        return $query->whereHas($relation, function ($query) use ($relatedColumn, $request) {
                            return $this->buildQuery(
                                $relatedColumn,
                                $request->search_operator,
                                $request,
                                $query
                            );
                        });
                    } else {
                        // regular column
                        if (!$request->has('search_query_3')) {
                            return $this->buildQuery(
                                $request->search_column,
                                $request->search_operator,
                                $request,
                                $query
                            );
                        } else {
                            return $this->buildQuery(
                                $request->search_column,
                                $request->search_operator,
                                $request,
                                $query,
                                $request->search_column2
                            );
                        }
                    }
                }
                if($request->has('search_column_arr')){
                    $column_Arr[] = explode(',', $request->get('search_column_arr'));
                    $search_Arr[] = explode(',', $request->get('search_query_arr'));
                    //return $this->buildQuery2($column_Arr, $search_Arr, $request->search_operator, $query);
                    foreach($column_Arr[0] as $id => $column) {
                        if (strlen(trim($column)) != 0) {
                            if(strlen(trim($search_Arr[0][$id])) != 0) {
                                list($relation, $relatedColumn) = explode('.', $column);
                                $query = $query->whereHas($relation, function ($query) use ($relatedColumn, $request, $column, $id, $search_Arr, $relation) {
                                    $query = $this->buildQuery($relatedColumn,
                                        $request->search_operator,
                                        trim($search_Arr[0][$id]),
                                        $query,
                                        null,
                                        true,
                                        $relation);
                                });
                            }
                        }
                    }
                }
            })
            ->paginate($request->per_page);
    }

    protected function isRelatedColumn($request)
    {
        return strpos($request->search_column, '.') !== false;
    }

    protected  function buildQuery2($column_Arr, $search_arr, $request, $query){
        switch ($relation){
            case 'event':
                $translatable = 'event_translations';
                $entity = 'events.id';
                $entity_id = "event_id";
                break;
            case 'city':
                $translatable = 'city_translations';
                $entity = 'cities.id';
                $entity_id = "city_id";
                break;
        }
        $query->where($column, $this->operators[$operator], $request)->join($translatable, $entity, '=', $translatable . '.' . $entity_id);
    }


    protected function buildQuery($column, $operator, $request, $query, $column2 = null, $search_array = false, $relation = null)
    {
        if (!$search_array) {
            switch ($operator) {
                case 'equal_to':
                case 'not_equal':
                case 'less_than':
                case 'greater_than':
                case 'less_than_or_equal_to':
                case 'greater_than_or_equal_to':
                    $query->where($column, $this->operators[$operator], $request->search_query_1)->join('event_translations', 'events.id', '=', 'event_translations.event_id');
                    if ($column2 != null) {
                        $query->where($column2, $this->operators[$operator], $request->search_query_3);
                    }
                    break;
                case 'in':
                    $query->whereIn($column, explode(',', $request->search_query_1));
                    break;
                case 'not_in':
                    $query->whereNotIn($column, explode(',', $request->search_query_1));
                    break;
                case 'like':
                    $query->where($column, 'like', '%' . $request->search_query_1 . '%');
                    break;
                case 'between':
                    $query->whereBetween($column, [
                        $request->search_query_1,
                        $request->search_query_2
                    ]);
                    break;
                default:
                    throw new Exception('Invalid Search Operator', 1);
                    break;
            }
        } else {
            switch ($relation){
                case 'event':
                    $translatable = 'event_translations';
                    $entity = 'events.id';
                    $entity_id = "event_id";
                    break;
                case 'city':
                    $translatable = 'city_translations';
                    $entity = 'cities.id';
                    $entity_id = "city_id";
                    break;
                case 'holiday':
                    $translatable = 'holiday_translations';
                    $entity = 'holidays.id';
                    $entity_id = "holiday_id";
                    break;
            }
            $query->where($column, $this->operators[$operator], $request)->join($translatable, $entity, '=', $translatable . '.' . $entity_id);
        }
        return $query;
    }
}