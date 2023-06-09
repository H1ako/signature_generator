<form action="/" method="GET" class="generator-form" id="generator-form">
  <div class="generator-form__field">
    <p class="field__title"><?= translate('First Name'); ?></p>
    <input placeholder="<?= translate('First Name'); ?>" required pattern="[^\d\s]{1,}" type="text" class="field__input" name="first-name" title="<?= translate('First Name'); ?>">
  </div>
  <div class="generator-form__field">
    <p class="field__title"><?= translate('Last Name'); ?></p>
    <input placeholder="<?= translate('Last Name'); ?>" required pattern="[^\d\s]{1,}" type="text" class="field__input" name="last-name" title="<?= translate('Last Name'); ?>">
  </div>
  <div class="generator-form__field field-middle-name">
    <p class="field__title"><?= translate('Middle Name'); ?></p>
    <input placeholder="<?= translate('Not Required'); ?>" pattern="[^\d\s]{1,}" type="text" class="field__input" name="middle-name" title="<?= translate('Middle Name'); ?>">
  </div>
  <button type="submit" class="generator-form__submit" title="<?= translate('Generate'); ?>"><?= translate('Generate'); ?></button>
</form>