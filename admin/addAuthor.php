<?php include 'partials/header.php'; ?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerAdd">
            <h2>Yazar Əlavə Et</h2>
            <div class="alertMessage error">
                <p>Bir problem yarandı</p>
            </div>
            <form action="">
                <input type="text" placeholder="Ad">
                <input type="text" placeholder="Soy Ad">
                <input type="text" placeholder="İstifadəçi Adı">
                <input type="password" placeholder="Şifrə Yarat">
                <input type="password" placeholder="Şifrəni Təsdiqlə">
                <select>
                    <option value="0">Yazar</option>
                    <option value="1">Admin</option>
                </select>
                <div class="formControl">
                    <label for="formControl">Profil Şəkli</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Əlavə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>