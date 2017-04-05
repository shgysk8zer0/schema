<?php

namespace shgysk8zer0\Schema;

class Menu extends CreativeWork
{
	const ITEMTYPE = 'Menu';

	final public function setHasMenuItems(MenuItem ...$items): self
	{
		foreach ($items as $item) {
			$this->addHasMenuItem($item);
		}

		return $this;
	}

	final public function addHasMenuItem(MenuItem $item): self
	{
		return $this->_add('hasMenuItem', $item);
	}

	final public function setHasMenuSections(MenuSection ...$sections): self
	{
		foreach ($sections as $sections) {
			$this->addHasMenuSection($sections);
		}

		return $this;
	}

	final public function addHasMenuSection(MenuSection $section): self
	{
		return $this->_add('hasMenuSection', $section);
	}
}
