@extends("layouts/main")
@section("content")



    <div ng-app="MyLog">

        <ui-view></ui-view>

    </div>



@stop


@section('javascript')

    <script type="text/javascript" src="/app/mylog/app.js"></script>



@stop




