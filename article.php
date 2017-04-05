<?php

namespace shgysk8zer0\Schema;

class Article extends CreativeWork
{
	const ITEMTYPE = 'Article';

	final public function setArticleBody(String $body): self
	{
		return $this->_set('articleBody', $body);
	}

	final public function setArticleSections(String ...$sections): self
	{
		foreach ($sections as $section) {
			$this->addArticleSection($section);
		}
		return $this;
	}

	final public function addArticleSection(String $section): self
	{
		return $this->_add('articleSection', $section);
	}

	final public function setPageEnd($end): self
	{
		$type = gettype($end);
		if (in_array($type, ['string', 'integer'])) {
			$this->_set('pageEnd', $end);
		} else {
			throw new \InvalidArgumentException("Page end must be a string or integer. {$type} given");
		}
	}

	final public function setPageStart($start): self
	{
		$type = gettype($start);
		if (in_array($type, ['string', 'integer'])) {
			$this->_set('pageStart', $start);
		} else {
			throw new \InvalidArgumentException("Page start must be a string or integer. {$type} given");
		}
	}

	final public function setPagination(String $pages): self
	{
		return $this->_set('pagination', $pages);
	}

	final public function setWordCount(Int $words): self
	{
		return $this->_set('wordCount', $words);
	}
}

