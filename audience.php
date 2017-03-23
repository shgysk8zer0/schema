<?php

namespace shgysk8zer0\Schema;

class Audience extends Thing
{
	const ITEMTYPE = 'Audience';

	final public function setAudienceType(String $type)
	{
		$this->_set('audienceType', $type);
	}

	final public function setGeographicArea(AdministrativeArea $area)
	{
		$this->_set('geographicArea', $area);
	}
}
