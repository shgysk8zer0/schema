<?php
namespace shgysk8zer0\Schema;

class ImageObject extends MediaObject
{
	use Traits\Data;

	const ITEMTYPE = 'ImageObject';

	const ITEMPROPS = [
		'caption',
		'thumbnail',
	];

	final public function setCaption(String $caption): self
	{
		return $this->_set('caption', $caption);
	}

	final public function setThumbnail(ImageObject $thumbnail): self
	{
		return $this->_set('thumbnail', $thumbnail);
	}
}
