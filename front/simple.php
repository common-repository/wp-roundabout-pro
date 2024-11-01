<?php

$anims = array('lazySusan', 'waterWheel', 'figure8', 'square', 'conveyorBeltLeft', 'conveyorBeltRight', 'diagonalRingLeft', 'diagonalRingRight', 'rollerCoaster', 'tearDrop', 'theJuggler', 'goodbyeCruelWorld');

if(!in_array($animation, $anims)){
$animation='lazySusan';
$asclass = '';
} else {
$asclass = 'class="hideflow"';
}

$sid = 'rbt-'.uniqid();
$out = '<ul '.$asclass.' id="'.$sid.'">';

$fwidth = intval($data[opt1]);
$fheight = intval($data[opt2]);

while($row = mysql_fetch_assoc($res)){
if($row[url]!='' && trim($row[url])!=' '){
$img = '<img src="'.get_image_thumb($row[url], 'w='.$fwidth.'&h='.$fheight).'" />';
} else {
$img = '';
}

if($row[title]!='' && trim($row[title])!=' '){
$ttlxz='<span class="rbt-title"><span>'.$row[title].'</span></span>';
} else {
$ttlxz='';
}


if($row[desc]!='' && trim($row[desc])!=' '){
$descxz='<span class="rbt-content"><span>'.$row[desc].'</span></span>';
} else {
$descxz='';
}

$out = $out.'<li style="background-color:'.$row[color].'">'.$ttlxz.''.$descxz.''.$img.'</li>';
}

$out = $out.'</ul>
<style type="text/css">
#'.$sid.' {
list-style: none;
padding: 0;
margin: 0 auto;
width: '.$data[opt5].'px;
height: '.$data[opt6].'px;
}

#'.$sid.' .roundabout-moveable-item {
height: '.$fheight.'px;
width: '.$fwidth.'px;
background-color: '.$data[opt4].';
text-align: left;
cursor: pointer;
overflow:hidden;
}
</style>
<script>
jQuery(document).ready(function() {
jQuery("#'.$sid.'").roundabout({
autoplay: '.$data[opt7].',
autoplayDuration: '.$data[opt9].'000,
minOpacity: '.$data[opt10].',
maxOpacity: '.$data[opt11].',
reflect: '.$data[opt12].',
enableDrag: '.$data[opt13].',
dragAxis:"'.$data[opt3].'",
shape: "'.$animation.'",
autoplayPauseOnHover: '.$data[opt8].'
});
});
</script>
';

?>