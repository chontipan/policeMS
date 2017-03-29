<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">


    <title>CHIANG RAI IMMIGRATION</title>



    @include('layouts.css')
    @yield('stylesheet')



</head>

<body>

@include("layouts.header")

<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <!--Start menu-->
        <div id="sidebar-left" class="col-xs-2 col-sm-2">




            @include("layouts.menu")
        </div>
        <!--End Content-->

        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">

            <div>
                <img src="/assets/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
            </div>

            <div>
                @yield("content")
            </div>
        </div>
        <!--End Content-->

    </div>

</div>


</body>


@include('layouts.js')
@yield('scripts')


@yield("javascript")


</html>