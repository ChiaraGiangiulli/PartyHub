
document.getElementById("newEvent").addEventListener("click", function() {
    window.open('/PartyHub/src/view/createEvent.php','_self'); 
});

document.getElementById("following").addEventListener("click", function() {
    mostraModal('#followingModal');
});


document.getElementById("followers").addEventListener("click", function() {
    mostraModal('#followersModal');
});


function mostraModal(idModal) {
    $(idModal).modal('show');
} 

