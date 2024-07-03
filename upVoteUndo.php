<?php 
require 'config/database.php';

if (isset($_GET['article_id']) && isset($_GET['author_id'])) {
    $article_id = filter_var($_GET['article_id'], FILTER_SANITIZE_NUMBER_INT);
    $author_id = filter_var($_GET['author_id'], FILTER_SANITIZE_NUMBER_INT);

    $up_votesQuery = "DELETE FROM up_votes WHERE article_id=$article_id AND author_id=$author_id";
    $up_votesResult = mysqli_query($connection, $up_votesQuery);

    $upVotesQuery = "SELECT * FROM up_votes WHERE article_id=$article_id";
    $upVotesResult = mysqli_query($connection, $upVotesQuery);
    $upVotes = mysqli_num_rows($upVotesResult);
    $articleQuery = "UPDATE articles SET up_vote=$upVotes WHERE id=$article_id LIMIT 1";
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

