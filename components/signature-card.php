<template id="signature-card-template">
  <li class="signature-card" data-signature-src="">
    <button class="signature-card__top" preview-signature title="<?= translate('Preview'); ?>">
      <canvas class="top__image">
      <!-- <img src="" alt="<?= translate('Signature'); ?>" class="top__image"> -->
    </button>
    <div class="signature-card__bottom">
      <div class="bottom__left">
        <button title="Edit" class="left__edit-btn" edit-signature title="<?= translate('Edit'); ?>">
          <?php include('icons/edit.php'); ?>
          <span class="edit-btn__text"><?= translate('Edit'); ?></span>
        </button>
      </div>
      <div class="bottom__right">
        <button class="right__btn btn_share" share-signature title="<?= translate('Share'); ?>"><?php include('icons/share.php'); ?></button>
        <button class="right__btn btn_download" download-signature download="OnlineSignatures.net.png" title="<?= translate('Download'); ?>"><?php include('icons/download.php'); ?></button>
      </div>
    </div>
  </li>
</template>