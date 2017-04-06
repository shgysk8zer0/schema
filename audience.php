<?php

namespace shgysk8zer0\Schema;

class Audience extends Thing
{
	use Traits\Data;

	const ITEMTYPE = 'Audience';

	const ITEMPROPS = [
		'audienceType',
		'geographicArea',
	];

	final public function setAudienceType(String $type): self
	{
		return $this->_set('audienceType', $type);
	}

	final public function setGeographicArea(AdministrativeArea $area): self
	{
		return $this->_set('geographicArea', $area);
	}
}
