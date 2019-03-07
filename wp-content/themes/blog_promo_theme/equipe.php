<?php

/*Template Name: Equipe*/

get_header(); ?>


<main>

    <section id="banner_equipe" class="container_fluid">
        <h1><span class="red_letter">&lt</span> CAFÉ INLINE <img src="/cafeinline/wp-content/uploads/2019/02/bean_red_button.png" width="40px"> PROMO<span class="red_letter"> /&gt</span></h1>
    </section>

    <section id="post_equipe" class="container-fluid">
        <div class="container">

            <h2>Tous (presque) amateurs de café</h2>
            <hr>

            <ul class="row">
                <?php
                    $args = array(
                        'typ' => 'post',
                        'posts_per_page'=> 11,
                        'category__in'=>array( 22 ),
                        'order'=> 'ASC', 
                        'orderby' => 'name'
                    );
                    $recentPosts = new WP_Query($args);
                    ?>

                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <li class="col-xs-12 col-md-4">
                    <div class="portrait img-fluid ">
                        <?php
                            if( has_post_thumbnail() ) {
                                the_post_thumbnail();
                                }  
                            ?>
                    </div>
                    <div class="portrait_articl">
                        <blockquote><?php the_content(); ?></blockquote>
                        <cite><?php the_title(); ?></cite><br>

                    </div>
                </li>
                <?php endwhile; ?>
            </ul>

        </div>
    </section>


</main>


<?php get_footer(); ?>
