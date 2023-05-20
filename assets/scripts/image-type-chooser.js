const imageTypeChooser = document.querySelector('#image-type-chooser')
const imageTypeChooserPng = imageTypeChooser && imageTypeChooser.querySelector('[png-link]')
const imageTypeChooserJpg = imageTypeChooser && imageTypeChooser.querySelector('[jpg-link]')

function openImageTypeChooser(pngLink, jpgLink) {
  imageTypeChooserPng.href = pngLink
  imageTypeChooserJpg.href = jpgLink

  const downloadName = getDownloadFileName()
  imageTypeChooserPng.download = `${downloadName}.png`
  imageTypeChooserJpg.download = `${downloadName}.jpg`

  openModal(imageTypeChooser)
}

function closeImageTypeChooser() {
  imageTypeChooserPng.href = ''
  imageTypeChooserJpg.href = ''

  closeModal(imageTypeChooser)
}

function closeImageTypeChooserAfterDownload() {
  setTimeout(closeImageTypeChooser, 100)
}

function closeImageTypeChooserIfOuterClick(e) {
  if (!checkIfOuterClick(imageTypeChooser, e)) return

  closeImageTypeChooser()
}

imageTypeChooser && imageTypeChooser.addEventListener('close', closeImageTypeChooser)
imageTypeChooser && imageTypeChooser.addEventListener('click', closeImageTypeChooserIfOuterClick)

imageTypeChooserPng && imageTypeChooserPng.addEventListener('click', closeImageTypeChooserAfterDownload)
imageTypeChooserJpg && imageTypeChooserJpg.addEventListener('click', closeImageTypeChooserAfterDownload)