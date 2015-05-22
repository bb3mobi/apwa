<?php
/**
*
* @package Ad Units
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\adunits\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['adunits_version']) && version_compare($this->config['adunits_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('adunits_header_position', 0)),
			array('config.add', array('adunits_footer_position', 0)),
			array('config.add', array('adunits_viewtopic_position', 0)),
			array('config.add', array('adunits_viewtopic_ignore', '')),
			array('config.add', array('adunits_sidebar_position', 0)),

			// Current version
			array('config.add', array('adunits_version', '1.0.0')),

			// Add config text
			array('config_text.add', array('adunits_post_text_header', '')),
			array('config_text.add', array('adunits_post_text_headerbar', '')),
			array('config_text.add', array('adunits_post_text_footer', '')),
			array('config_text.add', array('adunits_post_text_copyright', '')),
			array('config_text.add', array('adunits_post_text_viewtopic', '')),
			array('config_text.add', array('adunits_post_text_sidebar', '')),
			array('config_text.add', array('adunits_post_text_sidebar_top', '')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_CUSTOMISE', 'ACP_ADUNITS')),
			array('module.add', array('acp', 'ACP_ADUNITS', array(
				'module_basename'	=> '\apwa\adunits\acp\adunits_module',
				'module_langname'	=> 'ADUNITS_HEADER',
				'module_mode'		=> 'header',
				'module_auth'		=> 'ext_apwa/adunits && acl_a_board',
			))),
			array('module.add', array('acp', 'ACP_ADUNITS', array(
				'module_basename'	=> '\apwa\adunits\acp\adunits_module',
				'module_langname'	=> 'ADUNITS_FOOTER',
				'module_mode'		=> 'footer',
				'module_auth'		=> 'ext_apwa/adunits && acl_a_board',
			))),
			array('module.add', array('acp', 'ACP_ADUNITS', array(
				'module_basename'	=> '\apwa\adunits\acp\adunits_module',
				'module_langname'	=> 'ADUNITS_VIEWTOPIC',
				'module_mode'		=> 'viewtopic',
				'module_auth'		=> 'ext_apwa/adunits && acl_a_board',
			))),
			array('module.add', array('acp', 'ACP_ADUNITS', array(
				'module_basename'	=> '\apwa\adunits\acp\adunits_module',
				'module_langname'	=> 'ADUNITS_SIDEBAR',
				'module_mode'		=> 'sidebar',
				'module_auth'		=> 'ext_apwa/adunits && acl_a_board',
			))),
		);
	}
}