<?php

/**
*
* @package PM Welcome [Dutch]
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* Dutch translation by Dutch Translators (https://github.com/dutch-translators)
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
	'ACP_PMWELCOME'					=> 'Welkoms Bericht',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Je kan een persoonlijkbericht samenstellen die wordt verzonden naar een nieuwe gebruiker als hij/zij voor het eerst inlogd na zijn/haar registratie.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Instellingen Welkoms Bericht.',
	'ACP_PMWELCOME_USER'			=> 'Afzender',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'ID gebruiker, namens wie het welkoms bericht wordt verstuurd.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Onderwerp',
	'ACP_PMWELCOME_TEXT'			=> 'Tekst voor het welkoms bericht',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Je kan BBcodes en smilies gebruiken, maar ook de variabel {USERNAME} hiermee wordt de gebruikersnaam van de ontvanger gebruikt.',
));
