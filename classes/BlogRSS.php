<?php

use \Cajogos\Biscuit\Template as Template;

class BlogRSS
{
	/**
	 * @param BlogPost[] $posts
	 * @return string
	 * @throws BlogHandlerException
	 */
	public static function generateForPosts($posts)
	{
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml .= "\n" . '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
		$xml .= "\n\t" . '<channel>';
		$xml .= "\n\t\t" . '<lastBuildDate>Fri, 23 Aug 2019 23:57:00 +0000</lastBuildDate>';
		$xml .= "\n\t\t" . '<title>Carlos Ferreira Blog</title>';
		$xml .= "\n\t\t" . '<link>' . BlogLink::getHomeURL(true) . '</link>';
		$xml .= "\n\t\t" . '<atom:link href="' . BlogLink::getFeedURL(true) . '" rel="self" type="application/rss+xml" />';
		$xml .= "\n\t\t" . '<description>A blog for developers by a developer</description>';
		$xml .= "\n\t\t" . '<language>en-GB</language>';
		$xml .= "\n\t\t" . '<copyright>Copyright (C) ' . gmdate('Y') . ' Carlos Ferreira (carlos.fyi)</copyright>';

		$posts = BlogPost::sortByPublishedDate($posts, BlogPost::SORT_DESC);

		foreach ($posts as $post)
		{
			$date_published = date("D, d M Y H:i:s O", strtotime($post->getDatePublished()));
			$xml .= "\n\t\t" . '<item>';
			$xml .= "\n\t\t\t" . '<title>' . $post->getHeadline() . '</title>';
			$xml .= "\n\t\t\t" . '<description><![CDATA[' . $post->getDescription() . ']]></description>';
			$xml .= "\n\t\t\t" . '<pubDate>' . $date_published . '</pubDate>';
			$xml .= "\n\t\t\t" . '<link>' . $post->getLiveURL() . '</link>';
			$xml .= "\n\t\t\t" . '<guid>' . $post->getLiveURL() . '</guid>';
			foreach ($post->getCategories() as $category)
			{
				$xml .= "\n\t\t\t" . '<category><![CDATA[' . $category->getPageTitle() . ']]></category>';
			}
			$xml .= "\n\t\t\t" . '<comments>' . $post->getLiveURL() . '</comments>';
			$xml .= "\n\t\t" . '</item>';
		}

		$xml .= "\n\t" . '</channel>';
		$xml .= "\n" . '</rss>';
		return $xml;
	}
}