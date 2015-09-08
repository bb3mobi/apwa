<?php
/**
*
* PM Welcome extension for the phpBB Forum Software package.
* French translation by zouloufr & Galixte (http://www.galixte.com)
*
* @copyright BB3.MOBi (c) 2015 Anvar <http://apwa.ru>
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_PMWELCOME'					=> 'Paramètres du message privé de bienvenue',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Sur cette page il est possible de configurer l’expéditeur, le sujet et le texte du message privé de bienvenue qui sera envoyé aux nouveaux utilisateurs enregistrés.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Paramètres',
	'ACP_PMWELCOME_USER'			=> 'Expéditeur',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'Saisir l’ID d’un utilisateur du forum, à partir duquel le message privé de bienvenue sera envoyé.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Sujet',
	'ACP_PMWELCOME_TEXT'			=> 'Texte',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Permet de saisir le texte du message privé de bienvenue.<br />Les BBCodes et les smileys sont autorisés.<br />La clé : « {USERNAME} » permet de remplacer le nom d’utilisateur du destinataire du message privé de bienvenue.',
));
