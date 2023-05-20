var editorAboutUs_en
var editorAboutUs_ru
var editorAboutUs_ua
var editorAboutUs_es
var editorAboutUs_fr
var editorAboutUs_pl
var editorAboutUs_pt
var editorAboutUs_vi
var editorAboutUs_tr
var editorAboutUs_de
var editorAboutUs_it
var editorPrivacy_en
var editorPrivacy_ru
var editorPrivacy_ua
var editorPrivacy_es
var editorPrivacy_fr
var editorPrivacy_pl
var editorPrivacy_pt
var editorPrivacy_vi
var editorPrivacy_tr
var editorPrivacy_de
var editorPrivacy_it

ClassicEditor
  .create( document.querySelector( '#en-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_en = newEditor
  })
  .catch( error => {
      console.error( error )
  } )

ClassicEditor
  .create( document.querySelector( '#ru-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_ru = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#ua-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_ua = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#es-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_es = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#fr-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_fr = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#pl-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_pl = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#pt-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_pt = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#vi-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_vi = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#tr-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_tr = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#de-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_de = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#it-about-us-editor' ) )
  .then(newEditor => {
    editorAboutUs_it = newEditor
  })
  .catch( error => {
      console.error( error )
  } )



  ClassicEditor
  .create( document.querySelector( '#en-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_en = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#ru-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_ru = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#ua-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_ua = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#es-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_es = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#fr-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_fr = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#pl-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_pl = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#pt-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_pt = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#vi-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_vi = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#tr-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_tr = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#de-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_de = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


  ClassicEditor
  .create( document.querySelector( '#it-privacy-editor' ) )
  .then(newEditor => {
    editorPrivacy_it = newEditor
  })
  .catch( error => {
      console.error( error )
  } )


const saveBtn = document.querySelector('.save-button')

async function saveChanges() {
  const dataAboutUs_en = editorAboutUs_en.getData()
  const dataAboutUs_ru = editorAboutUs_ru.getData()
  const dataAboutUs_ua = editorAboutUs_ua.getData()
  const dataAboutUs_es = editorAboutUs_es.getData()
  const dataAboutUs_fr = editorAboutUs_fr.getData()
  const dataAboutUs_pl = editorAboutUs_pl.getData()
  const dataAboutUs_pt = editorAboutUs_pt.getData()
  const dataAboutUs_vi = editorAboutUs_vi.getData()
  const dataAboutUs_tr = editorAboutUs_tr.getData()
  const dataAboutUs_de = editorAboutUs_de.getData()
  const dataAboutUs_it = editorAboutUs_it.getData()
  const dataPrivacy_en = editorPrivacy_en.getData()
  const dataPrivacy_ru = editorPrivacy_ru.getData()
  const dataPrivacy_ua = editorPrivacy_ua.getData()
  const dataPrivacy_es = editorPrivacy_es.getData()
  const dataPrivacy_fr = editorPrivacy_fr.getData()
  const dataPrivacy_pl = editorPrivacy_pl.getData()
  const dataPrivacy_pt = editorPrivacy_pt.getData()
  const dataPrivacy_vi = editorPrivacy_vi.getData()
  const dataPrivacy_tr = editorPrivacy_tr.getData()
  const dataPrivacy_de = editorPrivacy_de.getData()
  const dataPrivacy_it = editorPrivacy_it.getData()

  const dataToUpdate = {
    aboutUs_en: dataAboutUs_en,
    aboutUs_ru: dataAboutUs_ru,
    aboutUs_ua: dataAboutUs_ua,
    aboutUs_es: dataAboutUs_es,
    aboutUs_fr: dataAboutUs_fr,
    aboutUs_pl: dataAboutUs_pl,
    aboutUs_pt: dataAboutUs_pt,
    aboutUs_vi: dataAboutUs_vi,
    aboutUs_tr: dataAboutUs_tr,
    aboutUs_de: dataAboutUs_de,
    aboutUs_it: dataAboutUs_it,
    privacy_en: dataPrivacy_en,
    privacy_ru: dataPrivacy_ru,
    privacy_ua: dataPrivacy_ua,
    privacy_es: dataPrivacy_es,
    privacy_fr: dataPrivacy_fr,
    privacy_pl: dataPrivacy_pl,
    privacy_pt: dataPrivacy_pt,
    privacy_vi: dataPrivacy_vi,
    privacy_tr: dataPrivacy_tr,
    privacy_de: dataPrivacy_de,
    privacy_it: dataPrivacy_it,
  }

  console.log(dataToUpdate)

  const a = await fetch('/api/admin/update-text', {
    method: 'post',
    body: JSON.stringify(dataToUpdate)
  })

  console.log(await a.text())

  window.alert('Changes were Saved!')
}

saveBtn.addEventListener('click', saveChanges)