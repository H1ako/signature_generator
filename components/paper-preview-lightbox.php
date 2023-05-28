<?php global $SITE_URL, $currentLocale; ?>
<dialog class="preview-lightbox preview-lightbox_paper-preview" id="paper-preview-lightbox">
  <img loading="lazy" src="" alt="<?= translate('Signature Preview Image'); ?>" class="paper-preview__image" width="400" height="300">
  <img loading="lazy" src="<?= $SITE_URL ?>/assets/images/preview-bg-<?= $currentLocale['short_code'] ?>.webp" alt="<?= translate('Background Image'); ?>" class="paper-preview__bg-image" width="1200" height="800">
</dialog>