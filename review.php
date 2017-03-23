<?php

namespace shgysk8zer0\Schema;

class Review extends CreativeWork
{
	const ITEMTYPE = 'Review';

	final public function setItemReviewed(Thing $item)
	{
		$this->_set('itemReviewed', $item);
	}

	final public function setReviewBody(String $review)
	{
		$this->_set('reviewBody', $review);
	}

	final public function setReviewRating(Rating $rating)
	{
		$this->_set('reviewRating', $rating);
	}
}
