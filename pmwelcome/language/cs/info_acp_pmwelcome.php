<?php
/**
*
* @package PM Welcome [Czech]
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru, překlad R3gi
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'ACP_PMWELCOME'					=> 'Uvítací zpráva',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Umožňuje nastavit text soukromé zprávy, která bude zaslána novému uživateli po registraci.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Nastavení uvítací zprávy.',
	'ACP_PMWELCOME_USER'			=> 'Odesílatel',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'ID uživatele fóra, jehož jménem bude soukromá zpráva zaslána.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Předmět',
	'ACP_PMWELCOME_TEXT'			=> 'Text uvítací zprávy',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Můžete používat BBCode, smajlíky a proměnnou {USERNAME}, která bude nahrazena jménem příjemce soukromé zprávy.',
));
