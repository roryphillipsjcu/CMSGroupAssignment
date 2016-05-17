<?php
/**
 * Template Name: Template for the home page
 *
 *
 */

 ?>

    <div class="site-cta">
        <?php $site_title = get_bloginfo ('name'); ?>
        <a href= <?php echo get_theme_mod('calltoaction_url'); ?> rel="home">
            <div class="site-firstletter" aria-hidden="true">
                <?php echo get_theme_mod('calltoaction_text'); ?>
            </div>
        </a>
    </div>




    <?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if ( is_active_sidebar( 'mastHeadCTA' ) ) : ?>
                <div id="primary-masthead" class="primary-masthead widget-masthead" role="complementary">
                    <?php dynamic_sidebar( 'mastHeadCTA' ); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>


            <!--Mast head cta (with img-->
            <img class="mastHeadImage" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Indian_Cat_pic.jpg/220px-Indian_Cat_pic.jpg">
            <div class="mastHeadContainer">
                <a href="google.com">
                    <div class="site-firstletter">
                        Join Now!
                    </div>
                </a>
            </div>






            <?php

            dynamic_sidebar( 'mastHeadCTA' );


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