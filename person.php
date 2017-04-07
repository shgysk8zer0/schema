<?php

namespace shgysk8zer0\Schema;

class Person extends Thing
{
	use Traits\Data;
	use Traits\ContactInfo;

	const ITEMTYPE = 'Person';

	const ITEMPROPS = [
		'givenName',
		'additionalName',
		'familyName',
		'affiliation',
		'worksFor',
		'jobTitle',
		'birthDate',
		'children',
		'parent',
		'contactPoint',
		'homeLocation',
		'address',
		'email',
		'telephone',
		'faxNumber',
	];

	final public function setFullName(String $first, String $middle, String $last): self
	{
		$this->setGivenName($first);
		$this->setAdditionalName($middle);
		$this->setFamilyName($last);
		return $this;
	}

	final public function setGivenName(String $name): self
	{
		return $this->_set('givenName', $name);
	}

	final public function setAdditionalName(String $name): self
	{
		return $this->_set('additionalName', $name);
	}

	final public function setFamilyName(String $name): self
	{
		return $this->_set('familyName', $name);
	}

	final public function setAffiliation(Organization $org): self
	{
		return $this->_set('affiliation', $org);
	}

	final public function setWorksFor(Organization $org): self
	{
		return $this->_set('worksFor', $org);
	}

	final public function setJobTitle(String $title): self
	{
		return $this->_set('jobTitle', $title);
	}

	final public function setBirthDate(\DateTime $date): self
	{
		return $this->_set('birthDate', $date->format('Y-m-d'));
	}

	final public function setChildren(Person ...$children): self
	{
		return $this->_set('children', $children);
	}

	final public function setParent(Person $parent): self
	{
		return $this->_set('parent', $parent);
	}

	final public function setContactPoints(ContactPoint ...$contacts): self
	{
		return $this->_addAll('contactPoint', $contacts);
	}

	final public function addContactPoint(ContactPoint $contact): self
	{
		return $this->_add('contactPoint', $contact);
	}

	final public function setHomeLocation(Thing $loc): self
	{
		if ($loc instanceof Place or $loc instanceof ContactPoint) {
			return $this->_set('homeLocation', $loc);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'homeLocation must be an instanceof Place or ContactPoint. Instance of %s given',
				get_class($loc)
			));
		}
	}
}
