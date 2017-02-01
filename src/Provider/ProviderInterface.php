<?php

namespace Mac\Provider;

interface ProviderInterface
{
	public static function isAvailable();
	
	public static function getMac();
}
