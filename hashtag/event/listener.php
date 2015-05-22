<?php
/**
*
* @package phpBB3.1 hashtag v 1.0.0
* @copyright BB3.Mobi 2015 (c) Anvar(http://apwa.ru)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace apwa\hashtag\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/** @var string phpEx */
	protected $php_ext;

	public function __construct($phpbb_root_path, $php_ext)
	{
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.modify_text_for_display_after' => 'hashtag_event',
		);
	}

	/* Replace function http://desktopslab.ru/forum/phpbb/khesh-tegi-soobshcheniyakh-forumakh-phpbb-t2433.html */
	public function hashtag_event($event)
	{
		$text = $event['text'];
		$text = preg_replace_callback('/ (^|style="[^"#]+|[^\\s]*[\\s]+|>)#([\\p{Lu}\\p{Ll}\\p{N}\\w\\d]+)\\b/um', array($this, 'hashtag_callback'), $text);
		$event['text'] = $text;
	}

	private function hashtag_callback($match)
	{
		if (preg_match('#(color|background|text-shadow)[:=]|style="#i', $match[1]))
		{
			return $match[0];
		}
		return $match[1] . '<a href="' . append_sid("{$this->phpbb_root_path}search.$this->php_ext", 'keywords=' . $match[2]) . '">#' . $match[2] . '</a>';
	}
}
