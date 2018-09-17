$(document).ready(() => {
  $.get('php/get_userdata.php', (data) => {
    let {data: user} = JSON.parse(data)
    setData(user)
  })
})

const setData = (user) => {
  for (let val in user) {
    $(`#${val}`).val(user[val])
  }
}