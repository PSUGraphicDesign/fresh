queue = document.body.dataset.action.split ' '

app =
  $doc: document.body
  $header: document.querySelector('.js-document__header')
  $content: document.querySelector('.js-document__content')
  $footer: document.querySelector('.js-document__footer')

playbook =
  before: require 'init/before'
  after: require 'init/after'
  common: require 'init/common'
  default: require 'init/default'

playbook.before(app)
playbook.common(app)

for hook in queue
  if hook in Object.keys playbook
    action = playbook[hook]

    if Array.isArray action
      action[task](app) for task of action
    else
      action(app)

playbook.after(app)
