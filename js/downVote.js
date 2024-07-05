document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.downVoteButton').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const articleId = this.getAttribute('articleData_id');
            const authorId = this.getAttribute('authorData_id');
            const downVoteCountSpan = this.querySelector('.downVoteCount');
            const upVoteButton = document.querySelector(`.upVoteButton[articleData_id='${articleId}']`);
            const upVoteCountSpan = upVoteButton.querySelector('.upVoteCount');

            fetch('downVote.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `article_id=${articleId}&author_id=${authorId}`
            })
            .then(response => response.json())
            .then(data => {
                downVoteCountSpan.textContent = data.downVotes;
                if (data.downVoted) {
                    this.classList.add('voted');
                    upVoteButton.classList.remove('voted');
                } else {
                    this.classList.remove('voted');
                }
                upVoteCountSpan.textContent = data.upVotes;
            })
        });
    });
});
