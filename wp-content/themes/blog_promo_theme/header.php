<!DOCTYPE>
<html>

<head>
    <title><?php wp_title('&laquo;', true, 'right'); ?>
        <?php bloginfo('name'); ?>
    </title>

<meta name="description" content="Site officiel de la promotion 2018-2019 Café Inline à Besançon" />


<!-- Twitter Card meta -->
<meta name="twitter:card" content="/cafeinline/wp-content/uploads/2019/02/logo-1.png">
<meta name="twitter:site" content="@caféinline">
<meta name="twitter:title" content="Café Inline Promo">
<meta name="twitter:description" content="Site officiel de la promotion 2018-2019 Café Inline à Besançon">
<meta name="twitter:url" content="https://twitter.com/accesscodeofp" />
<meta name="twitter:image:src" content="/cafeinline/wp-content/uploads/2019/02/screenshot.jpg">

<!-- Open Graph meta -->
<meta property="og:title" content="Café Inline Promo" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www..com/" />
<meta property="og:image" content="/cafeinline/wp-content/uploads/2019/02/screenshot.jpg" />
<meta property="og:description" content="Site officiel de la promotion 2018-2019 Café Inline à Besanon" />
<meta property="og:site_name" content="Café Inline Promo" />
<meta property="author" content="Christian Anis, Ghislain Billard, Marie-Ange Remy" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>

<body>

    <header class="container-fluid">
        <div class="container">
            <div class="row">

                <nav id="navbar" class="navbar navbar-expand-lg navbar-light justify-content-between">

                    <div class="col-6 logo_nav">
                        <a class="navbar-brand" href="<?php echo get_permalink(18) ;?>"><img src="/cafeinline/wp-content/uploads/2019/02/logo-1.png"></a>
                    </div>

                    <div class="col-6 button_nav">
                        <div class="collapse navbar-collapse" id="menu">
                            <?php wp_nav_menu(); ?>
                        </div>
                        <button class="navbar-toggler dropdown" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>

            </div>
        </div>
    </header>