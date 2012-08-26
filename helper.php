<?php
/**
 * @package		MyThings
 * @author 		Axel Tüting - www.time4mambo.de
 * @license		GNU GPL
 */

defined('_JEXEC') or die;

class modMyThingsAll
{
	public function getAllThings($params)
	{
		// Parameter einlesen
		$modart = $params->get('art');
		$listzahl = (int) $params->get('anzahl');


		// Verbindung zur Datenbank herstellen
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		// Da zweimal eine Spalte mit 'title' vorhanden ist, wird ein Alias vergeben
		$query->select('my.title, cat.title catname, my.hits');

		// Es ändert sich lediglich die ORDER BY
		if($modart=="top") {
			$query->order('my.hits DESC');
		}
		elseif($modart=="neu") {
			$query->order('my.hits ASC');
		}

		// Um den Kategorienamen zu ermitteln wird eine JOIN-Abfrage ausgeführt
		$query->from('#__mythings my, #__categories cat');
		$query->where('cat.id=my.category_id');

		// Das LIMIT wird in setQuery übergeben
		$db->setQuery($query,0, $listzahl);

		// Die einzelnen Zeilen werden augelesen und übergeben
		$listthings = $db->loadAssocList();

		return $listthings;
	}


	public function getKategorien($params) {
		//Parameter einlesen
		$modart = $params->get('art');

		// Verbindung zur Datenbank herstellen
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		// Abfrage der Kategorien-Tabelle
		$query->select('title');
		$query->from('#__categories');
		$query->where("extension='com_mythings'");

		$db->setQuery($query);
		$kat = $db->loadAssocList();

		return $kat;
	}
}