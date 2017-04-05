<?php

namespace shgysk8zer0\Schema;

class WebPage extends CreativeWork
{
	const ITEMTYPE = 'WebPage';

	final public function setBreadcrumb(BreadcrumbList $list): self
	{
		return $this->_set('breadcrumbList', $list);
	}

	final public function setLastReviewed(\DateTime $date): self
	{
		return $this->_set('lastReviewed', $date->format('Y-m-d'));
	}

	final public function setMainContentOfPage(WebPageElement $element): self
	{
		return $this->_set('mainContentOfPage', $element);
	}

	final public function setPrimaryImageOfPage(ImageObject $image): self
	{
		return $this->_set('primaryImageOfPage', $image);
	}

	final public function setRelatedLinks(String $links): self
	{
		foreach ($links as $link) {
			$this->addRelatedLink($link);
		}

		return $this;
	}

	final public function addRelatedLink(String $link): self
	{
		if (filter_var($link, FILTER_VALIDATE_URL)) {
			return $this->_add('relatedLink', $link);
		} else {
			throw new \InvalidArgumentException("{$link} is not a valid URL");
		}
	}

	final public function setReviewedBy(Thing $reviewer): self
	{
		if ($reviewer instanceof Person or $reviewer instanceof Organization) {
			$this->_set('reviewedBy', $reviewer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'reviewedBy must be an instance of Person or Organization. %s given',
				get_class($reviewer)
			));
		}
	}

	final public function setSignificantLinks(String ...$links): self
	{
		foreach ($links as $link) {
			$this->addSignificantLink($link);
		}

		return $this;
	}

	final public function addSignificantLink(String $link): self
	{
		if (filter_var($link, FILTER_VALIDATE_URL)) {
			return $this->_add('significantLink', $link);
		} else {
			throw new \InvalidArgumentException("{$link} is not a valid URL");
		}
	}

	final public function setSpeciality(Specialty $speciality): self
	{
		return $this->_set('specialty', $specialty);
	}
}
