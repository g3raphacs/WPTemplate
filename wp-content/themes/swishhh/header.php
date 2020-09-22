<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <!-- navbar  -->
    <div id="navbar-topbar" class="flex-spaceb bck-sec mp0">
        <div id="navbar-left" class="flex">
            <!-- logo -->
            <div id="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/swishhh1.svg" alt="Swishhh Logo" width="312.243px" height="45px"></a></div>
            <!-- Social Buttons -->
            <div id="navbar-social" class="flex-spaceb">
                <div id="social1-facebook"><a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-facebook-1-1.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-facebook-1-2.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                </a></div>
                <div id="social1-twitter"><a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-twitter-1-1.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-twitter-1-2.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                </a></div>
                <div id="social1-insta"><a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-insta-1-1.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-insta-1-2.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                </a></div>
                <div id="social1-youtube"><a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-youtube-1-1.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/soc-youtube-1-2.svg"" alt="Facebook scoial button" width="33.902px" height="33.765px">
                </a></div>
            </div>
        </div>
        <div id="navbar-right" class="flex">
            <div id="search-icon" class="f-27 txt-white las la-search"></div>
            <div id="nav-burger" class="closed">
                <div id="nav-burger-closed">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/burger1.svg"" alt="Facebook scoial button" width="101px" height="45px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/burger2.svg"" alt="Facebook scoial button" width="101px" height="45px">
                </div>
                <div id="nav-burger-opened">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/burger1x.svg"" alt="Facebook scoial button" width="101px" height="45px">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/burger2x.svg"" alt="Facebook scoial button" width="101px" height="45px">
                </div>
            </div>
        </div>
    </div>

    <!-- navbar test -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto',
            ]); ?>

            <?php get_search_form(); ?>

        </div>
    </nav>


    <div class='container-fluid'>