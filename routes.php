<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';
require_once __DIR__.'/libs/translate.php';

global $LOCALES, $SITE_URL;

$data = null;
$translatedData = null;

$currentLocale = $LOCALES['en'];
$currentLocaleShortCode = $currentLocale['short_code'];

setTranslationStream($currentLocaleShortCode);

function notFoundIfNoLocale($locale) {
  global $LOCALES;

  if (array_key_exists($locale, $LOCALES)) return;

  notFound();
}

function notFound() {
  http_response_code(404);

  include_once('views/404.php');
  exit;
}  

get('/signature_generator_prod/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;
  
  global $currentLocale;
  
  $currentLocale = $LOCALES[$locale];
  $localeShortCode = $currentLocale['short_code'];

  setTranslationStream($localeShortCode);
});

get('/signature_generator_prod/%s/%s/%s', function($locale, $path) use ($LOCALES) {
  if (!(array_key_exists($locale, $LOCALES))) return;
  
  global $currentLocale;
  
  $currentLocale = $LOCALES[$locale];
  $localeShortCode = $currentLocale['short_code'];

  setTranslationStream($localeShortCode);
});

// ##################################################
// ##################################################
// ##################################################

//get('/signature_generator_prod/admin','views/admin.php');
get('/signature_generator_prod/signature-preview/%s', function ($encryptedData) {
  global $data;

  $decryptedData = decodeTextForUrl($encryptedData);
  $splittedDecryptedData = explode(" ", $decryptedData);
  
  $styleIndex = isset($splittedDecryptedData[0]) ? $splittedDecryptedData[0] : null;
  $randomIndex = isset($splittedDecryptedData[1]) ? $splittedDecryptedData[1] : null;
  $firstName = isset($splittedDecryptedData[3]) ? $splittedDecryptedData[3] : null;
  $lastName = isset($splittedDecryptedData[2]) ?  $splittedDecryptedData[2] : null;
  $middleName = isset($splittedDecryptedData[4]) ?  $splittedDecryptedData[4] : '';
  if ($randomIndex === null || $styleIndex === null || $firstName === null || $lastName === null) notFound();

  include('script.php');
  $image = getImageFromStyle($styleIndex, !isset($_GET['image-only']));
  if (!$image) notFound();
  
  $image->setFormat('jpg');

  $imageBlob = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
  
  $data['firstName'] = $firstName;
  $data['lastName'] = $lastName;
  $data['middleName'] = $middleName;
  $data['image'] = $imageBlob;

  if (isset($_GET['image-only'])) {
    header('Content-Type: image/png');
    echo $image;

    return false;
  }

  return 'views/signature-preview.php';
});

function decodeTextForUrl($text) {
  $base64 = str_replace(array('-', '_'), array('+', '/'), $text);
  $decoded = base64_decode($base64);

  return $decoded;
}

get('/signature_generator_prod/%s/signature-preview/%s', function ($locale, $encryptedData) {
  global $data;

  $decryptedData = decodeTextForUrl($encryptedData);
  $splittedDecryptedData = explode(" ", $decryptedData);
  
  $styleIndex = isset($splittedDecryptedData[0]) ? $splittedDecryptedData[0] : null;
  $randomIndex = isset($splittedDecryptedData[1]) ? $splittedDecryptedData[1] : null;
  $firstName = isset($splittedDecryptedData[3]) ? $splittedDecryptedData[3] : null;
  $lastName = isset($splittedDecryptedData[2]) ?  $splittedDecryptedData[2] : null;
  $middleName = isset($splittedDecryptedData[4]) ?  $splittedDecryptedData[4] : '';
  if ($randomIndex === null || $styleIndex === null || $firstName === null || $lastName === null) notFound();

  include('script.php');
  $image = getImageFromStyle($styleIndex, !isset($_GET['image-only']));
  if (!$image) notFound();

  $image->setFormat('jpg');

  $imageBlob = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
  
  $data['firstName'] = $firstName;
  $data['lastName'] = $lastName;
  $data['middleName'] = $middleName;
  $data['image'] = $imageBlob;

  if (isset($_GET['image-only'])) {
    header('Content-Type: image/png');
    echo $image;

    return false;
  }

  return 'views/signature-preview.php';
});

get('/signature_generator_prod', 'views/index.php');
get('/signature_generator_prod/privacy-policy', 'views/privacy-policy.php');

get('/signature_generator_prod/%s', function($locale) {
  notFoundIfNoLocale($locale);

  return 'views/index.php';
});
get('/signature_generator_prod/%s/privacy-policy', function($locale) {
  notFoundIfNoLocale($locale);

  return 'views/privacy-policy.php';
});

// ##################################################
// ##################################################
// ##################################################

notFound();