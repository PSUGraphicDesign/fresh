each = require 'lodash/each'

ImageFit = require 'util/image-fit'

module.exports = ->
  $images = document.querySelectorAll('.js-responsive-image__image')

  markImageAsLoaded = ($img) -> $img.classList.add('responsive-image__image--is-loaded')

  each $images, ($image) ->
    fitter = new ImageFit $image

    if $image.complete
      markImageAsLoaded($image)
      fitter.resize()
    else
      $image.addEventListener 'load', (e) ->
        markImageAsLoaded($image)
        fitter.resize()
