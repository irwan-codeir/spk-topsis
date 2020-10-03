<?php include "template/header.php"; ?>
<?php include "template/navbar.php"; ?>

<section class="">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6424210464479!2d106.7774065291382!3d-6.188293766429548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnMTcuOSJTIDEwNsKwNDYnNDAuNiJF!5e0!3m2!1sen!2sid!4v1601728999794!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-6 offset-6">
            <div class="card p-5" style="margin-top: -400px; box-shadow: 0 0 2px rgba(0, 0, 0, 8);">
                <h3>New Bisnis</h3>
                <hr>
                <p>Wherever your requirements, please fill out the form with<br>
                    your information and we will get back to your shortly.</p>
                <div class="row">
                    <div class="col-md-6">
                        <form action="">
                            <div class="form-group">
                                <label for="">Nama anda</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right" name="kirim">Kirim Pesan!</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>