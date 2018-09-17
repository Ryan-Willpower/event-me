$.urlParam = name => {
  let results = new RegExp(`[\?&]${name}=([^&#]*)`).exec(window.location.href);
  return results[1] || false;
}

$(document).ready(() => {
  let title = $.urlParam('title')
  $.get('php/single-event.php', {title}, data => {
    let { notFound, place, date, complete } = JSON.parse(data)
    complete = Number(complete)
    if (notFound || Boolean(complete)) {
      window.location.replace('http://localhost/event')
    } else if (title) {
      $('#title').text(title)
      $('#place').text(place)
      $('#date').text(date)
    }
  })

  let pdf = `
    <div class="text-center">
      <p class="text-success">You have been confirm this event</p>
      <a href="php/pdf.php" target="_blank">print your reciept now!</a>
    </div>
  `

  $.get('php/get-confirmation.php', {title}, confirmation => {
    let confirm = Number(confirmation)
    if (confirm) {
      $('#upload input').prop('disabled', true)
      $('#pdf').append(pdf)
    }
  })
})