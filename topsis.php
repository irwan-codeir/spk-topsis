<?php

require 'functions.php';

$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");


?>

<?php include 'template/header.php'; ?>


<h3>Nilai Alternatif</h3>
<hr class="mb-2">

<a href="tambah-topsis.php" class="btn btn-primary mb-2">Tambah Alternatif</a>
<table class="table" border="1">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">K01</th>
			<th scope="col">K02</th>
			<th scope="col">K03</th>
			<th scope="col">K04</th>
			<th scope="col">K05</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		<?php foreach ($alternatif as $a) : ?>
			<tr>
				<th scope="row"><?= $a['kode_alt']; ?></th>
				<td><?= $a['k01']; ?></td>
				<td><?= $a['k02']; ?></td>
				<td><?= $a['k03']; ?></td>
				<td><?= $a['k04']; ?></td>
				<td><?= $a['k05']; ?></td>
			</tr>

		<?php endforeach; ?>

	</tbody>
</table>

<hr>
<h3>Normalisasi Kuadratkan</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">K01</th>
			<th scope="col">K02</th>
			<th scope="col">K03</th>
			<th scope="col">K04</th>
			<th scope="col">K05</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$a2 = mysqli_query($conn, "SELECT id_alt, kode_alt, SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif");
		?>

		<?php foreach ($a2 as $a) : ?>
			<?php $sum1 = $a['total1']; ?>
			<?php $sum2 = $a['total2']; ?>
			<?php $sum3 = $a['total3']; ?>
			<?php $sum4 = $a['total4']; ?>
			<?php $sum5 = $a['total5']; ?>
			<?php echo $sum1; ?>
		<?php endforeach; ?>


		<?php foreach ($alternatif as $a) : ?>

			<tr>
				<th scope="row"><?= $a['kode_alt']; ?></th>
				<td><?= pow($a['k01'], 2); ?></td>
				<td><?= pow($a['k02'], 2); ?></td>
				<td><?= pow($a['k03'], 2); ?></td>
				<td><?= pow($a['k04'], 2); ?></td>
				<td><?= pow($a['k05'], 2); ?></td>
			</tr>


		<?php endforeach; ?>
		<tr>
			<td>total</td>
			<td><?php echo $sum1; ?></td>
			<td><?php echo $sum2; ?></td>
			<td><?php echo $sum3; ?></td>
			<td><?php echo $sum4; ?></td>
			<td><?php echo $sum5; ?></td>
		</tr>


	</tbody>
</table>

<hr>
<h3>Normalisasi</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">K01</th>
			<th scope="col">K02</th>
			<th scope="col">K03</th>
			<th scope="col">K04</th>
			<th scope="col">K05</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($alternatif as $a) : ?>
			<tr>
				<th scope="row"><?= $a['kode_alt']; ?></th>
				<td><?= round($a['k01'] / sqrt($sum1), 4); ?></td>
				<td><?= round($a['k02'] / sqrt($sum2), 4); ?></td>
				<td><?= round($a['k03'] / sqrt($sum3), 4); ?></td>
				<td><?= round($a['k04'] / sqrt($sum4), 4); ?></td>
				<td><?= round($a['k05'] / sqrt($sum5), 4); ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>

<hr>
<h3>Normalisasi terbobot</h3>
<?php

$kriteria = mysqli_query($conn, "SELECT * FROM tbl_pengunjung");
foreach ($kriteria as $k) {
	$kriteria1 = $k['k01'];
	$kriteria2 = $k['k02'];
	$kriteria3 = $k['k03'];
	$kriteria4 = $k['k04'];
	$kriteria5 = $k['k05'];
}

?>

