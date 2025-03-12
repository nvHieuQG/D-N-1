<?php
// echo "<pre>";
// print_r($data_by_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trang admin</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport" />
    <link
        rel="icon"
        href="assets/img/kaiadmin/favicon.ico"
        type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <?php require_once "menu/sidebar.php"; ?>

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img
                                src="assets/img/kaiadmin/logo_light.svg"
                                alt="navbar brand"
                                class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
               <!-- Navbar Header -->
            <?php require_once "menu/nav_bar.php" ?>
          <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Pages</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Starter Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">

                    <form class="form" action="?act=post_update_products&products_id=<?= $data_by_id['product_id']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Tên Sản Phẩm</label>
                          <input type="text" name="name" id="" class="form-control" placeholder="nhập tên sản phẩm" aria-describedby="helpId" value="<?= $data_by_id['name'] ?>">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Danh Mục</label>
                          <select class="form-control" name="category_id" id="">
                            <option value="<?= $data_by_id['category_id']?>"><?= $data_by_id['category'] ?></option>
                           <?php foreach($data_category as $category){ ?>
                             <option value="<?= $category['category_id'] ?>"><?= $category['name']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Giá bán</label>
                          <input type="number" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_by_id['price']?>">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Giá Nhập</label>
                          <input type="number" name="gianhap" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= ($data_by_id['gianhap'])?>">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Số Lượng Nhập</label>
                          <input type="number" name="stock_quantity" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_by_id['stock_quantity'] ?>">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                       <div class="form-group">
                         <label for="">Trạng Thái</label>
                         <select class="form-control" name="status" id="">
                           <option value="<?= $data_by_id['status'] ?>"><?= $data_by_id['status']== "Available" ? "Còn hàng" :"Hết Hàng"; ?></option>
                        <?php if($data_by_id['status'] == "Available"){ ?>
                            <option value="Unavailable">Hết Hàng</option>
                       <?php }else{?>
                        <option value="Available">Còn hàng</option>
                      <?php } ?>
                         </select>
                       </div>
                        <div class="form-group">
                          <label for="">Ẩn/Hiện</label>
                          <select class="form-control" name="comment" id="">
                           <option value="<?= $data_by_id['comment'] ?>"><?= $data_by_id['comment']== 1 ? "Hiện" :"Ẩn"; ?></option>
                        <?php if($data_by_id['comment'] == 1){ ?>
                            <option value="0">Ẩn</option>
                       <?php }else{?>
                        <option value="1">Hiện</option>
                      <?php } ?>
                         </select>
                        </div>
                        <div class="form-group">
                          <label for="">Ảnh Sản Phẩm</label>
                          <img src="<?= $data_by_id['image']?>" alt="" width="100">
                          <input type="file" name="image" id="">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Số lượng đã bán</label>
                          <input type="number" name="Quantity_sold" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_by_id['Quantity_sold'] ?>" readonly>
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Mô Tả</label>
                          <input type="text" name="mota" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_by_id['mota'] ?>">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Ngày Nhập</label>
                          <input type="" name="date" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_by_id['ngaynhap'] ?>" readonly>
                        </div>
                        <h3 class="text-danger"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} ?></h3>
                            <input type="hidden" name="nameOld" id="" value="<?= $data_by_id['name']?>">
                        <button class="btn btn-primary" type="submit">Sửa Sản Phẩm</button>
                    </form>
                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>