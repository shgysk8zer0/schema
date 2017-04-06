<?php

namespace shgysk8zer0\Schema;

class AudioObject extends MediaObject
{
	use Traits\Data;

	const ITEMTYPE = 'AudioObject';

	const ITEMPROPS = [
		'transcript',
	];

	final public function setTranscript(String $text): self
	{
		return $this->_set('transcript', $text);
	}
}
