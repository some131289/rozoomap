@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('discipline_access')
            <li>
                <a href="{{ route('admin.disciplines.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.disciplines.title')</span>
                </a>
            </li>@endcan
            
            @can('question_access')
            <li>
                <a href="{{ route('admin.questions.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.questions.title')</span>
                </a>
            </li>@endcan
            
            @can('test_access')
            <li>
                <a href="{{ route('admin.tests.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.tests.title')</span>
                </a>
            </li>@endcan
            
            @can('category_access')
            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.categories.title')</span>
                </a>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

