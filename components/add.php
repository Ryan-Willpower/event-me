<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTitle">Add new event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add-form" action="php/admin/add.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="title" class="w-100 text-center">Title</label>
            <input class="form-control" id="title">
          </div>
          <div class="form-group">
            <label for="place" class="w-100 text-center">Place</label>
            <input class="form-control" id="place">
          </div>
          <div class="form-group">
            <label for="date" class="w-100 text-center">Date</label>
            <input type="date" class="form-control" id="date">
          </div>
          <div class="form-group">
            <label for="time" class="w-100 text-center">Time</label>
            <input type="time" class="form-control" id="time">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="js/admin/add.js"></script>