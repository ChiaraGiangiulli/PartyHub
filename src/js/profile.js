document.getElementById("followers").addEventListener("click", function() {
    window.open('/PartyHub/src/api/followersList.php','_self');
});

document.getElementById("following").addEventListener("click", function() {
    window.open('/PartyHub/src/api/followingList.php','_self');
});

document.getElementById("newEvent").addEventListener("click", function() {
    window.open('/PartyHub/src/view/createEvent.php','_self');
});