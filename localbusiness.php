<?php

namespace shgysk8zer0\Schema;

class LocalBusiness extends Organization
{
	use Traits\Data;

	const ITEMTYPE = 'LocalBusiness';

	const ITEMPROPS = [
		'currenciesAccepted',
		'openingHours',
		'paymentAccepted',
		'priceRange',
	];

	final public function setCurrenciesAccepted(String $currencies): self
	{
		return $this->_set('currenciesAccepted', $currencies);
	}

	final public function setOpeningHours(String $hours): self
	{
		return $this->_set('openingHours', $hours);
	}

	final public function setPaymentAccepted(String $payment): self
	{
		return $this->_set('paymentAccepted', $payment);
	}

	final public function setPriceRange(String $range): self
	{
		return $this->_set('priceRange', $range);
	}
}
