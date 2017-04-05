<?php

namespace shgysk8zer0\Schema;

class MediaObject extends CreativeWork
{
	const ITEMTYPE = 'MediaObject';

	final public function setAssociatedArticle(NewsArticle $article): self
	{
		return $this->_set('associatedArticle', $article);
	}

	final public function setWidth(Int $width): self
	{
		return $this->_set('width', $width);
	}

	final public function setHeight(Int $height): self
	{
		return $this->_set('height', $height);
	}

	final public function setEncodingFormat(String $format): self
	{
		return $this->_set('encodingFormat', $format);
	}

	final public function setContentSize(Int $size): self
	{
		return $this->_set('contentSize', $size);
	}

	final public function setContentURL(String $url): self
	{
		if (static::isURL($url)) {
			return $this->_set('contentUrl', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid content URL");
		}
	}

	final public function setRequiresSubscription(Bool $requires_subscription): self
	{
		return $this->_set('requiresSubscription', $requires_subscription ? 'true' : 'false');
	}

	final public function setUploadDate(\DateTime $date): self
	{
		return $this->_set('uploadDate', $date->format(\DateTime::ISO8601));
	}

	final public function setExpires(\DateTime $date): self
	{
		return $this->_set('expires', $date->format(\DateTime::ISO8601));
	}
}
