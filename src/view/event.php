<!DOCTYPE html>
<?php $dbh = new DatabaseHelper("localhost", "root", "", "partyhub", 3306);
$name = $_POST['search'];
$res = $dbh->getEventFromName($name);
?>
<div class="container-sm">
    <div class="row">
        <div class="col-sm-6 m-5">
            <img style="float:left; width: 50%;"src="/PartyHub/src/img/another.jpg" alt="another img">
        </div>
    </div>
</div>
<div class="container-sm" style="margin-left:60%">
     <div class="row">
        <div class="col-sm-12">
            <?php $re?>
        </div>
        </div> 
        <div class="row">
            <div class="col-sm-6">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6">
                
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6">
                
            </div>
        </div>
    </div> 
</div>
