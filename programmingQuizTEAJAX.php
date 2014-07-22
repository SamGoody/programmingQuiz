<?php

/* ================
used for AJAX calls to add/remove menu items
===================*/

//escape the data
foreach($_POST as $key => $var){
	$info[$key] = pg_escape_string($var);
}

switch ($_POST['action']) {
    case 'remove_navigation':
        echo Navigation::remove($info['remove_id']);
        break;
    case 'add_navigation':
        echo Navigation::add($info['name'],$info['parent_id'],$info['url']);
        break;
}

?>
