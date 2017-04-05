<?php

namespace shgysk8zer0\Schema;

class PostalAddress extends ContactPoint
{
	const ITEMTYPE = 'PostalAddress';

	final public function setStreetAddress(String $addr): self
	{
		return $this->_set('streetAddress', $addr);
	}

	final public function setPostOfficeBoxNumber(String $po_box): self
	{
		return $this->_set('postOfficeBoxNumber', $po_box);
	}

	final public function setLocality(String $locality): self
	{
		return $this->_set('addressLocality', $locality);
	}

	final public function setCountry(String $country): self
	{
		return $this->_set('addressCountry', $country);
	}

	final public function setRegion(String $region): self
	{
		return $this->_set('addressRegion', $region);
	}

	final public function setPostalCode(Int $code): self
	{
		return $this->_set('postalCode', $code);
	}
}
