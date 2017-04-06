<?php

namespace shgysk8zer0\Schema;

class FinancialService extends LocalBusiness
{
	use Traits\Data;

	const ITEMTYPE = 'FinancialService';

	final public function setFeesAndCommissionsSpecification(String $spec): self
	{
		return $this->_set('feesAndCommissionsSpecification', $spec);
	}
}
