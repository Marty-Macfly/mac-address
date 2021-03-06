<?php

namespace Mac\Provider;

class Ifconfig implements ProviderInterface
{
	private static $cmd = 'ifconfig';

  public static function isAvailable()
  {
		if(strtoupper(substr(PHP_OS, 0, 3)) === 'LIN')
		{
			exec(escapeshellcmd(sprintf("which %s", self::$cmd)), $output, $return);
			return $return == 0;
		}
		return false;
  }

	public static function getMac()
  {
		exec(escapeshellcmd(sprintf("%s", self::$cmd)), $output, $return);

		if($return == 0)
		{
			$list	= [];
			$eth 	= null;

			foreach($output as $line)
			{
				# Get Interface name
				if(preg_match('/^(\w+):/i', $line, $m) == 1)
				{
					$eth = $m[1];
				}
				# Get only physical interface
				if(preg_match('/^\s+ether\s+([0-9A-F]+:[0-9A-F]+:[0-9A-F]+:[0-9A-F]+:[0-9A-F]+:[0-9A-F]+)\s+/i', $line, $m) == 1)
				{
					$list[$eth]	= $m[1];
					$eth				= null;
				}
			}
			return $list;
		}
		return false;
	}
}
