<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Management Admin</title>
    <link rel="icon" href="img/mini_logo.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url('css/bootstrap1.min.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('vendors/themefy_icon/themify-icons.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('vendors/gijgo/gijgo.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendors/niceselect/css/nice-select.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('vendors/morris/morris.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/material_icon/material-icons.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('vendors/owl_carousel/css/owl.carousel.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('css/metisMenu.css') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('vendors/font_awesome/css/all.min.css') ?>" /> -->
    <link rel="stylesheet" href="<?= base_url('vendors/tagsinput/tagsinput.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/colors/default.css') ?>" id="colorSkinCSS">

    <?= $this->renderSection('css') ?>

</head>

<body class="crm_body_bg">
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="<?= base_url('index-2.html') ?>"><img src="<?= base_url('img/logo.png') ?>" alt></a>
            <a class="small_logo" href="<?= base_url('index-2.html') ?>"><img src="<?= base_url('img/mini_logo.png') ?>" alt></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <?= $this->include("templateAdmin/sidebar") ?>
    </nav>

    <section class="main_content dashboard_part large_header_bg">

        <?= $this->include('templateAdmin/navbar') ?>

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                    Dashboard</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url('js/jquery1-3.4.1.min.js') ?>"></script>
    <script src="<?= base_url('js/popper1.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap1.min.js') ?>"></script>
    <script src="<?= base_url('js/metisMenu.js') ?>"></script>
    <script src="<?= base_url('vendors/chartjs/roundedBar.min.js') ?>"></script>
    <script src="<?= base_url('vendors/progressbar/jquery.barfiller.js') ?>"></script>
    <script src="<?= base_url('js/dashboard_init.js') ?>"></script>
    <script src="<?= base_url('js/custom.js') ?>"></script>

    <?= $this->renderSection('js') ?>
</body>

</html>