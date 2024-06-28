<?php include 'partials/header.php'; ?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerEdit">
            <h2>Yazarı Redaktə Et</h2>
            <form action="">
                <input type="text" placeholder="Ad">
                <input type="text" placeholder="Soy Ad">
                <input type="text" placeholder="İstifadəçi Adı">
                <select>
                    <option value="0">Yazar</option>
                    <option value="1">Admin</option>
                </select>
                <div class="formControl">
                    <label for="formControl">Profil Şəklini dəyişdir</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Redaktə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>