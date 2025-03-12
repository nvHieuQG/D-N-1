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
                                                        <h1><a class="text-info" href="?act=add_variant&id=<?= $_GET['id']?>">Thêm Mới Biến Thể</a></h1>
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Size</th>
                                    <th>Màu Sắc</th>
                                    <th>Số Lượng</th>
                                    <th>Ảnh</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if (empty($data_variant)) {
                                            echo "Sản Phẩm này chưa có biến thể";
                                        } else { ?>
                                            <?php foreach ($data_variant as $render) { ?>
                                <tr>
                                    <td scope="row"><?= $render['name'] ?></td>
                                    <td><?= $render['size'] ?></td>
                                    <td><?= $render['color'] ?></td>
                                    <td><?= $render['stock_quantity'] ?></td>
                                    <td><img src="<?= str_replace("./admin",".",$render['image'])?>" alt="" width="50"></td>
                                    <td><?= $render['status']==1 ?"Hiển Thị" : "Ẩn" ?></td>
                                    <td><a href="?act=update_variant&id=<?= $render['variant_id']?>&id_prd=<?= $render['product_id'] ?>">Sửa</a></td>
                                    <td><a href="?act=delete_variant&id=<?= $render['variant_id']?>&id_prd=<?= $render['product_id'] ?>">Xóa</a></td>
                                </tr>
                            <?php  } ?>
                        <?php } ?>
                        </td>
                        </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>