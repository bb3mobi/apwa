<?php
/**
*
* Ad Units [Russian]
*
* @package info_acp_adunits.php
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_ADUNITS'			=> 'Рекламные блоки',
	'ACP_ADUNITS_EXPLAIN'	=> 'Здесь Вы можете просматривать и управлять рекламными блоками форума.',
	'ACP_ADUNITS_TITLE'		=> 'Управление рекламными блоками',

	'ACP_ADUNITS_POSITION'	=> array(
		0	=> 'Отключён',
		1	=> 'Только на главной',
		2	=> 'На всех страницах',
		3	=> 'На форуме кроме главной',
	),

	'ADUNITS_HEADER'					=> 'Верх страниц',
	'ACP_POST_TEXT_HEADERBAR'			=> 'Блок в шапке',
	'ACP_POST_TEXT_HEADERBAR_EXPLAIN'	=> 'Блок расположенный в шапке форума, между логотипом и формой поиска.<br />Для форматирования страницы можно использовать html',
	'ACP_HEADER_POSITION'				=> 'Позиция под шапкой',
	'ACP_POST_TEXT_HEADER'				=> 'Блок под шапкой',
	'ACP_POST_TEXT_HEADER_EXPLAIN'		=> 'Блок расположенный над основным контентом форума, под шапкой и навигационным баром.<br />Для форматирования страницы можно использовать html и штатные классы к блоков.<hr /><strong>Пример:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;Заголовок&lt;/h3&gt;Баннер или текст&lt;/div&gt;',

	'ADUNITS_FOOTER'					=> 'Низ страниц',
	'ACP_POST_TEXT_COPYRIGHT'			=> 'Блок над копирайтом',
	'ACP_POST_TEXT_COPYRIGHT_EXPLAIN'	=> 'Блок расположенный над копирайтами форума.<br />Для форматирования страницы можно использовать html',
	'ACP_FOOTER_POSITION'				=> 'Позиция блока над футером',
	'ACP_POST_TEXT_FOOTER'				=> 'Блок над футером',
	'ACP_POST_TEXT_FOOTER_EXPLAIN'		=> 'Блок расположенный под основным контентом форума, над навигацией.<br />Для форматирования страницы можно использовать html и штатные классы к блоков.<hr /><strong>Пример:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;Заголовок&lt;/h3&gt;Баннер или текст&lt;/div&gt;',

	'ACP_VIEWTOPIC_POSITION_SELECT'	=> array(
		0	=> 'Отключён',
		1	=> 'Под первым сообщением',
		2	=> 'Под вторым сообщением',
		3	=> 'Под всеми сообщениями',
	),

	'ADUNITS_VIEWTOPIC'					=> 'В темах форума',
	'ACP_VIEWTOPIC_IGNORE'				=> 'Исключённые форумы',
	'ACP_VIEWTOPIC_IGNORE_EXPLAIN'		=> 'Форумы в которых исключён показ рекламных блоков',
	'ACP_VIEWTOPIC_POSITION'			=> 'Позиция отображения блока',
	'ACP_POST_TEXT_VIEWTOPIC'			=> 'Блок между топиков',
	'ACP_POST_TEXT_VIEWTOPIC_EXPLAIN'	=> 'Блок расположенный под сообщениями форума.<br />Для форматирования страницы можно использовать html и штатные классы к блоков.<hr /><strong>Пример:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;Заголовок&lt;/h3&gt;Баннер или текст&lt;/div&gt;',

	'ACP_SIDEBAR_POSITION_SELECT'	=> array(
		0	=> 'Отключён',
		1	=> 'На главной слева',
		2	=> 'На главной справа',
		3	=> 'На всех слева',
		4	=> 'На всех справа',
		5	=> 'Кроме главной слева',
		6	=> 'Кроме главной справа',
	),

	'ADUNITS_SIDEBAR'					=> 'Сайдбар',
	'ACP_SIDEBAR_POSITION'				=> 'Расположение сайдбаров',
	'ACP_SIDEBAR_POSITION_EXPLAIN'		=> 'Отображение на всех страницах означает что только на странице viewtopic и viewforum',
	'ACP_POST_TEXT_SIDEBAR_TOP'			=> 'Первый блок сверху',
	'ACP_POST_TEXT_SIDEBAR_TOP_EXPLAIN'	=> 'Ширина контента не более 200px.<br />Для форматирования страницы можно использовать html и штатные классы к блоков.<hr /><strong>Примеры:</strong><br /><em>Обычный:</em><br />&lt;div class="panel"&gt;Баннер или текст&lt;/div&gt;<br /><em>С обводкой:</em><br />&lt;div class="forabg"&gt;&lt;div class="panel"&gt;Баннер или текст&lt;/div&gt;&lt;/div&gt;<br /><em>Ограниченный(скролл при превышении высоты):</em><br />&lt;div class="cp-mini"&gt;Баннер или текст&lt;/div&gt;',
	'ACP_POST_TEXT_SIDEBAR'				=> 'Второй блок снизу',
	'ACP_POST_TEXT_SIDEBAR_EXPLAIN'		=> 'Ширина контента не более 200px.<br />Для форматирования страницы можно использовать html',
));
