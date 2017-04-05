<?php

namespace shgysk8zer0\Schema;

class Product extends Thing
{
	const ITEMTYPE = 'Product';

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setAudience(Audience $audience): self
	{
		return $this->_set('audience', $audience);
	}

	final public function setAward(String $award): self
	{
		return $this->_set('award', $award);
	}

	final public function setBrand(Organization $brand): self
	{
		return $this->_set('brand', $brand);
	}

	final public function setManufacturer(Organization $manufacturer): self
	{
		return $this->_set('manufacturer', $manufacturer);
	}
}
