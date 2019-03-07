<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'blog_promo');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fVJ03jeaE8p42fsi:q=$G(Aj[{s!*z8Nox?1/nAAY[SYsjQ>+*GQDWZ~X1gaRlDV');
define('SECURE_AUTH_KEY',  '!bF^eN/TK,[4Hyo6e-YPe/l2v.dPcNSs3s3s(pUP.WXZF?xn8J9p[9JR{(t+3?KC');
define('LOGGED_IN_KEY',    'Z`F5v$-~5[>=R&QRU{w;sOAz]I*jN;XWS+T?.,Q1flwqxW*)6n~/L&QVmqsUgkWc');
define('NONCE_KEY',        '8/.OK6(*M*<7>7TW:Vqyu+;K<2b0x&^^UqD,5+<M}5(uBQ>4[ug*vLc8,e/v]?Jb');
define('AUTH_SALT',        '*GNv[HBgYp],QbP`tdS+H250FuwE=-7Z$k<+>GuF*%48QCIvUrH%<F8X7Ex38Cj>');
define('SECURE_AUTH_SALT', 'j^vcjQX~)+-pa<z8Mb9WKjx.[C<NqkF2I)))o64U3Q@_<de.WFjfQjJyaUbGBsln');
define('LOGGED_IN_SALT',   'gd6Irs>Zo.bgPn1 T]%Q,MQbsmhmbK69naC:=PB3&@bk|Fi){XMOtc+pptomGrx;');
define('NONCE_SALT',       'a:[G~puPK:A^D7a FURBUL={Qs45vL}k,+wLHoxU}JK bImJ$X9;1rbd.iqM+i3L');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');