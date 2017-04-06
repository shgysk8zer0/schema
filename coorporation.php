<?php

namespace shgysk8zer0\Schema;

class Coorporation extends Organization
{
	const ITEMTYPE = 'Coorporation';

	final public function setTickerSymbol(String $symbol)
	{
		$this->_set('tickerSymbol', $symbol);
	}
}
