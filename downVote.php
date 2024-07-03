<?php 
require 'config/database.php';

if (isset($_GET['article_id']) && isset($_GET['author_id'])) {
    $article_id = filter_var($_GET['article_id'], FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_var($_GET['author_id'], FILTER_SANITIZE_NUMBER_INT);

    $down_votesQuery = "INSERT INTO down_votes (article_id, author_id) VALUES ('$article_id', '$author_id')";
    $down_votesResult = mysqli_query($connection, $down_votesQuery);

    $downVotesQuery = "SELECT * FROM down_votes WHERE article_id=$article_id";
    $downVotesResult = mysqli_query($connection, $downVotesQuery);
    $downVotes = mysqli_num_rows($downVotesResult);
    $articleQuery = "UPDATE articles SET down_vote=$downVotes WHERE id=$article_id LIMIT 1";
    $articleResult = mysqli_query($connection, $articleQuery);

    if (!mysqli_errno($connection)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

} else {
    header('location: ' . ROOT_URL . 'discover.php');
    die();
}
?>

