<?php

namespace shgysk8zer0\Schema;

class MediaObject extends CreativeWork
{
	const ITEMTYPE = 'MediaObject';

	final public function setAssociatedArticle(NewsArticle $article)
	{
		$this->_set('associatedArticle', $article);
	}

	final public function setWidth(Int $width)
	{
		$this->_set('width', $width);
	}

	final public function setHeight(Int $height)
	{
		$this->_set('height', $height);
	}

	final public function setEncodingFormat(String $format)
	{
		$this->_set('encodingFormat', $format);
	}

	final public function setContentSize(Int $size)
	{
		$this->_set('contentSize', $size);
	}

	final public function setContentURL(String $url)
	{
		if (static::isURL($url)) {
			$this->_set('contentUrl', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid content URL");
		}
	}

	final public function setRequiresSubscription(Bool $requires_subscription)
	{
		$this->_set('requiresSubscription', $requires_subscription ? 'true' : 'false');
	}

	final public function setUploadDate(\DateTime $date)
	{
		$this->_set('uploadDate', $date->format(\DateTime::ISO8601));
	}

	final public function setExpires(\DateTime $date)
	{
		$this->_set('expires', $date->format(\DateTime::ISO8601));
	}
}
