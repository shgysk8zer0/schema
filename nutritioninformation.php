<?php

namespace shgysk8zer0\Schema;

class NutritionInformation extends StructuredValue
{
	final public function setCalories(Energy $calories): self
	{
		return $this->_set('calories', $calories);
	}

	final public function setCarbohydrateContent(Mass $value): self
	{
		return $this->_set('carbohydrateContent', $value);
	}

	final public function setCholesterolContent(Mass $value): self
	{
		return $this->_set('cholesterolContent', $value);
	}

	final public function setFatContent(Mass $value): self
	{
		return $this->_set('fatContent', $value);
	}

	final public function setFiberContent(Mass $value): self
	{
		return $this->_set('fiberContent', $value);
	}

	final public function setProteinContent(Mass $value): self
	{
		return $this->_set('proteinContent', $value);
	}

	final public function setSaturatedFatContent(Mass $value): self
	{
		return $this->_set('stauratedFatContent', $value);
	}

	final public function setServingSize(String $value): self
	{
		return $this->_set('servingSize', $value);
	}

	final public function setSodiumContent(Mass $value): self
	{
		return $this->_set('sodiumContent', $value);
	}

	final public function setSugarContent(Mass $value): self
	{
		return $this->_set('sugarContent', $value);
	}

	final public function setTransFatContent(Mass $value): self
	{
		return $this->_set('transFatContent', $value);
	}

	final public function setUnsaturatedContent(Mass $value): self
	{
		return $this->_set('unsaturatedFatContent', $value);
	}
}
