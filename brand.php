<?php

namespace shgysk8zer0\Schema;

class Brand extends Organization
{
	use Traits\Data;

	const ITEMTYPE = 'Brand';

	const ITEMPROPS = [
		'aggregateRating',
		'logo',
		'review',
	];

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
		return $this->_addAll($reviews);
	}

	final public function addReview(Review $review): self
	{
		return $this->_add('review', $review);
	}

	final public function calculateAverageRating(): Int
	{
		$reviews = array_filter($this->reviews ?? [], [$this, '_filterHasRating']);

	}

	final protected function _filterHasRating(Review  $review): Bool
	{
		return isset($review->rating) and isset($review->rating->ratingValue);
	}
}
