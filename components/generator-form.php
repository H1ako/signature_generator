<form action="/" method="GET" class="generator-form" id="generator-form">
  <div class="generator-form__field">
    <p class="field__title"><?= $localeReader->translate('First Name'); ?></p>
    <input placeholder="<?= $localeReader->translate('First Name'); ?>" required pattern="[^\d\s]{1,}" type="text" class="field__input" name="first-name" title="<?= $localeReader->translate('First Name'); ?>">
  </div>
  <div class="generator-form__field">
    <p class="field__title"><?= $localeReader->translate('Last Name'); ?></p>
    <input placeholder="<?= $localeReader->translate('Last Name'); ?>" required pattern="[^\d\s]{1,}" type="text" class="field__input" name="last-name" title="<?= $localeReader->translate('Last Name'); ?>">
  </div>
  <div class="generator-form__field">
    <p class="field__title"><?= $localeReader->translate('Middle Name'); ?></p>
    <input placeholder="<?= $localeReader->translate('Middle Name'); ?>" pattern="[^\d\s]{1,}" type="text" class="field__input" name="middle-name" title="<?= $localeReader->translate('Middle Name'); ?>">
  </div>
  <button type="submit" class="generator-form__submit" title="<?= $localeReader->translate('Generate'); ?>"><?= $localeReader->translate('Generate'); ?></button>
</form>