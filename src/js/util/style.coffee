module.exports = ($el, styles) ->
  $el.style[prop] = val for prop, val of styles
