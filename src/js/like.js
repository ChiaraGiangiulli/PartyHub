document.querySelectorAll('.like-button').forEach(function (button) {
    button.addEventListener("click", function() {
        let idPost = this.getAttribute('data-postid');
        let formData = new FormData();
        formData.append('postId', idPost);
        axios.post('./api/like.php', formData).then(response => {
            location.reload();
        });
    })
});