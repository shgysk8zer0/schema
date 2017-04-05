<?php

namespace shgysk8zer0\Schema;

class Thing extends Abstracts\Item
{
	const ITEMTYPE = 'Thing';

	final public function setName(String $name): self
	{
		return $this->_set('name', $name);
	}

	final public function setSameAs(String $url): self
	{
		if (static::isURL($url)) {
			return $this->_set('sameAs', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid URL");
		}
	}

	final public function setURL(String $url): self
	{
		if (filter_var($url, FILTER_VALIDATE_URL)) {
			return $this->_set('url', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid URL");
		}
	}

	final public function setAlternateName(String $name): self
	{
		return $this->_set('alternateName', $name);
	}

	final public function setDescription(String $description): self
	{
		return $this->_set('description', $description);
	}

	final public function setDisambiguatingDescription(String $description): self
	{
		return $this->_set('disambiguatingDescription', $description);
	}

	final public function setAdditionalType(String $url): self
	{
		if (static::isURL($url)) {
			return $this->_set('additionalType', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid additionalType URL");
		}
	}

	final public function setImage($image): self
	{
		if ($image instanceof ImageObject or static::isURL($image)) {
			return $this->_set('image', $image);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Image must be an instance of ImageObject or a URL, %s given',
				is_object($image) ? get_class($image) : gettype($image)
			));
		}
	}

	final public function setPotentialAction(Action $act): self
	{
		return $this->_set('potentialAction', $act);
	}

	final public function setIdentifier($identifier): self
	{
		return $this->_set('identifier', $identifier);
	}

	final public function setMainEntityOfPage($entity): self
	{
		if ($entity instanceof CreativeWork or static::isURL($entity)) {
			return $this->_set('mainEntityOfPage', $entity);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'MainEntityOfPage must be an instance of CreativeWork or a URL. %s given',
				is_object($entity) ? get_class($entity) : gettype($entity)
			));
		}
	}
}
