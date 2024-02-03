function addChoice() {
    let choicesContainer = $('#choicesContainer');
    let newChoiceInput = $('<div class="input-group mb-3">' +
                            '<input type="text" class="form-control" name="choices[]" placeholder="New Option" title="new option" required>' +
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
                                '<input type="text" class="form-control" name="products[]" placeholder="New Product" title="new product" required>' +
                                '<input type="text" class="form-control text-end price" name="price[]" title="price" required><span class="input-group-text">€</span>' +
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

document.getElementById("addChoice").addEventListener("click", function() {
    addChoice();
});

document.getElementById("addProduct").addEventListener("click", function() {
    addProduct();
});