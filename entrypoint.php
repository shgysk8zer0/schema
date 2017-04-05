<?php

namespace shgysk8zer0\Schema;

/**
 * @todo Customize constructor and JSON ooutput according to https://schema.org/EntryPoint
 * @todo finish creating methods to set properties
 */
class EntryPoint extends Intangible
{
	final public function setActionApplication(SoftwareApplication $app): self
	{
		return $this->_set('actionApplication', $app);
	}

	final public function setActionPlatform(String $platform): self
	{
		return $this->_set('actionPlatform', $platform);
	}

	final public function setContentType(String $content_type): self
	{
		return $this->_set('contentType', $content_type);
	}

	final public function setEncodingType(String $encoding_type): self
	{
		return $this->_set('encodingType', $encoding_type);
	}

	final public function setHttpMethod(String $method): self
	{
		return $this->_set('httpMethod', strtoupper($method));
	}

	final public function setUrlTemplate(String $template): self
	{
		return $this->_set('urlTemplate', $template);
	}
}
