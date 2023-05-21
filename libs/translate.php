<?php
function translate($textIndex) {
  global $translatedData;

  if (!isset($translatedData) || !isset($translatedData[$textIndex])) return $textIndex;

  return $translatedData[$textIndex][1];
}

function setTranslationStream($localeShortCode) {
  global $translatedData;

  $filePath = "./locale/$localeShortCode/LC_MESSAGES/messages.json";
  
  try {
    $translatedData = json_decode(file_get_contents($filePath), true);
  } catch (Error $e) {}
  
  return isset($translatedData);
}