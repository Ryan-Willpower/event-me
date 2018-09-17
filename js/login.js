$(document).ready(() => {
  $('#login-form').submit((e) => {
    e.preventDefault()

    let username = $('#username').val()
    let password = $('#password').val()
    
    formData = {
      username: username,
      password: password,
      login: '',
    }

    $.post('php/login.php', formData, (data) => {
      console.log(data)
      let { success, incorrected, user_not_found } = JSON.parse(data)
      if (success) {
        window.location.replace('http://localhost/event')
      } else if (user_not_found) {
        $('.status').html('<div class="alert alert-danger w-100 text-center" role="alert">User not found!</div>')
      } else if (incorrected) {
        $('.status').html('<div class="alert alert-danger w-100 text-center" role="alert">Password is incorrected!</div>')
      } else {
        $('.status').html('<div class="alert alert-danger w-100 text-center" role="alert">server problem, please try again later!</div>')
      }
    })
  })
})