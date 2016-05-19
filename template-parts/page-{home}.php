<?php
/**
 * Template Name: Template for the home page
 *
 *
 */

 ?>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site sidebar-right">
        <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'bro' ); ?></a>

        <?php if (get_header_image() ){ ?>
        <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
            <?php } else { ?>
            <header id="masthead" class="site-header" role="banner">
                <?php } ?>

                <div class="site-cta">
                    <?php $site_title = get_bloginfo ('name'); ?>
                    <a href= <?php echo get_theme_mod('calltoaction_url'); ?> rel="home">
                        <div class="site-firstletter" aria-hidden="true">
                            <?php echo get_theme_mod('calltoaction_text'); ?>
                        </div>
                    </a>
                </div>


<!--                <div class="site-branding" --><?php //if ( is_singular() ) { echo ' screen-reader-text'; } ?><!--">-->
<!--                --><?php
//                if ( is_front_page() && is_home() ) : ?>
<!--                    <h1 class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
<!--                --><?php //else : ?>
<!--                    <p class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></p>-->
<!--                    --><?php
//                endif;
//                $description = get_bloginfo( 'description', 'display' );
//                if ( $description || is_customize_preview() ) : ?>
<!--                    <p class="site-description">--><?php //echo $description; /* WPCS: xss ok. */ ?><!--</p>-->
<!--                    --><?php
//                endif; ?>
    <!--    </div><!-- .site-branding -->-->

    <div class ="frontpageNavContainer">
        <nav id="site-navigation" class="frontpage-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bro' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class'=> 'nav-menu' ) ); ?>

        </nav><!-- #site-navigation -->
    </div>

    </header><!-- #masthead -->

    <!--Mast head cta (with img-->
    <!-- Linked to customizer -->

    <div class="mastHeadContainer">
        <img class="mastHeadImage" src=<?php echo get_theme_mod('homepage_masthead_image');?>>
        <div class="frontpagetitleContainer">
            <h1 class="frontpagetitle"><?php bloginfo( 'name' ); ?></h1>
        </div>
        <div class="primaryCTAContainer">
            <a href=<?php echo get_theme_mod('homepage_calltoaction_url');?>>
                <div class="site-firstletter">
                    <?php echo get_theme_mod('homepage_calltoaction_title');?>
                </div>
            </a>
        </div>
    </div>



<div id="content" class="site-content">



<!--Content of front page-->
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( is_active_sidebar( 'newsWidgetArea' ) ) : ?>
                <div id="primary-masthead" class="primary-masthead widget-masthead" role="complementary">
                    <?php dynamic_sidebar( '' ); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>



            <div class="site-frontpageContainer">
                <h2 class="frontpageHeader"><?php echo get_theme_mod('homepage_aboutsection_title'); ?></h2>
                <p class="site-aboutusDesc"><?php echo get_theme_mod('homepage_aboutsection_description'); ?></p>
            </div>

            <div class="site-frontpageContainer">
                <h2 class="frontpageHeader"><?php echo get_theme_mod('homepage_news_title'); ?></h2>
            </div>




            <?php dynamic_sidebar( 'newsWidgetArea' ); ?>


            <?php dynamic_sidebar( 'peopleWidgetArea' ); ?>

            <?php
            if ( have_posts() ) :

                if ( is_home() && ! is_front_page() ) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>

                    <?php
                endif;

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>