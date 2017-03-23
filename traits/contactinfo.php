<?php

namespace shgysk8zer0\Schema\Traits;

use \shgysk8zer0\Schema\{PostalAddress};

trait ContactInfo
{
	final public function setAddress(PostalAddress $address)
	{
		$this->_set('address', $address);
	}

	final public function setEmail(String $email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->_set('email', $email);
		} else {
			throw new \InvalidArgumentException("$email is not a valid email address");
		}
	}

	final public function setTelephone(String $tel)
	{
		$this->_set('telephone', $tel);
	}

	final public function setFaxNumber(String $fax)
	{
		$this->_set('faxNumber', $fax);
	}

	abstract protected function _set(String $prop, $value);
}
