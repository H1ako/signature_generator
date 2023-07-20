<?php global $LOCALES, $currentLocale;
$currentLocaleShortCode = $currentLocale['short_code'];
?>
<form name="language" id="language-chooser" class="language-chooser" title="<?= translate('Page Language'); ?>">
  <fieldset>
    <details>
      <summary>
        <img class="language-chooser__flag" src="<?= "$SITE_URL/assets/images/flags/$currentLocaleShortCode.webp" ?>" alt="flag">
        <?= $currentLocale['name'] ?>
        <svg class="language-chooser__arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
      </summary>
      <?php foreach ($LOCALES as $locale) :
        $code = $locale['short_code'];
        if ($code == $currentLocaleShortCode) {
          continue;
        }
      ?>
        <input id='<?= $locale['short_code'] ?>' type='radio' class='rad' name='rad' value="<?= $locale['short_code'] ?>">
        <label class='opt <?= $locale['short_code'] === $currentLocale['short_code'] ? "disabled" : '' ?>' <?= $locale['short_code'] === $currentLocale['short_code'] ? "aria-disabled" : '' ?> for='<?= $locale['short_code'] ?>'>
          <img class="language-chooser__flag" src="<?= "$SITE_URL/assets/images/flags/$code.webp" ?>" loading="lazy" alt="flag">
          <?= $locale['name'] ?>
        </label>
      <?php endforeach; ?>
    </details>
  </fieldset>
</form>