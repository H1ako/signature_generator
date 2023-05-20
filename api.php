<?php
require_once __DIR__.'/settings.php';
require_once __DIR__.'/admin-settings.php';
require_once __DIR__.'/router.php';

get('/api/get-signatures', function () {
  if (!array_key_exists('first-name', $_GET) || !array_key_exists('first-name', $_GET)) return false;
  
  $firstName = ucfirst($_GET['first-name']);
  $lastName = ucfirst($_GET['last-name']);
  $middleName = isset($_GET['middle-name']) ? ucfirst($_GET['middle-name']) : '';
  $randomIndex = isset($_GET['random-index']) && $_GET['random-index'] != null ? intval($_GET['random-index']) : random_int(1, 9999);
  $page = $_GET['page'] ?? 1;
  $signaturesPerPage = 1;
  include('script.php');
  
  $dataFile = 'data.json';
  
  try {
    $contents = file_get_contents($dataFile);
  } catch (Error $e) {}
  
  $data = isset($contents) ? json_decode($contents, true) : ["numberOfGeneratedSignatures" => 0];
  
  isset($data['numberOfGeneratedSignatures']) ? $data['numberOfGeneratedSignatures'] = $data['numberOfGeneratedSignatures'] + $signaturesPerPage : $data['numberOfGeneratedSignatures'] = 0;
  
  $json = json_encode($data);
  file_put_contents($dataFile, $json);
  
  $images = [];
  for ($i=($page - 1) * $signaturesPerPage; $i < $page * $signaturesPerPage; $i++) {
    $image = getImageFromStyle($i);
    $imageLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    $image->setImageFormat('jpg');
    $imageJpgLink = 'data:image/'.$image->getImageFormat().';base64,'.base64_encode($image->getimageblob());
    $images = [...$images, [
      'png' => $imageLink,
      'jpg' => $imageJpgLink
    ]];
    $image->destroy();
  }
  $data = [
    'signatures' => $images,
    'randomIndex' => $randomIndex,
  ];

  print_r(json_encode($data));

  return false;
});

put('/api/increase-installations-number', function() {
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

post('/api/admin/update-text', function() {
  $data = file_get_contents('php://input');
  $newData = isset($data) ? $data : [];
  $dataFile = 'big-descriptions.json';
  
  file_put_contents($dataFile, $newData);

  return false;
});