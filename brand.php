<?php

namespace shgysk8zer0\Schema;

class Brand extends Organization
{
	const ITEMTYPE = 'Brand';

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setLogo(ImageObject $logo): self
	{
		return $this->_set('logo', $logo);
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
}
