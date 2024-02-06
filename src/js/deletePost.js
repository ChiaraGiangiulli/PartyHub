document.getElementById('deletePost').addEventListener("click", function() {
        let idPost = this.getAttribute('data-postid');
        let formData = new FormData();
        formData.append('postId', idPost);
        console.log(idPost);
        axios.post('./api/deletePost.php', formData).then(response => {
            location.reload();
    })
});
