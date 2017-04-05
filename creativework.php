<?php

namespace shgysk8zer0\Schema;

class CreativeWork extends Thing
{
	const ITEMTYPE = 'CreativeWork';

	final public function setAbout(Thing $thing):self
	{
		return $this->_set('about', $thing);
	}

	final public function setAccountablePerson(Person $person): self
	{
		return $this->_set('accountablePerson', $person);
	}

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setAlternativeHeadline(String $alt_headline): self
	{
		return $this->_set('alternativeHeadline', $alt_headline);
	}

	final public function setAssociateMedia(MediaObject $media): self
	{
		return $this->_set('associatedMedia', $media);
	}

	final public function setAuthor(Thing $author): self
	{
		if ($author instanceof Person or $author instanceof Organization) {
			return $this->_set('author', $author);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				get_calss($thing)
			));
		}
	}
}
