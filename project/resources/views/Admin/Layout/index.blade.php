﻿<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" type="text/css" href="/d/plugins/colorpicker/colorpicker.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/plugins/imgareaselect/css/imgareaselect-default.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/plugins/jgrowl/jquery.jgrowl.css" media="screen">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/d/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/icomoon/style.css" media="screen">

    <link rel="stylesheet" type="text/css" href="/d/css/mws-style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/icons/icol16.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/icons/icol32.css" media="screen">

    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/css/demo.css" media="screen">

    <!-- jQuery-UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/jui/css/jquery.ui.all.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/jui/css/jquery.ui.timepicker.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/jui/jquery-ui.custom.css" media="screen">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/css/mws-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/themer.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/my.css" media="screen">

    <title>
        @section('title')
        @show
    </title>

</head>

<body>

<!-- Themer (Remove if not needed) -->
<div id="mws-themer">
    <div id="mws-themer-content">
        <div id="mws-themer-ribbon"></div>
        <div id="mws-themer-toggle">
            <i class="icon-bended-arrow-left"></i>
            <i class="icon-bended-arrow-right"></i>
        </div>
        <div id="mws-theme-presets-container" class="mws-themer-section">
            <label for="mws-theme-presets">Color Presets</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div id="mws-theme-pattern-container" class="mws-themer-section">
            <label for="mws-theme-patterns">Background</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <ul>
                <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
            </ul>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
        </div>
    </div>
    <div id="mws-themer-css-dialog">
        <form class="mws-form">
            <div class="mws-form-row">
                <div class="mws-form-item">
                    <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Themer End -->

<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="/d/images/mws-logo.png" alt="mws admin">
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">

        <!-- Notifications -->
        <div id="mws-user-notif" class="mws-dropdown-menu">
            <a href="/d/#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>

            <!-- Unread notification count -->
            <span class="mws-dropdown-notif">35</span>

            <!-- Notifications dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-notifications">
                        <li class="read">
                            <a href="/d/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="/d/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="/d/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="/d/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="/d/#">View All Notifications</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="mws-user-message" class="mws-dropdown-menu">
            <a href="/d/#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>

            <!-- Unred messages count -->
            <span class="mws-dropdown-notif">35</span>

            <!-- Messages dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-messages">
                        <li class="read">
                            <a href="/d/#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="/d/#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="/d/#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="/d/#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="/d/#">View All Messages</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">

            <!-- User Photo -->
            <div id="mws-user-photo">
                <img src="/d/example/profile.jpg" alt="User Photo">
            </div>

            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">
                    Hello  {{ session('isadmin') }}
                </div>
                <ul>
                    <li><a href="/d/#">Profile</a></li>
                    <li><a href="/d/#">Change Password</a></li>
                    <li><a href="/adminlogin">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>

    <!-- Sidebar Wrapper -->
    <div id="mws-sidebar">

        <!-- Hidden Nav Collapse Button -->
        <div id="mws-nav-collapse">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Searchbox -->
        <div id="mws-searchbox" class="mws-inset">
            <form action="typography.html">
                <input type="text" class="mws-search-input" placeholder="Search...">
                <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
            </form>
        </div>

        <!-- Main Navigation -->
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i> 管理员</a>
                    <ul>
                        <li><a href="/adminuser/create">管理员添加</a></li>
                        <li><a href="/adminuser">管理员列表</a></li>
                    </ul>
                    <ul>
                        <li><a href="/roles/create">角色添加</a></li>
                        <li><a href="/roles">角色列表</a></li>
                    </ul>
                    <ul>
                        <li><a href="/nodes/create">权限添加</a></li>
                        <li><a href="/nodes">权限列表</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i> 用户管理</a>
                    <ul>
                        <li><a href="/users">用户列表</a></li>
                    </ul>
                </li>

            </ul>
        </div>
         <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>分类管理 </a>
                    <ul>
                        <li><a href="/cates/create">分类添加</a></li>
                        <li><a href="/cates">分类列表</a></li>
                    </ul>
         
                </li>

            </ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>公告管理 </a>
                    <ul>
                        <li><a href="/articles/create">公告添加</a></li>
                        <li><a href="/articles">公告列表</a></li>
                    </ul>
         
                </li>

            </ul>
        </div>
         <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>商品管理 </a>
                    <ul>
                        <li><a href="/shops/create">商品添加</a></li>
                        <li><a href="/shops">商品列表</a></li>
                    </ul>
         
                </li>

            </ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>订单管理 </a>
                    <ul>
                        <li><a href="/orders">订单列表</a></li>
                    </ul>

                </li>

            </ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>轮播图管理 </a>
                    <ul>
                        <li><a href="/imgs/create">图片添加</a></li>
                        <li><a href="/imgs">图片列表</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="/d/#"><i class="icon-list"></i>友情链接管理 </a>
                    <ul>
                        <li><a href="/admin/friend">未审核</a></li>
                        <li><a href="/admin/friend/indexs">已审核</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

        <!-- Inner Container Start -->
        <div class="container">


       @if(session('success'))
       <div class="mws-form-message success">
        {{session('success')}}
        </div>
       
       @endif
       @if(session('error'))
       <div class="mws-form-message warning">
       {{session('error')}}
        
        </div>
       @endif

        {{--       内容开始--}}
        @section('content')

        @show


        {{--      内容结束--}}


        <!-- Panels End -->
        </div>
        <!-- Inner Container End -->

        <!-- Footer -->
        <div id="mws-footer">
            Copyright Your Website 2012. All Rights Reserved.
        </div>

    </div>
    <!-- Main Container End -->

</div>

<!-- JavaScript Plugins -->
<script src="/d/js/libs/jquery-1.8.3.min.js"></script>
<script src="/d/js/libs/jquery.mousewheel.min.js"></script>
<script src="/d/js/libs/jquery.placeholder.min.js"></script>
<script src="/d/custom-plugins/fileinput.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script src="/d/jui/js/jquery-ui-1.9.2.min.js"></script>
<script src="/d/jui/jquery-ui.custom.min.js"></script>
<script src="/d/jui/js/jquery.ui.touch-punch.js"></script>
<script src="/d/jui/js/timepicker/jquery-ui-timepicker.min.js"></script>

<!-- Plugin Scripts -->
<script src="/d/plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
<script src="/d/plugins/jgrowl/jquery.jgrowl-min.js"></script>
<script src="/d/plugins/validate/jquery.validate-min.js"></script>
<script src="/d/plugins/colorpicker/colorpicker-min.js"></script>

<!-- Core Script -->
<script src="/d/bootstrap/js/bootstrap.min.js"></script>
<script src="/d/js/core/mws.js"></script>

<!-- Themer Script (Remove if not needed) -->
<script src="/d/js/core/themer.js"></script>

<!-- Demo Scripts (remove if not needed) -->
<script src="/d/js/demo/demo.widget.js"></script>

</body>
</html>
