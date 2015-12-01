<?php
/**
*
* @package PM Welcome
* @copyright (c) bb3.mobi 2014 Anvar
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace apwa\pmwelcome\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/** @var string phpEx */
	protected $php_ext;

	public function __construct(\phpbb\user $user, \phpbb\config\config $config, \phpbb\config\db_text $config_text, $phpbb_root_path, $php_ext)
	{
		$this->user = $user;
		$this->config = $config;
		$this->text = $config_text;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_add_after'		=> 'pm_welcome',
			'core.ucp_activate_after'	=> 'pm_activate_welcome',
		);
	}

	public function pm_welcome($event)
	{
		$user_row = $event['user_row'];
		if ($user_row['user_type'] == USER_NORMAL)
		{
			$pwm_user = $this->config['pmwelcome_user'];
			$pwm_subject = $this->config['pmwelcome_subject'];
			$pwm_text = $this->text->get('pmwelcome_post_text');
			if ($pwm_user && $pwm_subject && $pwm_text)
			{
				$user_to = array(
					'user_id'	=> $event['user_id'],
					'username'	=> $user_row['username'],
				);

				$this->user_welcome($user_to, $pwm_user, $pwm_subject, $pwm_text);
			}
		}
	}

	public function pm_activate_welcome($event)
	{
		$user_row = $event['user_row'];
		if (!$user_row['user_newpasswd'])
		{
			$pwm_user = $this->config['pmwelcome_user'];
			$pwm_subject = $this->config['pmwelcome_subject'];
			$pwm_text = $this->text->get('pmwelcome_post_text');
			if ($pwm_user && $pwm_subject && $pwm_text)
			{
				$user_to = array(
					'user_id'	=> $user_row['user_id'],
					'username'	=> $user_row['username'],
				);

				$this->user_welcome($user_to, $pwm_user, $pwm_subject, $pwm_text);
			}
		}
	}

	/** User PM welcome message */
	private function user_welcome($user_to, $user_id, $subject, $text)
	{
		$m_flags = 3; // 1 is bbcode, 2 is smiles, 4 is urls (add together to turn on more than one)
		$uid = $bitfield = '';
		$allow_bbcode = $allow_urls = $allow_smilies = true;

		$text = str_replace('{USERNAME}', $user_to['username'], $text);

		generate_text_for_storage($text, $uid, $bitfield, $m_flags, $allow_bbcode, $allow_urls, $allow_smilies);

		include_once($this->phpbb_root_path . 'includes/functions_privmsgs.' . $this->php_ext);

		$pm_data = array(
			'address_list'		=> array('u' => array($user_to['user_id'] => 'to')),
			'from_user_id'		=> $user_id,
			'from_user_ip'		=> $this->user->ip,
			'enable_sig'		=> false,
			'enable_bbcode'		=> $allow_bbcode,
			'enable_smilies'	=> $allow_smilies,
			'enable_urls'		=> $allow_urls,
			'icon_id'			=> 0,
			'bbcode_bitfield'	=> $bitfield,
			'bbcode_uid'		=> $uid,
			'message'			=> utf8_normalize_nfc($text),
		);

		submit_pm('post', utf8_normalize_nfc($subject), $pm_data, false);
	}
}
