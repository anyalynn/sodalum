<?php get_header(); 
   $sidebar = get_post_meta($post->ID, "sidebar"); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-12 uw-content" role='main'>

      
      <?php get_template_part( 'breadcrumbs' ); ?>


      <div id='main_content' class="uw-body-copy" tabindex="-1">
<h1><?php the_title(); ?></h1>
           
            <h3>Not what you were expecting?</h3>
              
                <ul>
                   <li><a href="https://sodalum.uw.edu/">Class Connections</a></li>
                   <li><a href="https://sodalum.uw.edu/the-history-project/">History Project</a></li>
                   <li><a href="https://sodalum.uw.edu/class-connections/alpha-index/">Alphabetical Index</a></li>
               
  </div>

    </div>
   


  </div>

</div>

<?php get_footer(); ?>

