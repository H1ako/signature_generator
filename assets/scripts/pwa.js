if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register(`${SITE_URL}/service-worker.js`)
      .then(registration => {
        console.log('Service worker registered:', registration)
      })
      .catch(error => {
        console.log('Service worker registration failed:', error)
      })
  })
}

window.addEventListener('appinstalled', (e) => {
  console.log('App was installed')

  increaseNumberOfInstallations()
})

async function increaseNumberOfInstallations() {
  await fetch('/api/increase-installations-number', {
    method: 'PUT'
  })
}