<?php include 'partials/header.php'; ?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerEdit">
            <h2>Məqaləni Redaktə Et</h2>
            <form action="">
                <input type="text" placeholder="Başlıq">
                <select>
                    <option value="1">Texnologiya</option>
                </select>
                <textarea rows="10" placeholder="Gövdə"></textarea>
                <div class="formControl inline">
                    <input type="checkbox" id="isFeatured">
                    <label for="isFeatured">Sabitlənmiş</label>
                </div>
                <div class="formControl">
                    <label for="thumbnail">Məqalənin kiçik rəsmini dəyişdir</label>
                    <input type="file" id="thumbnail">
                </div>
                <button type="submit" class="btn">Redaktə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>