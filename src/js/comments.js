document.querySelectorAll('.comment-button').forEach(function (button) {
    button.addEventListener("click", function() {
        let idPost = this.getAttribute('data-postid');
        let formData = new FormData();
        formData.append('postId', idPost);
        axios.post('./api/comments.php', formData).then(response => {
            let comments = response.data;
            console.log(comments);
            let stringComments = '';
            comments.forEach( comment => {
                stringComments += ` 
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                    </svg>
                    <a href="otherUsers.php?user=${comment.UserCommento}">${comment.UserCommento}</a>
                    : ${comment.Testo}
                </p>`
            });
            stringComments += `
            <form action="/PartyHub/src/api/newComment.php?post=${idPost}" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" id="comment" placeholder="Insert you comment..." name="comment">
                    <button type="submit" class="btn btn-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                        </svg>
                    </button>
                </div>
            </form> `;
            const offcanvasBody = document.getElementById("offcanvasBody");
            offcanvasBody.innerHTML = stringComments;
        });
    })
});
