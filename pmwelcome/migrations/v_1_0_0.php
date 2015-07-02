<?php
/**
*
* @package PM WELCOME
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\pmwelcome\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v313');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('pmwelcome_user', 2)),
			array('config.add', array('pmwelcome_subject', 'Welcome to apwa.ru!')),

			// Add config text
			array('config_text.add', array('pmwelcome_post_text', '')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_BOARD_CONFIGURATION', array(
				'module_basename'	=> '\apwa\pmwelcome\acp\pmwelcome_module',
				'module_langname'	=> 'ACP_PMWELCOME',
				'module_mode'		=> 'settings',
				'module_auth'		=> 'ext_apwa/pmwelcome && acl_a_board',
			))),
		);
	}
}