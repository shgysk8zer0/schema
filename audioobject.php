<?php

namespace shgysk8zer0\Schema;

class AudioObject extends MediaObject
{
	const ITEMTYPE = 'AudioObject';
	final public function setTranscript(String $text)
	{
		$this->_set('transcript', $text);
	}
}
