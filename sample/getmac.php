<?php

require __DIR__ . '/../src/macaddress.php';
require __DIR__ . '/../src/provider/providerinterface.php';
require __DIR__ . '/../src/provider/getmac.php';
require __DIR__ . '/../src/provider/ipconfig.php';
require __DIR__ . '/../src/provider/ifconfig.php';
require __DIR__ . '/../src/provider/ip.php';

print_r(macaddress\MacAddress::get());


