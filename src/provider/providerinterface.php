<?php

namespace macaddress\provider;

interface ProviderInterface
{
	public static function isAvailable();
	
	public static function getMac();
}
