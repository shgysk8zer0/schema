<?php

namespace shgysk8zer0\Schema;

set_include_path(dirname(__DIR__, 2));
spl_autoload_register('spl_autoload');
header('Content-Type: application/json');

$org    = new Organization();
$addr   = new PostalAddress();
$editor = new ContactPoint();
$sales  = new ContactPoint();
$lang   = new Language();

$org->setName('Kern Valley Sun');
$org->setURL('https://kernvalleysun.com');
$org->setTelephone('+1-760-379-3667');

$addr->setStreetAddress('6416 Lake Isabella Blvd.');
$addr->setPostOfficeBoxNumber('P.O. Box 3074');
$addr->setLocality('Lake Isabella');
$addr->setRegion('CA');
$addr->setPostalCode(93240);

$lang->setName('English');
$lang->setAlternateName('en');

$org->setAddress($addr);
unset($addr);

$editor->setContactType('editor');
$editor->setTelephone("{$org->telephone},14");
$editor->setEmail('czuber@kvsun.com');
$editor->setLanguage($lang);

$sales->setContactType('sales');
$sales->setTelephone("{$org->telephone},20");
$sales->setEmail('tamh@kvsun.com');
$sales->setLanguage($lang);
$org->setContactPoints($editor, $sales);

exit(json_encode($org, JSON_PRETTY_PRINT) . PHP_EOL);
