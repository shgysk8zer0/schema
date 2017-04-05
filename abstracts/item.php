<?php

namespace shgysk8zer0\Schema\Abstracts;

abstract class Item implements \JsonSerializable
{
	use \shgysk8zer0\Schema\Traits\Filters;
	const SCHEMA = 'http://schema.org';

	private $_data = [];

	final public function jsonSerialize(): Array
	{
		return $this->getArrayCopy();
	}

	final public function __debugInfo(): Array
	{
		return $this->_data;
	}

	final public function setDOMData(\DOMElement $el, $item = 0, $xpath = null): \DOMElement
	{
		$dom = $el->ownerDocument;
		$xpath = $xpath ?? new \DOMXPath($dom);
		if ($container = $this->_getItemContainer($xpath, $el, $this::SCHEMA . '/' . $this::ITEMTYPE, $item)) {
			foreach ($this->_data as $prop => $value) {
				if ($nodes = $xpath->query(".//*[@itemprop=\"{$prop}\"]", $container)) {
					if ($nodes instanceof \DOMNodeList and $node = $nodes->item(0)) {
						if ($value instanceof self and $node->hasAttribute('itemtype')) {
							$value->setDOMData($node, 0, $xpath);
						} elseif ($prop === 'url' and $node->hasAttribute('src')) {
							$node->setAttribute('src', $value);
						} elseif ($prop === 'url' and $node->hasAttribute('href')) {
							$node->setAttribute('href', $value);
						} elseif ($node->hasAttribute('content')) {
							$node->setAttribute('content', $value);
						} else {
							$this->_insertHTML($node, $value);
						}
					}
				}
			}
		}

		return $el;
	}

	final private function _getItemContainer(\DOMXpath $xpath, \DOMElement $node, String $itemtype, Int $item = 0)
	{
		if ($node->hasAttribute('itemtype') and $node->getAttribute('itemtype') === $itemtype) {
			return $node;
		} elseif ($nodes = $xpath->query(".//*[@itemtype=\"{$itemtype}\"]", $node)) {
			if ($nodes instanceof \DOMNodeList and $nodes->length > $item) {
				return $nodes->item($item);
			}
		}
	}

	final private function _insertHTML(\DOMElement $el, String $content): \DOMElement
	{
		$tmp = new \DOMDocument();
		$dom = $el->ownerDocument;
		$hash = sha1($content);
		$tmp->loadHTML("<div id=\"{$hash}\">$content</div>");
		$container = $tmp->getElementById($hash);
		foreach ($container->childNodes as $node) {
			$el->appendChild($dom->importNode($node, true));
		}
		return $el;
	}

	final protected function _set(String $prop, $value): \shgysk8zer0\Schema\Thing
	{
		$this->_data[$prop] = $value;
		return $this;
	}

	final public function __get(String $prop)
	{
		return $this->_data[$prop] ?? null;
	}

	final protected function _add(String $prop, $value): \shgysk8zer0\Schema\Thing
	{
		if (! array_key_exists($prop, $this->_data)) {
			$this->_data[$prop] = [$value];
		} elseif (! is_array($this->_data[$prop])) {
			$this->_data[$prop] = [$this->_data[$prop]];
			$this->_data[$prop][] = $value;
		} else {
			$this->_data[$prop][] = $value;
		}
		return $this;
	}

	final protected function _addAll(String $prop, Array $values)
	{
		foreach ($values as $value) {
			return $this->_add($prop, $value);
		}
	}

	final public function __isset(String $prop): Bool
	{
		return array_key_exists($this->_data[$prop]);
	}

	final public function __unset(String $prop)
	{
		unset($this->_data[$prop]);
	}

	final public function getSchemaURL(): String
	{
		return $this::SCHEMA . '/' . $this::ITEMTYPE;
	}

	final public function getArrayCopy()
	{
		$data = [
			'@context' => $this::SCHEMA,
			'@type'    => $this::ITEMTYPE
		];

		foreach ($this->_data as $prop => $value) {
			if ($value instanceof self) {
				$data[$prop] = $value->getArrayCopy();
			} elseif(is_array($value)) {
				$data[$prop] = [];
				foreach ($value as $item) {
					$data[$prop][] = $item instanceof self
						? $item->getArrayCopy()
						: $item;
				}
			} else {
				$data[$prop] = $value;
			}
		}
		return $data;
	}

}
