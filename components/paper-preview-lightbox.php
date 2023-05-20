<?php global $SITE_URL, $currentLocale; ?>
<dialog class="preview-lightbox preview-lightbox_paper-preview" id="paper-preview-lightbox">
  <img src="" alt="<?= $localeReader->translate('Signature Preview Image'); ?>" class="paper-preview__image" width="400" height="300">
  <img src="<?= $SITE_URL ?>/assets/images/preview-bg-<?= $currentLocale['short_code'] ?>.png" alt="<?= $localeReader->translate('Background Image'); ?>" class="paper-preview__bg-image" width="1200" height="800">
</dialog>