<?php

namespace shgysk8zer0\Schema;

class FoodEstablishment extends LocalBusiness
{
	const ITEMTYPE = 'FoodEstablishment';

	final public function setAcceptsReservations(Bool $accepted): self
	{
		return $this->_set('acceptsReservation', $accepted);
	}

	final public function setHasMenu($menu): self
	{
		if ($menu instanceof Menu or is_string($menu)) {
			return $this->_set('hasMenu', $menu);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Menu must be a string, URL, or instance of Menu. %s give',
				is_object($menu) ? get_class($menu) : gettype($menu)
			));
		}
	}

	final public function setServesCuisine(String $cuisine): self
	{
		return $this->_set('servesCuisine', $cuisine);
	}

	final public function setStarRating(Rating $rating): self
	{
		return $this->_set('starRating', $rating);
	}
}
