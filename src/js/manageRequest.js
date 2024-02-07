if(document.getElementById("accept") != null){
    document.getElementById("accept").addEventListener("click", function() {
        let idNotifica = this.getAttribute('data-notificationid');
        let formData = new FormData();
        formData.append('notification', idNotifica);
        axios.post('./api/acceptRequest.php', formData).then(response => {
            location.reload();
        });
    });
}

if(document.getElementById("deny") != null){
    document.getElementById("deny").addEventListener("click", function() {
        let idNotifica = this.getAttribute('data-notificationid');
        let formData = new FormData();
        formData.append('notification', idNotifica);
        axios.post('./api/denyRequest.php', formData).then(response => {
            location.reload();
        });
    });
}
