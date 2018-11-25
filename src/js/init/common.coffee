each = require 'lodash/each'
throttle = require 'lodash/throttle'
Between = require 'between.js'

style = require 'util/style'
ImageFit = require 'util/image-fit'
MediaMatcher = require 'util/media-matcher'

module.exports = (app) ->
  # Images

  $images = document.querySelectorAll('.js-responsive-image__image')

  markImageAsLoaded = ($img) -> $img.classList.add('responsive-image__image--is-loaded')

  each $images, ($image, index) ->
    fitter = new ImageFit $image

    if $image.dataset.isLazy
      $figure = $image.offsetParent

      lazyListener = (e) ->
        # We may not need to check anything!
        return if $image.dataset.hasLazyLoaded

        # Attempt to stagger calculations:
        window.setTimeout ->
          figurePosition = $figure.getBoundingClientRect()
          figureTop = figurePosition.top
          figureBottom = figurePosition.bottom

          if figureTop > -window.innerHeight and figureBottom < (window.innerHeight * 2)
            $image.dataset.hasLazyLoaded = true
            $image.src = $image.dataset.src
        , (Math.random() * 250)

      window.addEventListener 'scroll', throttle lazyListener, 250

      window.dispatchEvent new Event('scroll')

    if $image.complete
      markImageAsLoaded($image)
      fitter.resize()
    else
      $image.addEventListener 'load', (e) ->
        markImageAsLoaded($image)
        fitter.resize()

  # Header

  adjustContentOffset = () ->
    targetHeight = if app.$header.style.display is 'none' then 0 else app.$header.offsetHeight
    style app.$doc, paddingTop: "#{targetHeight}px"
  
  new MediaMatcher undefined, onActive: adjustContentOffset

  # Scrolling Flags

  scrollHandler = (e) ->
    if window.scrollY > (window.innerHeight / 2)
      app.$doc.classList.add 'document--is-scrolled'
    else
      app.$doc.classList.remove 'document--is-scrolled'

  window.addEventListener 'scroll', throttle scrollHandler, 100

  # Jump Links

  $links = document.querySelectorAll('a')

  for $link in $links
    do ->
      ref = $link.getAttribute('href')

      return unless ref.indexOf('#') is 0

      $link.addEventListener 'click', (e) ->
        e.preventDefault()

        target = document.getElementById(ref.replace('#', ''))
        targetScrollOffset = target.offsetTop
        initialScrollOffset = window.scrollY
        scrollDistance = targetScrollOffset - initialScrollOffset

        scrollDuration = Math.sqrt(Math.abs(scrollDistance)) * 25

        return if scrollDistance is 0

        new Between(0, 1)
          .time(scrollDuration)
          .easing(Between.Easing.Cubic.InOut)
          .on 'update', (val) ->
            window.scrollTo 0, (initialScrollOffset + (scrollDistance * val))
