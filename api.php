<?php

require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';
require_once __DIR__.'/libs/translate.php';

global $SITE_URL, $LOCALES;

$translatedData = null;

$currentLocale = $LOCALES['en'];
$currentLocaleShortCode = $currentLocale['short_code'];

setTranslationStream($currentLocaleShortCode);

function notFound() {
  http_response_code(404);

  include_once('views/404.php');
  exit;
}

get('/signature_generator_prod/api/get-signatures', function () use ($SITE_URL) {
  if (!array_key_exists('first-name', $_GET) || !array_key_exists('last-name', $_GET)) return false;
  
  $firstName = ucfirst($_GET['first-name']);
  $lastName = ucfirst($_GET['last-name']);
  $middleName = isset($_GET['middle-name']) ? ucfirst($_GET['middle-name']) : '';
  $randomIndex = isset($_GET['random-index']) && $_GET['random-index'] != null ? intval($_GET['random-index']) : random_int(1, 9999);
  $page = $_GET['page'] ?? 1;
  $signaturesPerPage = 6;
  include('script.php');
  
  $images = [];
  for ($i=($page - 1) * $signaturesPerPage; $i < $page * $signaturesPerPage; $i++) {
    $image = getImageFromStyle($i);
    if (!$image) break;
    
    // $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    // $image->setImageFormat('jpg');
    // $imageJpgLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());

    $fullName = $middleName ? "$lastName $firstName" : "$lastName $firstName $middleName";
    $textToEncode = "$i $randomIndex $fullName";
    $encodedText = encodeTextForUrl($textToEncode);
    $shareLink = "$SITE_URL/signature-preview/$encodedText";

    array_push($images, [
      'image' => $image,
      'png' => '',
      'jpg' => '',
      // 'png' => $imageLink,
      // 'jpg' => $imageJpgLink,
      'shareLink' => $shareLink
    ]);

    // $image->clear();
    // $image->destroy();
  }
  $data = [
    'signatures' => $images,
    'randomIndex' => $randomIndex,
  ];

  print_r(json_encode($data));

  return false;
});

function encodeTextForUrl($text) {
  $encoded = base64_encode($text);
  $urlEncoded = str_replace(array('+', '/', '='), array('-', '_', ''), $encoded);

  return $urlEncoded;
}

put('/signature_generator_prod/api/increase-installations-number', function() {
  $dataFile = 'data.json';

  try {
    $contents = file_get_contents($dataFile);
  } catch (Error $e) {}

  $data = isset($contents) ? json_decode($contents, true) : ["numberOfInstallations" => 0];
  
  isset($data['numberOfInstallations']) ? $data['numberOfInstallations']++ : $data['numberOfInstallations'] = 0;
  
  $json = json_encode($data);
  file_put_contents($dataFile, $json);

  return false;
});

put('/signature_generator_prod/api/increase-generations-number', function() {
  $dataFile = 'data.json';

  try {
    $contents = file_get_contents($dataFile);
  } catch (Error $e) {}

  $data = isset($contents) ? json_decode($contents, true) : ["numberOfGeneratedSignatures" => 0];
  
  isset($data['numberOfGeneratedSignatures']) ? $data['numberOfGeneratedSignatures']++ : $data['numberOfGeneratedSignatures'] = 0;
  
  $json = json_encode($data);
  file_put_contents($dataFile, $json);

  return false;
});

/*

post('/signature_generator_prod/api/admin/update-text', function() {
  $data = file_get_contents('php://input');
  $newData = isset($data) ? $data : [];
  $dataFile = 'big-descriptions.json';
  
  file_put_contents($dataFile, $newData);

  return false;
});
*/

notFound();