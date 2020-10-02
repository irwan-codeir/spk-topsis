<?php include "template/header.php"; ?>
<?php include "template/navbar.php"; ?>

<?php
require "functions.php";

$pengunjung = mysqli_query($conn, "SELECT * FROM tbl_pengunjung");

if (isset($_POST['submit'])) {
    if (tambah_pengunjung($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('Kriteria berhasil diinput');
				document.location.href = 'lihat-rekomendasi.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('Kriteria gagal diinput, Coba Ulangi!');
				document.location.href = 'index.php';
			</script>
		";
    }
}

?>

<div class="container">
    <div class="row content mb-5">
        <div class="col-9 bg-jumbotron" style="background-image: url('assets/img/car.png');">

        </div>
        <div class="col-3 bg-jumbotron mt-3 mb-5 text-center">
            <h3>Dapatkan Rekomendasi Mobil MPV <br>terbaik, dengan mengisi form dibawah <br>ini!</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama" autofocus autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="E-mail" autocomplete="off">
                </div>
                <h3>Silahkan pilih kriteria mobil MPV<br>yang anda inginkan :</h3>
                <div class="form-group">
                    <select id="harga" class="form-control form-control-sm" name="k01">
                        <option selected>-- Pilih Harga --</option>
                        <option value="1">=> 290 juta</option>
                        <option value="3">200 juta s/d 289 juta</option>
                        <option value="5">140 juta s/d 199 juta</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="bbm" class="form-control form-control-sm" name="k02">
                        <option selected>-- Pilih BBM --</option>
                        <option value="1">8km s/d 10km</option>
                        <option value="4">11km s/d 12km</option>
                        <option value="5">12km s/d 17km</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="kenyamanan" class="form-control form-control-sm" name="k03">
                        <option selected>-- Pilih Kenyamanan --</option>
                        <option value="1">Rate 4 - 4,4</option>
                        <option value="3">Rate 4,5 - 4,7</option>
                        <option value="5">Rate => 4,8</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="kapasitas" class="form-control form-control-sm" name="k04">
                        <option selected>-- Pilih Kapasitas Penumpang --</option>
                        <option value="2">7 Orang</option>
                        <option value="5">8 Orang</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="mesin" class="form-control form-control-sm" name="k05">
                        <option selected>-- Pilih Mesin --</option>
                        <option value="1">1300 - 1350cc</option>
                        <option value="3">1360 - 1460cc</option>
                        <option value="5">1462 - 2499cc</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <select id="harga" class="form-control form-control-sm">
                        <option selected>-- Pilih Warna --</option>
                        <option value="1">Putih</option>
                        <option value="3">Hitam</option>
                        <option value="5">Warna Lain</option>
                    </select>
                </div> -->
                <button type="submit" name="submit" class="btn btn-block btn-warning text-white rounded mt-4">Lihat Rekomendasi</button>
                <!-- <button type="button" class="btn btn-block btn-warning text-white rounded mt-4" data-toggle="modal" data-target="#sendModal">Lihat Rekomendasi</button> -->
            </form>
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