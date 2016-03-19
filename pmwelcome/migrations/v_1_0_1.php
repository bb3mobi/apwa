<?php
/**
*
* @package PM WELCOME
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace apwa\pmwelcome\migrations;

class v_1_0_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\apwa\pmwelcome\migrations\v_1_0_0');
	}

	public function effectively_installed()
	{
		return isset($this->config['pmwelcome_version']) && version_compare($this->config['pmwelcome_version'], '1.0.1', '>=');
	}

	public function update_data()
	{
		return array(
			// Update version
			array('config.update', array('pmwelcome_version', '1.0.1')),
		);
	}

	public function revert_data()
	{
		return array(
			// Remove configs
			array('config.remove', array('pmwelcome_user')),
			array('config.remove', array('pmwelcome_subject')),

			// Remove version
			array('config.remove', array('pmwelcome_version')),

			// Remove config text
			array('config_text.remove', array('pmwelcome_post_text')),

			// Add ACP modules
			array('module.remove', array('acp', 'ACP_BOARD_CONFIGURATION', array(
				'module_basename'	=> '\apwa\pmwelcome\acp\pmwelcome_module',
				'module_langname'	=> 'ACP_PMWELCOME',
				'module_mode'		=> 'settings',
				'module_auth'		=> 'ext_apwa/pmwelcome && acl_a_board',
			))),
		);
	}
}