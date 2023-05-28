<?php global $LOCALES, $currentLocale; ?>
<select name="language" id="language-chooser" class="language-chooser" title="<?= translate('Page Language'); ?>">
  <?php foreach($LOCALES as $locale): ?>
  <option value="<?= $locale['short_code'] ?>" <?= $locale['short_code'] === $currentLocale['short_code'] ? "selected" : '' ?>><?= $locale['name'] ?></option>
  <?php endforeach; ?>
</select>