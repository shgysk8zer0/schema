<?php

namespace shgysk8zer0\Schema;

class PostalAddress extends ContactPoint
{
	const ITEMTYPE = 'PostalAddress';

	final public function setStreetAddress(String $addr)
	{
		$this->_set('streetAddress', $addr);
	}

	final public function setPostOfficeBoxNumber(String $po_box)
	{
		$this->_set('postOfficeBoxNumber', $po_box);
	}

	final public function setLocality(String $locality)
	{
		$this->_set('addressLocality', $locality);
	}

	final public function setCountry(String $country)
	{
		$this->_set('addressCountry', $country);
	}

	final public function setRegion(String $region)
	{
		$this->_set('addressRegion', $region);
	}

	final public function setPostalCode(Int $code)
	{
		$this->_set('postalCode', $code);
	}
}
