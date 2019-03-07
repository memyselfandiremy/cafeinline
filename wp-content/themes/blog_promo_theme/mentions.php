<?php

/*Template Name: Mentions*/

get_header(); ?>


<main>

    <section id="banner_mentions" class="container_fluid">
        <h1> <?php the_title(); ?></h1>
    </section>
    
    <section class="container post_mentions offset-md-2 col-md-8">
         <?php while(have_posts()) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile; ?>
    </section>


</main>


<?php get_footer(); ?>