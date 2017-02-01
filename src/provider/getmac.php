<?php

namespace macaddress\provider;

class Getmac implements ProviderInterface
{
	private static $cmd = 'getmac';

	public static function isAvailable()
	{
			if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				exec(escapeshellcmd(sprintf("where %s", self::$cmd)), $output, $return);
				return $return == 0;
			}
			return false;
	}
	
	public static function getMac()
	{
		exec(escapeshellcmd(sprintf("%s /NH /V /FO CSV", self::$cmd)), $output, $return);

		if($return == 0)
		{
      $list = [];
      $eth = null;

			foreach($output as $line)
			{
				list($eth, $type, $mac, $transport) = str_getcsv($line);
				$list[$eth]	= str_replace('-', ':', $mac);
			}
			return $list;
		}
		return false;
	}
}
