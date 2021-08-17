<?php
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
?>
 body {
    <background-color></background-color>: #000000; 
}

<?php
  header('Content-type: text/css');
  header('Cache-control: must-revalidate');
?>
