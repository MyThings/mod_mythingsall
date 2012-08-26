<?php
/**
 * @package		MyThings
 * @author 		Axel Tüting - www.time4mambo.de
 * @license		GNU GPL
 */

defined('_JEXEC') or die;

$auswahl = $params->get('art');

if($auswahl == "top" || $auswahl == "neu") {
	foreach($list as $zeile) {
		echo "{$zeile['title']} - {$zeile['catname']} ({$zeile['hits']} Aufrufe)<br />";
	}
}
elseif ($auswahl == "kategorien") {
	foreach($kat as $zeile) {
		echo $zeile['title']."<br />";
	}
}