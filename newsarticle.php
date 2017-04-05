<?php

namespace shgysk8zer0\Schema;

class NewsArticle extends Article
{
	const ITEMTYPE = 'NewsArticle';

	final public function setDateline(String $loc): self
	{
		return $this->_set('dateline', $loc);
	}

	final public function setPrintColumn(String $col): self
	{
		return $this->_set('printColumn', $col);
	}

	final public function setPrintEdition(String $edition): self
	{
		return $this->_set('printEdition', $edition);
	}

	final public function setPrintPage(String $page): self
	{
		return $this->_set('printPage', $page);
	}

	final public function setPrintSection(String $section): self
	{
		return $this->_set('printSection', $section);
	}
}
