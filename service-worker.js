const CACHE_NAME = 'signature-generator-pwa-cache'

const urlsToCache = [
  '',
  'privacy-policy',
  'assets/styles/css/global.css',
  'assets/styles/css/404.css',
  'assets/styles/css/privacy-policy.css',
  'assets/styles/css/index.css',

  'assets/scripts/footer.js',
  'assets/scripts/header.js',
  'assets/scripts/socials-modal.js',
  'assets/scripts/index.js',
  'assets/scripts/editor.js',
]

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Cache opened')
        return cache.addAll(urlsToCache)
      })
  )
})

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          return cacheName !== CACHE_NAME
        }).map(function(cacheName) {
          return caches.delete(cacheName)
        })
      )
    })
  )
})

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        if (response) {
          return response
        }
        return fetch(event.request)
      })
  )
})