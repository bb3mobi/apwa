<?php
/**
*
* @package Attachments Counter
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\attachcount\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.index_modify_page_title'	=> 'attach_counter',
		);
	}

	public function attach_counter()
	{
		$this->template->assign_var('TOTAL_ATTACHMENTS', (int) $this->config['num_files']);
	}
}
