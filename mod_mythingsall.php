<?php
/**
 * @package		MyThings
 * @author 		Axel Tüting - www.time4mambo.de
 * @license		GNU GPL
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__).DS.'helper.php';
$list = modMyThingsAll::getAllThings($params);
$kat = modMyThingsAll::getKategorien($params);
require JModuleHelper::getLayoutPath('mod_mythingsall', 'default');