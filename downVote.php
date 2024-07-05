<?php
require 'config/database.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['article_id']) && isset($_POST['author_id'])) {
        $article_id = filter_var($_POST['article_id'], FILTER_SANITIZE_NUMBER_INT);
        $author_id = filter_var($_POST['author_id'], FILTER_SANITIZE_NUMBER_INT);

        $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$author_id";
        $downVoteResult = mysqli_query($connection, $downVoteQuery);

        if (mysqli_num_rows($downVoteResult) > 0) {
            $deleteVoteQuery = "DELETE FROM down_votes WHERE article_id=$article_id AND author_id=$author_id";
            mysqli_query($connection, $deleteVoteQuery);
            $response['downVoted'] = false;
        } else {
            $insertVoteQuery = "INSERT INTO down_votes (article_id, author_id) VALUES ($article_id, $author_id)";
            mysqli_query($connection, $insertVoteQuery);
            $response['downVoted'] = true;

            $deleteUpVoteQuery = "DELETE FROM up_votes WHERE article_id=$article_id AND author_id=$author_id";
            mysqli_query($connection, $deleteUpVoteQuery);
        }

        $downVotesQuery = "SELECT * FROM down_votes WHERE article_id=$article_id";
        $downVotesResult = mysqli_query($connection, $downVotesQuery);
        $downVotes = mysqli_num_rows($downVotesResult);
        $articleQuery = "UPDATE articles SET down_vote=$downVotes WHERE id=$article_id LIMIT 1";
        mysqli_query($connection, $articleQuery);

        $upVotesQuery = "SELECT * FROM up_votes WHERE article_id=$article_id";
        $upVotesResult = mysqli_query($connection, $upVotesQuery);
        $upVotes = mysqli_num_rows($upVotesResult);
        $articleQuery = "UPDATE articles SET up_vote=$upVotes WHERE id=$article_id LIMIT 1";
        mysqli_query($connection, $articleQuery);

        if (!mysqli_errno($connection)) {
            $response['downVotes'] = $downVotes;
            $response['upVotes'] = $upVotes;
        }
    }
}

echo json_encode($response);
?>
