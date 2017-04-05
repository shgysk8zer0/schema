<?php

namespace shgysk8zer0\Schema;

class Review extends CreativeWork
{
	const ITEMTYPE = 'Review';

	final public function setItemReviewed(Thing $item): self
	{
		return $this->_set('itemReviewed', $item);
	}

	final public function setReviewBody(String $review): self
	{
		return $this->_set('reviewBody', $review);
	}

	final public function setReviewRating(Rating $rating): self
	{
		return $this->_set('reviewRating', $rating);
	}
}
