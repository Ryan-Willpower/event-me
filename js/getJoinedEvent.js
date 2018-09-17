let joined = (data) => (`
  <div class="col-md-6 col-lg-3 my-3">
    <div class="card w-100">
      <img class="card-img-top" src="https://firebasestorage.googleapis.com/v0/b/conf-62008.appspot.com/o/event%2Fconf_Event1.jpg?alt=media&token=2fd08f41-ca53-4c94-adfa-64dcb1da69b6">
      <div class="card-body">
        <h5>${data.title}</h5>
        <p>${data.date}</p>
        <p>${data.place}</p>
      </div>
    </div>
  </div>
`)

let noevent = `
  <div class="col-md-6 col-lg-3 my-3">
    <div class="card w-100">
      <div class="card-body">
        <h5>You haven't joined any event yet?</h5>
        <p>Find some more event</p>
      </div>
    </div>
  </div>
`

$(document).ready(() => {
  $.post('php/joined-event.php', (data) => {
    let joinList = JSON.parse(data)
    if (joinList.success == false) {
      $('#joined').append(noevent)
    } else {
      joinList.forEach((event) => {
        $('#joined').append(joined(event))
      })
    }
  })
})