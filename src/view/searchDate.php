<?php require_once 'search.php' ?>

    <form class="navbar-form" method="post" action="/PartyHub/src/api/eventsFromDate.php">
        <div class="form-group d-flex justify-content-center">
        <input type="date" id="dataInput" name="data" required>
        <button type="submit" id="submitbtn" class="btn btn-primary">Search</button>
        </div>
        
    </form>
    
</body>