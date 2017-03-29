@extends("layouts/main")
@section("content")



    <div ng-app="DataCase">

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script>
        current_role = "<% Auth::user()->role->key %>"
    </script>
    <script type="text/javascript" src="/app/datacase/app.js"></script>
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
        #scroll_case {
            width:auto;
            height:465px;
            overflow:auto;
        }
        #scroll_edit {
            width:auto;
            height:320px;
            overflow:auto;
        }
        #scroll_add {
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
            height:320px;
            overflow:auto;
        }
        #scroll_pdf {
            width:auto;
            height:390px;
            overflow:auto;
        }

    </style>
    <script language="javascript">
        function IsNumeric(sText,obj)
        {
            var ValidChars = "0123456789.";
            var IsNumber=true;
            var Char;
            for (i = 0; i < sText.length && IsNumber == true; i++)
            {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1)
                {
                    IsNumber = false;
                }
            }
            if(IsNumber==false){
                alert("Only numberic value");
                obj.value=sText.substr(0,sText.length-1);
            }
        }
    </script>
@stop




