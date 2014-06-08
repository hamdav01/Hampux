<?php
/**
 * Config-file for Hampux. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

/**
 * Define Hampux paths.
 *
 */
define('HAMPUX_INSTALL_PATH', __DIR__ . '/../');
define('HAMPUX_THEME_PATH', HAMPUX_INSTALL_PATH . '/theme/render.php');
define('IMG_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);
define('CACHE_PATH', __DIR__ . '/cache/');
define('GALLERY_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'img');
define('GALLERY_BASEURL', '');

/**
 * Include bootstrapping functions.
 *
 */
include(HAMPUX_INSTALL_PATH . '/src/bootstrap.php');

/**
 * Start the session.
 *
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();


/**
 * Create the Hampux variable.
 *
 */
$hampux = array();


/**
 * Site wide settings.
 *
 */
$hampux['lang']         = 'sv';
$hampux['title_append'] = ' | Games4U';

$hampux['header'] = <<<EOD

<span class='siteslogan'>Sveriges största site för speluthyrning på nätet 4U</span>
<img class='sitetitle' src='img/game4utext2.png' alt='games4u text'/>

<a href="index.php"><img class='sitelogo clear' src='img/games4ulogo.png' alt='games4u Logo'/></a>
<div class='searchBar right'>
<form action='games.php' method='GET'>
	<input type='search' name='title' value='' placeholder='sök på titel'/>
	<input type='submit' name='submit' value='Sök'/>
</form>
</div>


EOD;

$hampux['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Hampus Davidsson (hampus.davidsson@gmail.com) | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

$hampux['byline'] = <<<EOD
<footer class="byline">
 <figure class="right top"><img src="img/me2.png" alt="bild på mig" height="50"></figure>
 <p> Hampus Davidsson studerar php/html och css på Blekinge Tekiska Högskola, som helst programmerar i java eller C#</p>
</footer>
EOD;


/**
 * Settings for the database.
 *
 */
 /*
$hampux['database']['dsn']            = 'mysql:host=blu-ray.student.bth.se;dbname=hada14;';
$hampux['database']['username']       = 'hada14';
$hampux['database']['password']       = '9A;),L5x';
$hampux['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

*/

$hampux['database']['dsn']            = 'mysql:host=localhost;dbname=hada14;';
$hampux['database']['username']       = 'root';
$hampux['database']['password']       = '';
$hampux['database']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");

/**
 * The navbar
 *
 */
//$hampux['navbar'] = null; // To skip the navbar
$hampux['navbar'] = array(
  'class' => 'nb-plain',
  'items' => array(
    'hem'         => array('text'=>'Hem',         'url'=>'index.php',          'title' => 'Min presentation om mig själv'),
    'Spel' => array('text'=>'Spel', 'url'=>'games.php', 'title' => 'spelsidan'),
    'Nyheter'     => array('text'=>'Nyheter',     'url'=>'blog.php',      'title' => 'nyheter för sidan'),
    'tärningsspelet'     => array('text'=>'Tävling',     'url'=>'dice.php',      'title' => 'Tärningsspelet 100'),
    'Om'     => array('text'=>'Om',     'url'=>'about.php',      'title' => 'sidan om games4u')
    
  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);
if(CUser::IsAuthenticated()) {
	$hampux['navbar']['items']['Administrera'] = array('text'=>'Administrera', 'url'=>'view.php', 'title' => 'Administrera');
	$hampux['navbar']['items']['Logga ut'] = array('text'=>'Logga ut', 'url'=>'logout.php', 'title' => 'logga ut från sidan');
	
}
else {
	$hampux['navbar']['items']['Logga in'] = array('text'=>'Logga in', 'url'=>'login.php', 'title' => 'logga in sidan');
}


/**
 * Theme related settings.
 *
 */
//$hampux['stylesheet'] = 'css/style.css';
$hampux['stylesheets'] = array('css/style.css');
$hampux['favicon']    = 'games4uico.ico';



/**
 * Settings for JavaScript.
 *
 */
$hampux['modernizr']  = 'js/modernizr.js';
$hampux['jquery']     = null; // To disable jQuery
$hampux['jquery_src'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$hampux['javascript_include'] = array();
//$hampux['javascript_include'] = array('js/main.js'); // To add extra javascript files



/**
 * Google analytics.
 *
 */
$hampux['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
