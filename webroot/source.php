<?php 
/**
 * This is a Hampux pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hampux variable with its defaults.
include(__DIR__.'/config.php'); 


// Add style for csource
$hampux['stylesheets'][] = 'css/source.css';


// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..', 'add_ignore' => array('.htaccess')));


// Do it and store it all in variables in the Hampux container.
$hampux['title'] = "Visa källkod";

$hampux['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


// Finally, leave it all to the rendering phase of Anax.
include(HAMPUX_THEME_PATH);
