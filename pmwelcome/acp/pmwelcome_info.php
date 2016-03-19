<?php
/**
*
* @package PM Welcome
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace apwa\pmwelcome\acp;

class pmwelcome_info
{
	function module()
	{
		return array(
			'filename'	=> '\apwa\pmwelcome\acp\pmwelcome_module',
			'title'		=> 'ACP_PMWELCOME',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_PMWELCOME_SETTINGS', 'auth' => 'ext_apwa/pmwelcome && acl_a_board', 'cat' => array('ACP_PMWELCOME')),
			),
		);
	}
}
