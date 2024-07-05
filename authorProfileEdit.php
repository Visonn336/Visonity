<?php
include 'partials/header.php';



if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'authorProfile.php?id=' . $id);
    die();
}
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerEdit">
            <h2>Profili Redaktə Et</h2>
            <form action="<?= ROOT_URL ?>authorProfileEditLogic.php" method="POST">
            <input type="hidden" value="<?= $user['id'] ?>" name="id">
                <input type="text" name="firstname" value="<?= $user['firstname'] ?>" placeholder="Ad">
                <input type="text" name="lastname" value="<?= $user['lastname'] ?>" placeholder="Soy Ad">
                <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="İstifadəçi Adı">
                <input type="text" name="about_me" value="<?= $user['about_me'] ?>" placeholder="Haqqımda">
                <input type="password" name="password" placeholder="Yeni şifrə">
                <button type="submit" name="submit" class="btn">Redaktə Et</button>
            </form>
        </div>
    </section>



<?php include 'partials/footer.php'; ?>