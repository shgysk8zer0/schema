<?php

namespace shgysk8zer0\Schema;

class AggregateRating extends Rating
{
	const ITEMTYPE = 'AggregateRating';

	final public function setItemReviewed(Thing $item)
	{
		$this->_set('itemReviewed', $item);
	}

	final public function setRatingCount(Int $ratings)
	{
		$this->_set('ratingCount', $ratings);
	}

	final public function setReviewCount(Int $reviews)
	{
		$this->_set('reviewCount', $reviews);
	}
}
