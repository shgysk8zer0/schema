<?php
namespace shgysk8zer0\Schema;

class ImageObject extends MediaObject
{
	const ITEMTYPE = 'ImageObject';

	final public function setCaption(String $caption)
	{
		$this->_set('caption', $caption);
	}

	final public function setThumbnail(ImageObject $thumbnail)
	{
		$this->_set('thumbnail', $thumbnail);
	}
}
