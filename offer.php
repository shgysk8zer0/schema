<?php

namespace shgysk8zer0\Schema;

class Offer extends Thing
{
	const ITEMTYPE = 'Offer';

	final public function setPrice(Float $price): self
	{
		return $this->_set('price', round($price, 2));
	}

	final public function setPriceCurrency(String $currency): self
	{
		return $this->_set('priceCurrency', $currency);
	}
}
