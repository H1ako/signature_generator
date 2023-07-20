<?php global $currentLocale, $SITE_ICON, $SITE_NAME, $META_IMAGE, $SITE_URL;
?>
<meta name="theme-color" content="#F0F8FF">
<link rel="manifest" href="<?= $SITE_URL ?>/assets/manifests/manifest-<?= $currentLocale['short_code'] ?? 'en' ?>.json">

<link itemprop="mainEntityOfPage" href="<?= $SITE_URL ?>" />
<meta itemprop="author" content="@<?= $SITE_NAME ?>">
<meta itemprop="name" content="<?= $SITE_NAME ?>">
<meta property="url" content="<?= $SITE_URL . $_SERVER['REQUEST_URI'] ?>"/>

<link rel="shortcut icon" href="<?= $SITE_URL ?>/assets/images/<?= $SITE_ICON ?>" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?= $SITE_URL ?>/assets/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?= $SITE_URL ?>/assets/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= $SITE_URL ?>/assets/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?= $SITE_URL ?>/assets/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= $SITE_URL ?>/assets/favicons/favicon-16x16.png">
<meta name="msapplication-TileImage" content="<?= $SITE_URL ?>/assets/favicons/ms-icon-144x144.png">
<meta name="msapplication-TileColor" content="#f0f8ff">
<meta name="theme-color" content="#f0f8ff">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= $SITE_NAME ?>">
<meta name="twitter:creator" content="<?= $SITE_NAME ?>">

<meta property="og:locale" content="<?= $currentLocale['short_code']; ?>">
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= $SITE_URL . $_SERVER['REQUEST_URI'] ?>"/>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="<?= $SITE_NAME ?>" />
<link rel="stylesheet" href="<?= $SITE_URL ?>/assets/styles/css/global.css">
<script defer>
  const CURRENT_LOCALE = "<?= $currentLocale['short_code']; ?>"
  const HOST_URL = window.location.origin
  const SITE_URL = "<?= $SITE_URL ?>"
  const SITE_NAME = "<?= $SITE_NAME ?>"
</script>
<script src="https://unpkg.com/paper/dist/paper-core.min.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/signature.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/pwa.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/socials.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/footer.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/header.js" defer></script>
<script src="<?= $SITE_URL ?>/assets/scripts/signature-fonts.js" defer></script>
<!-- Google Analytics Script -->
<?php include_once('components/analytics-script.php'); ?>
<!-- Google Adsense Script -->
<?php include_once('components/advertisement-script.php'); ?>