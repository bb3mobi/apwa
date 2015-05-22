<?php
/**
*
* @package Ad Units
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\adunits\acp;

class adunits_module
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $config, $user, $template, $request, $phpbb_container;

		$this->user = $user;
		$this->tpl_name = 'acp_board';
		$this->page_title = 'ACP_ADUNITS_TITLE';

		$submit = $request->is_set_post('submit');

		$form_key = 'adunits';
		add_form_key($form_key);

		switch ($mode)
		{
			case 'header':
			$display_vars = array(
				'title'	=> 'ACP_ADUNITS',
				'vars'	=> array(
					'legend1'	=> 'ADUNITS_HEADER',
					'adunits_post_text_headerbar'	=> array('lang' => 'ACP_POST_TEXT_HEADERBAR',	'validate' => '',		'type' => 'textarea:6:30', 'explain' => true),
					'adunits_header_position'		=> array('lang' => 'ACP_HEADER_POSITION',		'validate' => 'string',	'type' => 'select', 'method' => 'position_select', 'explain' => false),
					'adunits_post_text_header'		=> array('lang' => 'ACP_POST_TEXT_HEADER',		'validate' => '',		'type' => 'textarea:16:30', 'explain' => true),

					'legend2'	=> 'ACP_SUBMIT_CHANGES',
				),
			);
			break;

			case 'footer':
			$display_vars = array(
				'title'	=> 'ACP_ADUNITS',
				'vars'	=> array(
					'legend1'	=> 'ADUNITS_FOOTER',
					'adunits_footer_position'		=> array('lang' => 'ACP_FOOTER_POSITION',		'validate' => 'string',	'type' => 'select', 'method' => 'position_select', 'explain' => false),
					'adunits_post_text_footer'		=> array('lang' => 'ACP_POST_TEXT_FOOTER',		'validate' => '',		'type' => 'textarea:12:30', 'explain' => true),
					'adunits_post_text_copyright'	=> array('lang' => 'ACP_POST_TEXT_COPYRIGHT',	'validate' => '',		'type' => 'textarea:8:30', 'explain' => true),

					'legend2'	=> 'ACP_SUBMIT_CHANGES',
				),
			);
			break;

			case 'viewtopic':
			$display_vars = array(
				'title'	=> 'ACP_ADUNITS',
				'vars'	=> array(
					'legend1'	=> 'ADUNITS_VIEWTOPIC',
					'adunits_viewtopic_position'	=> array('lang' => 'ACP_VIEWTOPIC_POSITION',	'validate' => 'string',	'type' => 'select', 'method' => 'viewtopic_position_select', 'explain' => false),
					'adunits_post_text_viewtopic'	=> array('lang' => 'ACP_POST_TEXT_VIEWTOPIC',	'validate' => '',		'type' => 'textarea:12:30', 'explain' => true),
					'adunits_viewtopic_ignore'		=> array('lang' => 'ACP_VIEWTOPIC_IGNORE',		'validate' => 'string',	'type' => 'custom', 'method' => 'select_forums', 'explain' => true),

					'legend2'	=> 'ACP_SUBMIT_CHANGES',
				),
			);
			break;

			case 'sidebar':
			$display_vars = array(
				'title'	=> 'ACP_ADUNITS',
				'vars'	=> array(
					'legend1'	=> 'ADUNITS_SIDEBAR',
					'adunits_sidebar_position'		=> array('lang' => 'ACP_SIDEBAR_POSITION',	'validate' => 'string',	'type' => 'select', 'method' => 'sidebar_position_select', 'explain' => false),
					'adunits_post_text_sidebar_top'	=> array('lang' => 'ACP_POST_TEXT_SIDEBAR_TOP',	'validate' => '',	'type' => 'textarea:15:30', 'explain' => true),
					'adunits_post_text_sidebar'		=> array('lang' => 'ACP_POST_TEXT_SIDEBAR',	'validate' => '',		'type' => 'textarea:15:30', 'explain' => true),

					'legend2'	=> 'ACP_SUBMIT_CHANGES',
				),
			);
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}

		if (isset($display_vars['lang']))
		{
			$user->add_lang($display_vars['lang']);
		}

		$this->new_config = $config;

		$cfg_array = ($request->is_set('config')) ? utf8_normalize_nfc($request->variable('config', array('' => ''), true)) : $this->new_config;
		$error = array();

		// We validate the complete config if wished
		validate_config_vars($display_vars['vars'], $cfg_array, $error);

		if ($submit && !check_form_key($form_key))
		{
			$error[] = $user->lang['FORM_INVALID'];
		}

		// Do not write values if there is an error
		if (sizeof($error))
		{
			$submit = false;
		}

		/* config text class && Anvar */
		$config_text = $phpbb_container->get('config_text');
		$text_ary = array(
			'adunits_post_text_header',
			'adunits_post_text_headerbar',
			'adunits_post_text_footer',
			'adunits_post_text_copyright',
			'adunits_post_text_viewtopic',
			'adunits_post_text_sidebar_top',
			'adunits_post_text_sidebar',
		);

		// We go through the display_vars to make sure no one is trying to set variables he/she is not allowed to...
		foreach ($display_vars['vars'] as $config_name => $null)
		{
			if (!isset($cfg_array[$config_name]) || strpos($config_name, 'legend') !== false)
			{
				continue;
			}

			$this->new_config[$config_name] = $config_value = $cfg_array[$config_name];

			if ($submit)
			{
				/* Add config text && Anvar */
				if (in_array($config_name, $text_ary))
				{
					$config_text->set($config_name, $config_value);
				}
				else
				{
					$config->set($config_name, $config_value);
				}
			}
		}

		if ($submit)
		{
			// POST Forums config && Anvar (bb3.mobi)
			$values = $request->variable('adunits_viewtopic_ignore', array(0 => ''));
			$config->set('adunits_viewtopic_ignore', implode(',', $values));

			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		$this->page_title = $display_vars['title'];

		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang[$display_vars['title']],
			'L_TITLE_EXPLAIN'	=> $user->lang[$display_vars['title'] . '_EXPLAIN'],
			'S_ERROR'			=> (sizeof($error)) ? true : false,
			'ERROR_MSG'			=> implode('<br />', $error),
			'U_ACTION'			=> $this->u_action)
		);

		// Output relevant page
		foreach ($display_vars['vars'] as $config_key => $vars)
		{
			if (!is_array($vars) && strpos($config_key, 'legend') === false)
			{
				continue;
			}

			if (strpos($config_key, 'legend') !== false)
			{
				$template->assign_block_vars('options', array(
					'S_LEGEND'		=> true,
					'LEGEND'		=> (isset($user->lang[$vars])) ? $user->lang[$vars] : $vars)
				);
				continue;
			}

			$type = explode(':', $vars['type']);

			$l_explain = '';
			if ($vars['explain'] && isset($vars['lang_explain']))
			{
				$l_explain = (isset($user->lang[$vars['lang_explain']])) ? $user->lang[$vars['lang_explain']] : $vars['lang_explain'];
			}
			else if ($vars['explain'])
			{
				$l_explain = (isset($user->lang[$vars['lang'] . '_EXPLAIN'])) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '';
			}

			/* Get config text && Anvar */
			if (in_array($config_key, $text_ary))
			{
				$this->new_config[$config_key] = $config_text->get($config_key);
			}

			$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);

			if (empty($content))
			{
				continue;
			}

			$template->assign_block_vars('options', array(
				'KEY'			=> $config_key,
				'TITLE'			=> (isset($user->lang[$vars['lang']])) ? $user->lang[$vars['lang']] : $vars['lang'],
				'S_EXPLAIN'		=> $vars['explain'],
				'TITLE_EXPLAIN'	=> $l_explain,
				'CONTENT'		=> $content,
				)
			);

			unset($display_vars['vars'][$config_key]);
		}
	}

	function select_forums($value, $key)
	{// Select Forums function && Anvar (bb3.mobi)
		global $user, $config;

		$forum_list = make_forum_select(false, false, true, true, true, false, true);

		$selected = array();
		if(isset($config[$key]) && strlen($config[$key]) > 0)
		{
			$selected = explode(',', $config[$key]);
		}
		// Build forum options
		$s_forum_options = '<select id="' . $key . '" name="' . $key . '[]" multiple="multiple">';
		foreach ($forum_list as $f_id => $f_row)
		{
			$s_forum_options .= '<option value="' . $f_id . '"' . ((in_array($f_id, $selected)) ? ' selected="selected"' : '') . (($f_row['disabled']) ? ' disabled="disabled" class="disabled-option"' : '') . '>' . $f_row['padding'] . $f_row['forum_name'] . '</option>';
		}
		$s_forum_options .= '</select>';

		return $s_forum_options;
	}

	/**
	* Select display method
	*/
	function position_select($selected_value, $value)
	{
		$act_options = '';
		foreach ($this->user->lang['ACP_ADUNITS_POSITION'] as $key => $value)
		{
			$selected = ($selected_value == $key) ? ' selected="selected"' : '';
			$act_options .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
		}
		return $act_options;
	}

	/**
	* Select display method viewtopic
	*/
	function viewtopic_position_select($selected_value, $value)
	{
		$act_options = '';
		foreach ($this->user->lang['ACP_VIEWTOPIC_POSITION_SELECT'] as $key => $value)
		{
			$selected = ($selected_value == $key) ? ' selected="selected"' : '';
			$act_options .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
		}
		return $act_options;
	}

	/**
	* Select display method sidebar
	*/
	function sidebar_position_select($selected_value, $value)
	{
		$act_options = '';
		foreach ($this->user->lang['ACP_SIDEBAR_POSITION_SELECT'] as $key => $value)
		{
			$selected = ($selected_value == $key) ? ' selected="selected"' : '';
			$act_options .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
		}
		return $act_options;
	}
}
