defaultsDeep = require 'lodash/defaultsDeep'

MediaMatcher = require 'util/media-matcher'
style = require 'util/style'

module.exports = class ImageFit
  constructor: (@$content, options = {}) ->
    @$context = @$content.parentNode

    @options = defaultsDeep options,
      mode: 'cover'
      anchor: 'center'

    new MediaMatcher undefined,
      onActive: => @resize()
      onExit: => @reset()

    @resize()

    @$content.addEventListener 'load', => @resize()

  resize: ->
    style @$content,
      width: ''
      marginLeft: ''
      marginTop: ''

    img =
      width: @$content.offsetWidth
      height: @$content.offsetHeight
      ratio: @$content.offsetWidth / @$content.offsetHeight

    env =
      width: @$context.offsetWidth
      height: @$context.offsetHeight
      ratio: @$context.offsetWidth / @$context.offsetHeight

    if @options.mode is 'contain' then @contain img, env
    if @options.mode is 'cover' then @cover img, env

  contain: (img, env) ->
    if env.ratio > img.ratio
      style @$content,
        width: "#{Math.ceil(img.ratio * env.height)}px"
        marginLeft: "#{Math.ceil((env.width - (img.ratio * env.height)) / 2)}px"
        marginTop: "0px"
    else
      style @$content,
        width: "#{env.width}px"
        marginLeft: "0px"
        marginTop: "#{Math.floor((env.height - (env.width / img.ratio)) / 2)}px"

  cover: (img, env) ->
    if env.ratio < img.ratio
      # The environment is narrower than the image—the image needs to be horizontally positioned
      style @$content,
        width: "#{Math.ceil(img.ratio * env.height)}px"
        marginLeft: switch @options.anchor
          when 'left' then "0px"
          when 'right' then "#{Math.floor((env.width - (img.ratio * env.height)))}px"
          # Center by default:
          else "#{Math.ceil((env.width - (img.ratio * env.height)) / 2)}px"
        marginTop: "0px"
    else
      # The environment is wider than the image—the image needs to be vertically positioned
      style @$content,
        width: "#{env.width}px"
        marginLeft: "0px"
        marginTop: switch @options.anchor
          when 'top' then "0px"
          when 'bottom' then "#{Math.floor((env.height - (env.width / img.ratio)))}px"
          # Center by default:
          else "#{Math.floor((env.height - (env.width / img.ratio)) / 2)}px"

  reset: ->
    style @$content,
      width: ''
      marginLeft: ''
      marginTop: ''
