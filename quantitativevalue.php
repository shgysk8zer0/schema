<?php

namespace shgysk8zer0\Schema;

class QuantitativeValue extends Thing
{
	use Traits\Value;
	const ITEMTYPE = 'QuantitativeValue';

	final public function addAdditionalProperty(PropoertyValue $prop): self
	{
		return $this->_add('additionalProperty', $prop);
	}
}
