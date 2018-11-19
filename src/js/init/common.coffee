{ each } = require 'lodash'

module.exports = ->
  images = document.querySelectorAll('.js-responsive-image__image')

  markImageAsLoaded = (img) -> img.classList.add('responsive-image__image--is-loaded')

  each images, (image) ->
    if image.complete
      markImageAsLoaded(image)
    else
      image.addEventListener 'load', (e) -> markImageAsLoaded(image)
