<?php global $SITE_URL, $currentLocale, $localeReader, $SITE_NAME;
$localeShortCode = $currentLocale['short_code'];
$dataFile = 'big-descriptions.json';

$contents = null;
try {
  $contents = json_decode(file_get_contents($dataFile), true);
} catch (Error $e) {
  // pass
}
?>
<!DOCTYPE html>
<html lang="<?= $currentLocale['short_code'] ?? 'en' ?>" itemscope="" itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:title" content="<?= $localeReader->translate('Privacy Policy Page Title'); ?>">
  <meta property="og:title" content="<?= $localeReader->translate('Privacy Policy Page Title'); ?>" />
  <meta name="description" content="<?= $localeReader->translate('Privacy Policy Page Meta Description') ?>">
  <meta name="og:description" content="<?= $localeReader->translate('Privacy Policy Page Meta Description') ?>">
  <meta name="twitter:description" content="<?= $localeReader->translate('Privacy Policy Page Meta Description') ?>">
  <title><?= $localeReader->translate('Privacy Policy Page Title'); ?></title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="preload" as="style" href="<?= $SITE_URL ?>/assets/styles/css/privacy-policy.css" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/privacy-policy.css"></noscript>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content" itemscope="" itemtype="http://schema.org/Article">
  <meta itemprop="url sameAs" content="<?= $SITE_URL ?>">
  <section class="main-content__titles">
    <h1 class="titles__subtitle"><?= $localeReader->translate('Signature Generator'); ?></h1>
    <h2 itemprop="name" class="titles__title"><?= $localeReader->translate('Privacy Policy'); ?></h2>
  </section>
  <section class="main-content__socials">
    <?php include_once('components/socials.php'); ?>    
  </section>
  <section class="main-content__description big-text" itemprop="articleBody">
    <?= isset($contents["privacy_$localeShortCode"]) ? $contents["privacy_$localeShortCode"] : '' ?>
  </section>
</main>
<?php include_once('components/footer.php'); ?>
</body>
</html>