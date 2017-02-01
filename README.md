# mac-address

List ethernet mac address on a system (linux or windows).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist "macfly/mac-address" "*"
```

or add

```
"macfly/mac-address": "*"
```

to the require section of your `composer.json` file.

Usage
------------

```php
<?php
require 'vendor/autoload.php';


print_r(macaddress\MacAddress::get());


```

Output:

```
Array
(
    [docker0] => xx:xx:xx:xx:xx:xx
    [eno1] => xx:xx:xx:xx:xx:xx
    [vboxnet0] => xx:xx:xx:xx:xx:xx
    [virbr0] => xx:xx:xx:xx:xx:xx
    [wlp2s0] => xx:xx:xx:xx:xx:xx
)
```

