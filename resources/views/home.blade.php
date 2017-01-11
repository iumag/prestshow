<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div id="root"></div>
</div>
</body>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script>
    var title = {
        'hotel': '{{trans('admin.hotel')}}',
        'capacity': '{{trans('panel.truck.table.capacity')}}',
        'model': '{{trans('panel.truck.table.model')}}',
        'volume': '{{trans('panel.truck.table.volume')}}'
    };
</script>
</html>
