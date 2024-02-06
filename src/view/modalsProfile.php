<div class="modal fade" id="followersModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="list-type-followers">Followers</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <?php require "api/followersList.php";
          foreach ($followers as $risultato) { ?>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              <a href="otherUsers.php?user=<?php print_r($risultato['Follower'])?>">
              <?php print_r($risultato['Follower']);?>
              </a>
            </li>
          </ul>
        <?php
        } ?>
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
        <?php include "api/followingList.php";
          foreach ($following as $risultato) { ?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <a href="otherUsers.php?user=<?php print_r($risultato['Following'])?>">
                <?php print_r($risultato['Following']);?>
                </a>
              </li>
            </ul>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
