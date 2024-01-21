<div class="modal fade" id="followingModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="following">Following</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include '../db/query.php';
            session_start();
            $dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
            $user = $_SESSION['user_id'];
            $following = $dbh->getFollowing($user);
            foreach ($following as $risultato) {
                print_r($risultato['Following']);
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>