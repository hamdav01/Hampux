<?php
/**
 * Bootstrapping functions, essential and needed for Hampux to work together with some common helpers. 
 *
 */

/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Hampux: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Dump content of variable
 *
 * @param mixed $a as the variable to dump.
 */
function dump($a) {
  echo '<pre>' . print_r($a, 1) . '</pre>';
}

/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
	
  $path = HAMPUX_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
spl_autoload_register('myAutoloader');
