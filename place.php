<?php

namespace shgysk8zer0\Schema;

class Place extends Thing
{
	use Traits\ContactInfo;

	const ITEMTYPE = 'Place';

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setContainedInPlace(Place $place): self
	{
		return $this->_set('containedInPlace', $place);
	}

	final public function setContainsPlace(Place $place): self
	{
		return $this->_set('containsPlace', $place);
	}

	final public function setGeo(Thing $geo): self
	{
		if ($geo instanceof GeoCoordinates or $geo instanceof GeoShape) {
			return $this->_set('geo', $geo);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Geo must be an instance of GeoCoordinates or GeoShape. Instance of %s give',
				get_class($geo)
			));
		}
	}

	final public function addPhotos(CreativeWork ...$photos): self
	{
		foreach ($photos as $photo) {
			$this->addPhoto($photo);
		}
		return $this;
	}

	final public function addPhoto(CreativeWork $photo): self
	{
		if ($photo instanceof ImageObject or $photo instanceof Photograph) {
			return $this->_add('photo', $photo);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Photo must be an instance of ImageObject or Photograph. Instance of %s given',
				get_class($photo)
			));
		}
	}
}
