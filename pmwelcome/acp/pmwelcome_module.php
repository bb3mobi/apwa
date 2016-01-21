<?php
/**
*
* @package PM Welcome
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\pmwelcome\acp;

class pmwelcome_module
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $config, $user, $template, $request, $phpbb_container;
		global $phpbb_root_path, $phpEx;

		$this->user = $user;
		$this->tpl_name = 'acp_pmwelcome';
		$this->page_title = 'ACP_PMWELCOME_SETTINGS';

		$this->user->add_lang(array('acp/board', 'posting'));

		$submit = $request->is_set_post('submit');
		$preview = $request->is_set_post('preview');

		$form_key = 'pmwelcome';
		add_form_key($form_key);

		$user_name = '';
		if (!$submit)
		{
			$user_info = $this->pm_welcome_user_name($config['pmwelcome_user']);
			$user_name = '<a href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=viewprofile&amp;u=' . $user_info['user_id']) . '">' . $user_info['username'] . '</a>';
		}

		$display_vars = array(
			'title'	=> 'ACP_PMWELCOME',
			'vars'	=> array(
				'legend1'	=> 'ACP_PMWELCOME_SETTINGS',
				'pmwelcome_user'		=> array('lang' => 'ACP_PMWELCOME_USER',	'validate' => 'int:2:255',	'type' => 'number:2:255', 'explain' => true, 'append' => ' ' . $user_name),
				'pmwelcome_subject'		=> array('lang' => 'ACP_PMWELCOME_SUBJECT',	'validate' => 'string',		'type' => 'text:50:250', 'explain' => false),
				'pmwelcome_post_text'	=> array('lang' => 'ACP_PMWELCOME_TEXT',	'validate' => '',			'type' => 'textarea:15:30', 'explain' => true),

				'legend2'	=> 'ACP_SUBMIT_CHANGES',
			),
		);

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

		/* Config text Welcome */
		$config_text = $phpbb_container->get('config_text');
		$pmwelcome_post_text = $config_text->get('pmwelcome_post_text');
		$text_ary = array('pmwelcome_post_text');

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
				/* Find user */
				if ($config_name == 'pmwelcome_user')
				{
					$inder_fo = $this->pm_welcome_user_name($config_value);
					if (isset($inder_fo['error']) && $inder_fo['error'])
					{
						$error[] = $inder_fo['error'];
						$submit = false;
						continue;
					}
				}

				/* Add config text Welcome Add */
				if (in_array($config_name, $text_ary))
				{
					$config_text->set($config_name, $config_value);
				}
				else
				{
					$config->set($config_name, $config_value);
				}
			}

			/* Config text Welcome Preview*/
			if (in_array($config_name, $text_ary) && $preview)
			{
				$pmwelcome_post_text = $config_value;
			}
		}

		if ($submit)
		{
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		/* Config text Welcome Preview */
		$preview_text = '';
		if (!empty($pmwelcome_post_text))
		{
			$flags = 3;
			$uid = $bitfield = '';
			$preview_text = $pmwelcome_post_text;
			generate_text_for_storage($preview_text, $uid, $bitfield, $flags, true, true, true);
			$preview_text = generate_text_for_display($preview_text, $uid, $bitfield, $flags);
		}

		$this->page_title = $display_vars['title'];

		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang[$display_vars['title']],
			'L_TITLE_EXPLAIN'	=> $user->lang[$display_vars['title'] . '_EXPLAIN'],
			'S_ERROR'			=> (sizeof($error)) ? true : false,
			'ERROR_MSG'			=> implode('<br />', $error),
			'POST_TEXT'			=> $pmwelcome_post_text,
			'PREVIEW_TEXT'		=> $preview_text,
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
				continue;
				//$this->new_config[$config_key] = $config_text->get($config_key);
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

	function pm_welcome_user_name($user_id)
	{
		global $db;

		$inder_fo = array();

		$sql = 'SELECT user_id, username
			FROM ' . USERS_TABLE . "
			WHERE user_id = " . (int) $user_id;
		$result = $db->sql_query($sql);
		$inder_fo = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$inder_fo['username'])
		{
			$inder_fo['error'] = $this->user->lang['NO_USER'];
		}

		return $inder_fo;
	}
}
