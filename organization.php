<?php

namespace shgysk8zer0\Schema;

class Organization extends Thing
{
	use Traits\ContactInfo;

	const ITEMTYPE = 'Organization';

	final public function setContactPoint(ContactPoint $point)
	{
		$this->_set('contactPoint', $point);
	}

	final public function setEmployees(Person ...$employees)
	{
		foreach ($employees as $employee) {
			$this->addEmployee($employee);
		}
	}

	final public function addEmployee(Person $employee)
	{
		$this->_add('employees', $employee);
	}

	final public function setParentOrganization(Organization $org)
	{
		$this->_set('parentOrganization', $org);
	}

	final public function setLegalName(String $name)
	{
		$this->_set('legalName', $name);
	}

	final public function setLogo(ImageObject $logo)
	{
		$this->_set('logo', $logo);
	}
}
