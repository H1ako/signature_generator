const languageChooser = document.querySelector('#language-chooser')

function updateSiteLagnuage(e) {
  const newLanguage = e.target.value
  const newUrl = getUrlWithNewLanguage(newLanguage)

  window.location.replace(newUrl)
}

function getUrlWithNewLanguage(newLanguage) {
  var url = window.location.href
  
  const LANGUAGE_POS_INDEX = 0

  let newLanguageCode = newLanguage
  let urlObject = new URL(url)
  let pathParts = urlObject.pathname.split("/").filter(part => !!part)
  
  if (pathParts.length >= LANGUAGE_POS_INDEX + 1 && pathParts[LANGUAGE_POS_INDEX] === CURRENT_LOCALE) {
    newLanguage === 'en' ? pathParts.splice(LANGUAGE_POS_INDEX, 1) : pathParts[LANGUAGE_POS_INDEX] = newLanguageCode
  } else {
    pathParts.splice(LANGUAGE_POS_INDEX , 0, newLanguageCode)
  }
  
  urlObject.pathname = pathParts.join("/")

  return urlObject.href
}

function updateLanguageInputValueByCurrent() {
  languageChooser.value = CURRENT_LOCALE
}

if (languageChooser) {
  languageChooser.addEventListener('change', updateSiteLagnuage)
  updateLanguageInputValueByCurrent()
}