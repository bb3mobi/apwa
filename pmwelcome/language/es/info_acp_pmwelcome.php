<?php

/**
*
* @package PM Welcome [Spanish]
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* Translated to the Spanish for zone_sjm https://www.phpbb.com/community/memberlist.php?mode=viewprofile&u=1497666
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
	'ACP_PMWELCOME'					=> 'Mensaje privado de bienvenida',
	'ACP_PMWELCOME_EXPLAIN'			=> 'Usted puede especificar el texto del mensaje personal que será enviado al usuario en el momento que se inscriba.',
	'ACP_PMWELCOME_SETTINGS'		=> 'Configuraciones del mensaje de bienvenida.',
	'ACP_PMWELCOME_USER'			=> 'Remitente',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'El id del usuario del foro quien enviara el mensaje privado.',
	'ACP_PMWELCOME_SUBJECT'			=> 'Asunto',
	'ACP_PMWELCOME_TEXT'			=> 'Texto del mensaje de bienvenida',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'Usted puede usar bbcode y emoticonos, y la marca clave { USERNAME } para reemplazar el nombre del usuario que recibe un mensaje privado.',
));
