<?php

namespace shgysk8zer0\Schema;

class AlignmentObject extends Intangible
{
	const ITEMTYPE = 'AlignmentObject';

	final public function setAlignmentType(String $type): self
	{
		return $this->_set('alignmentType', $type);
	}

	final public function setEducationalFramewrok(String $framework): self
	{
		return $this->_set('educationalFramework', $framework);
	}

	final public function setTargetDescription(String $description): self
	{
		return $this->_set('targetDescription', $description);
	}

	final public function setTargetName(String $name): self
	{
		return $this->_set('targetName', $name);
	}

	final public function setTargetUrl(String $url): self
	{
		if (filter_var($url, FILTER_VALIDATE_URL)) {
			$this->_set('targetUrl', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}
}
