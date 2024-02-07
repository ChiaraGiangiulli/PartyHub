<div class="modal fade" id="newSurvey" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="list-type-survey">New Survey</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <p>Options:</p>
            <div class="container mt-5">
                <form id="surveyForm" action="../src/api/newSurvey.php?id=<?php echo $idEvent ?>" method="post">
                    <div class="form-group" id="choicesContainer">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" id="choices" name="choices[]" placeholder="Option" title="new option" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="button" id="addChoice">Add Choice</button>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="newList" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="list-type-list">New Shopping List</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <p>Products:</p>
            <div class="container mt-5">
                <form id="listForm" action="../src/api/newList.php?id=<?php echo $idEvent ?>" method="post">
                    <div class="form-group" id="productContainer">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="products[]" placeholder="Option" title="new product" required>
                        <input type="text" class="form-control text-end" name="price[]" id="price[]" title="price" required>
                        <span class="input-group-text">€</span>
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="button" id="addProduct">Add Product</button>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="partecipantsModel" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="list-type">Partecipants</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;
                </button>
            </div>
            <div class="modal-body">
            <?php require "api/eventPartecipantsList.php" ?>
                <ul>
                    <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    <a href="otherUsers.php?user=<?php print_r($templateParams["evento"][0]['Organizzatore'])?>">
                    <?php print_r($templateParams["evento"][0]['Organizzatore']);?>
                    </a></br>
                    </li>
                    <?php
                    foreach ($partecipants as $risultato) { ?>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        <a href="otherUsers.php?user=<?php print_r($risultato['UserPartecipante'])?>">
                        <?php print_r($risultato['UserPartecipante']);?>
                        </a>
                    </li>
                    <?php
                    } 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>