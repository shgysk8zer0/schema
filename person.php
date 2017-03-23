<?php

namespace shgysk8zer0\Schema;

class Person extends Thing
{
	use Traits\ContactInfo;

	const ITEMTYPE = 'Person';

	final public function setFullName(String $first, String $middle, String $last)
	{
		$this->setGivenName($first);
		$this->setAdditionalName($middle);
		$this->setFamilyName($last);
	}

	final public function setGivenName(String $name)
	{
		$this->_set('givenName', $name);
	}

	final public function setAdditionalName(String $name)
	{
		$this->_set('additionalName', $name);
	}

	final public function setFamilyName(String $name)
	{
		$this->_set('familyName', $name);
	}

	final public function setAffiliation(Organization $org)
	{
		$this->_set('affiliation', $org);
	}

	final public function setWorksFor(Organization $org)
	{
		$this->_set('worksFor', $org);
	}

	final public function setJobTitle(String $title)
	{
		$this->_set('jobTitle', $title);
	}

	final public function setBirthDate(\DateTime $date)
	{
		$this->_set('birthDate', $date->format('Y-m-d'));
	}

	final public function setChildren(Person ...$children)
	{
		$this->_set('children', $children);
	}

	final public function setParent(Person $parent)
	{
		$this->_set('parent', $parent);
	}
}
