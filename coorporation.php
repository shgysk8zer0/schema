<?php

namespace shgysk8zer0\Schema;

class Coorporation extends Organization
{
	use Traits\Data;

	const ITEMTYPE = 'Coorporation';

	const ITEMPROPS = [
		'tickerSymbol',
	];

	final public function setTickerSymbol(String $symbol)
	{
		$this->_set('tickerSymbol', $symbol);
	}
}
