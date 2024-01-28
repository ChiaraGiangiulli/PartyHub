if(document.getElementById("requestEvent") != null){
    document.getElementById("requestEvent").addEventListener("click", function() {
        let idEvento = this.getAttribute('data-eventid');
        let formData = new FormData();
        formData.append('event', idEvento);
        axios.post('./api/requestEvent.php', formData).then(response => {
            
        });
    });
}