<?php global $SITE_URL, $currentLocale, $localeReader;
$currentLocaleShortCode = $currentLocale['short_code'];
?>
<!DOCTYPE html>
<html lang="<?= $currentLocaleShortCode ?? 'en' ?>" itemscope="" itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:title" content="<?= $localeReader->translate('404 Not Found Page Title'); ?>">
  <meta property="og:title" content="<?= $localeReader->translate('404 Not Found Page Title'); ?>" />
  <title><?= $localeReader->translate('404 Not Found Page Title'); ?></title>
  <meta name="description" content="<?= $localeReader->translate('404 Not Found Page Meta Description') ?>">
  <meta name="og:description" content="<?= $localeReader->translate('404 Not Found Page Meta Description') ?>">
  <meta name="twitter:description" content="<?= $localeReader->translate('Home Page Meta Description') ?>">
  <?php include_once('components/base-head.php'); ?>
  <link rel="preload" as="style" href="<?= $SITE_URL ?>/assets/styles/css/404.css" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/404.css"></noscript>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__info">
    <h1 class="info__subtitle"><?= $localeReader->translate('Signature Generator'); ?></h1>
    <h2 class="info__title"><?= $localeReader->translate('404 Not Found'); ?></h2>
    <a href="/<?= $currentLocaleShortCode === 'en' ? '' : $currentLocaleShortCode ?>" class="info__btn" rel="nofollow"><?= $localeReader->translate('Go to homepage'); ?></a>
  </section>
</main>
<?php include_once('components/footer.php'); ?>
</body>
</html>