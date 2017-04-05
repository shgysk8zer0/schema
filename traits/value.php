<?php

namespace shgysk8zer0\Schema\Traits;

trait Value
{
	final public function setMaxValue(Float $max): Thing
	{
		return $this->_set('maxValue', $max);
	}

	final public function setMinValue(Float $min): Thing
	{
		return $this->_set('minValue', $min);
	}

	final public function setUnitCode(String $code): Thing
	{
		return $this->_set('unitCode', $code);
	}

	final public function setUnitText(String $text): Thing
	{
		return $this->_set('unitText', $text);
	}

	final public function setValue($value): Thing
	{
		$type = gettype($value);
		if (in_array(gettype($value), ['string', 'boolean', 'integer', 'double'])) {
			return $this->_set('value', $value);
		} elseif ($value instanceof StructuredValue) {
			return $this->_set('value', $value);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Value can be a StructuredValue, String, Boolean, or Number. %s given',
				$type
			));
		}
	}

	final public function setValueReference(Thing $ref): Thing
	{
		return $this->_set('valueReference', $ref);
	}
}
