$(document).ready(() => {
  $('#pwd-change').submit((e) => {
    e.preventDefault()
    let current = $('#current').val()
    let newPass = $('#new').val()
    let confirmPass = $('#confirm').val()

    if (newPass == confirmPass) {
      let formData = {
        confirm: '',
        current: current,
        new: newPass
      }
      $.post('php/change_password.php', formData, data => {
        let { success, error } = JSON.parse(data)
        if (success) {
          $('#change-status').html(`<div class="status alert alert-success text-center" id="change-status">Congrat! Password change successfully!</div>`)                    
          $('#current').val('')
          $('#new').val('')
          $('#confirm').val('')
        } else {
          $('#change-status').html(`<div class="status alert alert-danger text-center" id="change-status">${error}</div>`)          
        }
      })
    } else if (newPass != confirmPass) {
      $('#change-status').html('<div class="status alert alert-danger text-center" id="change-status">please confirm password again!</div>')
    }
    
  })
})