<?php

namespace shgysk8zer0\Schema;

class Action extends Thing
{
	final public function setActionStatus(ActionStatusType $status): self
	{
		return $this->_set('actionStatus', $status);
	}

	final public function setAgents(Thing... $agents): self
	{
		foreach ($agents as $agent) {
			$this->addAgent($agent);
		}

		return $this;
	}

	final public function addAgent(Thing $agent): self
	{
		if ($agent instanceof Person or $agent instanceof Organization) {
			return $this->_set('agent', $agent);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Agent must be an instance of Person or Organization. Instance of %s given',
				get_class($agent)
			));
		}
	}

	final public function setEndTime(\DateTime $end): self
	{
		return $this->_set('endTime', $end->format(\DateTime::ISO8601));
	}

	final public function setError(Thing $error): self
	{
		return $this->_set('error', $error);
	}

	final public function setInstrument(Thing $instrument): self
	{
		return $this->_set('instrument', $instrument);
	}

	final public function setLocation($loc): self
	{
		if ($loc instanceof PostalAddress or $loc instanceof Place or is_string($loc)) {
			return $this->_set('location', $loc);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Location must be a string, PostalAddress, or Place. %s given',
				is_object($loc) ? get_class($loc) : gettype($loc)
			));
		}
	}

	final public function setObject(Thing $object): self
	{
		return $this->_set('object', $object);
	}

	final public function setParticipants(Thing ...$participants): self
	{
		foreach ($participants as $participant) {
			$this->addParticipant($participant);
		}

		return $this;
	}

	final public function addParticipant(Thing $participant): self
	{
		if ($participant instanceof Person or $participant instanceof Organization) {
			return $this->_add('participant', $participant);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Participant must be a Person or Organization. %s given',
				get_class($loc)
			));
		}
	}

	final public function setResult(Thing $result): self
	{
		return $this->_set('result', $result);
	}

	final public function setStartTime(\DateTime $start): self
	{
		return $this->_set('startTime', $start->format(\DateTime::ISO8601));
	}

	final public function setTarget(EntryPoint $target): self
	{
		return $this->_set('target', $target);
	}
}
