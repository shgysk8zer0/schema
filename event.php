<?php
namespace shgysk8zer0\Schema;

class Event extends Thing
{
	const ITEMTYPE = 'Event';

	final public function setAbout(Thing $about):self
	{
		return $this->_set('about', $about);
	}

	final public function addActors(Person ...$actors): self
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

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setComposer(Thing $composer): self
	{
		if ($composer instanceof Person or $composer instanceof Organization) {
			return $this->_set('composer', $composer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Composer must be an instance of Person or Organization. Instance of %s given',
				get_class($composer)
			));
		}
	}

	final public function setContributor(Thing $contributor): self
	{
		if ($contributor instanceof Person or $contributor instanceof Organization) {
			return $this->_set('contributor', $contributor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Contributor must be an instance of Person or Organization. Instance of %s given',
				get_class($contributor)
			));
		}
	}

	final public function setDoorTime(\DateTime $time): self
	{
		return $this->_set('doorTime', $time->format(\DateTime::ISO8601));
	}

	final public function setEndDate(\DateTime $date, Bool $has_time = true): self
	{
		return $this->_set('endDate', $date->format($has_time ? \DateTime::ISO8601 : 'Y-m-d'));
	}

	final public function setIsAccessibleForFree(Bool $is_free): self
	{
		return $this->_set('isAccessibleForFree', $is_free ? 'true' : 'false');
	}

	final public function setLocation(Thing $location): self
	{
		if ($location instanceof Place or $location instanceof PostalAddress) {
			return $this->_set('location', $location);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Location must be an instanceof Place or PostalAddress. Instance of %s given',
				get_class($location)
			));
		}
	}

	final public function setMaximumAttendeeCapacity(Int $max): self
	{
		return $this->_set('maximumAttendeeCapacity', $max);
	}

	final public function addOffers(Offer ...$offers): self
	{
		foreach ($offers as $offer) {
			$this->addOffer($offer);
		}
		return $this;
	}

	final public function addOffer(Offer $offer): self
	{
		return $this->_add('offers', $offer);
	}

	final public function setOrganizer(Thing $organizer): self
	{
		if ($organizer instanceof Person or $organizer instanceof Organization) {
			return $this->_set('organizer', $organizer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Organizer must be an instance of Person or Organization. Instance of %s given',
				get_class($organizer)
			));
		}
	}

	final public function addPerformers(Thing ...$performers)
	{
		foreach ($performers as $performer) {
			$this->addPerformer($performer);
		}
	}

	final public function addPerformer(Thing $performer): self
	{
		if ($performer instanceof Person or $performer instanceof Organization) {
			return $this->_add('performers', $performer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Performer must be an instance of Person or Organization. Instance of %s given',
				get_class($performer)
			));
		}
	}

	final public function addReviews(Review ...$reviews): self
	{
		foreach ($reviews as $review) {
			$this->addReview($review);
		}
		return $this;
	}

	final public function addReview(Review $review): self
	{
		return $this->_add('reviews', $review);
	}

	final public function setSponsor(Thing $sponsor): self
	{
		if ($sponsor instanceof Person or $sponsor instanceof Organization) {
			return $this->_set('sponsor', $sponsor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Sponsor must be an instance of Person or Organization. Instance of %s given',
				get_class($sponsor)
			));
		}
	}

	final public function setStartDate(\DateTime $date, Bool $has_time = true): self
	{
		return $this->_set('startDate', $date->format($has_time ? \DateTime::ISO8601 : 'Y-m-d'));
	}

	final public function setSuperEvent(Event $event): self
	{
		return $this->_set('setSuperEvent', $event);
	}

	final public function addSubEvents(Event ...$events): self
	{
		foreach ($events as $event) {
			$this->addSubEvent($event);
		}
		return $this;
	}

	final public function addSubEvent(Event $event): self
	{
		return $this->_add('subEvent', $event);
	}

	final public function setTypicalAgeRange(Int $min, Int $max): self
	{
		return $this->_set('typicalAgeRange', "{$min}-{$max}");
	}

	final public function setWorkFeatured(CreativeWork $work): self
	{
		return $this->_set('workFeatured', $work);
	}

	final public function setWorkPerformed(CreativeWork $work): self
	{
		return $this->_set('workPerformed', $work);
	}
}