<table class="table" border="1">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">K01</th>
			<th scope="col">K02</th>
			<th scope="col">K03</th>
			<th scope="col">K04</th>
			<th scope="col">K05</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($alternatif as $a) : ?>

			<tr>
				<th scope="row"><?= $a['kode_alt']; ?></th>
				<td><?= round(($a['k01'] / sqrt($sum1)) * $kriteria1, 4); ?></td>
				<td><?= round(($a['k02'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
				<td><?= round(($a['k03'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
				<td><?= round(($a['k04'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
				<td><?= round(($a['k05'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
			</tr>


		<?php endforeach; ?>

	</tbody>
</table>

<hr>
<h3>Menentukan Solusi Ideal Positif (A+) dan Matriks Ideal Negatif (A-).</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th scope="col">Yi</th>
			<th colspan="15">Solusi Ideal</th>
			<th scope="col">Max</th>
			<th scope="col">Min</th>
		</tr>


		<!-- menentukan max dan min -->
		<?php $query = mysqli_query($conn, "SELECT max(k01) as max1, min(k01) as min1, max(k02) as max2, min(k02) as min2, max(k03) as max3, min(k03) as min3, max(k04) as max4, min(k04) as min4, max(k05) as max5, min(k05) as min5 FROM tbl_alternatif"); ?>

		<tr>
			<td>Y1</td>
			<?php foreach ($alternatif as $a) : ?>
				<td><?= round(($a['k01'] / sqrt($sum1)) * $kriteria1, 4); ?></td>
			<?php endforeach; ?>

			<?php foreach ($query as $q) : ?>
				<td><?= round(($q['max1'] / sqrt($sum1)) * $kriteria1, 4); ?></td>
				<td><?= round(($q['min1'] / sqrt($sum1)) * $kriteria1, 4); ?></td>

			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Y2</td>
			<?php foreach ($alternatif as $a) : ?>
				<td><?= round(($a['k02'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
			<?php endforeach; ?>

			<?php foreach ($query as $q) : ?>
				<td><?= round(($q['max2'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
				<td><?= round(($q['min2'] / sqrt($sum2)) * $kriteria2, 4); ?></td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Y3</td>
			<?php foreach ($alternatif as $a) : ?>
				<td><?= round(($a['k03'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
			<?php endforeach; ?>
			<?php foreach ($query as $q) : ?>
				<td><?= round(($q['max3'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
				<td><?= round(($q['min3'] / sqrt($sum3)) * $kriteria3, 4); ?></td>
			<?php endforeach; ?>

		</tr>
		<tr>
			<td>Y4</td>
			<?php foreach ($alternatif as $a) : ?>
				<td><?= round(($a['k04'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
			<?php endforeach; ?>
			<?php foreach ($query as $q) : ?>
				<td><?= round(($q['max4'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
				<td><?= round(($q['min4'] / sqrt($sum4)) * $kriteria4, 4); ?></td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Y5</td>
			<?php foreach ($alternatif as $a) : ?>
				<td><?= round(($a['k05'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
			<?php endforeach; ?>
			<?php foreach ($query as $q) : ?>
				<td><?= round(($q['max5'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
				<td><?= round(($q['min5'] / sqrt($sum5)) * $kriteria5, 4); ?></td>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
</table>

<!-- rumus solusi ideal positif =sqrt(((max-yn)^2)+((max-yn)^2)+((max-yn)^2)+ -->


<div class="container text-center mt-5">
	<!-- Content here -->
	<h3>Menghitung jarak solusi ideal positif (D+) dan solusi ideal negatif(D-)</h3>
	<hr>
	<div class="row">

		<div class="col-6">
			<h3>Solusi ideal positif (D+)</h3>
			<table class="table" border="1">
				<thead>
					<tr>
						<th scope="col">D+</th>
						<th scope="col">Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($query as $a) : ?>
						<?php
						$maksimal1 = ($q['max1'] / sqrt($sum1)) * $kriteria1;
						$maksimal2 = ($q['max2'] / sqrt($sum2)) * $kriteria2;
						$maksimal3 = ($q['max3'] / sqrt($sum3)) * $kriteria3;
						$maksimal4 = ($q['max4'] / sqrt($sum4)) * $kriteria4;
						$maksimal5 = ($q['max5'] / sqrt($sum5)) * $kriteria5;
						?>

						<?php foreach ($alternatif as $a) : ?>
							<?php
							$y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
							$y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
							$y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
							$y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
							$y5 = $a['k05'] / sqrt($sum5) * $kriteria5;

							$dPositif = round(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);
							?>

							<tr>
								<th scope="row"><?= "D" . $i++ . "+"; ?></th>
								<td><?= $dPositif; ?></td>
							</tr>

						<?php endforeach; ?>

					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
		<div class="col-6">
			<h3>Solusi ideal negatif (D-)</h3>
			<table class="table" border="1">
				<thead>
					<tr>
						<th scope="col">D-</th>
						<th scope="col">Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($query as $a) : ?>
						<?php

						$minimal1 = ($q['min1'] / sqrt($sum1)) * $kriteria1;
						$minimal2 = ($q['min2'] / sqrt($sum2)) * $kriteria2;
						$minimal3 = ($q['min3'] / sqrt($sum3)) * $kriteria3;
						$minimal4 = ($q['min4'] / sqrt($sum4)) * $kriteria4;
						$minimal5 = ($q['min5'] / sqrt($sum5)) * $kriteria5;
						?>

						<?php foreach ($alternatif as $a) : ?>
							<?php
							$y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
							$y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
							$y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
							$y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
							$y5 = $a['k05'] / sqrt($sum5) * $kriteria5;



							$dNegatif = round(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

							$pref = $dNegatif / ($dNegatif + $dPositif);
							// echo $pref;
							?>

							<tr>
								<th scope="row"><?= "D" . $i++ . "-"; ?></th>
								<td><?= $dNegatif; ?></td>
							</tr>

						<?php endforeach; ?>

					<?php endforeach; ?>

				</tbody>
			</table>

		</div>

	</div>
</div>

<div class="container">
	<!-- Content here -->
	<h3>Nilai Preferensi</h3>
	<div class="row">
		<div class="col">
			<table class="table" border="1">
				<thead>
					<tr>
						<th scope="col" colspan="2">Nilai Preferensi</th>
						<th scope="col">Perangkingan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($query as $a) : ?>
						<?php
						$maksimal1 = ($q['max1'] / sqrt($sum1)) * $kriteria1;
						$maksimal2 = ($q['max2'] / sqrt($sum2)) * $kriteria2;
						$maksimal3 = ($q['max3'] / sqrt($sum3)) * $kriteria3;
						$maksimal4 = ($q['max4'] / sqrt($sum4)) * $kriteria4;
						$maksimal5 = ($q['max5'] / sqrt($sum5)) * $kriteria5;

						$minimal1 = ($q['min1'] / sqrt($sum1)) * $kriteria1;
						$minimal2 = ($q['min2'] / sqrt($sum2)) * $kriteria2;
						$minimal3 = ($q['min3'] / sqrt($sum3)) * $kriteria3;
						$minimal4 = ($q['min4'] / sqrt($sum4)) * $kriteria4;
						$minimal5 = ($q['min5'] / sqrt($sum5)) * $kriteria5;
						?>

						<?php foreach ($alternatif as $a) : ?>
							<?php
							$y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
							$y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
							$y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
							$y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
							$y5 = $a['k05'] / sqrt($sum5) * $kriteria5;

							$dPositif = round(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);

							$dNegatif = round(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

							$pref = $dNegatif / ($dNegatif + $dPositif);
							// echo $pref;

							?>
							<tr>
								<td><?= $a['kode_alt']; ?></td>
								<td><?= round($pref, 4); ?></td>
								<td>
									<?= $i++; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<?php include 'template/footer.php'; ?>