@section("header")



    <header class="navbar">
        <div class="container-fluid expanded-panel">
            <div class="row">
                <div id="logo" class="col-xs-12 col-sm-2">
                    <a href="/police/index" style="font-size: 16px">Chiang Rai Immigration</a>
                </div>
                <div id="top-panel" class="col-xs-12 col-sm-10">
                    <div class="row">
                        <div class="col-xs-8 col-sm-4">
                            <a href="#" class="show-sidebar" style="color: #ffffff">
                                <i class="fa fa-bars"></i>
                            </a>


                        </div>
                        <div class="col-xs-4 col-sm-8 top-panel-right">
                            <ul class="nav navbar-nav pull-right panel-menu">


                                <?php if(Auth::user()->role->key == 'admin'){ ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle account" data-toggle="dropdown">

                                        <i class="fa fa-angle-down pull-right"></i>
                                        <div class="user-mini pull-right">
                                            <span class="welcome" style="color: #ffffff">Welcome Administrator</span>
                                            <span style="color: #ffffff"><% Auth::user()->rank->rank %> <% Auth::user()->name_police %> <% Auth::user()->surname_police %></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/police/profile">
                                                <i class="fa fa-user"></i>
                                                <span>ข้อมูลส่วนตัว</span>
                                            </a>
                                        </li>


                                        <li>
                                            <a href="<% url('/api/auth/logout/') %>">
                                                <i class="fa fa-power-off"></i>
                                                <span>ออกจากระบบ</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>

                                    <?php if(Auth::user()->role->key == 'Member_Commissioned_Officers' || Auth::user()->role->key == 'Member_Non-Commissioned_Officer'){ ?>

                                    <li class="dropdown">
                                    <a  class="dropdown-toggle account" data-toggle="dropdown">

                                        <i class="fa fa-angle-down pull-right"></i>
                                        <div class="user-mini pull-right">
                                            <span class="welcome" style="color: #ffffff">Welcome Member</span>
                                            <span style="color: #ffffff"><% Auth::user()->rank->rank %> <% Auth::user()->name_police %> <% Auth::user()->surname_police %></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/police/profile">
                                                <i class="fa fa-wrench"></i>
                                                <span>ข้อมูลส่วนตัว</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<% url('/api/auth/logout/') %>">
                                                <i class="fa fa-power-off"></i>
                                                <span>ออกจากระบบ</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>




                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--End Header-->




@show
