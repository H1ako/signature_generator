<dialog class="editor" id="editor">
  <?php include('icons/editor-bg.php') ?>
  <canvas class="editor__canvas" id='editor-area'></canvas>
  <div class="editor__tools">
    <span class="tools__left">
      <button class="left__tool tool_clear"  id="editor-clear" title="<?= $localeReader->translate('Clear'); ?>">
        <?php include('icons/eraser.php'); ?>
        <span class="tool__text"><?= $localeReader->translate('Clear'); ?></span>
      </button>
      <input value="#000000" type="color" class="left__tool tool_color" name="editor-color" id="editor-color" title="<?= $localeReader->translate('Color'); ?>">
      <input value="3" type="range" min="2" max="30" class="left__tool tool_thickness" id="editor-thickness" title="<?= $localeReader->translate('Thickness'); ?>">
    </span>
    <span class="tools__right">
      <button class="right__tool tool_share" id="editor-share" title="<?= $localeReader->translate('Share'); ?>">
        <?php include('icons/share.php'); ?>
      </button>
      <a href="#" class="right__tool tool_download" download="OnlineSignatures.net.png" id="editor-download" title="<?= $localeReader->translate('Download'); ?>">
        <?php include('icons/download.php'); ?>
        <span class="tool__text"><?= $localeReader->translate('Download'); ?></span>
      </a>
    </span>
  </div>
</dialog>