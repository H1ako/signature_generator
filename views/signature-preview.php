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
  <meta name="twitter:title" content="<?= $nameTitle ?> - <?= translate('Signature preview page title'); ?>">
  <meta property="og:title" content="<?= $nameTitle ?> - <?= translate('Signature preview page title'); ?>" />
  <title><?= $nameTitle ?> - <?= translate('Signature preview page title'); ?></title>
  <meta name="description" content="<?= $nameTitle ?> - <?= translate('Signature preview meta description'); ?>">
  <meta name="og:description" content="<?= $nameTitle ?> - <?= translate('Signature preview meta description'); ?>">
  <meta name="twitter:description" content="<?= $nameTitle ?> - <?= translate('Signature preview meta description'); ?>">
  <meta itemprop="image" content="<?= $_SERVER['REQUEST_URI'] ?>?image-only">
  <meta name="twitter:image" content="<?= $_SERVER['REQUEST_URI'] ?>?image-only">
  <meta property="og:image" content="<?= $_SERVER['REQUEST_URI'] ?>?image-only"/>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/preview.css">
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__info">
    <h1 class="info__subtitle"><?= translate('Signature Generator'); ?></h1>
    <h2 class="info__title"><?= $nameTitle ?></h2>
  </section>
  <section class="main-content__advertisement">
    <?php include('components/advertisement-1.php'); ?>
  </section>
  <section class="main-content__preview">
    <img src="<?= $image ?>" alt="<?= $nameTitle ?>" class="preview__image">
  </section>
  <a href="/<?= $currentLocaleShortCode === 'en' ? '' : $currentLocaleShortCode ?>" class="more-button" title="<?= translate('Generate more'); ?>"><?= translate('Generate more'); ?></a>
</main>
<?php include_once('components/footer.php'); ?>
</body>
</html>