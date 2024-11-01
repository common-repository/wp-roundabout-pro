<?php

$slider = mysql_fetch_assoc(mysql_query("SELECT * FROM `".$wpdb->prefix."rbt_sliders` WHERE `id`='$_GET[edit]'"));

if($slider[type]=='Simple Roundabout 3D slider'){
include('admin/simple.php');
}

if($slider[type]=='Facade Slideshow'){
include('admin/facade.php');
}

?>