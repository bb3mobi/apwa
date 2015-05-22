<?php
/**
*
* @package Ad Units
* @copyright BB3.MOBi (c) 2015 Anvar http://apwa.ru
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace apwa\adunits\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\config\db_text */
	protected $config_text;

	/** @var \phpbb\template\template */
	protected $template;


	public function __construct(\phpbb\user $user, \phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\template\template $template)
	{
		$this->user = $user;
		$this->config = $config;
		$this->text = $config_text;
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'						=> 'content_hedaer',
			'core.page_footer'								=> 'content_footer',
			'core.viewtopic_assign_template_vars_before'	=> 'content_viewtopic',
		);
	}

	public function content_hedaer()
	{
		$addunit_row = array(
			'S_ADUNITS_HEADERBAR'			=> $this->text->get('adunits_post_text_headerbar'),
			'ADUNITS_POST_TEXT_HEADERBAR'	=> htmlspecialchars_decode($this->text->get('adunits_post_text_headerbar')),
		);

		if ($this->config['adunits_header_position'])
		{
			$addunit_row = array_merge($addunit_row, array(
				'S_ADUNITS_HEADER_POSITION'		=> $this->config['adunits_header_position'],
				'ADUNITS_POST_TEXT_HEADER'		=> htmlspecialchars_decode($this->text->get('adunits_post_text_header')),
				)
			);
		}

		if ($this->config['adunits_sidebar_position'])
		{
			$addunit_row = array_merge($addunit_row, array(
				'S_ADUNITS_SIDEBAR_POSITION'	=> $this->config['adunits_sidebar_position'],
				'ADUNITS_POST_TEXT_SIDEBAR_TOP'	=> htmlspecialchars_decode($this->text->get('adunits_post_text_sidebar_top')),
				'ADUNITS_POST_TEXT_SIDEBAR'		=> htmlspecialchars_decode($this->text->get('adunits_post_text_sidebar')),
				)
			);
		}

		$this->template->assign_vars($addunit_row);
	}

	public function content_footer()
	{
		$addunit_row = array(
			'S_ADUNITS_FOOTER_COPYRIGHT'	=> $this->text->get('adunits_post_text_copyright'),
			'ADUNITS_POST_TEXT_COPYRIGHT'	=> htmlspecialchars_decode($this->text->get('adunits_post_text_copyright')),
		);

		if ($this->config['adunits_footer_position'])
		{
			$addunit_row = array_merge($addunit_row, array(
				'S_ADUNITS_FOOTER_POSITION'	=> $this->config['adunits_footer_position'],
				'ADUNITS_POST_TEXT_FOOTER'	=> htmlspecialchars_decode($this->text->get('adunits_post_text_footer')),
			));
		}

		$this->template->assign_vars($addunit_row);
	}

	public function content_viewtopic($event)
	{
		$exclude = array();
		if ($forum_ary = $this->config['adunits_viewtopic_ignore'])
		{
			$exclude = explode(',', $forum_ary);
		}

		if ($this->config['adunits_viewtopic_position'] && !in_array($event['forum_id'], $exclude))
		{
			$this->template->assign_vars(array(
				'S_ADUNITS_VIEWTOPIC_POSITION'	=> $this->config['adunits_viewtopic_position'],
				'ADUNITS_POST_TEXT_VIEWTOPIC'	=> htmlspecialchars_decode($this->text->get('adunits_post_text_viewtopic')),
			));
		}
	}
}
