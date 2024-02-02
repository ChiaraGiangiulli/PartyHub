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
                <input type="text" class="form-control" name="choices[]" placeholder="Option" required>
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
                <input type="text" class="form-control" name="products[]" placeholder="Option" required>
                <input type="text" class="form-control text-end" name="price[]" id="price[]" required>
                <span class="input-group-text">€</span>
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
                            '<input type="text" class="form-control" name="choices[]" placeholder="New Option" required>' +
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
                                '<input type="text" class="form-control" name="products[]" placeholder="New Product" required>' +
                                '<input type="text" class="form-control text-end price" name="price[]" required><span class="input-group-text">€</span>' +
                                '<div class="input-group-append">' +
                                    '<button class="btn btn-outline-success" type="button" onclick="removeProduct(this)">Remove</button>' +
                                '</div>' +
                                '</div>');
        choicesContainer.append(newChoiceInput);
        $('.price').last().on('input', function() {
        var inputValue = this.value;
        var isValidDecimal = /^-?\d*\.?\d{0,2}$/.test(inputValue);

        if (!isValidDecimal) {
            this.value = inputValue.slice(0, -1); // Remove the last character (not a valid decimal)
        }
    });
        }
    
        function removeProduct(button) {
        $(button).closest('.input-group').remove();
        }
        document.getElementById('price[]').addEventListener('input', function() {
            var inputValue = this.value;
            var isValidDecimal = /^-?\d*\.?\d{0,2}$/.test(inputValue);

            if (!isValidDecimal) {
                this.value = inputValue.slice(0, -1); // Remove the last character (not a valid decimal)
            }
        });
</script>