<?php
/**
 * Template Name: No Hero
 */
?>

<?php get_header(); 
?>
<div class="container uw-body">

  <div class="row">

     <div class="col-md-8 uw-content" role='main'>

      <?php uw_site_title(); ?>

      <?php if (is_front_page()) { get_template_part( 'menu', 'mobile' ); }?>

      <?php get_template_part( 'breadcrumbs' ); ?>

      <div id='main_content' class="uw-body-copy" tabindex="-1">

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
         get_template_part( 'content', 'title' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

          endwhile;
        ?>
 </div>

    </div>
<div style="margin-top:70px">
    <?php get_sidebar() ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>
