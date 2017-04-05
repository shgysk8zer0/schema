<?php

namespace shgysk8zer0\Schema;

class ListItem extends Intangible
{
	const ITEMTYPE = 'ListItem';

	final public function setItem(Thing $item): self
	{
		return $this->_set('item', $item);
	}

	final public function setNextItem(self $next): self
	{
		return $this->_set('nextItem', $next);
	}

	final public function setPosition(Int $position): self
	{
		return $this->_set('position', $position);
	}

	final public function setPreviousItem(self $prev): self
	{
		return $this->_set('previousItem', $prev);
	}
}
