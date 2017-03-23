<?php

namespace shgysk8zer0\Schema\Traits;

trait Filters
{
	final public static function isEmail(String $email): Bool
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	final public static function isURL(String $url): Bool
	{
		return filter_var($url, FILTER_VALIDATE_URL);
	}
}
