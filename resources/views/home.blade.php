<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fileinput.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script
            src="http://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/fileinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lightbox.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
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
