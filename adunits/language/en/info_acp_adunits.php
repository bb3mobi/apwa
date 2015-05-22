<?php
/**
*
* Ad Units [English Google Translate]
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
	'ACP_ADUNITS'			=> 'Ad units',
	'ACP_ADUNITS_EXPLAIN'	=> 'Here you can view and manage online ad units.',
	'ACP_ADUNITS_TITLE'		=> 'Manage ad units',

	'ACP_ADUNITS_POSITION'	=> array(
		0	=> 'off disable',
		1	=> 'forum index',
		2	=> 'all pages',
		3	=> 'Not forum index',
	),

	'ADUNITS_HEADER'					=> 'Pages header',
	'ACP_POST_TEXT_HEADERBAR'			=> 'Block header',
	'ACP_POST_TEXT_HEADERBAR_EXPLAIN'	=> 'The block is located in the header of the forum between the logo and the search box.<br />For page formatting, you can use html',
	'ACP_HEADER_POSITION'				=> 'Position bottom header',
	'ACP_POST_TEXT_HEADER'				=> 'Block bottom header',
	'ACP_POST_TEXT_HEADER_EXPLAIN'		=> 'The unit is located above the main content of the forum, under the heading and navigation bar.<br /> For page formatting, you can use html and regular classes to the block.<hr /><strong>Example:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;BB3.Mobi - phpBB Ext&lt;/h3&gt;Link to bb3.mobi&lt;/div&gt;',

	'ADUNITS_FOOTER'					=> 'Pages footer',
	'ACP_POST_TEXT_COPYRIGHT'			=> 'Block top in copyright',
	'ACP_POST_TEXT_COPYRIGHT_EXPLAIN'	=> 'The block is located on top copyrights.<br />For page formatting, you can use html',
	'ACP_FOOTER_POSITION'				=> 'Position top footer',
	'ACP_POST_TEXT_FOOTER'				=> 'Block to footer',
	'ACP_POST_TEXT_FOOTER_EXPLAIN'		=> 'The unit is located above the main content of the forum, under the heading and navigation bar.<br /> For page formatting, you can use html and regular classes to the block.<hr /><strong>Example:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;Name page&lt;/h3&gt;Banner images&lt;/div&gt;',

	'ACP_VIEWTOPIC_POSITION_SELECT'	=> array(
		0	=> 'off disable',
		1	=> 'first message bottom',
		2	=> 'under second message',
		3	=> 'under all messages',
	),

	'ADUNITS_VIEWTOPIC'					=> 'Viewtopic page',
	'ACP_VIEWTOPIC_IGNORE'				=> 'Ignore forum',
	'ACP_VIEWTOPIC_IGNORE_EXPLAIN'		=> 'Forums in which is excluded ad units',
	'ACP_VIEWTOPIC_POSITION'			=> 'Position display block',
	'ACP_POST_TEXT_VIEWTOPIC'			=> 'Block between posts',
	'ACP_POST_TEXT_VIEWTOPIC_EXPLAIN'	=> 'Block is located under the posts offline.<br />For page formatting, you can use html and regular classes to the block.<hr /><strong>Example:</strong><br />&lt;div class="panel"&gt;&lt;h3&gt;Site name&lt;/h3&gt;Block adsense&lt;/div&gt;',

	'ACP_SIDEBAR_POSITION_SELECT'	=> array(
		0	=> 'off disable',
		1	=> 'on index left',
		2	=> 'on index right',
		3	=> 'all left',
		4	=> 'all right',
		5	=> 'Apart from index to left',
		6	=> 'Apart from index to right',
	),

	'ADUNITS_SIDEBAR'					=> 'Sidebar',
	'ACP_SIDEBAR_POSITION'				=> 'Position sidebar',
	'ACP_SIDEBAR_POSITION_EXPLAIN'		=> 'Displays on all pages means that only on page viewtopic and viewforum',
	'ACP_POST_TEXT_SIDEBAR_TOP'			=> 'First unit on top',
	'ACP_POST_TEXT_SIDEBAR_TOP_EXPLAIN'	=> 'Width of content is not more than 200px.<br />For page formatting, you can use html and regular classes to block.<hr /><strong>Examples:</strong><em>Normal:</em><br />&lt;div class="panel"&gt;Banner or text&lt;/div&gt;<br /><em>Border:</em><br />&lt;div class="forabg"&gt;&lt;div class="panel"&gt;Adsense or content&lt;/div&gt;&lt;/div&gt;<br /><em>Auto scroll:</em><br />&lt;div class="cp-mini"&gt;Ajax mini chat&lt;/div&gt;',
	'ACP_POST_TEXT_SIDEBAR'				=> 'Second block bottom',
	'ACP_POST_TEXT_SIDEBAR_EXPLAIN'		=> 'Width of content is not more than 200px.<br />For page formatting, you can use html',
));
