<?php

namespace shgysk8zer0\Schema\Traits;

trait Data
{
	protected $_data = [];

	protected function _set(String $prop, $value): \shgysk8zer0\Schema\Thing
	{
		if (! array_key_exists(self::ITEMTYPE, $this->_data)) {
			$this->_data[self::ITEMTYPE] = [];
		}
		if (in_array($prop, self::ITEMPROPS)) {
			$this->_data[self::ITEMTYPE][$prop] = $value;
			return $this;
		} elseif (! empty(class_parents(__CLASS__))) {
			return parent::_set($prop, $value);
		} else {
			throw new \InvalidArgumentException("Invalid property: {$prop}");
		}
	}

	protected function _add(String $prop, $value): \shgysk8zer0\Schema\Thing
	{
		if (! array_key_exists(self::ITEMTYPE, $this->_data)) {
			$this->_data[self::ITEMTYPE] = [];
		}
		if (! array_key_exists($prop, $this->_data[self::ITEMTYPE])) {
			$this->_data[self::ITEMTYPE][$prop] = [$value];
		} elseif (! is_array($this->_data[self::ITEMTYPE][$prop])) {
			$this->_data[self::ITEMTYPE][$prop] = [$this->_data[self::ITEMTYPE][$prop]];
			$this->_data[self::ITEMTYPE][$prop][] = $value;
		} else {
			$this->_data[self::ITEMTYPE][$prop][] = $value;
		}
		return $this;
	}

	public function __get(String $prop)
	{
		return $this->_data[self::ITEMTYPE][$prop] ?? parent::__get($prop);
	}

	public function __set(String $prop, $value)
	{
		$prop = ucfirst($prop);
		if (method_exists($this, "add{$prop}")) {
			call_user_func([$this, "add{$prop}"], $value);
		} elseif (method_exists($this, "set{$prop}")) {
			call_user_func([$this, "set{$prop}"], $value);
		} elseif (method_exists($this, "set{$prop}s")) {
			call_user_func([$this, "set{$prop}s"], $value);
		} else {
			throw new \Exception("Attempting to set invalid property: '{$prop}'");
		}
	}

	protected function _addAll(String $prop, Array $values)
	{
		foreach ($values as $value) {
			$this->_add($prop, $value);
		}
		return $this;
	}

	public function __isset(String $prop): Bool
	{
		if (array_key_exists($prop, $this->_data[self::ITEMTYPE])) {
			return true;
		} elseif (! empty(class_parents(__CLASS__))) {
			return parent::__isset($prop);
		} else {
			return false;
		}
	}

	public function __unset(String $prop)
	{
		unset($this->_data[self::ITEMTYPE][$prop]);
	}

	public function __debugInfo(): Array
	{
		return $this->_data;
	}

	public function jsonSerialize(): Array
	{
		return $this->getArrayCopy();
	}

	public function getSchemaURL(): String
	{
		return $this::SCHEMA . '/' . $this::ITEMTYPE;
	}

	public function getArrayCopy(): Array
	{
		$data = [
			'@context' => $this::SCHEMA,
			'@type'    => $this::ITEMTYPE
		];

		foreach (array_keys($this->_data) as $key) {
			foreach ($this->_data[$key] as $prop => $value) {
				if ($value instanceof Thing) {
					$data[$prop] = $value->getArrayCopy();
				} elseif(is_array($value)) {
					$data[$prop] = [];
					foreach ($value as $item) {
						$data[$prop][] = $item instanceof Thing
						? $item->getArrayCopy()
						: $item;
					}
				} else {
					$data[$prop] = $value;
				}
			}
		}

		return $data;
	}
}
