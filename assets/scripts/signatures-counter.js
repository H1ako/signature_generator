const statisticsCounter = document.querySelector('[statistics-counter]')

function spincrement(targetEl, endVal, duration) {
  let startVal = Number(targetEl.innerText),
      range = endVal - startVal,
      minTimer = 50,
      easeInOut = t => {return t<.5 ? 2*t*t : -1+(4-2*t)*t},
      stepTime = Math.abs(Math.floor(duration / range)),
      startTime = null,
      previousVal = startVal

  function update(now) {
    if (!startTime) startTime = now

    let timeLeft = Math.max(0, Math.min(1, (now - startTime) / duration)),
        val = Math.floor(easeInOut(timeLeft) * range + startVal)

    if (range > 0 && val > endVal) val = endVal
    if (range < 0 && val < endVal) val = endVal

    targetEl.innerText = val

    if (val === endVal) return

    previousVal = val

    requestAnimationFrame(update)
  }

  requestAnimationFrame(update);
}

statisticsCounter && spincrement(statisticsCounter, SIGNATURES_GENERATED, 3000)