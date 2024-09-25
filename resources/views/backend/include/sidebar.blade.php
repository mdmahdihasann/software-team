<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
       
        <ul class="side-menu metismenu mt-3">
            <li>
                <a class="active" href="{{ route('app.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Roles & Permissions</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    @permission('app.roles.index')
                    <li>
                        <a href="{{ route('app.roles.index') }}">Roles</a>
                    </li>
                    @endpermission
                </ul>
            </li>
            <li class="heading">Product Category Part</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Prodcut Category</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{ route('category.index') }}">Category</a>
                        </li>
                    </ul>
            </li>
            <li class="heading">Product Part</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Prodcut ALL</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{ route('product.index') }}">product</a>
                        </li>
                    </ul>
            </li>
            
          
        </ul>
    </div>
</nav>