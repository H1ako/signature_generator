<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';
require_once __DIR__.'/libs/streams.php';
require_once __DIR__.'/libs/gettext.php';

global $LOCALES, $SITE_URL;

$data = null;

$currentLocale = $LOCALES['en'];
$currentLocaleShortCode = $currentLocale['short_code'];

$streamer = new FileReader;
$streamer->FileReader(__DIR__.'/locale/en/LC_MESSAGES/messages.mo');
$localeReader = new gettext_reader;
$localeReader->gettext_reader($streamer);

// ##################################################
// ##################################################
// ##################################################

function notFoundIfNoLocale($locale) {
  global $LOCALES;

  if (array_key_exists($locale, $LOCALES)) return;

  include_once('views/404.php');
  exit;
}

get('/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;
  
  global $currentLocale, $localeReader;
  
  $currentLocale = $LOCALES[$locale];
  $localeShortCode = $currentLocale['short_code'];

  $streamer = new FileReader;
  $streamer->FileReader(__DIR__."/locale/$localeShortCode/LC_MESSAGES/messages.mo");
  $localeReader = new gettext_reader;
  $localeReader->gettext_reader($streamer);
});

get('/%s/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;
  
  global $currentLocale, $localeReader;
  
  $currentLocale = $LOCALES[$locale];
  $localeShortCode = $currentLocale['short_code'];

  $streamer = new FileReader;
  $streamer->FileReader(__DIR__."/locale/$localeShortCode/LC_MESSAGES/messages.mo");
  $localeReader = new gettext_reader;
  $localeReader->gettext_reader($streamer);
});

get('/admin','views/admin.php');
get('/signature-preview/%s', function ($randomId) {
  global $data;
  $randomIndex = isset($_GET['random-index']) ? $_GET['random-index'] : null;
  $styleIndex = isset($_GET['style-index']) ? $_GET['style-index'] : null;
  $firstName = isset($_GET['first-name']) ? $_GET['first-name'] : null;
  $lastName = isset($_GET['last-name']) ? $_GET['last-name'] : null;
  $middleName = isset($_GET['middle-name']) ? $_GET['middle-name'] : '';
  if ($randomIndex === null || $styleIndex === null || $firstName === null || $lastName === null) return false;

  include('script.php');
  $image = getImageFromStyle($styleIndex);
  $image->setFormat('jpg');

  $imageBlob = $imageJpgLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
  
  $data['firstName'] = $firstName;
  $data['lastName'] = $lastName;
  $data['middleName'] = $middleName;
  $data['image'] = $imageBlob;

  return 'views/signature-preview.php';
});
get('/%s/signature-preview/%s', function ($locale, $randomId) {
  global $data;
  $randomIndex = isset($_GET['random-index']) ? $_GET['random-index'] : null;
  $styleIndex = isset($_GET['style-index']) ? $_GET['style-index'] : null;
  $firstName = isset($_GET['first-name']) ? $_GET['first-name'] : null;
  $lastName = isset($_GET['last-name']) ? $_GET['last-name'] : null;
  $middleName = isset($_GET['middle-name']) ? $_GET['middle-name'] : '';
  if ($randomIndex === null || $styleIndex === null || $firstName === null || $lastName === null) return false;

  include('script.php');
  $image = getImageFromStyle($styleIndex);
  $image->setFormat('jpg');

  $imageBlob = $imageJpgLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
  
  $data['firstName'] = $firstName;
  $data['lastName'] = $lastName;
  $data['middleName'] = $middleName;
  $data['image'] = $imageBlob;

  return 'views/signature-preview.php';
});

get('', 'views/index.php');
get('/privacy-policy', 'views/privacy-policy.php');

get('/%s', function($locale) {
  notFoundIfNoLocale($locale);

  return 'views/index.php';
});
get('/%s/privacy-policy', function($locale) {
  notFoundIfNoLocale($locale);

  return 'views/privacy-policy.php';
});

// ##################################################
// ##################################################
// ##################################################

include_once('views/404.php');
exit;