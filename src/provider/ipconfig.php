<?php

namespace macaddress\provider;

class Ipconfig implements ProviderInterface
{
  private static $cmd = 'ipconfig';

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
    exec(escapeshellcmd(sprintf("%s /all", self::$cmd)), $output, $return);

    if($return == 0)
    {
			$list = [];
			$eth = null;

			foreach($output as $line)
			{
				# Get Interface name
				if(preg_match('/^([^\s]+.+\s+[^:]+):/i', $line, $m) == 1)
				{
					$eth = trim(str_ireplace(['Carte Ethernet', 'Ethernet adapter'], '', $m[1]));
				}
				# Get only ethernet interface
				if(preg_match('/^\s+[^:]+:\s+([0-9A-F]+-[0-9A-F]+-[0-9A-F]+-[0-9A-F]+-[0-9A-F]+-[0-9A-F]+)$/i', $line, $m) == 1)
				{
					$list[$eth]	= strtolower(str_replace('-', ':', $m[1]));
					$eth        = null;
				}
			}
      return $list;
    }
    return false;
  }
}

