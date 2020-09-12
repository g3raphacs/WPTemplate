<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpressblog' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[N0NL%C*_+MWpKd7jZ]}t[8A#)BW4H*{bvKp*3H8K_Y(5$mc&@h7f85*g+QtOLtg' );
define( 'SECURE_AUTH_KEY',  '/,!x3#~a^YW%Z7~@MMNuS;*K}-|sd-&4$QFojytr^>+Ja{NJ%2 A,ebe5!1_2>jT' );
define( 'LOGGED_IN_KEY',    'chLX]|[BD2-GaSaje{-v|Q~3,CI91`o+Xg} 6Q$ns>y0B]8b34l=dQn`xyG }_q6' );
define( 'NONCE_KEY',        '|9Qbe;z350L$tytqs5}8}xFw#SO~H;+p_)6WGn4g>&a[8|C.OMNLOXv.vKFR[i[ ' );
define( 'AUTH_SALT',        '(g$JgZSq=Xo.km^IRE6aUaeC`&!xU=wrO*?^AH=]yeAVbW[w5Sy:jlbGV]5X&l-E' );
define( 'SECURE_AUTH_SALT', 'cH48D8rP^=I&X=3jf 4IDtl l~%:2p?B.ObPk4YTc|@]{/-.AU{.3~[z/X]Zr@$0' );
define( 'LOGGED_IN_SALT',   '(N1)5M#pK [Jxu.^E1ZFt5u9~|UU4/inpLS_Bf%|jf>oW3~KoG@9z^AhfhFu0/4$' );
define( 'NONCE_SALT',       'xxl2~(0|P+%c?MD=-~s<f^7b6Eg?6R0%enYoI/={s 4zzIqvgOre^Dx1u[nwywdq' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
