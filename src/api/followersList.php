<div class="modal fade" id="followersModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="followers">Followers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include '../db/query.php';
            $dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
            session_start();
            $user = $_SESSION['user_id'];
            $followers = $dbh->getFollowers($user);
            foreach ($followers as $risultato) {
                print_r($risultato['Follower']);
            } 
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>