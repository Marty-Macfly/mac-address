<?php

namespace Mac;

class Address
{
	private static $address 	= null;
	private static $providers	= [
															'\Mac\Provider\Getmac',
															'\Mac\Provider\Ipconfig',
															'\Mac\Provider\Ifconfig',
															'\Mac\Provider\Ip',
															];

	public static function get($refresh = false)
	{
		if(is_null(self::$address) || $refresh) {
			foreach(self::$providers as $provider)
			{
				if($provider::isAvailable() && ($address = $provider::getMac()) !== false) {
					self::$address = $address;
					break;
				}
			}
		}
		return self::$address;
	}
}
