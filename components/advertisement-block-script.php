<script>
	function downloadJSAtOnload() {
    const AD_URL = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8324800206153529'
	  const element = document.createElement("script")

	  element.src = AD_URL
	  document.body.appendChild(element)
  }

  setTimeout(() => {
    if (window.addEventListener) {
    window.addEventListener("load", downloadJSAtOnload, false)
    }
    else if (window.attachEvent) {
      window.attachEvent("onload", downloadJSAtOnload)
    }
    else {
      window.onload = downloadJSAtOnload
    }
  }, 100)
</script>