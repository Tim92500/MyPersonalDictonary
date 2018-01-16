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
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ';c?Inrb6j>DSn_|r(U,Ou,+GKECc1}5 .60tyvC5prb@-G:!fRtiz?&!/2NiCIyW');
define('SECURE_AUTH_KEY',  '`o(dkM_tdLw^4q~w^%a)?+ k3_fANso%9H,?t9r0fiaD=$z!rsdyfM]vPO2S5 A`');
define('LOGGED_IN_KEY',    'o9{XzMROGN}Xo{P1hb7jwt/6{xYKap>_|TeWe=mF@$B[p@07v6]<S&#FX(;AODsf');
define('NONCE_KEY',        'n5uO?=(]bIJ,h*w5|K:u}vik;zOO_;RnE/?wO?pRB}X!7X+umd#=$SS8t(sD|%50');
define('AUTH_SALT',        '<Z$0B(VF0k2N-w[T2P${^:lFks+WHd>C|DuQ_Xe`uNP8}1P<){ pN{<5MJb>hi($');
define('SECURE_AUTH_SALT', '[%61rW$0vVf{_(Mhnw/0Q}NwNQL,,K3]@x~Q8PR5SNTs!R[=:A!1Ci[,AcZj`CIz');
define('LOGGED_IN_SALT',   'W!Hr(izC7drbv]Nl*{1sz~D@s<>Ur`N@D06rbh3Ya+k~H-XeX4p2tJI@M58S=IMM');
define('NONCE_SALT',       '(>?p7z[Ti6$2BlFbGM^W+~e *lpbW7am$-#o9~Cn8,6b-0:e!U#&Z9#E~]UP8,UN');
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