const socialsModal = document.querySelector('.socials-modal')
const socialTwitterBtn = socialsModal && socialsModal.querySelector('.social_twitter a')
const socialTelegramBtn = socialsModal && socialsModal.querySelector('.social_telegram a')
const socialWhatsappBtn = socialsModal && socialsModal.querySelector('.social_whatsapp a')
const socialFacebookBtn = socialsModal && socialsModal.querySelector('.social_facebook a')
const socialRedditBtn = socialsModal && socialsModal.querySelector('.social_reddit a')
const socialsModalLinkText = socialsModal && socialsModal.querySelector('#socials-modal-link')
const copyShareLinkBtn = socialsModal && socialsModal.querySelector('[copy-share-link]')

function openSocialsModal(link) {
  link = getUrlWithNewLanguage(link, CURRENT_LOCALE)
  
  updateSocialsShareLink(link)
  openModal(socialsModal)
}

function updateSocialsShareLink(link) {
  socialTwitterBtn.href = getTwitterShareLink(link)
  socialTelegramBtn.href = getTelegramShareLink(link)
  socialWhatsappBtn.href = getWhatsappShareLink(link)
  socialFacebookBtn.href = getFacebookShareLink(link)
  socialRedditBtn.href = getRedditShareLink(link)
  socialsModalLinkText.value = link
}

function getTwitterShareLink(link) {
  return `http://www.twitter.com/share?url=${link}`
}

function getTelegramShareLink(link) {
  return `https://telegram.me/share/url?url=${link}`
}

function getWhatsappShareLink(link) {
  return `https://wa.me/?text=${link}`
}

function getFacebookShareLink(link) {
  return `$https://www.facebook.com/sharer/sharer.php?u=${link}`
}

function getRedditShareLink(link) {
  return `https://www.reddit.com/submit?url=${link}&title=${encodeURIComponent(SITE_NAME)}`
}

function closeSocialsModalIfOuterClick(e) {
  if (!checkIfOuterClick(socialsModal, e)) return

  closeSocialsModal()
}

function closeSocialsModal() {
  closeModal(socialsModal)
}

function checkIfOuterClick(element, event) {
  const elementBox = element.getBoundingClientRect()

  return (event.clientX < elementBox.left ||
          event.clientX > elementBox.right ||
          event.clientY < elementBox.top ||
          event.clientY > elementBox.bottom)
}

function copyShareLink() {
  navigator.clipboard.writeText(socialsModalLinkText.value)

  copyShareLinkBtn.classList.add('active')

  setTimeout(() => {
    copyShareLinkBtn.classList.remove('active')
  }, 500)
}

socialsModal && socialsModal.addEventListener('click', closeSocialsModalIfOuterClick)
socialsModal && socialsModal.addEventListener('close', closeSocialsModal)
copyShareLinkBtn && copyShareLinkBtn.addEventListener('click', copyShareLink)