
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trang admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
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
                  height="20"
                />
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
                <form action="?act=post_update_variant&id=<?= $data_variant['variant_id']?>&id_prd=<?= $_GET['id_prd'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
              <label for="">Tên Sản Phẩm</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_variant['name'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">size</label>
              <input type="text" name="size_old" id="" class="form-control" placeholder="" aria-describedby="helpId" readonly value="<?= $data_variant['size'] ?>">
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="size_new" id="">
                    <option selected></option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
            </div> 
            <div class="form-group">
              <label for="">Màu Sắc</label>
              <input type="text" name="color_old" id="" class="form-control" placeholder="" aria-describedby="helpId" readonly value="<?= $data_variant['color'] ?>">
              <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="color_new" id="">
                    <option selected></option>
                    <option value="Đen">Đen</option>
                    <option value="Đỏ">Đỏ</option>
                    <option value="Xanh">Xanh</option>
                </select>
            </div>
            </div>
             <div class="form-group">
              <label for="">Số Lượng Tồn</label>
              <input type="text" name="stock_quantity" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_variant['stock_quantity'] ?>">
            </div>
            <div class="form-group">
              <label for="">Ảnh</label>
              <img src="<?= str_replace("./admin",".",$data_variant['image']) ?>" alt="" width="50">
              <input type="hidden" name="image_old" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $data_variant['image'] ?>">
              <input type="file" name="image_new" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Trạng Thái</label>
              <select class="form-control" name="status" id="">
                  <option value="<?= $data_variant?>"> <?= $data_variant['status']==1 ? "Hiển Thị" : "Ẩn" ?> </option>
                  <?php if($data_variant['status'] == 1){ ?>
                  <option value="0">Ẩn</option>
                 <?php }else{ ?>
                  <option value="1">Hiện</option>
               <?php  } ?>
                </select>
            </div>
            <button class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
          </div>
        </div>

      <?php require_once "menu/footer.php" ?>