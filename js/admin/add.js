$(document).ready(() => {
  $('#add-form').submit((e) => {
    e.preventDefault()
    let title = $('#title').val()
    let place = $('#place').val()
    let datetime = `${$('#date').val()} ${$('#time').val()}:00`
    
    data = {
      title,
      place,
      datetime
    }

    $.post('php/admin/add.php', data, result => {
      let success = Number(result)
      if (success) {
        window.location.href = window.location.href
      }
    })
  })
})