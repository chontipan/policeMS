@extends("layouts/main")
@section("content")



    <div ng-app="Person">

        <ui-view></ui-view>
    </div>



@stop


@section('javascript')
    <script>
        current_role = "<% Auth::user()->role->key %>"
    </script>
    <script type="text/javascript" src="/app/person/app.js"></script>
    <script>
        // Create fancybox2 gallery
        function DemoGallery(){
            $('.fancybox').fancybox({
                openEffect	: 'none',
                closeEffect	: 'none'
            });
        }
        $(document).ready(function() {
            // Load Fancybox2 and make gallery in callback
            LoadFancyboxScript(DemoGallery);
        });
    </script>
    <style type="text/css">
        #scroll_demo {
            width:auto;
            height:auto;
            overflow:auto;
        }
        #scroll_home {
            width:auto;
            height:auto;
            overflow:auto;
        }
        #scroll_edit {
            width:auto;
            height:auto;
            overflow:auto;
        }
    </style>



@stop




