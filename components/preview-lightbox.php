<?php global $SITE_URL, $currentLocale; ?>
<dialog class="preview-lightbox" id="preview-lightbox">
  <img loading="lazy" src="" alt="<?= translate('Signature Preview Image'); ?>" class="preview-lightbox__image" width="400" height="300">
  <img loading="lazy" src="<?= $SITE_URL ?>/assets/images/preview-bg.webp" alt="<?= translate('Background Image'); ?>" class="preview-lightbox__bg-image" width="1200" height="800">
</dialog>