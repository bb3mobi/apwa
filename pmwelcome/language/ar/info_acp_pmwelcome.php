<?php

/**
*
* @package PM Welcome [Arabic]
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ACP_PMWELCOME'					=> 'رسالة الترحيب',
	'ACP_PMWELCOME_EXPLAIN'			=> 'من هنا تستطيع تحديد نص رسالة الترحيب التي سيتم إرسالها إلى العضو عند تسجيل أول دخول له للمنتدى.',
	'ACP_PMWELCOME_SETTINGS'		=> 'الإعدادات.',
	'ACP_PMWELCOME_USER'			=> 'المرسل ',
	'ACP_PMWELCOME_USER_EXPLAIN'	=> 'اكتب رقم العضوية للعضو الذي تريد أن يكون مُرسل رسالة الترحيب.',
	'ACP_PMWELCOME_SUBJECT'			=> 'عنوان الموضوع ',
	'ACP_PMWELCOME_TEXT'			=> 'نص رسالة الترحيب',
	'ACP_PMWELCOME_TEXT_EXPLAIN'	=> 'تستطيع استخدام أكواد البي بي bbcode والإبتسامات , وكذلك تستطيع استخدام الرمز {USERNAME} بدلاً من كتابة إسم المستخدم الذي سيستقبل رسالة الترحيب.',
));
