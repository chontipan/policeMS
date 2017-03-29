@section("menu")
    <?php if(Auth::user()->role->key == 'admin'){ ?>
    <div class="profile-sidebar">
        <div class="profile-userpic text-center" style="padding: 0px 0 10px 0;color: #fafcfd">
            <h4>WELCOME</h4>
        </div>

        <div class="profile-userpic">
            <img src="<% Auth::user()->photo ? Auth::user()->photo : '/img/square-image.png' %>"
                 class="img-responsive" style="width: 170px;height: 170px" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
               <% Auth::user()->name_police %>  <% Auth::user()->surname_police %>
            </div>
        </div>
    </div>

    <ul class="nav main-menu">
        <li>
            <a href="/police/index" class="<% Request::is('police/index') ? 'active' : '' %>">
                <i class="fa fa-home"></i>
                <span class="hidden-xs">หน้าหลัก</span>
            </a>
        </li>
        <li>
            <a href="/police/user" class="<% Request::is('police/user') ? 'active' : '' %>">
                <i class="fa fa-users"></i>
                <span class="hidden-xs">จัดการข้อมูลสมาชิก</span>
            </a>
        </li>


        <li>
            <a href="/police/mylog" class="<% Request::is('police/mylog') ? 'active' : '' %>">
                <i class="fa fa-desktop"></i>
                <span class="hidden-xs">ตรวจสอบการทำงาน</span>
            </a>
        </li>

    </ul>
    <?php } ?>
    <?php if(Auth::user()->role->key == 'Member_Commissioned_Officers' || Auth::user()->role->key == 'Member_Non-Commissioned_Officer'){ ?>
    <div class="profile-sidebar">
        <div class="profile-userpic text-center" style="padding: 0px 0 10px 0;color: #fafcfd">
            <h4>WELCOME</h4>
        </div>

        <div class="profile-userpic">
            <img src="<% Auth::user()->photo ? Auth::user()->photo : '/img/square-image.png' %>" class="img-responsive"
                 style="width: 170px;height: 170px" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <% Auth::user()->name_police %>  <% Auth::user()->surname_police %>
            </div>
        </div>
    </div>


    <ul class="nav main-menu">
        <li>
            <a href="/police/index" class="<% Request::is('police/index') ? 'active' : '' %>">
                <i class="fa fa-home"></i>
                <span class="hidden-xs">หน้าหลัก</span>
            </a>
        </li>

        <li>
            <a href="/police/person_general" class="<% Request::is('police/person_general') ? 'active' : '' %>">
                <i class="fa  fa-user"></i>
                <span class="hidden-xs">บุคคลทั่วไป</span>
            </a>
        </li>
        <li>
            <a href="/police/person_crime" class="<% Request::is('police/person_crime') ? 'active' : '' %>">
                <i class="fa fa-user-secret"></i>
                <span class="hidden-xs" style="font-size: 12px;">บุคคลที่เกี่ยวข้องกับอาชญากรรม</span>
            </a>
        </li>

        <li>
            <a href="/police/case" class="<% Request::is('police/case') ? 'active' : '' %>">
                <i class="fa  fa-laptop"></i>
                <span class="hidden-xs">คดี</span>
            </a>
        </li>
        <li>
            <a href="/police/statistics" class="<% Request::is('police/statistics') ? 'active' : '' %>">
                <i class="fa fa-bar-chart-o"></i>
                <span class="hidden-xs">สถิติ</span>
            </a>
        </li>


    </ul>
    <?php } ?>





@show
