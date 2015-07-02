<?php

/**
*
* @package PM Welcome [English]
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
	'ACP_PMWELCOME'					=> 'Welcome message',
	'ACP_PMWELCOME_EXPLAIN'			=> 'You can specify the text of the personal message that will be sent to the user upon registration.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Settings welcome message.',
	'ACP_PMWELCOME_USER'			=> 'Sender',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'id User Forum, on behalf of which will be sent to a private message.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Post subject',
	'ACP_PMWELCOME_TEXT'			=> 'Text of the greeting message',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'You can use bbcode and smilies, and the token {USERNAME} to replace the name of the user who receive a private message.',
));
