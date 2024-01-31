<div class="modal fade" id="newSurvey" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="list-type">New Survey</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        <div class="container mt-5">
            <form id="surveyForm" action="../src/api/newSurvey.php?id=<?php echo $idEvent ?>" method="post">
            <div class="form-group" id="choicesContainer">
                <label for="option1">Options:</label>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="choices[]" placeholder="Option">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" onclick="addChoice()">Add Choice</button>
                </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
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
            <h5 class="modal-title" id="list-type">New Shopping List</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
        <div class="container mt-5">
            <form id="surveyForm" action="../src/api/newList.php?id=<?php echo $idEvent ?>" method="post">
            <div class="form-group" id="productContainer">
                <label for="option1">Products:</label>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="products[]" placeholder="Option">
                <input type="text" class="form-control" name="price[]" placeholder="€">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" onclick="addProduct()">Add Product</button>
                </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            </form>
            </div>
        </div>


    </div>
    </div>
</div>


<script>
function addChoice() {
    let choicesContainer = $('#choicesContainer');
    let newChoiceInput = $('<div class="input-group mb-3">' +
                            '<input type="text" class="form-control" name="choices[]" placeholder="New Option">' +
                            '<div class="input-group-append">' +
                                '<button class="btn btn-outline-success" type="button" onclick="removeChoice(this)">Remove</button>' +
                            '</div>' +
                            '</div>');
    choicesContainer.append(newChoiceInput);
    }

    function removeChoice(button) {
    $(button).closest('.input-group').remove();
    }

    function addProduct() {
        let choicesContainer = $('#productContainer');
        let newChoiceInput = $('<div class="input-group mb-3">' +
                                '<input type="text" class="form-control" name="products[]" placeholder="New Product">' +
                                '<input type="text" class="form-control" name="price[]" placeholder="€">' +
                                '<div class="input-group-append">' +
                                    '<button class="btn btn-outline-success" type="button" onclick="removeProduct(this)">Remove</button>' +
                                '</div>' +
                                '</div>');
        choicesContainer.append(newChoiceInput);
        }
    
        function removeProduct(button) {
        $(button).closest('.input-group').remove();
        }
        </script>