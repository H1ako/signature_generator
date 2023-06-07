<?php global $SITE_URL, $ABOUTUS_IMAGE, $META_IMAGE, $currentLocale, $localeReader, $SITE_URL, $SITE_ICON, $SITE_NAME, $ABOUTUS_STEP1_IMAGE, $ABOUTUS_STEP2_IMAGE, $ABOUTUS_STEP3_IMAGE, $ABOUTUS_STEP4_IMAGE, $ABOUTUS_STEP5_IMAGE, $ABOUTUS_STEP6_IMAGE, $ABOUTUS_STEP7_IMAGE;
$localeShortCode = $currentLocale['short_code'];

$dataContents = null;
try {
  $dataContents = json_decode(file_get_contents('data.json'), true);
} catch (Error $e) {
  // pass
}

$contents = null;
try {
  $contents = json_decode(file_get_contents('big-descriptions.json'), true);
} catch (Error $e) {
  // pass
}

?>
<!DOCTYPE html>
<html lang="<?= $currentLocale['short_code'] ?? 'en' ?>" itemscope="" itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="twitter:title" content="<?= translate('Home Page Title'); ?>">
  <meta property="og:title" content="<?= translate('Home Page Title'); ?>" />
  <title><?= translate('Home Page Title'); ?></title>
  <meta name="description" content="<?= translate('Home Page Meta Description') ?>">
  <meta name="og:description" content="<?= translate('Home Page Meta Description') ?>">
  <meta name="twitter:description" content="<?= translate('Home Page Meta Description') ?>">
  <meta itemprop="image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>">
  <meta name="twitter:image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>">
  <meta property="og:image" content="<?= $SITE_URL ?>/assets/images/<?= $META_IMAGE ?>"/>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/index.css">
  <script defer src="https://cdn.jsdelivr.net/npm/transliteration@2.1.8/dist/browser/bundle.umd.min.js"></script>
  <script src="<?= $SITE_URL ?>/assets/scripts/image-type-chooser.js" defer></script>
  <script src="<?= $SITE_URL ?>/assets/scripts/socials-modal.js" defer></script>
  <script src="<?= $SITE_URL ?>/assets/scripts/editor.js" defer></script>
  <script src="<?= $SITE_URL ?>/assets/scripts/index.js" defer></script>
  <script defer>
    const SIGNATURES_GENERATED = <?= isset($dataContents['numberOfGeneratedSignatures']) ? $dataContents['numberOfGeneratedSignatures'] : 0 ?>
  </script>
  <script src="<?= $SITE_URL ?>/assets/scripts/signatures-counter.js" defer></script>
