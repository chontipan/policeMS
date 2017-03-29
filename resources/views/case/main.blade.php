@extends("layouts/main")
@section("content")



    <div ng-app="DataCase">

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="{{ asset('app/case/app.js') }}"></script>
    <style type="text/css">
        #scroll_case {
            width:auto;
            height:400px;
            overflow:auto;
        }
        #scroll_edit {
            width:auto;
            height:400px;
            overflow:auto;
        }
        #scroll_file {
            width:auto;
            height:400px;
            overflow:auto;
        }
        #scroll_person {
            width:auto;
            height:390px;
            overflow:auto;
        }
        #scroll_pdf {
            width:auto;
            height:390px;
            overflow:auto;
        }

    </style>

@stop




