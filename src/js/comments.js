document.querySelectorAll('.comment-button').forEach(function (button) {
    button.addEventListener("click", function() {
        var idPost = this.getAttribute('data-postid');
        let formData = new FormData();
        formData.append('postId', idPost);
        axios.post('/PartyHub/src/index.php', formData).then(response => {
            
        });
    })
});