</head>
<body>
<?php include_once('components/header.php'); ?>
<main class="main-content">
  <section class="main-content__face">
    <span class="face__left">
      <h1 class="left__title"><?= translate('Signature Generator'); ?></h1>
      <h2 class="left__subtitle"><?= translate('Generate your own unique signature or <b>draw</b> it by yourself'); ?></h2>
    </span>
    <span class="face__right">
      <?php include('components/generator-form.php'); ?>
    </span>
  </section>
  <section class="main-content__statistics">
    <h3 class="statistics__title"><?= translate('Signatures already generated:'); ?></h3>
    <p class="statistics__data" statistics-counter>0</p>
  </section>
  <section class="main-content__editor">
    <h2 class="editor__heading" go-for-more-signatures-anchor><?= translate('Create your own <b>Signature</b>'); ?></h2>
    <button class="editor__open-editor" open-editor><?= translate('Open Editor'); ?></button>
  </section>
  <section class="main-content__advertisement"><?php include('components/advertisement-1.php'); ?></section>
  <section class="main-content__generated-signatures before-generation">
    <ul class="generated-signatures__list" id="signatures-list">
      <?php include('components/advertisement-2.php'); ?>
      <?php include('components/advertisement-3.php'); ?>
    </ul>
    <?php include('components/advertisement-4.php'); ?>
    <button class="generated-signatures__loader" id="generator-loader">
      <span class="loader__variant variant_loading">
        <svg class="variant__icon" fill="currentColor" width="20px" height="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 0.75c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0c7.042 0.001 12.75 5.71 12.75 12.751 0 3.521-1.427 6.709-3.734 9.016v0c-0.226 0.226-0.365 0.538-0.365 0.883 0 0.69 0.56 1.25 1.25 1.25 0.346 0 0.659-0.14 0.885-0.367l0-0c2.759-2.76 4.465-6.572 4.465-10.782 0-8.423-6.828-15.251-15.25-15.251h-0z"></path>
        </svg>
        <span class="variant__text"><?= translate('Loading'); ?></span>
      </span>
      <span class="loader__variant variant_load-more">
        <svg width="20px" height="20px" class="variant__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z"/></svg>
        <span class="variant__text"><?= translate('Load More'); ?></span>
      </span>
    </button>
    <button class="generated-signatures__go-for-more" go-for-more-signatures title="<?= translate('Generate more'); ?>"><?= translate('Generate more'); ?></button>
  </section>
  <section class="main-content__instruction">
    <h2 class="instruction__heading"><?= translate('Home Page Instruction'); ?></h2>
    <div class="instruction__block">
      <ul class="block__steps" itemscope itemtype="http://schema.org/ItemList">
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 1:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 1 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 1 Description'); ?></p>
          </div>
          <div class="step__right">
            <img itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 1'); ?>" width="280" height="247" title="<?= translate('Step Image Title 1'); ?>" alt="<?= translate('Step Image Title 1'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 2:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 2 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 2 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 2'); ?>" width="280" height="247" title="<?= translate('Step Image Title 2'); ?>" alt="<?= translate('Step Image Title 2'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 3:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 3 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 3 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 3'); ?>" width="280" height="247" title="<?= translate('Step Image Title 3'); ?>" alt="<?= translate('Step Image Title 3'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 4:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 4 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 4 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 4'); ?>" width="280" height="247" title="<?= translate('Step Image Title 4'); ?>" alt="<?= translate('Step Image Title 4'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 5:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 5 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 5 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 5'); ?>" width="280" height="247" title="<?= translate('Step Image Title 5'); ?>" alt="<?= translate('Step Image Title 5'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 6:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 6 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 6 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 6'); ?>" width="280" height="247" title="<?= translate('Step Image Title 6'); ?>" alt="<?= translate('Step Image Title 6'); ?>" class="right__img">
          </div>
        </li>
        <li class="steps__step" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <div class="step__left">
            <div class="left__index" itemprop="position"><?= translate('Step'); ?> 7:</div>
            <h3 class="left__title" itemprop="name"><?= translate('Step 7 Title'); ?></h3>
            <p class="left__description" itemprop="description"><?= translate('Step 7 Description'); ?></p>
          </div>
          <div class="step__right">
            <img loading="lazy" itemprop="image" src="<?= $SITE_URL ?>/assets/images/<?= translate('Step Image 7'); ?>" width="280" height="247" title="<?= translate('Step Image Title 7'); ?>" alt="<?= translate('Step Image Title 7'); ?>" class="right__img">
          </div>
        </li>
      </ul>
    </div>
  </section>
  <section class="main-content__about" itemscope="" itemtype="http://schema.org/Article">
    <meta itemprop="url sameAs" content="<?= $SITE_URL ?>">
    <meta itemprop="name" content="<?= $SITE_NAME ?>">
    <div style="display: none;" itemscope="" itemprop="author" itemtype="http://schema.org/Organization">
      <meta itemprop="name" content="<?= $SITE_NAME ?>">
      <meta itemprop="url" content="<?= $SITE_URL ?>">
    </div>
    <h2 class="about__heading" itemprop="headline"><?= translate('Home Page About Us'); ?></h2>
    <div class="about__block">
      <img loading="lazy" src="<?= $SITE_URL ?>/assets/images/<?= $ABOUTUS_IMAGE ?>" alt="<?= translate('About us image'); ?>" title="<?= translate('About us image'); ?>" width="1100" height="568" class="block__img" itemprop="image">
      <div class="block__text big-text" itemprop="articleBody">
        <?= isset($contents["aboutUs_$localeShortCode"]) ? $contents["aboutUs_$localeShortCode"] : '' ?>
      </div>
    </div>
  </section>
  <section class="main-content__socials">
    <?php include('components/socials.php'); ?>
  </section>
</main>
<?php include('components/signature-card.php'); ?>
<?php include('components/footer.php'); ?>
<?php include('components/socials-modal.php'); ?>
<?php include('components/preview-lightbox.php'); ?>
<?php include('components/image-type-chooser.php'); ?>
<?php include('components/editor.php'); ?>
<?php include('components/go-top.php'); ?>
</body>
</html>