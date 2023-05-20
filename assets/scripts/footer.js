const footerShowAddressBtn = document.querySelector('.main-footer .part_contact-btn')
const footerAddress = document.querySelector('.main-footer .part_contact-address')

function showFooterAddress() {
  footerShowAddressBtn.classList.add('disabled')
  footerAddress.classList.add('active')
}

(footerShowAddressBtn && footerAddress) && footerShowAddressBtn.addEventListener('click', showFooterAddress)