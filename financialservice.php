<?php

namespace shgysk8zer0\Schema;

class FinancialService extends LocalBusiness
{
	const ITEMTYPE = 'FinancialService';

	final public function setFeesAndCommissionsSpecification(String $spec): self
	{
		return $this->_set('feesAndCommissionsSpecification', $spec);
	}
}
