<div class="modal fade" id="followersModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="list-type-followers">Followers</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <?php include "api/followersList.php" ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="followingModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="list-type-following">Following</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <?php include "api/followingList.php" ?>
      </div>
    </div>
  </div>
</div>
