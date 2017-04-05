<?php

namespace shgysk8zer0\Schema;

class AudioObject extends MediaObject
{
	const ITEMTYPE = 'AudioObject';

	final public function setTranscript(String $text): self
	{
		return $this->_set('transcript', $text);
	}
}
