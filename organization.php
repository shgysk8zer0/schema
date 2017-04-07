<?php

namespace shgysk8zer0\Schema;

class Organization extends Thing
{
	use Traits\Data;
	use Traits\ContactInfo;

	const ITEMTYPE = 'Organization';

	const ITEMPROPS = [
		'contactPoint',
		'employees',
		'parentOrganization',
		'legalName',
		'logo',
		'address',
		'email',
		'telephone',
		'faxNumber',
		'location',
	];

	final public function setContactPoints(ContactPoint ...$points): self
	{
		foreach ($points as $point) {
			$this->addContactPoint($point);
		}
		return $this;
	}

	final public function addContactPoint(ContactPoint $point): self
	{
		return $this->_add('contactPoint', $point);
	}

	final public function setEmployees(Person ...$employees): self
	{
		foreach ($employees as $employee) {
			$this->addEmployee($employee);
		}
		return $this;
	}

	final public function addEmployee(Person $employee): self
	{
		return $this->_add('employees', $employee);
	}

	final public function setParentOrganization(Organization $org): self
	{
		return $this->_set('parentOrganization', $org);
	}

	final public function setLegalName(String $name): self
	{
		return $this->_set('legalName', $name);
	}

	final public function setLogo(ImageObject $logo): self
	{
		return $this->_set('logo', $logo);
	}

	final public function setLocation(Thing $loc): self
	{
		if ($loc instanceof Place or $loc instanceof ContactPoint) {
			return $this->_set('location', $loc);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'homeLocation must be an instanceof Place or ContactPoint. Instance of %s given',
				get_class($loc)
			));
		}
	}
}
