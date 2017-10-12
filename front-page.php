<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package projectsoul
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <section class="theme-dark">

                    <div class="l-container">

                        <article>

                            <h1><?php the_excerpt(); ?></h1>

                            <?php the_content(); ?>

                        </article>

                    </div>

                </section>


            <?php $about_page = get_page_by_title( 'about' ); ?>

            <section class="theme-light">

                <div class="l-container">

                    <article class="m-overlap">

                        <?php echo get_the_post_thumbnail($about_page); ?>

                        <h1><?php echo get_the_excerpt($about_page);?></h1>

                        <?php echo get_the_content($about_page); ?>

                    </article>

                </div>

            </section>

            <section class="theme-dark">
                <div class="l-container">
                    <h2>some of our clients include</h2>
                
                <div class="slider">


                    <?php foreach(range(1,12) as $count): ?>

                        <?php if(get_field('sponsor_' . $count)): ?>

                            <div><img src="<?php the_field('sponsor_' . $count); ?>"/></div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>
                </div>
            </section>

            <section class="theme-light m-overlay">
                <div class="l-container">

                    <div class="slider">

                        <?php $events = tribe_get_events( array( 'posts_per_page' => 5 ) ); ?>

                        <?php foreach($events as $event): ?>
                            <div class="slider-content text-close">
                                <p><?php echo tribe_get_start_date( $event ); ?></p>   
                                <?php echo get_the_post_thumbnail($event); ?>
                                <p><?php echo( $event->post_title );?></p>
                                
                                <p><?php echo (tribe_get_address ($event). " ".tribe_get_city ($event)); ?></p>
                            </div>
                        <?php endforeach ?>
                        
                    </div>

                </div>

            </section>

            <section class="theme-light">

                <div class="l-container">

                    <div>

                        <?php the_field('contact_us_prompt'); ?>
                        <img src="<?php the_field('contact_us_image'); ?>"/>

                    </div>

                </div>

            </section>


            <?php endwhile ?>

            <?php endif ?>
  

        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_footer();
