<?php global $CONTACT_EMAIL, $currentLocale, $localeReader;
$currentLocaleShortCode = $currentLocale['short_code'];
?>
<footer class="main-footer">
  <div class="main-footer__content">
    <a href="/<?= $currentLocaleShortCode === 'en' ? '' : "$currentLocaleShortCode/" ?>privacy-policy" class="content__part part_link" title="<?= translate('Privacy Policy'); ?>">
      <?= translate('Privacy Policy'); ?>
    </a>
    <p class="content__part part_rights"><?= translate('2023 All Right Reserved'); ?></p>
    <button class="content__part part_contact-btn" title="<?= translate('Contact Us'); ?>">
      <?= translate('Contact Us'); ?>
    </button>
    <address class="content__part part_contact-address">
      <a href="mailto:<?= $CONTACT_EMAIL ?>" class="part__link" title="<?= translate('Email'); ?>"><?= $CONTACT_EMAIL ?></a>
    </address>
  </div>
</footer>