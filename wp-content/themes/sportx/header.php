<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Live football scores at your fingertips." />
    <meta name="author" content="Mario Šomođi" />
    <?php wp_head() ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button id="btnMobileMenu" class="d-lg-none d-sm-block btn btn-outline-dark ms-auto align-items-center"
                type="button">
                <span class="d-flex align-items-center"><i id="mobileMenuIcon" class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse">
                <div class="col">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'left',
                        'theme_location' => 'left',
                        'container' => '',
                        'items_wrap' => '<ul class="navbar-nav justify-content-end mb-2 mb-lg-0">%3$s</ul>'
                    ));
                    ?>
                </div>
                <div class="col-3 text-center navLogo">
                    SportX
                </div>
                <div class="col">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'right',
                        'container' => '',
                        'theme_location' => 'right',
                        'items_wrap' => '<ul class="navbar-nav justify-content-start mb-2 mb-lg-0">%3$s</ul>'
                    ));
                    ?>
                </div>
            </div>
            <div class="mobileMenu hidden text-center">
                <button id="btnMobileMenuClose" class="m-2 me-3 btn btn-outline-light ms-auto align-items-center"
                    type="button">
                    <span class="d-flex align-items-center"><i id="mobileMenuIcon" class="fas fa-times"></i></span>
                </button>
                <div class="d-flex align-items-center justify-content-center flex-column h-100">
                    <div class="text-center mobileLogo">
                        SportX
                    </div>

                    <?php
                    wp_nav_menu(array(
                        'menu' => 'right',
                        'container' => '',
                        'theme_location' => 'right',
                        'items_wrap' => '<ul class="mobileNavItems ps-0 mb-0">%3$s</ul>'
                    ));
                    wp_nav_menu(array(
                        'menu' => 'left',
                        'container' => '',
                        'theme_location' => 'left',
                        'items_wrap' => '<ul class="mobileNavItems ps-0 mb-0">%3$s</ul>'
                    ));
                    ?>
                </div>
            </div>
        </div>
    </nav>