module.exports = class LazyLoad
  constructor: (@el, @callback) ->
    if @is_loaded() then @after() else @listen()

  listen: ->
    @el.on 'load', (e) => @after()

  is_loaded: ->
    @loaded = @el.get(0).complete

  after: ->
    @loaded = true
    @callback @el
