<?php if (!empty($_SESSION['user']) && empty($_SESSION['role'])) : ?>

<div class="container my-5">
  <h3>History</h3>
  <div class="row" id="joined">
    <script src="js/getJoinedEvent.js"></script>
  </div>
</div>

<?php endif; ?>