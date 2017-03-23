<?php
namespace shgysk8zer0\Schema;

class Event extends Thing
{
	const ITEMTYPE = 'Event';

	final public function setAbout(Thing $about)
	{
		$this->_set('about', $about);
	}

	final public function addActors(Person ...$actors)
	{
		foreach ($actors as $actor) {
			$this->addActor($actor);
		}
	}

	final public function addActor(Person $actor)
	{
		$this->_add('actors', $actor);
	}

	final public function setAggregateRating(AggregateRating $rating)
	{
		$this->_set('aggregateRating', $rating);
	}

	final public function setComposer(Thing $composer)
	{
		if ($composer instanceof Person or $composer instanceof Organization) {
			$this->_set('composer', $composer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Composer must be an instance of Person or Organization. Instance of %s given',
				get_class($composer)
			));
		}
	}

	final public function setContributor(Thing $contributor)
	{
		if ($contributor instanceof Person or $contributor instanceof Organization) {
			$this->_set('contributor', $contributor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Contributor must be an instance of Person or Organization. Instance of %s given',
				get_class($contributor)
			));
		}
	}

	final public function setDoorTime(\DateTime $time)
	{
		$this->_set('doorTime', $time->format(\DateTime::ISO8601));
	}

	final public function setEndDate(\DateTime $date, Bool $has_time = true)
	{
		$this->_set('endDate', $date->format($has_time ? \DateTime::ISO8601 : 'Y-m-d'));
	}

	final public function setIsAccessibleForFree(Bool $is_free)
	{
		$this->_set('isAccessibleForFree', $is_free ? 'true' : 'false');
	}

	final public function setLocation(Thing $location)
	{
		if ($location instanceof Place or $location instanceof PostalAddress) {
			$this->_set('location', $location);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Location must be an instanceof Place or PostalAddress. Instance of %s given',
				get_class($location)
			));
		}
	}

	final public function setMaximumAttendeeCapacity(Int $max)
	{
		$this->_set('maximumAttendeeCapacity', $max);
	}

	final public function addOffers(Offer ...$offers)
	{
		foreach ($offers as $offer) {
			$this->addOffer($offer);
		}
	}

	final public function addOffer(Offer $offer)
	{
		$this->_add('offers', $offer);
	}

	final public function setOrganizer(Thing $organizer)
	{
		if ($organizer instanceof Person or $organizer instanceof Organization) {
			$this->_set('organizer', $organizer);
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

	final public function addPerformer(Thing $performer)
	{
		if ($performer instanceof Person or $performer instanceof Organization) {
			$this->_add('performers', $performer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Performer must be an instance of Person or Organization. Instance of %s given',
				get_class($performer)
			));
		}
	}

	final public function addReviews(Review ...$reviews)
	{
		foreach ($reviews as $review) {
			$this->addReview($review);
		}
	}

	final public function addReview(Review $review)
	{
		$this->_add('reviews', $review);
	}

	final public function setSponsor(Thing $sponsor)
	{
		if ($sponsor instanceof Person or $sponsor instanceof Organization) {
			$this->_set('sponsor', $sponsor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Sponsor must be an instance of Person or Organization. Instance of %s given',
				get_class($sponsor)
			));
		}
	}

	final public function setStartDate(\DateTime $date, Bool $has_time = true)
	{
		$this->_set('startDate', $date->format($has_time ? \DateTime::ISO8601 : 'Y-m-d'));
	}

	final public function setSuperEvent(Event $event)
	{
		$this->_set('setSuperEvent', $event);
	}

	final public function addSubEvents(Event ...$events)
	{
		foreach ($events as $event) {
			$this->addSubEvent($event);
		}
	}

	final public function addSubEvent(Event $event)
	{
		$this->_add('subEvent', $event);
	}

	final public function setTypicalAgeRange(Int $min, Int $max)
	{
		$this->_set('typicalAgeRange', "{$min}-{$max}");
	}

	final public function setWorkFeatured(CreativeWork $work)
	{
		$this->_set('workFeatured', $work);
	}

	final public function setWorkPerformed(CreativeWork $work)
	{
		$this->_set('workPerformed', $work);
	}
}
