<?php $title = "Contact Us"; ?>
<?php include "template/header.php"; ?>
<?php include "template/navbar.php"; ?>

<section class="">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6424210464479!2d106.7774065291382!3d-6.188293766429548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnMTcuOSJTIDEwNsKwNDYnNDAuNiJF!5e0!3m2!1sen!2sid!4v1601728999794!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</section>
<section class="contact" style="height: 200px; margin-top: -5px; background-color: black;">
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Our Address</h5>
                        <p>Jl. Arjuna Selatan No. 40<br>
                            Kebon Jeruk Jakarta Barat</br>
                            DKI Jakarta<br>
                            Indonesia
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5>Other Contact Info</h5>
                        <p>
                            <email>irwan.codeir@gmail.com</email> <br>
                            <a class="" href="tel:+6287789066519">+62 877 8906 6519</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-6">
                <div class="card p-4" style="margin-top: -580px; box-shadow: 0 0 5px rgba(0, 0, 0, 8); border: none;">
                    <h3>Kontak Kami</h3>
                    <hr>
                    <p>Wherever your requirements, please fill out the form with<br>
                        your information and we will get back to your shortly.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Nama anda</label>
                                    <input type="text" class="form-control" autocomplete="off" placeholder="nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" autocomplete="off" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="tel" class="form-control" pattern="\(\d\d\d\d\)-\d\d\d\d\d\d\d\d" name="ponsel" placeholder="(021)-999999999" required>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pesan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning text-white float-right" name="kirim">Kirim Pesan!</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "template/footer.php"; ?>