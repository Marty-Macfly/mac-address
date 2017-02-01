<?php

namespace macaddress;

class MacAddress
{
	private static $address 	= null;
	private static $providers	= [
															'\macaddress\provider\Getmac',
															'\macaddress\provider\Ipconfig',
															'\macaddress\provider\Ifconfig',
															'\macaddress\provider\Ip',
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
