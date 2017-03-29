@extends("layouts/main")
@section("content")



    <div ng-app="UserProfilePolice">
        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/app/profile_police/app.js"></script>
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
                alert("กรอกได้เฉพาะตัวเลข");
                obj.value=sText.substr(0,sText.length-1);
            }
        }
    </script>


@stop




