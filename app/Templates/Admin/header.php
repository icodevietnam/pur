<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <?php
    echo $meta;//place to pass data / plugable hook zone
    Assets::css([
        Url::templateAdminPath().'css/main/admin.min.css'
    ]);
    echo $css; //place to pass data / plugable hook zone
    ?>
</head>
<body>
<?php echo $afterBody; //place to pass data / plugable hook zone?>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                        <img alt="image" class="img-rounded" width="50px" height="50px"
                             src="<?php echo Session::get('admin')[0]->avatar ?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
                        <span class="clear">
                            <span class="block m-t-xs"> <strong
                                    class="font-bold"></strong>
                            </span>
                            <!-- <span class="departmentCur text-muted text-xs block">Phòng: Art Director</span> -->
                        </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?=DIR;?>admin/profile">Tài khoản</a></li>
                            <li><a href="<?=DIR;?>admin/change-password">Đổi mật mã</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=DIR;?>admin/logout">Thoát</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">IN+</div>
                </li>
                    <li class="user <?php if($key === 'general') echo 'active'; ?> "><a href="#"><i class="fa fa-tachometer"></i> <span
                                class="nav-label">Tổng hợp</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/~dashboard">Bảng điều khiển</a></li>
                            <li><a href="<?=DIR;?>admin/~preference">Thông tin chung</a></li>
                            <li><a href="<?=DIR;?>admin/~about-us">Về chúng tôi</a></li>
                        </ul>
                    </li>
                    <li class="user <?php if($menu == 'preference') echo 'active'; ?> "><a href="#"><i class="fa fa-users"></i> <span
                                class="nav-label">Người dùng</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý người dùng</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý vai trò</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý quyền hạn</a></li>
                        </ul>
                    </li>
                    <li class="user <?php if($menu == 'preference') echo 'active'; ?> "><a href="#"><i class="fa fa-sellsy"></i> <span
                                class="nav-label">Sản phẩm</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/dashboard">Chuyên mục sản phẩm</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý sản phẩm</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Bộ sưu tập</a></li>
                        </ul>
                    </li>
                    <li class="user <?php if($menu == 'preference') echo 'active'; ?> "><a href="#"><i class="fa fa-cc-mastercard"></i> <span
                                class="nav-label">Thương mại điện tử</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý khách hàng</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Theo dõi đơn hàng</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Đơn hàng thành công</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Đơn hàng còn treo</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Khuyến mãi</a></li>
                        </ul>
                    </li>
                    <li class="user <?php if($menu == 'preference') echo 'active'; ?> "><a href="#"><i class="fa fa-newspaper-o"></i> <span
                                class="nav-label">Tin tức</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/dashboard">Chuyên mục tin tức</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Tin tức</a></li>
                        </ul>
                    </li>
                    <li class="user <?php if($menu == 'preference') echo 'active'; ?> "><a href="#"><i class="fa fa-newspaper-o"></i> <span
                                class="nav-label">Thư viện</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý thư viện</a></li>
                            <li><a href="<?=DIR;?>admin/dashboard">Quản lý hình ảnh</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation"
                 style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary "
                       href="#"><i class="fa fa-bars"></i> </a>
                    <!-- <form role="search" class="navbar-form-custom"
                        action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Tìm kiếm..."
                                class="form-control" name="top-search" id="top-search">
                        </div>
                    </form> -->
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><span class="m-r-sm text-muted welcome-message">Hello,
                    <strong><?php echo Session::get('admin')[0]->username ?></strong> ! </span></li>
                    <!-- <li class="dropdown"><a class="count-info"
                        href="<c:url value='/admin/viewNoti'/>"> <i class="fa fa-bell"></i> <span
                            class="label label-primary">1</span>
                    </a>
                    </li> -->


                    <li><a href="<?=DIR;?>admin/logout"> <i
                                class="fa fa-sign-out"></i> Thoát
                        </a></li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><?= $title ?></h2>
                <ol class="breadcrumb">
                    <li><a href="<?=DIR;?>admin">Home</a></li>
                    <li class="active"><strong><?= $title ?></strong></li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        </nav>
        <div class="wrapper wrapper-content  animated fadeInRight blog">

