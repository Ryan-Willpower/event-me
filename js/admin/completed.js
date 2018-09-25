$.urlParam = name => {
  let results = new RegExp(`[\?&]${name}=([^&#]*)`).exec(window.location.href);
  return results[1] || false;
}

$(document).ready(() => {
  $.when(
    $.get('php/single-event.php', $.urlParam('title'), data => {
      let { complete } = JSON.parse(data)
      complete = Number(complete)
      if (!complete) {
        $('#completed').html('<button id="set-complete" class="mt-4 btn btn-light border border-primary rounded">Mark as completed</button>')
      }
    })
  ).done(() => {
    $('#set-complete').click(() => {
      $.get('php/single-event.php', $.urlParam('title'), data => {
        let { complete } = JSON.parse(data)
        complete = Number(complete)
        let param = {
          set_complete: complete ? 0 : 1,
          title: $.urlParam('title')
        }
        if (!complete) {
          $.get('php/admin/completed.php', param, data => {
            if (data == 'success') {
              window.location.href = 'http://localhost/event/admin.php'
            } else {
              console.log(data)
            }
          })
        }
      })
    })
  })
})