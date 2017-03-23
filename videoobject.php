<?php

namespace shgysk8zer0\Schema;

class VideoObject extends MediaObject
{
	const ITEMTYPE = 'VideoObject';

	final public function setActors(Person ...$actors)
	{
		foreach ($actors as $actor) {
			$this->addActor($actor);
		}
	}

	final public function addActor(Person $actor)
	{
		$this->_add('actors', $actor);
	}

	final public function setDirector(Person $director)
	{
		$this->_set('director', $director);
	}

	final public function setTranscript(String $text)
	{
		$this->_set('transcript', $text);
	}

	final public function setCaption(String $text)
	{
		$this->_set('caption', $text);
	}

	final public function setThumbnail(ImageObject $thumb)
	{
		$this->_set('thumbnail', $thumb);
	}
}
