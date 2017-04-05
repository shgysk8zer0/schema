<?php

namespace shgysk8zer0\Schema;

class SoftwareApplication extends CreativeWork
{

	final public function setApplicationCategory(String $category): self
	{
		return $this->_set('applicationCategory', $category);
	}

	final public function setApplicationSubCategory(String $sub_category): self
	{
		return $this->_set('applicationSubCategory', $sub_category);
	}

	final public function setApplicationSuite(String $suite): self
	{
		return $this->_set('applicationSuite', $suite);
	}

	final public function setAvailableOnDevices(String ...$devices): self
	{
		foreach ($devices as $device) {
			$this->addAvailableOnDevice($device);
		}

		return $this;
	}

	final public function addAvailableOnDevice(String $device): self
	{
		return $this->_add('availableOnDevice', $device);
	}

	final public function setCountriesNotSupported(String ...$countries): self
	{
		foreach ($countries as $country) {
			$this->addCountryNotSupported($country);
		}

		return $this;
	}

	final public function addCountriesNotSupported(String $country): self
	{
		return $this->_add('countriesNotSupported', $country);
	}

	final public function setCountriesSupported(String ...$countries): self
	{
		foreach ($countries as $country) {
			$this->addCountriesSupported($country);
		}

		return $this;
	}

	final public function addCountriesSupported(String $country): self
	{
		return $this->_add('countriesSupported', $country);
	}

	final public function setDownloadUrl(String $url): self
	{
		if (filter_var($url, FILTER_VALIDATE_URL)) {
			return $this->_add('downloadUrl', $url);
		} else {
			throw new \InvalidArgumentException("$url is not a valid URL");
		}
	}
}
