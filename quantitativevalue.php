<?php

namespace shgysk8zer0\Schema;

class QuantitativeValue extends Thing
{
	use Traits\Data;
	use Traits\Value;

	const ITEMTYPE = 'QuantitativeValue';

	const ITEMPROPS = [
		'additionalProperty',
		'maxValue',
		'minValue',
		'unitCode',
		'unitText',
		'value',
		'valueReference',
	];

	final public function addAdditionalProperty(PropoertyValue $prop): self
	{
		return $this->_add('additionalProperty', $prop);
	}
}
