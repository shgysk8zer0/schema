<?php

namespace shgysk8zer0\Schema;

class VideoObject extends MediaObject
{
	const ITEMTYPE = 'VideoObject';

	final public function setActors(Person ...$actors): self
	{
		foreach ($actors as $actor) {
			$this->addActor($actor);
		}
		return $this;
	}

	final public function addActor(Person $actor): self
	{
		return $this->_add('actors', $actor);
	}

	final public function setDirector(Person $director): self
	{
		return $this->_set('director', $director);
	}

	final public function setTranscript(String $text): self
	{
		return $this->_set('transcript', $text);
	}

	final public function setCaption(String $text): self
	{
		return $this->_set('caption', $text);
	}

	final public function setThumbnail(ImageObject $thumb): self
	{
		return $this->_set('thumbnail', $thumb);
	}
}

