const FONTS = [
  {
    path: 'assets/fonts/Allison_Script.otf',
    thickness_index: 60,
    name: 'AllisonScript'
  },
  {
    path: 'assets/fonts/Creattion_Demo.otf',
    thickness_index: 60,
    name: 'CreattionDemo'
  },
  {
    path: 'assets/fonts/aerotis.regular.otf',
    thickness_index: 60,
    name: 'aerotisRegular'
  },
  {
    path: 'assets/fonts/funky-signature.regular.otf',
    thickness_index: 60,
    name: 'funkySignatureRegular'
  },
  {
    path: 'assets/fonts/holimount.regular.otf',
    thickness_index: 60,
    name: 'holimountRegular'
  },
  {
    path: 'assets/fonts/Southam.otf',
    thickness_index: 60,
    name: 'Southam'
  },
  {
    path: 'assets/fonts/honeymoon-avenue-script.regular.otf',
    thickness_index: 120,
    name: 'honeymoonAvenueScriptRegular'
  },
  {
    path: 'assets/fonts/AlfridaSignature.ttf',
    thickness_index: 30,
    name: 'AlfridaSignature'
  },
  {
    path: 'assets/fonts/ArtySignature.otf',
    thickness_index: 60,
    name: 'ArtySignature'
  },
  {
    path: 'assets/fonts/Centhiny.otf',
    thickness_index: 55,
    name: 'Centhiny'
  },
  {
    path: 'assets/fonts/Geovana.otf',
    thickness_index: 30,
    name: 'Geovana'
  },
  {
    path: 'assets/fonts/HighSummit.otf',
    thickness_index: 25,
    name: 'HighSummit'
  },
  {
    path: 'assets/fonts/Humaira.otf',
    thickness_index: 40,
    name: 'Humaira'
  },
  {
    path: 'assets/fonts/MrsSaintDelafield-Regular.ttf',
    thickness_index: 50,
    name: 'MrsSaintDelafieldRegular'
  },
  {
    path: 'assets/fonts/Radith.otf',
    thickness_index: 30,
    name: 'Radith'
  },
  {
    path: 'assets/fonts/Somelove.otf',
    thickness_index: 45,
    name: 'Somelove'
  },
  {
    path: 'assets/fonts/SouthTown.otf',
    thickness_index: 50,
    name: 'SouthTown'
  },
  {
    path: 'assets/fonts/Thesignature.otf',
    thickness_index: 50,
    name: 'Thesignature'
  },
];

FONTS.forEach(font => {
  var f = new FontFace(font.name, `url(/signature_generator_prod/${font.path})`);
  document.fonts.add(f);
})