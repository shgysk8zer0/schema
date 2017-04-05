<?php

namespace shgysk8zer0\Schema;

class ItemList extends Intangible
{
	const ITEMTYPE = 'ItemList';

	final public function addItemListElement($el): self
	{
		if (is_string($el) or $el instanceof Thing) {
			return $this->_add('itemListElement', $el);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'List item element must be an instance of String, Thing, or ListItem. Instance of %s given',
				gettype($el)
			));
		}
	}

	final public function setItemListOrder($order): self
	{
		if (is_string($order) or $order instanceof ItemListOrderType) {
			return $this->_set('itemListOrder', $order);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Order must be a string or isntance of ItemListOrderType. %s given',
				gettype($order)
			));
		}
	}

	final public function setNumberOfItems(Int $num): self
	{
		return $this->_set('numberOfItems', $num);
	}
}
