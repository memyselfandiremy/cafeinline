<?php

/*Template Name: Accueil*/

get_header(); ?>


<main>


    <section id="banner_accueil" class="container_fluid">
        <div id=title_header>
            <h1 class="red_letter">BLOG PROMO</h1>
            <h2><span class="red_letter">&lt</span> CAFÉ INLINE<span class="red_letter"> /&gt</span></h2>
        </div>
        <div id='button' class="row">
            <a class="col-xs-4 col-md-2" href="<?php echo get_permalink(244) ;?>">ÉQUIPE</a>
            
            <a class="col-xs-4 col-md-2" href="<?php echo get_permalink(211) ;?>">PROJETS</a>
        </div>
    </section>

    <section id="about" class="container">
        <?php while(have_posts()) : the_post(); ?>
        <h2> A propos</h2>
        <hr>
        <div class="row">
            <div id="img_accueil_post_content" class="col-xs-12 col-md-5 col-lg-6">
                <img src="/cafeinline/wp-content/uploads/2019/02/coffee_cup.png" class="img-fluid">
            </div>
            <div id="accueil_post_content" class="col-xs-12 col-md-6 col-lg-6">
                <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section id="banner_separator" class="container-fluid">
        <p><span class="red_letter">&lt </span>toujours en pleine action<span class="red_letter"> /&gt</span></p>
    </section>

    <section id="last_post_accueil">
        <div class="container">
            <h2> derniers articles</h2>
            <hr>
            <ul>
                <?php
                $args = array(
                    'typ' => 'post',
                    'posts_per_page'=> 3,
                    'category__not_in'=>array( 22 )
                );
                
                $recentPosts = new WP_Query($args);
                ?>
                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>


                <li class="row">
                    <div class="img_articl img-fluid col-md-5">
                        <?php
                        if( has_post_thumbnail() ) {
                        the_post_thumbnail();
                        }  
                        ?>
                    </div>
                    <div class="extract_articl img col-md-6">
                        <a href="<?php the_permalink() ?>">
                            <h3></h3>
                            <?php the_title(); ?>
                        </a>
                        <?php the_excerpt(); ?>
                        <p>Rédigé par : <a href="<?php the_permalink(244) ?>">
                                <?php the_author(); ?></a></p>
                    </div>
                </li>

                <?php endwhile; ?>
            </ul>
        </div>
    </section>


</main>


<?php get_footer(); ?>
