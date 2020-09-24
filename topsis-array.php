<?php  

$AO1 = [5,5,5,3,1];
$AO2 = [3,5,3,3,1];
$AO3 = [3,5,3,3,1];
$AO4 = [3,5,3,3,1,4,7,9,3,43,2];

$alternatif = [
			[5,5,5,3,1],
			[3,5,3,3,1],
			[3,5,3,3,1],
			[3,5,3,3,1],
			[3,5,3,3,1]
	];



echo $AO1[4];
echo "<br>";
var_dump($AO1);
echo "<br>";

print_r($AO2);

echo "<p>menambahkan elemen baru</p>";
var_dump($AO3);
$AO3[] = 10;
echo "<br>";
var_dump($AO3);
echo "<br>";

echo "<p>Pengulangan Pada array untuk persiapan menghitung metode Topsis</p>";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Topsis Array</title>
</head>
<body>
	<p>cara kedua menggunakan for</p>
	<?php for($i=0; $i < count($AO4); $i++) { ?>
		<div><?php echo $AO4[$i]; ?> </div>
	<?php } ?>

	<hr>
	<!-- cara kedua menggunakan foreach -->
	<p>cara kedua menggunakan array foreach</p>
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
			      <th scope="row">A0<?= $i++; ?></th>
			      <td><?= $a[0]; ?></td>
			      <td><?= $a[1]; ?></td>
			      <td><?= $a[2]; ?></td>
			      <td><?= $a[3]; ?></td>
			      <td><?= $a[4]; ?></td>
			    </tr>
				
			<?php endforeach; ?>
		    
		  </tbody>
		</table>
		
		<hr>
		<p>cara ketiga menggunakan array associative</p>
		<?php 
			$alternatif2 = [
			[
				"K01" => 5,
				"K02" => 5,
				"K03" => 5,
				"K04" => 3,
				"K05" => 1
			],
			[
				"K01" => 3,
				"K02" => 3,
				"K03" => 5,
				"K04" => 4,
				"K05" => 2
			],
			[
				"K01" => 5,
				"K02" => 4,
				"K03" => 3,
				"K04" => 3,
				"K05" => 5
			],
			[
				"K01" => 5,
				"K02" => 2,
				"K03" => 1,
				"K04" => 4,
				"K05" => 4
			],
			[
				"K01" => 5,
				"K02" => 5,
				"K03" => 5,
				"K04" => 3,
				"K05" => 1
			],
			[
				"K01" => 5,
				"K02" => 5,
				"K03" => 5,
				"K04" => 3,
				"K05" => 1
			],
				
				
			];
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
		  	<?php $i = 1; ?>
		  	<?php foreach ($alternatif2 as $a2) : ?>
		  		<tr>
			      <th scope="row">A0<?= $i++; ?></th>
			      <td><?= $a2["K01"]*2; ?></td>
			      <td><?= $a2["K02"]; ?></td>
			      <td><?= $a2["K03"]; ?></td>
			      <td><?= $a2["K04"]; ?></td>
			      <td><?= $a2["K05"]; ?></td>
			    </tr>
				
			<?php endforeach; ?>
		    
		  </tbody>
		</table>

<br><br>


</body>
</html>