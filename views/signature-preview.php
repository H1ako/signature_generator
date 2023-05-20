<?php global $SITE_URL, $currentLocale, $localeReader, $data;
$currentLocaleShortCode = $currentLocale['short_code'];

$firstName = isset($data['firstName']) ? $data['firstName'] : '';
$lastName = isset($data['lastName']) ? $data['lastName'] : '';
$middleName = isset($data['middleName']) ? $data['middleName'] : '';
$image = isset($data['image']) ? $data['image'] : '';

$nameTitle = "$lastName $firstName $middleName"

?>
<!DOCTYPE html>
<html lang="<?= $currentLocaleShortCode ?? 'en' ?>" itemscope="" itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:title" content="">
  <meta property="og:title" content="" />
  <title><?= $nameTitle ?></title>
  <meta name="description" content="">
  <meta name="og:description" content="">
  <meta name="twitter:description" content="">
  <?php include_once('components/base-head.php'); ?>
  <link rel="preload" as="style" href="<?= $SITE_URL ?>/assets/styles/css/preview.css" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/preview.css"></noscript>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__info">
    <h1 class="info__subtitle"><?= $localeReader->translate('Signature Generator'); ?></h1>
    <h2 class="info__title"><?= $nameTitle ?></h2>
  </section>
  <section class="main-content__preview">
    <img src="<?= $image ?>" alt="<?= $nameTitle ?>" class="preview__image">
  </section>
</main>
<?php include_once('components/footer.php'); ?>
</body>
</html>