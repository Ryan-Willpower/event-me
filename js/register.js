$(document).ready(() => {
  $('#register-form').submit( (e) => {
    // prevent this form to redirect
    e.preventDefault()

    let username  = $('#username').val()
    let password  = $('#password').val()
    let fname     = $('#fname').val()
    let lname     = $('#lname').val()
    let email     = $('#email').val()
    let tel       = $('#tel').val()
    let idnum     = $('#id-num').val()

    formData = {
      username: username,
      password: password,
      fname: fname,
      lname: lname,
      email: email,
      tel: tel,
      idnum: idnum,
      register: '',
    }

    // change status
    $('#status').text('please wait...')

    $.post('php/register.php', formData , (data) => {
      let { register } = JSON.parse(data)
      if (register) {
        window.location.replace('http://localhost/event');
      } else {
        $('#status').text('error! please try again later')
      }
    })
  })
})