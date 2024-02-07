document.addEventListener("DOMContentLoaded", function() {
    if(document.getElementById("addPost") != null){
        document.getElementById("addPost").addEventListener("click", function(event) {
            event.preventDefault();
            let form = document.getElementById("newPostForm");
            let formData = new FormData();
            formData.append('caption', form.elements["caption"].value);
            formData.append('event', form.elements["event"].value);
            if (form.elements["image"].files.length > 0) {
                formData.append('image', form.elements["image"].files[0]);
            }
            axios.post('../api/newPost.php?pers=1', formData).then(response => {
                if (response.data.success) {
                    window.open('/PartyHub/src/index.php', '_self');
                }else{
                    alert(response.data.message);
                }
            });
        });
    } 
});

document.addEventListener("DOMContentLoaded", function() {
    if(document.getElementById("addEventPost") != null){
        document.getElementById("addEventPost").addEventListener("click", function(event) {
            event.preventDefault();
            let form = document.getElementById("newEventPostForm");
            let idEvent = this.getAttribute('data-eventid');
            let formData = new FormData();
            formData.append('caption', form.elements["caption"].value);
            formData.append('event', idEvent);
            axios.post('./api/newPost.php?pers=0', formData).then(response => {
               window.open('/PartyHub/src/eventPlanning.php?id='+ encodeURIComponent(idEvent), '_self');
            });
        });
    }
    
});