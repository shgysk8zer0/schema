<?php

namespace shgysk8zer0\Schema;

class MenuItem extends Intangible
{
	const ITEMTYPE = 'MenuItem';

	final public function setNutrition(NutritionInformation $nutrition): self
	{
		return $this->_set('nutrition', $nutrition);
	}

	final public function setOffers(Offer ...$offers): self
	{
		foreach ($offers as $offer) {
			$this->addOffer($offer);
		}

		return $this;
	}

	final public function addOffers(offer $offer): self
	{
		return $this->_add('offers', $offer);
	}

	final public function setSuitableDietFor(RestrictedDiet $diet): self
	{
		return $this->_set('suitableDietFor', $diet);
	}
}
