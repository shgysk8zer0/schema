<?php

namespace shgysk8zer0\Schema;

class GeoCoordinates extends Thing
{
	const ITEMTYPE = 'GeoCoordinates';

	final public function setAddress(PostalAddress $address)
	{
		$this->_set('address', $address);
	}

	final public function setElevation(Int $elevation)
	{
		$this->_set('elevation', $elevation);
	}

	final public function setLatitude(Float $latitude)
	{
		$this->_set('latitude' , $latitude);
	}

	final public function setLongitude(Float $longitude)
	{
		$this->_set('longitude', $longitude);
	}

	final public function setPostalCode(Int $code)
	{
		$this->_set('postalCode', $code);
	}

	final public function getGeoURI(): String
	{
		if (isset($this->longitude, $this->latitude)) {
			return "geo:{$this->longitude},{$this->latitude}";
		}
	}
}
