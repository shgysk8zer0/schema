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

	final public function setCopyrightHolder(Thing $holder): self
	{
		if ($holder instanceof Person or $holder instanceof Organization) {
			return $this->_set('copyrightHolder', $holder);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'copyrightHolder must be an instance of Person or Organization. %s given',
				get_class($holder)
			));
		}
	}

	final public function setCopyrightYear(Int $year): self
	{
		return $this->_set('copyrightYear', $year);
	}

	final public function setDateCreated(\DateTime $created): self
	{
		return $this->_set('dateCreated', $created->format(\DateTime::ISO8601));
	}

	final public function setEditor(Person $editor): self
	{
		return $this->_set('editor', $editor);
	}

	final public function setGenre(String $genre): self
	{
		return $this->_set('genre', $genre);
	}

	final public function setHeadline(String $headline): self
	{
		return $this->_set('headline', $headline);
	}

	final public function setIsFamilyFriendly(Bool $fam_friendly): self
	{
		return $this->_set('isFamilyFriendly', $fam_friendly);
	}

	final public function setKeywords(String $keywords): self
	{
		return $this->_set('keywords', $keywords);
	}

	final public function setOffers(Offer ...$offers): self
	{
		foreach ($offers as $offer) {
			$this->addOffers($offer);
		}
		return $this;
	}

	final public function addOffers(Offer $offer): self
	{
		return $this->_add('offers', $offer);
	}

	final public function setProducer(Thing $producer): self
	{
		if ($producer instanceof Person or $producer instanceof Organization) {
			return $this->_set('producer', $producer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Producer must be an instance of Person or Organization. %s given',
				get_class($producer)
			));
		}
	}

	final public function setPublisher(Thing $publisher): self
	{
		if ($publisher instanceof Person or $publisher instanceof Organization) {
			return $this->_set('publisher', $publisher);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Publisher must be an instance of Person or Organization. %s given',
				get_class($publisher)
			));
		}
	}

	final public function setReviews(Review ...$reviews): self
	{
		foreach ($reviews as $review) {
			$this->addReview($review);
		}

		return $this;
	}

	final public function addReview(Review $review): self
	{
		return $this->_add('review', $review);
	}

	final public function setSourceORganization(Organization $org): self
	{
		return $this->_set('sourceOrganization', $org);
	}

	final public function setSponsor(Thing $sponsor): self
	{
		if ($sponsor instanceof Person or $sponsor instanceof Organization) {
			return $this->_set('sponsor', $sponsor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Sponsor must be an instance of Person or Organization. %s given',
				get_class($sponsor)
			));
		}
	}

	final public function setText(String $text): self
	{
		return $this->_set('text', $text);
	}

	final public function setVideo(VideoObject $video): self
	{
		return $this->_set('video', $video);
	}

	final public function setWorkExample(CreativeWord $work): self
	{
		return $this->_set('workExample', $work);
	}
}
