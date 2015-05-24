<?php
/**
*
* Ad Units [Arabic]
*
* @package info_acp_adunits.php
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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
	'ACP_ADUNITS'			=> 'وحدات الإعلانات',
	'ACP_ADUNITS_EXPLAIN'	=> 'تستطيع هنا مُشاهدة وإدارة وحدات الإعلان.',
	'ACP_ADUNITS_TITLE'		=> 'إدارة وحدات الإعلانات',

	'ACP_ADUNITS_POSITION'	=> array(
		0	=> 'تعطيل',
		1	=> 'في الواجهة الرئيسية',
		2	=> 'جميع الصفحات',
		3	=> 'بدون الواجهة الرئيسية',
	),

	'ADUNITS_HEADER'					=> 'ترويسة الصفحات ',
	'ACP_POST_TEXT_HEADERBAR'			=> 'نص الإعلان داخل الترويسة ',
	'ACP_POST_TEXT_HEADERBAR_EXPLAIN'	=> 'سيظهر الإعلان بداخل الترويسة بين شعار الموقع و صندوق البحث.<br />تستطيع أستخدام الـ html لتنسيق الإعلان',
	'ACP_HEADER_POSITION'				=> 'مكان الإعلان أسفل الترويسة ',
	'ACP_POST_TEXT_HEADER'				=> 'نص الإعلان أسفل الترويسة ',
	'ACP_POST_TEXT_HEADER_EXPLAIN'		=> 'سيظهر الإعلان أسفل شريط القائمة العلوية.<br /> تستطيع أستخدام الـ html و الأكواد الأساسية المعروفة لتنسيق الإعلان.<hr /><strong>مثال :</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;شبكة الهتاري - دعم منتدى phpBB&lt;/h3&gt;رابط إلى alhitary.net&lt;/div&gt;',

	'ADUNITS_FOOTER'					=> 'أسفل الصفحات ',
	'ACP_POST_TEXT_COPYRIGHT'			=> 'نص الإعلان تحت القائمة السفلية ',
	'ACP_POST_TEXT_COPYRIGHT_EXPLAIN'	=> 'سيظهر الإعلان تحت شريط القائمة السفلية في أسفل الصفحة ( فوق حقوق الملكية للمنتدى ).<br />تستطيع أستخدام الـ html لتنسيق الإعلان',
	'ACP_FOOTER_POSITION'				=> 'مكان الإعلان أسفل الصفحات ',
	'ACP_POST_TEXT_FOOTER'				=> 'نص الإعلان فوق القائمة السفلية ',
	'ACP_POST_TEXT_FOOTER_EXPLAIN'		=> 'سيظهر الإعلان فوق شريط القائمة السفلية في أسفل الصفحة.<br /> تستطيع أستخدام الـ html و الأكواد الأساسية المعروفة لتنسيق الإعلان.<hr /><strong>مثال :</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;إسم الصفحة&lt;/h3&gt;صور الإعلان&lt;/div&gt;',

	'ACP_VIEWTOPIC_POSITION_SELECT'	=> array(
		0	=> 'تعطيل',
		1	=> 'أسفل المشاركة الأولى',
		2	=> 'أسفل المشاركة الثانية',
		3	=> 'أسفل جميع المشاركات',
	),

	'ADUNITS_VIEWTOPIC'					=> 'صفحة الموضوع',
	'ACP_VIEWTOPIC_IGNORE'				=> 'استبعاد المنتدى ',
	'ACP_VIEWTOPIC_IGNORE_EXPLAIN'		=> 'المنتديات التي لن تظهر فيها الإعلانات',
	'ACP_VIEWTOPIC_POSITION'			=> 'مكان الإعلان ',
	'ACP_POST_TEXT_VIEWTOPIC'			=> 'نص الإعلان ',
	'ACP_POST_TEXT_VIEWTOPIC_EXPLAIN'	=> 'سيظهر الإعلان أسفل المشاركات.<br />تستطيع أستخدام الـ html و الأكواد الأساسية المعروفة لتنسيق الإعلان.<hr /><strong>مثال :</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;إسم الموقع&lt;/h3&gt;إعلان الإدسينس هنا&lt;/div&gt;',

	'ACP_SIDEBAR_POSITION_SELECT'	=> array(
		0	=> 'تعطيل',
		1	=> 'في يمين الواجهة الرئيسية',
		2	=> 'في يسار الواجهة الرئيسية',
		3	=> 'يمين جميع الصفحات',
		4	=> 'يسار جميع الصفحات',
		5	=> 'اليمين بدون الواجهة الرئيسية',
		6	=> 'اليسار بدون الواجهة الرئيسية',
	),

	'ADUNITS_SIDEBAR'					=> 'العمود الجانبي',
	'ACP_SIDEBAR_POSITION'				=> 'مكان الإعلان ',
	'ACP_SIDEBAR_POSITION_EXPLAIN'		=> 'الإظهار في جميع الصفحات يعني فقط في صفحة الموضوع والمنتديات',
	'ACP_POST_TEXT_SIDEBAR_TOP'			=> 'المربع الأول ',
	'ACP_POST_TEXT_SIDEBAR_TOP_EXPLAIN'	=> 'مقاس عرض المحتوى في المربع العلوي لا يتجاوز أكثر من 200px.<br />تستطيع أستخدام الـ html و الأكواد الأساسية المعروفة لتنسيق الإعلان.<hr /><strong>مثال :</strong><em>عادي :</em><br />&lt;div class="panel"&gt;صورة أو نص&lt;/div&gt;<br /><em>تشكيل :</em><br />&lt;div class="forabg"&gt;&lt;div class="panel"&gt;إعلان أدسينس أو أي محتوى&lt;/div&gt;&lt;/div&gt;<br /><em>بار تلقائي :</em><br />&lt;div class="cp-mini"&gt;دردشة أجاكس&lt;/div&gt;',
	'ACP_POST_TEXT_SIDEBAR'				=> 'المربع الثاني ',
	'ACP_POST_TEXT_SIDEBAR_EXPLAIN'		=> 'مقاس عرض المحتوى في المربع السفلي لا يتجاوز أكثر من 200px.<br />تستطيع أستخدام الـ html لتنسيق الإعلانs',
));
