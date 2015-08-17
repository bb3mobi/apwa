<?php

/**
*
* @package PM Welcome [French]
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
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
	'ACP_PMWELCOME'					=> 'Message de bienvenue',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Vous pouvez préciser le texte du message de bienvenue qui sera envoyé aux nouveaux inscrits.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Réglages du message de bienvenue.',
	'ACP_PMWELCOME_USER'			=> 'Expéditeur',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'id de l\'utilisateur du forum, à partir duquel le message privé de bienvenue sera envoyé.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Sujet du message',
	'ACP_PMWELCOME_TEXT'			=> 'Texte du message de bienvenue',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Vous pouvez utiliser des bbcode et des smileys, et le jeton {USERNAME} pour remplacer le nom de l\'utilisateur destinataire du message privé de bienvenue.',
));
