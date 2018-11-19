$ = require 'jquery'

module.exports = class Sizer
  constructor: (options = {}) ->
    @screen = window
    @active = null
    @count = 0

    @options = $.extend
      min: 0
      max: Infinity
      once: false
      onEnter: (e) ->
      onExit: (e) ->
      onActive: (e) ->
    , options

    @screen.addEventListener 'resize', (e) => @resize e

  resize: (e) ->
    current = (@screen.innerWidth > @options.min) and (@screen.innerWidth <= @options.max)

    # If this context wasn't active, but it will be, fire `onEnter`:
    if @active in [false, null] and current is true
      @options.onEnter e

    # If this context was active, but it isn't an more, fire `onExit`:
    if @active is true and current is false
      @options.onExit e

    # If we're just getting started, assume we've exited
    if @active is null and current is false
      @options.onExit e

    @active = current

    # The state has (potentially) been changed:
    if @active
      @options.onActive e unless @options.once and ++@count > 1
