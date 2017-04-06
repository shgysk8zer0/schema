<?php

namespace shgysk8zer0\Schema;

use \shgysk8zer0\Core\{Console};

set_include_path(dirname(__DIR__, 2));
spl_autoload_register('spl_autoload');
header('Content-Type: application/json');
// $me = new Person;
// $me->givenName = 'Chris';
// $me->familyName = 'Zuber';
// $me->name = "{$me->givenName} {$me->familyName}";
// $me->description = "{$me->name}: Description";
//
// print_r($me);
// exit;
// exit(json_encode($me, JSON_PRETTY_PRINT));

$chris     = new Person;
$addr      = new PostalAddress;
$work      = new ContactPoint;
$home      = new ContactPoint;
$org       = new Organization;
$work_addr = new PostalAddress;
$logo      = new ImageObject;
$pic       = new ImageObject;

$addr->streetAddress = '2825 Steensen Street #C';
$addr->locality      = 'Lake Isabella';
$addr->region        = 'CA';
$addr->postalCode    = 93240;

$work->contactOption = (new ContactPointOption)->setName('Work');
$work->contactType   = 'person';
$work->telephone     = '+1-760-379-3667,14';
$work->email         = 'czuber@kvsun.com';

$home->contactOption = (new ContactPointOption)->setName('Home');
$home->contactType   = 'person';
$home->telephone     = '+1-661-619-6712';
$home->email         = 'shgysk8zer0@gmail.com';

$work_addr->streetAddress       = '6416 Lake Isabella Blvd.';
$work_addr->postOfficeBoxNumber = 'P.O. Box 3074';
$work_addr->locality            = 'Lake Isabella';
$work_addr->region              = 'CA';
$work_addr->postalCode          = 93240;

foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day) {
	$hours            = new OpeningHoursSpecification();
	$hours->dayOfWeek = $day;
	$hours->opens     = '07:30';
	$hours->closes    = '16:30';
	$work_addr->addHoursAvailable($hours);
}

$pic->url            = 'https://www.gravatar.com/avatar/43578597e449298f5488c2407c8a8ae5?s=256';
$pic->height         = 256;
$pic->width          = 256;
$pic->encodingFormat = 'image/jpeg';

$logo->url            = 'https://kernvalleysun.com/images/sun-icons/256.png';
$logo->height         = 256;
$logo->width          = 256;
$logo->encodingFormat = 'image/png';

$org->name      = 'Kern Valley Sun';
$org->telephone = '+1-760-379-3667';
$org->faxNumber = '+1-760-379-4343';
$org->url       = 'https://kernvalelysun.com';
$org->address   = $work_addr;
$org->logo      = $logo;

$chris->givenName      = 'Chris';
$chris->additionalName = 'Wayne';
$chris->familyName     = 'Zuber';
$chris->jobTitle       = 'Editor';
$chris->url            = 'https://chriszuber.com';
$chris->address        = $addr;
$chris->worksFor       = $org;
$chris->image          = $pic;
$chris->setContactPoints($home, $work);

// print_r($chris);
exit(json_encode($chris, JSON_PRETTY_PRINT) . PHP_EOL);
