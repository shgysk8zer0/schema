<?php

namespace shgysk8zer0\Schema;

class CreativeWork extends Thing
{
	const ITEMTYPE = 'CreativeWork';

	final public function setAbout(Thing $thing)
	{
		$this->_set('about', $thing);
	}

	final public function setAccountablePerson(Person $person)
	{
		$this->_set('accountablePerson', $person);
	}

	final public function setAggregateRating(AggregateRating $rating)
	{
		$this->_set('aggregateRating', $rating);
	}

	final public function setAlternativeHeadline(String $alt_headline)
	{
		$this->_set('alternativeHeadline', $alt_headline);
	}

	final public function setAssociateMedia(MediaObject $media)
	{
		$this->_set('associatedMedia', $media);
	}

	final public function setAuthor(Thing $author)
	{
		if ($author instanceof Person or $author instanceof Organization) {
			$this->_set('author', $author);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				get_calss($thing)
			));
		}
	}
}
