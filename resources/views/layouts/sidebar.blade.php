<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="{{ Request::is( '/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home "></i> <span>Home</span>
                </a>
            </li>
            <li class="treeview {{ Request::is( '/applicants') ? 'active' : '' }} {{ Request::is( 'applicants/*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Applicants</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is( 'applicants/list') ? 'active' : '' }} {{ Request::is( 'applicants/list/*') ? 'active' : '' }} {{ Request::is( 'applicants/update/*') ? 'active' : '' }}">
                        <a href="{{ url('/applicants/list') }}"><i class="fa fa-circle-o"></i> List of Applicants</a>
                    </li>
                    <li class="{{ Request::is( 'applicants/lineup') ? 'active' : '' }} {{ Request::is( 'applicants/lineup/*') ? 'active' : '' }}">
                        <a href="{{ url('/applicants/lineup') }}"><i class="fa fa-circle-o"></i> Lineup of Applicants</a>
                    </li>
                    <!-- <li class="{{ Request::is( 'applicants/forms') ? 'active' : '' }} {{ Request::is( 'applicants/forms/*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-circle-o"></i> Forms</a>
                    </li> -->
                </ul>
            </li>
            <li class="{{ Request::is( 'positions') ? 'active' : '' }} {{ Request::is( 'positions/*') ? 'active' : '' }}">
                <a  href="{{ url('/positions') }}">
                    <i class="fa fa-thumb-tack"></i> <span>Office Positions</span>
                </a>
            </li>
            <li class="{{ Request::is( 'users') ? 'active' : '' }} {{ Request::is( 'users/*') ? 'active' : '' }}">
                <a id="button-action" href="{{ url('/users') }}">
                    <i class="fa fa-user"></i> <span>User Accounts</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>