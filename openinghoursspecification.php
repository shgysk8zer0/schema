<?php

namespace shgysk8zer0\Schema;

class OpeningHoursSpecification extends Thing
{
	const ITEMTYPE = 'OpeningHoursSpecification';

	public function setCloses(String $time): self
	{
		return $this->_set('closes', $time);
	}

	public function setOpens(String $time): self
	{
		return $this->_set('opens', $time);
	}

	public function setDayOfWeek(String $day): self
	{
		return $this->_set('dayOfWeek', $day);
	}

	public function setValidFrom(\DateTime $from): self
	{
		return $this->_set('validFrom', $from->format(\DateTime::ISO8601));
	}

	public function setValidThrough(\DateTime $to): self
	{
		return $this->_set('validThrough', $to->format(\DateTime::ISO8601));
	}
}
