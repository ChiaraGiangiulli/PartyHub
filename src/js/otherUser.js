const params = new URLSearchParams(window.location.search);
const user= params.get("user");
let formData = new FormData();
formData.append('userId', user);

if(document.getElementById("follow") != null){
    document.getElementById("follow").addEventListener("click", function() {
        axios.post('./api/follow.php', formData).then(response => {
            location.reload();
        });
    });
}
if(document.getElementById("unfollow") != null){
    document.getElementById("unfollow").addEventListener("click", function() {
        axios.post('./api/unfollow.php', formData).then(response => {
            location.reload();
        });
    });
}
