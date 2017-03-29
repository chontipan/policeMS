@extends("layouts/main")
@section("content")
    <!--Start Breadcrumb-->
    <div class="row">
        <div id="breadcrumb" class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">หน้าหลัก</a></li>
            </ol>
        </div>
    </div>
    <!--End Breadcrumb-->

    <?php if(Auth::user()->role->key != 'admin'){ ?>
    <div class="col-lg-3 col-md-6">
        <a href="/police/person_general" class="<% Request::is('police/person_general') ? 'active' : '' %>">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">บุคคลทั่วไป</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">บุคคลทั่วไป</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-6">
        <a href="/police/person_crime" class="<% Request::is('police/person_crime') ? 'active' : '' %>">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-secret fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">บุคคลที่เกี่ยวข้องกับอาชญากรรม</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">บุคคลที่เกี่ยวข้องกับอาชญากรรม</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="/police/case" class="<% Request::is('police/case') ? 'active' : '' %>">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-laptop fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">คดี</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">คดี</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="/police/statistics" class="<% Request::is('police/statistics') ? 'active' : '' %>">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">สถิติ</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">สถิติ</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>
    <?php } ?>
    <?php if(Auth::user()->role->key == 'admin'){ ?>
    <div class="col-lg-3 col-md-6">
        <a href="/police/user" class="<% Request::is('police/user') ? 'active' : '' %>">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">จัดการข้อมูลสมาชิก</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">จัดการข้อมูลสมาชิก</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="/police/mylog" class="<% Request::is('police/mylog') ? 'active' : '' %>">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-desktop fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">ตรวจสอบการทำงาน</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">ตรวจสอบการทำงาน</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: #5cb85c;"></i></span>
                    <div class="clearfix"></div>
                </div>

            </div>
        </a>
    </div>

    <?php } ?>




@stop
@section('javascript')


@stop