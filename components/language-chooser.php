<?php global $LOCALES; ?>
<select name="language" id="language-chooser" class="language-chooser" title="<?= $localeReader->translate('Page Language'); ?>">
  <?php foreach($LOCALES as $locale): ?>
  <option value="<?= $locale['short_code'] ?>" <?= $locale['short_code'] === 'en' ? "selected" : '' ?>/><?= $locale['name'] ?></option>
  <?php endforeach; ?>
</select>