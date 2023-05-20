<?php
global $currentLocale, $SITE_NAME, $SITE_LOGO, $SITE_URL;

$localeCode = $currentLocale['short_code'];
$homePageLink = $localeCode === 'en' ? '/' : "/$localeCode";
?>
<a class="logo" href="<?= $homePageLink ?>">
  <img width="300" heigh="60" class="logo__img" src="<?= "$SITE_URL/assets/images/$SITE_LOGO" ?>" alt="<?= $SITE_NAME ?>">
</a>