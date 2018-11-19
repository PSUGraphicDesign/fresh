defaultsDeep = require 'lodash/defaultsDeep'

module.exports = class MediaMatcher
  constructor: (query = 'only screen', listeners = {}, @once = false) ->
    @query = window.matchMedia(query)
    @listeners = defaultsDeep listeners, {}
    @timesMatched = 0

    @isCurrentlyMatched = null

    # Let the matchMedia API tell us when to evaluate changes:
    @query.addListener () => @handleMatchMedia()

    # And respond whenever the window changes size:
    window.addEventListener 'resize', (e) => @handleMatchMedia()

    @handleMatchMedia()

  handleMatchMedia: () ->
    return if @once and @timesMatched > 0

    if @query.matches
      @timesMatched++

      if not @isCurrentlyMatched or @isCurrentlyMatched is null
        @invokeListener('onEnter')

      @invokeListener('onActive')
    else
      @invokeListener('onInactive')
      
      if @isCurrentlyMatched then @invokeListener('onExit')

    @isCurrentlyMatched = @query.matches

  invokeListener: (key) -> @listeners[key]?()
