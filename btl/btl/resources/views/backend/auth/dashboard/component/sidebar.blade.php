 <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element text-center"> <span>
                            <img alt="image" class="img-circle" src="backend/img/admin1.jpg" style="width: 60px; height: 60px;" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Quang Giáp</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('auth.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                    <li class="active">
                        <div class="nav-link d-flex align-items-center" style="cursor: pointer;">
                            <i class="fa fa-th-large mr-2"></i> 
                            <span class="nav-label">Quản lý thành viên</span> 
                            <span class="fa arrow"></span>
                        </div>
                        <ul class="nav nav-second-level">
                            
                            <li><a href="{{ route('user.index') }}">Quản lý thành viên</a></li>
                            <li>
                                <div class="nav-link d-flex align-items-center" style="cursor: pointer;">
                                    <i class="fa fa-newspaper-o mr-2"></i> 
                                    <span class="nav-label">Quản lý danh mục tin tức</span> 
                                    <span class="fa arrow"></span>
                                </div>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{ route('category.index') }}">Danh sách danh mục</a></li>
                                    <li><a href="{{ route('category.create') }}">Thêm danh mục</a></li>
                                </ul>
                            </li>
                            <ul class="nav nav-second-level">
                            <li class="nav-item {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                                <div class="nav-link collapsed d-flex align-items-center" data-toggle="collapse" data-target="#postMenu"
                                    aria-expanded="true" aria-controls="postMenu" style="cursor: pointer;">
                                    <i class="fas fa-newspaper mr-2"></i>
                                    <span class="nav-label" >Quản lý bài viết</span>
                                    <span class="fa arrow"></span>
                                </div>
                                
                                <div id="postMenu" class="collapse {{ request()->routeIs('posts.*') ? 'show' : '' }}">
                                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                                        <li>
                                        <a class="collapse-item {{ request()->routeIs('posts.index') ? 'active' : '' }} d-flex align-items-center"
                                            href="{{ route('posts.index') }}">
                                             Danh sách bài viết
                                        </a>
                                        </li>
                                        <li>
                                        <a class="collapse-item {{ request()->routeIs('posts.create') ? 'active' : '' }} d-flex align-items-center"
                                            href="{{ route('posts.create') }}">
                                             Thêm bài viết
                                        </a>
                                        </li>
                                        <li class="nav-item {{ request()->routeIs('comments.*') ? 'active' : '' }}">
                                            <div class="nav-link collapsed d-flex align-items-center" data-toggle="collapse" data-target="#commentMenu"
                                                aria-expanded="true" aria-controls="commentMenu" style="cursor: pointer;">
                                                <i class="fas fa-comments mr-2"></i>
                                                <span class="nav-label">Quản lý bình luận</span>
                                                <span class="fa arrow"></span>
                                            </div>
                                        
                                            <div id="commentMenu" class="collapse {{ request()->routeIs('comments.*') ? 'show' : '' }}">
                                                <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                                                    <li>
                                                        <a class="collapse-item {{ request()->routeIs('comments.index') ? 'active' : '' }} d-flex align-items-center"
                                                            href="{{ route('comments.index') }}">
                                                            Danh sách bình luận
                                                        </a>
                                                    </li>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </div>
                                </div>
                                
                            </li>
                            </ul>
                            
                           
                        </ul>
                        
                        
                    </li>
                    </ul>
                </li>
                
            </ul>

        </div>
    </nav>