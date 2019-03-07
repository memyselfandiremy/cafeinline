<?php
/* Template Name: Blog */ 
get_header(); ?>

    <main>
        <section class="container-fluid" id="blog">

            <div class="row" id="banner-img">
                <h1><span>< </span>pause blog<span> /></span></h2>
            </div>
            <div class="container">
                <h2 class="titresection">articles</h2>
                <hr>
            </div>

            <div class="container">
                <div class="row" id="articles">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="article">
                            <?php
$args = array( 'numberposts' => 4, 'order'=> 'ASC', 'orderby' => 'title', 
'category__not_in'=>array( 22 ) );
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?>

                                <h3 class="titre">
                                    <a href="<?php echo get_permalink() ;?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="date">
                                    <?php echo get_the_date(); ?>
                                </p>
                                <div class="image img-fluid" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>)"></div>
                                <div class="extrait">
                                    <?php the_excerpt(); ?>
                                </div>
                                <p class="category">
                                    <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->cat_name;?>
                                </p>
                                <p class="auteur">Rédigé par
                                    <a href="<?php the_permalink(244)?>">
                                        <?php the_author(); ?>
                                    </a> apprenant à l'ACS Besançon</p>
                                <p class="plus"><a href="<?php echo get_permalink() ;?>">lire la suite...</a></p>
                                <hr>
                                <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="article">
                            <?php
$args = array( 'numberposts' => 8, 'order'=> 'ASC', 'orderby' => 'title', 'offset' => 4, 
'category__not_in'=>array( 22 ) );
$postslist = get_posts( $args );
foreach ($postslist as $post) :  setup_postdata($post); ?>

                                <h3 class="titre">
                                    <a href="<?php echo get_permalink() ;?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <p class="date">
                                    <?php echo get_the_date(); ?> </p>
                                <div class="image img-fluid" style="background-image:url(<?php echo get_the_post_thumbnail_url()?>)"></div>
                                <div class="extrait">
                                    <?php the_excerpt(); ?> </div>
                                <p class="category">
                                    <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->cat_name;?>
                                </p>
                                <p class="auteur">Rédigé par
                                    <a href="<?php the_permalink(244)?>">
                                        <?php the_author(); ?>
                                    </a> apprenant à l'ACS Besançon</p>
                                <p class="plus"><a href="<?php echo get_permalink() ;?>">lire la suite...</a></p>
                                <hr>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>