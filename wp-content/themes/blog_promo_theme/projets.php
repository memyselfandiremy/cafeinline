<?php
/*Template Name: Projets*/

get_header(); ?>


<main>
    <section id="banProjets" class="container-fluid d-flex flex-column justify-content-center">
        <div class="container">
            <div class="row d-flex flex-column justify-content-center">
                <h1><span>&lt </span><?php the_title(); ?><span> /&gt</span></h1>
            </div>
        </div>
    </section>

    <!-- PAGE -->
    <section id="projets">
       
    <div class="container">
        <div class="row">
            <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
            </div>
        </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>