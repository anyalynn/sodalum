<?php
/**
 * Template Name: Anya's Title
 */
?>

<?php get_header(); 
   $sidebar = get_post_meta($post->ID, "sidebar"); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-<?php echo ((!isset($sidebar[0]) || $sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>
    
      <a href=""><h2 class="uw-site-title">Class Connections</h2></a>
       <div class="title-container">
     <span class="udub-slant"><span></span></span>
    <div class="uw-site-tagline"><?php  bloginfo(description);?></div>
     </div>
      <nav class="uw-breadcrumbs" aria-label="breadcrumbs"><ul><li><a href="//dental.washington.edu" title="UW School of Dentistry">Home</a></li><li><a href="http://sodalumdev.wpengine.com/" title="Class Connections">Class Connections</a></li><li class="current"><span>1960s</span></li></ul></nav>
       <div id='main_content' class="uw-body-copy" tabindex="-1">

      

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', 'page' );




            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

          endwhile;
        ?>



      </div>

    </div>

  
          <div id="sidebar"><?php 
      if(!isset($sidebar[0]) || $sidebar[0]!="on"){
        get_sidebar();
      }
    ?></div>


  </div>

</div>
 <div style="height:50px">&nbsp;</div>
      <div class="row">
			
<?php get_template_part( 'quicklinks' ); ?>
       </div>
<?php get_footer(); ?>
