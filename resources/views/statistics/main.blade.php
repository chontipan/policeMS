@extends("layouts/main")
@section("content")



    <div ng-app="Statistics">

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/app/statistics/app.js"></script>


@stop




