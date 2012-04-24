<?php
error_reporting(7);
require_once("config.php");
$url = new mmbbs();
$klasse = htmlentities(addslashes($_GET["class"]));

//$page = $url->curl_get("http://stundenplan.mmbbs.de/plan1011/ver_kla/44/w/w".$url->get_id($klasse).".htm",0,0,true);
$page = $url->curl_get("http://stundenplan.mmbbs.de/plan1011/ver_kla/17/w/w00054.htm",0,0,true);
$page = $url->get_between($page,'<CENTER><font size="2" face="Arial Narrow">','</font></CENTER>');
$page = preg_replace("/[\n\r]/","",$page);
$n1 = $url->get_between($page,'<a name="1">','<a name="2">');
$n1 = $url->get_between($n1,'<table class="subst" >','</table>');
echo "<ul data-role=\"listview\" data-divider-theme=\"a\" data-inset=\"true\" class=\"ui-listview ui-listview-inset ui-corner-all ui-shadow\">";
echo "<li data-role=\"list-divider\" role=\"heading\" class=\"ui-li ui-li-divider ui-bar-a ui-corner-top\">Montag, ".$url->get_between($page,'<a name="1">&nbsp;</a><br><b>',' Montag</b>').date('y')."</li>";
if(!strpos($n1,"Keine Vertretungen") && !strpos($n1,"Vertretungen sind nicht freigegeben")) {
	echo $url->phase_table($n1,$klasse);
} else {
	echo '<li data-theme="a" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-a"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" data-transition="slide" class="ui-link-inherit">Keine Vertretungen</a></div>';
}
$n2 = $url->get_between($page,'<a name="2">','<a name="3">');
$n2 = $url->get_between($n2,'<table class="subst" >','</table>');
echo "<li data-role=\"list-divider\" role=\"heading\" class=\"ui-li ui-li-divider ui-bar-a\">Dienstag, ".$url->get_between($page,'<a href="#1">[ Montag ]</a> | <b>',' Dienstag</b>').date('y')."</li>";
if(!strpos($n2,"Keine Vertretungen") && !strpos($n2,"Vertretungen sind nicht freigegeben")) {
	echo $url->phase_table($n2,$klasse);
} else {
	echo '<li data-theme="a" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-a"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" data-transition="slide" class="ui-link-inherit">Keine Vertretungen</a></div>';
}
$n3 = $url->get_between($page,'<a name="3">','<a name="4">');
$n3 = $url->get_between($n3,'<table class="subst" >','</table>');
echo "<li data-role=\"list-divider\" role=\"heading\" class=\"ui-li ui-li-divider ui-bar-a\">Mittwoch, ".$url->get_between($page,'<a href="#2">[ Dienstag ]</a> | <b>',' Mittwoch</b>').date('y')."</li>";
if(!strpos($n3,"Keine Vertretungen") && !strpos($n3,"Vertretungen sind nicht freigegeben")) {
	echo $url->phase_table($n3,$klasse);
} else {
	echo '<li data-theme="a" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-a"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" data-transition="slide" class="ui-link-inherit">Keine Vertretungen</a></div>';
}
$n4 = $url->get_between($page,'<a name="4">','<a name="5">');
$n4 = $url->get_between($n4,'<table class="subst" >','</table>');
echo "<li data-role=\"list-divider\" role=\"heading\" class=\"ui-li ui-li-divider ui-bar-a\">Donnerstag, ".$url->get_between($page,'<a href="#3">[ Mittwoch ]</a> | <b>',' Donnerstag</b>').date('y')."</li>";
if(!strpos($n4,"Keine Vertretungen") && !strpos($n4,"Vertretungen sind nicht freigegeben")) {
	echo $url->phase_table($n4,$klasse);
} else {
	echo '<li data-theme="a" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-a"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" data-transition="slide" class="ui-link-inherit">Keine Vertretungen</a></div>';
}
$n5 = $url->get_between($page,'<a name="5">','</div></font><font size="2" face="Arial Narrow">');
$n5 = $url->get_between($n5,'<table class="subst" >','</table>');
echo "<li data-role=\"list-divider\" role=\"heading\" class=\"ui-li ui-li-divider ui-bar-a\">Freitag, ".$url->get_between($page,'<a href="#4">[ Donnerstag ]</a> | <b>',' Freitag</b>').date('y')."</li>";
if(!strpos($n5,"Keine Vertretungen") && !strpos($n5,"Vertretungen sind nicht freigegeben")) {
	echo $url->phase_table($n5,$klasse);
} else {
	echo '<li data-theme="a" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-corner-bottom ui-btn-up-a"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" data-transition="slide" class="ui-link-inherit">Keine Vertretungen</a></div>';
}
echo "</ul>";
$plan = $url->curl_get("http://stundenplan.mmbbs.de/plan1011/ver_kla/frames/title.htm",0,0);

echo '<center>Vertretungsplan vom '.$url->get_between($plan,'Stand: ','</span>').'</center>';
echo "=)(&/()(//(()";
echo $div;
?>
