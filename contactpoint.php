<?php

namespace shgysk8zer0\Schema;

class ContactPoint extends Thing
{
	use Traits\Data;
	use Traits\ContactInfo;

	const ITEMTYPE = 'ContactPoint';


	final public function setContactType(String $type): self
	{
		return $this->_set('contactType', $type);
	}

	final public function setContactOption(ContactPointOption $opt): self
	{
		return $this->_set('contactOption', $opt);
	}

	final public function setLanguage(Language $lang): self
	{
		return $this->_set('language', $lang);
	}

	final public function setHoursAvailable(OpeningHoursSpecification ...$hours): self
	{
		foreach ($hours as $day) {
			$this->addHoursAvailable($day);
		}
		return $this;
	}

	final public function addHoursAvailable(OpeningHoursSpecification $hours): self
	{
		return $this->_add('hoursAvailable', $hours);
	}
}
