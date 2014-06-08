<?php 
/**
 * This is a hampux pagecontroller.
 *
 */
// Include the essential config-file which also creates the $hampux variable with its defaults.
include(__DIR__.'/config.php'); 



// Do it and store it all in variables in the hampux container.
$hampux['title'] = "404";
$hampux['header'] = "";
$hampux['main'] = "This is a Anax 404. Document is not here.";
$hampux['footer'] = "";

// Send the 404 header 
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of hampux.
include(HAMPUX_THEME_PATH);
