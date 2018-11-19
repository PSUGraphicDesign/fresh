$ = require 'jquery'
throttle = require 'lodash/throttle'

module.exports = class Waypoint
  constructor: (@el, @interval = 0, @eventMap = {}) ->
    @$w = $(window)

    @state = {}
    @history = []

    @isActive = false

    @listen()

    triggers = 'scroll.waypoint resize.waypoint hashchange.waypoint'

    if @interval
      @$w.on triggers, throttle ((e) => @getPosition()), @interval
    else
      @$w.on triggers, (e) => @getPosition()

    @$w.on 'unload', (e) => @$w.off 'scroll.waypoint resize.waypoint hashchange.waypoint'

  listen: ->
    @isActive = true

  silence: ->
    @isActive = false

  getPosition: ->
    # Cache our old state information:
    old = $.extend {}, @state
    @history.push old

    # Save our new data, so it's available to all our events:

    # Measurements
    @state.viewportTop = @$w.scrollTop()
    @state.viewportHeight = @$w.height()
    @state.viewportBottom = @state.viewportTop + @state.viewportHeight

    @state.objectHeight = @el.outerHeight()
    @state.objectTop = @el.offset().top
    @state.objectBottom = @state.objectTop + @state.objectHeight

    # Progress
    @state.progressAtViewportTop = (@state.viewportTop - @state.objectTop) / @state.objectHeight
    @state.progressAtViewportBottom = (@state.viewportBottom - @state.objectTop) / @state.objectHeight
    @state.progressAtViewportCenter = ((@state.viewportTop + @state.viewportHeight / 2) - @state.objectTop) / @state.objectHeight

    @state.progressTopInViewport =  (@state.objectTop - @state.viewportTop) / @state.viewportHeight
    @state.progressBottomInViewport =  (@state.objectBottom - @state.viewportTop) / @state.viewportHeight

    @state.delta = old.viewportTop - @state.viewportTop

    # Common checks
    @state.isTopAboveViewportTop = @state.objectTop < @state.viewportTop
    @state.isTopAboveViewportBottom = @state.objectTop < @state.viewportBottom
    @state.isTopAtViewportTop = @state.objectTop == @state.viewportTop
    @state.isTopAtViewportBottom = @state.objectTop == @state.viewportBottom

    @state.isBottomAboveViewportTop = @state.objectBottom < @state.viewportTop
    @state.isBottomAboveViewportBottom = @state.objectBottom < @state.viewportBottom
    @state.isBottomAtViewportTop = @state.objectBottom == @state.viewportTop
    @state.isBottomAtViewportBottom = @state.objectBottom == @state.viewportBottom

    # Visibility
    @state.isInView = !@state.isBottomAboveViewportTop and @state.isTopAboveViewportBottom
    @state.isInPartialView = @state.isTopAboveViewportBottom and !@state.isBottomAboveViewportTop
    @state.isTopInViewport = !@state.isTopAboveViewportTop and @state.isTopAboveViewportBottom
    @state.isBottomInViewport = !@state.isBottomAboveViewportTop and @state.isBottomAboveViewportBottom

    # Now that we're all updated, check if we should be emitting events:
    return if not @isActive

    # Trigger all the identified events, based on the new and old

    # Viewport Changes
    if old.viewportTop != undefined and old.viewportTop != @state.viewportTop
      @dispatchEvent('viewportTopMove')
    if old.viewportTop != undefined and old.viewportTop > @state.viewportTop
      @dispatchEvent('viewportTopMoveUp')
    if old.viewportTop != undefined and old.viewportTop < @state.viewportTop
      @dispatchEvent('viewportTopMoveDown')

    if old.viewportHeight != undefined and old.viewportHeight != @state.viewportHeight
      @dispatchEvent('viewportHeightChange')
    if old.viewportHeight != undefined and old.viewportHeight > @state.viewportHeight
      @dispatchEvent('viewportHeightShrink')
    if old.viewportHeight != undefined and old.viewportHeight < @state.viewportHeight
      @dispatchEvent('viewportHeightGrow')

    if old.viewportBottom != undefined and old.viewportBottom != @state.viewportBottom
      @dispatchEvent('viewportBottomMove')
    if old.viewportBottom != undefined and old.viewportBottom > @state.viewportBottom
      @dispatchEvent('viewportBottomMoveUp')
    if old.viewportBottom != undefined and old.viewportBottom < @state.viewportBottom
      @dispatchEvent('viewportBottomMoveDown')

    # Object changes
    if old.objectHeight != undefined and old.objectHeight != @state.objectHeight
      @dispatchEvent('objectHeightChange')
    if old.objectHeight != undefined and old.objectHeight > @state.objectHeight
      @dispatchEvent('objectHeightShrink')
    if old.objectHeight != undefined and old.objectHeight < @state.objectHeight
      @dispatchEvent('objectHeightGrow')

    if old.objectTop != undefined and old.objectTop != @state.objectTop
      @dispatchEvent('objectTopMove')
    if old.objectTop != undefined and old.objectTop > @state.objectTop
      @dispatchEvent('objectTopMoveUp')
    if old.objectTop != undefined and old.objectTop < @state.objectTop
      @dispatchEvent('objectTopMoveDown')

    if old.objectBottom != undefined and old.objectBottom != @state.objectBottom
      @dispatchEvent('objectBottomMove')
    if old.objectBottom != undefined and old.objectBottom > @state.objectBottom
      @dispatchEvent('objectBottomMoveUp')
    if old.objectBottom != undefined and old.objectBottom < @state.objectBottom
      @dispatchEvent('objectBottomMoveDown')

    # Progress
    if old.progressAtViewportTop != undefined and old.progressAtViewportTop != @state.progressAtViewportTop
      @dispatchEvent('progressAtTop')
    if old.progressAtViewportTop != undefined and old.progressAtViewportTop > @state.progressAtViewportTop
      @dispatchEvent('progressAtTopRecede')
    if old.progressAtViewportTop != undefined and old.progressAtViewportTop < @state.progressAtViewportTop
      @dispatchEvent('progressAtTopAdvance')

    if old.progressAtViewportBottom != undefined and old.progressAtViewportBottom != @state.progressAtViewportBottom
      @dispatchEvent('progressAtBottom')
    if old.progressAtViewportBottom != undefined and old.progressAtViewportBottom > @state.progressAtViewportBottom
      @dispatchEvent('progressAtBottomRecede')
    if old.progressAtViewportBottom != undefined and old.progressAtViewportTop < @state.progressAtViewportTop
      @dispatchEvent('progressAtBottomAdvance')

    if old.progressAtViewportCenter != undefined and old.progressAtViewportCenter != @state.progressAtViewportCenter
      @dispatchEvent('progressAtCenter')
    if old.progressAtViewportCenter != undefined and old.progressAtViewportCenter > @state.progressAtViewportCenter
      @dispatchEvent('progressAtCenterRecede')
    if old.progressAtViewportCenter != undefined and old.progressAtViewportCenter < @state.progressAtViewportCenter
      @dispatchEvent('progressAtCenterAdvance')

    if old.viewportTop != undefined and old.viewportTop != @state.viewportTop
      @dispatchEvent('progress')

    # Thresholds
    if old.progressAtViewportCenter != undefined and @state.progressAtViewportCenter > 0
      @dispatchEvent('objectTopAboveViewportCenter')
    if old.progressAtViewportCenter != undefined and @state.progressAtViewportCenter < 0
      @dispatchEvent('objectTopBelowViewportCenter')
    if old.progressAtViewportCenter != undefined and old.progressAtViewportCenter <= 0 and @state.progressAtViewportCenter > 0
      @dispatchEvent('objectTopCrossAboveViewportCenter')
    if old.progressAtViewportCenter != undefined and old.progressAtViewportCenter >= 0 and @state.progressAtViewportCenter < 0
      @dispatchEvent('objectTopCrossBelowViewportCenter')

    # Visibility
    if @state.isTopAboveViewportTop
      @dispatchEvent('objectTopAboveViewportTop')
    if old.isTopAboveViewportTop and !@state.isTopAboveViewportTop
      @dispatchEvent('objectTopEnterViewportTop')
    if !old.isTopAboveViewportTop and @state.isTopAboveViewportTop
      @dispatchEvent('objectTopLeaveViewportTop')

    if @state.isTopAboveViewportBottom
      @dispatchEvent('objectTopAboveViewportBottom')
    if !old.isTopAboveViewportBottom and @state.isTopAboveViewportBottom and !old.isTopInViewport and @state.isTopInViewport
      @dispatchEvent('objectTopEnterViewportBottom')
    if old.isTopAboveViewportBottom and !@state.isTopAboveViewportBottom and old.isTopInViewport and !@state.isTopInViewport
      @dispatchEvent('objectTopLeaveViewportBottom')

    if @state.isTopAtViewportTop
      @dispatchEvent('objectTopAtViewportTop')
    if @state.isTopAtViewportBottom
      @dispatchEvent('objectTopAtViewportBottom')

    if @state.isBottomAboveViewportTop
      @dispatchEvent('objectBottomAboveViewportTop')
    if old.isBottomAboveViewportTop and !@state.isBottomAboveViewportTop and !old.isBottomInViewport and @state.isBottomInViewport
      @dispatchEvent('objectBottomEnterViewportTop')
    if !old.isBottomAboveViewportTop and @state.isBottomAboveViewportTop and old.isBottomInViewport and !@state.isBottomInViewport
      @dispatchEvent('objectBottomLeaveViewportTop')

    if @state.isBottomAboveViewportBottom
      @dispatchEvent('objectBottomAboveViewportBottom')
    if old.isBottomAboveViewportBottom != undefined and old.isBottomAboveViewportBottom and !@state.isBottomAboveViewportBottom
      @dispatchEvent('objectBottomLeaveViewportBottom')
    if old.isBottomAboveViewportBottom != undefined and !old.isBottomAboveViewportBottom and @state.isBottomAboveViewportBottom
      @dispatchEvent('objectBottomEnterViewportBottom')

    if @state.isBottomAtViewportTop
      @dispatchEvent('objectBottomAtViewportTop')
    if @state.isBottomAtViewportBottom
      @dispatchEvent('objectBottomAtViewportBottom')

    if old.isInView and not @state.isInView
      @dispatchEvent('objectLeaveView')
    if not old.isInView and @state.isInView
      @dispatchEvent('objectEnterView')
    if @state.isInView
      @dispatchEvent('objectInView')
    if @state.isInPartialView
      @dispatchEvent('objectInPartialView')

    # Cull history:

    @history.pop() if @history.length > 5

  dispatchEvent: (evt, data = @state) ->
    if @eventMap.hasOwnProperty(evt)
      callable = @eventMap[evt]

      if Array.isArray callable
        l.call(null, data, @silence) for l in callable
      else
        callable.call(null, data, @silence.bind(@))
