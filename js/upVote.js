document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.upVoteButton').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const articleId = this.getAttribute('articleData_id');
            const authorId = this.getAttribute('authorData_id');
            const upVoteCountSpan = this.querySelector('.upVoteCount');
            const downVoteButton = document.querySelector(`.downVoteButton[articleData_id='${articleId}']`);
            const downVoteCountSpan = downVoteButton.querySelector('.downVoteCount');

            fetch('upVote.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `article_id=${articleId}&author_id=${authorId}`
            })
            .then(response => response.json())
            .then(data => {
                upVoteCountSpan.textContent = data.upVotes;
                if (data.upVoted) {
                    this.classList.add('voted');
                    downVoteButton.classList.remove('voted');
                } else {
                    this.classList.remove('voted');
                }
                downVoteCountSpan.textContent = data.downVotes;
            })
        });
    });
});
