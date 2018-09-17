$(document).ready(() => {
  $('#edit-form').submit((e) => {
    let fname     = $('#fname').val()
    let lname     = $('#lname').val()
    let email     = $('#email').val()
    let tel       = $('#tel').val()

    let formData = {
      fname: fname,
      lname: lname,
      email: email,
      tel: tel,
      edit: ''
    }
    e.preventDefault()
    $.post('php/edit-user.php', formData, (data) => {
      let status = JSON.parse(data)
      let {success, error} = status
      
      if (success) {
        window.location.href = window.location.href
      } else {
        console.log(error)
      }
    })
  })
})