<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTitle">Add new event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-form" action="php/admin/edit.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-title" class="w-100 text-center">Title</label>
            <input class="form-control" id="edit-title">
          </div>
          <div class="form-group">
            <label for="edit-place" class="w-100 text-center">Place</label>
            <input class="form-control" id="edit-place">
          </div>
          <div class="form-group">
            <label for="edit-date" class="w-100 text-center">Date</label>
            <input type="date" class="form-control" id="edit-date">
          </div>
          <div class="form-group">
            <label for="edit-time" class="w-100 text-center">Time</label>
            <input type="time" class="form-control" id="edit-time">
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

<script src="js/admin/edit.js"></script>