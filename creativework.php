<?php

namespace shgysk8zer0\Schema;

class CreativeWork extends Thing
{
	const ITEMTYPE = 'CreativeWork';

	final public function setAbout(Thing $thing)
	{
		$this->_set('about', $thing);
	}

	final public function setAuthor(Thing $author)
	{
		if ($author instanceof Person or $author instanceof Organization) {
			$this->_set('author', $author);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				get_calss($thing)
			));
		}
	}
}
