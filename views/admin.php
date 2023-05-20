<?php global $SITE_URL;
$dataFile = 'big-descriptions.json';

$contents = null;
try {
  $contents = json_decode(file_get_contents($dataFile), true);
} catch (Error $e) {
  // pass
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/admin.css">
</head>
<body>
  <h1 class="heading">Privacy Policy Editors</h1>
  <div class="privacy-editors">
    <div class="editor">
      <h3 class="editor__heading">en</h3>
      <div id="en-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ru</h3>
      <div id="ru-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ua</h3>
      <div id="ua-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">es</h3>
      <div id="es-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">fr</h3>
      <div id="fr-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pl</h3>
      <div id="pl-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pt</h3>
      <div id="pt-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">vi</h3>
      <div id="vi-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">tr</h3>
      <div id="tr-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">de</h3>
      <div id="de-privacy-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">it</h3>
      <div id="it-privacy-editor"></div>
    </div>
  </div>
  <h1 class="heading">About Us Editors</h1>
  <div class="about-us-editors">
    <div class="editor">
      <h3 class="editor__heading">en</h3>
      <div id="en-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ru</h3>
      <div id="ru-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">ua</h3>
      <div id="ua-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">es</h3>
      <div id="es-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">fr</h3>
      <div id="fr-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pl</h3>
      <div id="pl-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">pt</h3>
      <div id="pt-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">vi</h3>
      <div id="vi-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">tr</h3>
      <div id="tr-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">de</h3>
      <div id="de-about-us-editor"></div>
    </div>
    <div class="editor">
      <h3 class="editor__heading">it</h3>
      <div id="it-about-us-editor"></div>
    </div>
  </div>
  <button class="save-button">Save Changes</button>
  <script src="<?= $SITE_URL ?>/assets/scripts/admin.js"></script>
  <script>
    editorAboutUs_en.setData('<?= ($contents && isset($contents['aboutUs_en'])) ? $contents['aboutUs_en'] : '' ?>')
    editorAboutUs_ru.setData('<?= ($contents && isset($contents['aboutUs_ru'])) ? $contents['aboutUs_ru'] : '' ?>')
    editorAboutUs_ua.setData('<?= ($contents && isset($contents['aboutUs_ua'])) ? $contents['aboutUs_ua'] : '' ?>')
    editorAboutUs_es.setData('<?= ($contents && isset($contents['aboutUs_es'])) ? $contents['aboutUs_es'] : '' ?>')
    editorAboutUs_fr.setData('<?= ($contents && isset($contents['aboutUs_fr'])) ? $contents['aboutUs_fr'] : '' ?>')
    editorAboutUs_pl.setData('<?= ($contents && isset($contents['aboutUs_pl'])) ? $contents['aboutUs_pl'] : '' ?>')
    editorAboutUs_pt.setData('<?= ($contents && isset($contents['aboutUs_pt'])) ? $contents['aboutUs_pt'] : '' ?>')
    editorAboutUs_vi.setData('<?= ($contents && isset($contents['aboutUs_vi'])) ? $contents['aboutUs_vi'] : '' ?>')
    editorAboutUs_tr.setData('<?= ($contents && isset($contents['aboutUs_tr'])) ? $contents['aboutUs_tr'] : '' ?>')
    editorAboutUs_de.setData('<?= ($contents && isset($contents['aboutUs_de'])) ? $contents['aboutUs_de'] : '' ?>')
    editorAboutUs_it.setData('<?= ($contents && isset($contents['aboutUs_it'])) ? $contents['aboutUs_it'] : '' ?>')
    editorPrivacy_en.setData('<?= ($contents && isset($contents['privacy_en'])) ? $contents['privacy_en'] : '' ?>')
    editorPrivacy_ru.setData('<?= ($contents && isset($contents['privacy_ru'])) ? $contents['privacy_ru'] : '' ?>')
    editorPrivacy_ua.setData('<?= ($contents && isset($contents['privacy_ua'])) ? $contents['privacy_ua'] : '' ?>')
    editorPrivacy_es.setData('<?= ($contents && isset($contents['privacy_es'])) ? $contents['privacy_es'] : '' ?>')
    editorPrivacy_fr.setData('<?= ($contents && isset($contents['privacy_fr'])) ? $contents['privacy_fr'] : '' ?>')
    editorPrivacy_pl.setData('<?= ($contents && isset($contents['privacy_pl'])) ? $contents['privacy_pl'] : '' ?>')
    editorPrivacy_pt.setData('<?= ($contents && isset($contents['privacy_pt'])) ? $contents['privacy_pt'] : '' ?>')
    editorPrivacy_vi.setData('<?= ($contents && isset($contents['privacy_vi'])) ? $contents['privacy_vi'] : '' ?>')
    editorPrivacy_tr.setData('<?= ($contents && isset($contents['privacy_tr'])) ? $contents['privacy_tr'] : '' ?>')
    editorPrivacy_de.setData('<?= ($contents && isset($contents['privacy_de'])) ? $contents['privacy_de'] : '' ?>')
    editorPrivacy_it.setData('<?= ($contents && isset($contents['privacy_it'])) ? $contents['privacy_it'] : '' ?>')
  </script>
</body>
</html>