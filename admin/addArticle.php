<?php include 'partials/header.php'; ?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerAdd">
            <h2>Məqalə Yaz</h2>
            <div class="alertMessage error">
                <p>Bir problem yarandı</p>
            </div>
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
                    <label for="thumbnail">Məqalənin kiçik rəsmini əlavə et</label>
                    <input type="file" id="thumbnail">
                </div>
                <button type="submit" class="btn">Əlavə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>