let formData = new FormData();
formData.append('postId', idPost);

document.getElementById("like").addEventListener("click", function() {
    axios.post('./api/like.php', formData).then(response => {
        location.reload();
    });
});