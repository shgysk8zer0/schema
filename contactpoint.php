<?php

namespace shgysk8zer0\Schema;

class ContactPoint extends Thing
{
	const ITEMTYPE = 'ContactPoint';

	final public function setHoursAvailable(OpeningHoursSpecification ...$hours)
	{
		foreach ($hours as $day) {
			$this->addHoursAvailable($day);
		}
	}

	final public function addHoursAvailable(OpeningHoursSpecification $hours)
	{
		$this->_add('hoursAvailable', $hours);
	}
}
