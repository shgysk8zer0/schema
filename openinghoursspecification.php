<?php

namespace shgysk8zer0\Schema;

class OpeningHoursSpecification extends Thing
{
	const ITEMTYPE = 'OpeningHoursSpecification';

	public function setCloses(String $time)
	{
		$this->_set('closes', $time);
	}

	public function setOpens(String $time)
	{
		$this->_set('opens', $time);
	}

	public function setDayOfWeek(String $day)
	{
		$this->_set('dayOfWeek', $day);
	}

	public function setValidFrom(\DateTime $from)
	{
		$this->_set('validFrom', $from->format(\DateTime::ISO8601));
	}

	public function setValidThrough(\DateTime $to)
	{
		$this->_set('validThrough', $to->format(\DateTime::ISO8601));
	}
}
