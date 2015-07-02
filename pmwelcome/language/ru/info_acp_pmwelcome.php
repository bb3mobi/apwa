<?php

/**
*
* @package PM Welcome [Russian]
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
	'ACP_PMWELCOME'					=> 'Приветственное сообщение',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Вы можете указать текст личного сообщения который будет отправлен пользователю после регистрации.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Настройки приветственного сообщения.',
	'ACP_PMWELCOME_USER'			=> 'Отправитель',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'id пользователя форума, от имени которого будет отправлено личное сообщение.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Заголовок сообщения',
	'ACP_PMWELCOME_TEXT'			=> 'Текст приветственного сообщения',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Вы можете использовать bbcode и смайлы, а также лексему {USERNAME} для замены на имя пользователя которому будет отправлено личное сообщение.',
));
