<div class="container mt-5">
    <form id="surveyForm">
    <div class="form-group">
        <label for="question">Survey Question:</label>
        <input type="text" class="form-control" id="question" placeholder="Enter your question">
    </div>

    <div class="form-group" id="choicesContainer">
        <label for="option1">Options:</label>
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="choices[]" placeholder="Option 1">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="addChoice()">Add Choice</button>
        </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
    function addChoice() {
    var choicesContainer = $('#choicesContainer');
    var newChoiceInput = $('<div class="input-group mb-3">' +
                            '<input type="text" class="form-control" name="choices[]" placeholder="New Option">' +
                            '<div class="input-group-append">' +
                                '<button class="btn btn-outline-secondary" type="button" onclick="removeChoice(this)">Remove</button>' +
                            '</div>' +
                            '</div>');
    choicesContainer.append(newChoiceInput);
    }

    function removeChoice(button) {
    $(button).closest('.input-group').remove();
    }
    </script>

</body>
</html>
