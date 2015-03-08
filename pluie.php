<?php

// Fichier JSON basé sur le code INSEE
$fichier_json = file_get_contents('http://mobile.meteofrance.com/ws/getPluie/7511100.json');
$tableau = json_decode($fichier_json, true);

// Style du widget
print "<style type=\"text/css\">
 body {color:white;margin:0;padding:0;height:200px;width:184px;background-color:black;}
 .pluie0 {background-color:#A3A3A3}
 .pluie1 {background-color:#C8ECF3}
 .pluie2 {background-color:#7FD2E4}
 .pluie3 {background-color:#268DA9}
 .pluie4 {background-color:#1A4555}
 .pluie {color:black; width:70px;text-align:center;display: inline-block;}
 </style>
<script type=\"text/JavaScript\">
// Changer cette valeur pour changer le temps de mise à jour
	setTimeout(\"location.reload(true);\", 300000);
</script>";
print '<div id="tout">';

// Titre du widget
print "Paris - 11&egrave;me&nbsp;Arr<br />\n";
date_default_timezone_set('Europe/Paris');

foreach($tableau["result"]["intervalles"] as $tab){
	print date('H:i', substr($tab["date"], 0, -3))." : <span class=\"pluie pluie".$tab["value"]."\">".$tab["value"]."</span><br />\n";
}

print '</div>';
?>