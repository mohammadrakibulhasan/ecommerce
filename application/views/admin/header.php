<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . 'assets/images/logo.jpg' ?>">
    <title>Ecom</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5f022c8132.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?= $css ?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="<?= base_url() . 'assets/plugins/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url() . 'assets/plugins/chartist-js/dist/chartist.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/chartist-js/dist/chartist-init.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assets/plugins/css-chart/css-chart.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() . 'css/style.css' ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() . 'css/colors/blue.css' ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-85622565-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url() . 'user' ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url() . 'assets/images/logo.jpg' ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url() . 'assets/images/logo.jpg' ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <!-- <img src="<?= base_url() . 'assets/images/logo-text.png' ?>" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo text -->
                            <img src="<?= base_url() . 'assets/images/logo-light-text.png' ?>" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse text-right justify-content-end">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'user/cart' ?>"><img src="<?= base_url() . 'assets/images/cart.png' ?>" alt="user" class="profile-pic" /></a>
                        </li> -->
                        <!-- <li>
                            <p style="margin:5px 0 0 -15px; color: white;" class="nav-item"><?= $this->cart->total_items() ?></p>

                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() . 'assets/images/users/1.jpg' ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?= base_url() . 'assets/images/users/1.jpg' ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?= $admin['username'] ?></h4>
                                                <p class="text-muted"><?= $admin['email'] ?></p><a href="<?= base_url() . 'admin/profile' ?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li> -->
                                    <li><a href="<?= base_url() . 'admin/logout' ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu  dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?= base_url() . 'assets/images/users/1.jpg' ?>" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= $admin['username'] ?> <span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="<?= base_url() . 'admin/profile' ?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a> -->
                            <div class="dropdown-divider"></div> <a href="<?= base_url() . 'admin/logout' ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Catalog</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url() . 'admin/categories' ?>">Categories</a></li>
                                <li><a href="<?= base_url() . 'admin/product' ?>">Products</a></li>
                                <li><a href="<?= base_url() . 'admin/manufacturers' ?>">Manufacturers</a></li>
                                <li> <a href="#collapse-1-4" data-bs-toggle="collapse" class="has-arrow">Attributes</a>
                                    <ul id="collapse-1-4" class="collapse">
                                        <li> <a href="<?= base_url() . 'admin/attribute' ?>">Attributes</a>
                                        </li>
                                        <li> <a href="<?= base_url() . 'admin/attributegroup' ?>">Attribute Groups</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">Sales</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url() . 'admin/#' ?>">Orders</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url() . 'admin/#' ?>">Orders</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Menu <span class="label label-rounded label-success">3</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url() . 'admin/user' ?>">User</a></li>
                                <li> <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">Product</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="<?= base_url() . 'admin/product' ?>"> View Products</a></li>
                                        <li><a href="<?= base_url() . 'admin/category' ?>"> View Category</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url() . 'admin/orderlist' ?>">Order List</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <!-- <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a> -->
                <!-- item-->
                <!-- <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> -->
                <!-- item-->
                <a href="<?= base_url() . 'admin/logout' ?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">