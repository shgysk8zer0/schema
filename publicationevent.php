<?php

namespace shgysk8zer0\Schema;

class PublicationEvent extends Event
{
	const ITEMPROP = 'PublicationEvent';

	final public function setIsAccessibleForFree(Bool $free): self
	{
		return $this->_set('isAccessibleForFree', $free);
	}

	final public function setPublishedOn(BroadcastService $published): self
	{
		return $this->_set('publishedOn', $published);
	}
}
