<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!--BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>


            <li class="nav-item start <?php echo $menu == 'dashboard'?'active':'';?>">
                <a href="<?php echo site_url('dashboard');?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow <?php echo $menu == 'dashboard'?'open':'';?>"></span>
                </a>
            </li>


            <?php if( $this->session->userdata('main_menu_sess') == 'leads' ) { ?>



                <li class="nav-item start <?php echo ($menu == 'leads'?'active open':'');?>">
                    <a href="<?php echo site_url('leads');?>" class="nav-link ">
                        <i class="icon-list"></i>
                        <span class="title">Leads </span>
                    </a>
                </li>




                <li class="nav-item start <?php echo ($menu == 'cleads'?'active open':'');?>">
                    <a href="<?php echo site_url('cleads');?>" class="nav-link ">
                        <i class="icon-list"></i>
                        <span class="title">Closed Leads </span>
                    </a>
                </li>



                <?php if( in_array( $this->session->userdata('group_id'), array(1)) ) { ?>

                    <li class="nav-item start <?php echo $menu == 'users'?'active open':'';?>">
                        <a href="javascript:;" class="nav-link nav-toggle">

                            <i class="fa fa-users"></i>
                            <span class="title">Users</span>
                            <span class="selected"></span>
                            <span class="arrow <?php echo $menu == 'users'?'open':'';?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'list'?'active open':'');?>">
                                <a href="<?php echo site_url('users');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">List</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'add'?'active open':'');?>">
                                <a href="<?php echo site_url('users/create');?>" class="nav-link ">
                                    <i class="icon-plus"></i>
                                    <span class="title">Add New</span>
                                </a>
                            </li>
                            <li class="nav-item start <?php echo ($menu == 'users' && $submenu == 'profile'?'active open':'');?>">
                                <a href="<?php echo site_url('users/profile');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">My Profile</span>
                                </a>
                            </li>


                        </ul>
                    </li>



                    <li class="nav-item start <?php echo $menu == 'masters'?'active open':'';?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-eject"></i>
                            <span class="title">Masters</span>
                            <span class="selected"></span>
                            <span class="arrow <?php echo $menu == 'masters'?'open':'';?>"></span>
                        </a>
                        <ul class="sub-menu">

                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'state'?'active open':'');?>">
                                <a href="<?php echo site_url('state');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">State</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'city'?'active open':'');?>">
                                <a href="<?php echo site_url('city');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">District </span>
                                </a>
                            </li>

                            <li class="nav-item start
                            <?php echo ($menu == 'masters' && $submenu == 'branch'?'active open':'');?>">
                                <a href="<?php echo site_url('branch');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Branch </span>
                                </a>
                            </li>

                            <li class="nav-item start
                            <?php echo ($menu == 'masters' && $submenu == 'category'?'active open':'');?>">
                                <a href="<?php echo site_url('category');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">University </span>
                                </a>
                            </li>

                            <li class="nav-item start
                            <?php echo ($menu == 'masters' && $submenu == 'course'?'active open':'');?>">
                                <a href="<?php echo site_url('course');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Course </span>
                                </a>
                            </li>

                            <li class="nav-item start
                            <?php echo ($menu == 'masters' && $submenu == 'stream'?'active open':'');?>">
                                <a href="<?php echo site_url('stream');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Stream </span>
                                </a>
                            </li>


                            <li class="nav-item start
                            <?php echo ($menu == 'masters' && $submenu == 'statuses'?'active open':'');?>">
                                <a href="<?php echo site_url('statuses');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">status </span>
                                </a>
                            </li>
    <?php /*
                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'products'?'active open':'');?>">
                                <a href="<?php echo site_url('products');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Products </span>
                                </a>
                            </li> */ ?>

                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'sources'?'active open':'');?>">
                                <a href="<?php echo site_url('sources');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Source </span>
                                </a>
                            </li>

                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'academic'?'active open':'');?>">
                                <a href="<?php echo site_url('academic');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Academic Year </span>
                                </a>
                            </li>



                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'types'?'active open':'');?>">
                                <a href="<?php echo site_url('types');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Qualification </span>
                                </a>
                            </li>

                            <li class="nav-item start <?php echo ($menu == 'masters' && $submenu == 'cgroups'?'active open':'');?>">
                                <a href="<?php echo site_url('cgroups');?>" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Feed Back </span>
                                </a>
                            </li>



                        </ul>
                    </li>


                <?php } ?>

            <?php } ?>


            <?php if( in_array( $this->session->userdata('group_id'), array(1)) ) { ?>


                <li class="nav-item start <?php echo $menu == 'settings'?'active open':'';?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                        <span class="selected"></span>
                        <span class="arrow <?php echo $menu == 'settings'?'open':'';?>"></span>
                    </a>

                    <ul class="sub-menu">

                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'email'?'active open':'');?>">
                            <a href="<?php echo site_url('settings');?>" class="nav-link ">
                                <i class="icon-book-open"></i>
                                <span class="title">General</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'backup'?'active open':'');?>">
                            <a href="<?php echo site_url('settings/backup');?>" class="nav-link ">
                                <i class="fa fa-bug"></i>
                                <span class="title">Backup</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                        <li class="nav-item start <?php echo ($menu == 'settings' && $submenu == 'emails'?'active open':'');?>">
                            <a href="<?php echo site_url('settings/templates');?>" class="nav-link ">
                                <i class="icon-envelope"></i>
                                <span class="title">Email Templates</span>
                            </a>
                        </li>

                    </ul>
                </li>

            <?php }?>




        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR-->