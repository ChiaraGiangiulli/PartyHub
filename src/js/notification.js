document.getElementById("notification").addEventListener("click", function() {
    location.reload();
});
document.getElementById("notificationButton").addEventListener("click", function() {
    axios.post('./api/notification.php').then(response => {
    });
});