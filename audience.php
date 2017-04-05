<?php

namespace shgysk8zer0\Schema;

class Audience extends Thing
{
	const ITEMTYPE = 'Audience';

	final public function setAudienceType(String $type): self
	{
		return $this->_set('audienceType', $type);
	}

	final public function setGeographicArea(AdministrativeArea $area): self
	{
		return $this->_set('geographicArea', $area);
	}
}
