$.urlParam = name => {
  let results = new RegExp(`[\?&]${name}=([^&#]*)`).exec(window.location.href);
  return results[1] || false;
}

$(document).ready(() => {
  $('#edit').submit((e) => {
    e.preventDefault()
    let title = $('#edit #title').val()
    let place = $('#edit #place').val()
    let datetime = `${$('#edit #date').val()} ${$('#edit #time').val()}:00`
    let lastTitle = $.urlParam('title')
    
    data = {
      title,
      place,
      datetime,
      lastTitle
    }

    $.post('php/admin/edit.php', data, status => {
      if (status == 'success') {
        window.location.href = window.location.href
      } else if (status == 'nc') {
        $('#alert').html('<div class="mt-3 alert alert-danger text-center w-100" role="alert">Form is not complete</div>')
      }
    })
  })
})