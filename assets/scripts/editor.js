const isNavigateShareWorks = !!navigator.share
var EditingStarted = false

const editor = document.querySelector('#editor')
const editorBgSvg = editor && editor.querySelector('.editor-bg')
const editorCanvas = editor && editor.querySelector('#editor-area')
const clearBtn = editor && editor.querySelector('#editor-clear')
const colorInput = editor && editor.querySelector('#editor-color')
const thicknessInput = editor && editor.querySelector('#editor-thickness')
const editorDownloadBtn = editor && editor.querySelector('#editor-download')
const editorShareBtn = editor && editor.querySelector('#editor-share')
const signaturesEditBtns = editor && document.querySelectorAll('[edit-signature]')
const openEditorBtn = editor && document.querySelector('[open-editor]')

var ctx = editorCanvas.getContext('2d')
var canvasRect = editorCanvas.getBoundingClientRect()
var inMemCanvas = document.createElement('canvas')
var inMemCtx = inMemCanvas.getContext('2d')

var pos = { x: 0, y: 0 }
var coordinatesMultipliers = { x: 0, y: 0 }
var isEditing = false

function setPosition(e) {
  canvasRect = editorCanvas.getBoundingClientRect()
  const clientX = e.touches?.length ? e.touches[0].clientX : e.clientX
  const clientY = e.touches?.length ? e.touches[0].clientY : e.clientY

  pos.x = (clientX - canvasRect.left) * coordinatesMultipliers.x
  pos.y = (clientY - canvasRect.top) * coordinatesMultipliers.y
}

function resize() {
  if (!editorCanvas.offsetWidth || !editorCanvas.offsetHeight) return

  inMemCanvas.width = editorCanvas.width
  inMemCanvas.height = editorCanvas.height
  inMemCtx.drawImage(editorCanvas, 0, 0)

  editorCanvas.width = window.innerWidth
  editorCanvas.height = window.innerHeight

  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
  ctx.drawImage(inMemCanvas, 0, 0, editorCanvas.width, editorCanvas.height)
  ctx.lineCap = 'round'

  coordinatesMultipliers.x = window.innerWidth / editorCanvas.offsetWidth
  coordinatesMultipliers.y = window.innerHeight / editorCanvas.offsetHeight
  
  setColor(colorInput.value)
  setThickness(thicknessInput.value)
}

function draw(e) {
  if ((e.buttons !== 1 && e.type !== 'touchmove') || !isEditing) return

  ctx.beginPath()
  ctx.moveTo(pos.x, pos.y)
  setPosition(e)
  ctx.lineTo(pos.x, pos.y)

  ctx.stroke()
}

function clearCanvas(e) {
  thicknessInput.value = thicknessInput.min
  setThickness(thicknessInput.min)
  ctx.clearRect(0, 0, editorCanvas.width, editorCanvas.height)
  enableBgAnimation()
}

function enableBgAnimation() {
  editorBgSvg.classList.remove('disabled')
}

function changeColor(e) {
  const newColor = e.target.value
  
  setColor(newColor)
}

function setColor(color) {
  ctx.strokeStyle = color
}

function changeThickness(e) {
  const newThickness = e.target.value

  setThickness(newThickness)
}

function setThickness(thickness) {
  ctx.lineWidth = thickness * coordinatesMultipliers.x
}

function enableEditing(e) {
  disableBgAnimation()
  isEditing = true
  setPosition(e)
}

function disableBgAnimation() {
  editorBgSvg.classList.add('disabled')
}

function disableEditing() {
  isEditing = false
}

function downloadEditorSignature() {
  editorDownloadBtn.download = getDownloadFileName()
  editorDownloadBtn.href = editorCanvas.toDataURL('image/png')
}

async function editSignature(e) {
  clearCanvas()
  disableBgAnimation()

  const imageSrc = e.target.closest('[data-signature-src]').getAttribute('data-signature-src')

  drawImage(imageSrc)
  openEditor()
}

function drawImage(src) {
  const image = new Image()

  image.onload = () => {
    const canvasWidth = editorCanvas.width
    const canvasHeight = editorCanvas.height
    const scalePadding = canvasWidth > 800 ? 0.5 : 0.75
    const scaleFactor = Math.min(editorCanvas.offsetWidth / image.width, editorCanvas.offsetHeight / image.height) * scalePadding
    
    const imageWidth = image.width * coordinatesMultipliers.x * scaleFactor
    const imageHeight = image.height * coordinatesMultipliers.y * scaleFactor
    const x = (canvasWidth - imageWidth) / 2
    const y = (canvasHeight - imageHeight) / 2
    
    ctx.drawImage(image, x, y, imageWidth, imageHeight)
  }
  
  image.src = src
}

function openEditor() {
  openModal(editor)
  resize()
}

async function shareEditorSignature() {
  editorCanvas.toBlob(blob => {
    shareImage('', '', blob)
  })
}

function disableShareBtnIfCantShare() {
  if (isNavigateShareWorks) return

  editorShareBtn?.remove()
}

function closeEditorIfOuterClick(e) {
  if (!checkIfOuterClick(editor, e)) return

  clsoeEditor()
}

function clsoeEditor() {
  closeModal(editor)
}

if (editor) {
  window.addEventListener('resize', resize)
  document.addEventListener('mousemove', draw)
  editorCanvas.addEventListener('mousedown', enableEditing)
  document.addEventListener('mouseup', disableEditing)
  editorCanvas.addEventListener('touchmove', e => e.preventDefault(), {passive: true})
  
  editorCanvas.addEventListener("touchstart", enableEditing, {passive: true})
  document.addEventListener("touchmove", draw, {passive: true})
  document.addEventListener("touchend", disableEditing)

  clearBtn.addEventListener('click', clearCanvas)
  colorInput.addEventListener('change', changeColor)
  thicknessInput.addEventListener('change', changeThickness)
  editorDownloadBtn.addEventListener('click', downloadEditorSignature)
  editorShareBtn.addEventListener('click', shareEditorSignature)
  disableShareBtnIfCantShare()

  signaturesEditBtns.forEach(btn => {
    btn.addEventListener('click', editSignature)
  })

  openEditorBtn.addEventListener('click', openEditor)
  editor.addEventListener('click', closeEditorIfOuterClick)
  editor.addEventListener('close', clsoeEditor)
}