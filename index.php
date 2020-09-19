<?php include "template/header.php"; ?>
<?php include "template/navbar.php"; ?>

<div class="container">
    <div class="row content mb-5">
        <div class="col-9 bg-jumbotron" style="background-image: url('assets/img/car.png');">

        </div>
        <div class="col-3 bg-jumbotron mt-2 text-center">
            <div>
                <h3>Dapatkan Rekomendasi Mobil MPV <br>terbaik, dengan mengisi form dibawah <br>ini!</h3>
                <form action="">
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="alamat" class="form-control form-control-sm" placeholder="E-mail" aria-describedby="helpId">
                    </div>
                    <button type="submit" class="btn btn-block btn-warning text-white">Kirim</button>

                </form>
            </div>
            <div class="mt-3 mb-3">
                <h3>Silahkan pilih kriteria mobil MPV<br>yang anda inginkan :</h3>
                <form action="">
                    <div class="form-group">
                        <select id="harga" class="form-control form-control-sm">
                            <option selected>-- Pilih Harga --</option>
                            <option>=> 290 juta</option>
                            <option>200 juta s/d 289 juta</option>
                            <option>140 juta s/d 199 juta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="bbm" class="form-control form-control-sm">
                            <option selected>-- Pilih BBM --</option>
                            <option>8km s/d 10km</option>
                            <option>11km s/d 12km</option>
                            <option>12km s/d 17km</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="kenyamanan" class="form-control form-control-sm">
                            <option selected>-- Pilih Kenyamanan --</option>
                            <option>Rate 4 - 4,4</option>
                            <option>Rate 4,5 - 4,7</option>
                            <option>Rate => 4,8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="kapasitas" class="form-control form-control-sm">
                            <option selected>-- Pilih Kapasitas Penumpang --</option>
                            <option>7 Orang</option>
                            <option>8 Orang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="mesin" class="form-control form-control-sm">
                            <option selected>-- Pilih Mesin --</option>
                            <option>1300 - 1350cc</option>
                            <option>1360 - 1460cc</option>
                            <option>1462 - 2499cc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="harga" class="form-control form-control-sm">
                            <option selected>-- Pilih Warna --</option>
                            <option>Putih</option>
                            <option>Hitam</option>
                            <option>Warna Lain</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-block btn-warning text-white rounded" data-toggle="modal" data-target="#sendModal">Lihat Rekomendasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="caption mt-5 mb-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <h3>MPV Models</h3>
                <hr width="40%">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam culpa optio eveniet architecto, minima qui cupiditate fugit nesciunt earum soluta esse expedita magnam quis ad autem placeat aspernatur iure repellat. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea rerum, nfacilis pariatur sunt, voluptatum magni dolores doloremque placeat consequuntur quae?</p>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>

<section class="kategori mt-5 bg-light d-flex align-items-center">
    <div class="container">
        <div class="row text-center">
            <div class="col-4 ">
                <div class="card">
                    <img src="assets/img/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-muted">View Model Suzuki</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="assets/img/2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-muted">View Model Honda</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="assets/img/3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-muted">View Model Toyota</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade checkout-modal-success" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="img/logo/success-checkout.png" class="mb-5">
                <h3>Checkout Berhasil</h3>
                <p>Anda akan mendapatkan barang anda <br>dalam beberapa hari</p>
                <a href="index.php" type="button" class="btn mt-3" data-dismiss="modal" style="background-color: #eaeaef; color:#adadad;">Home</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#checkoutModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>

<?php include "template/footer.php"; ?>