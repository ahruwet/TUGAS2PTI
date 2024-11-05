<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<center>
			<form action='latihan2b.php' method="post">
				<table border="3">
					<tr>
						<td colspan="2"><h4>PERHITUNGAN PENJUALAN BARANG</h4></td>
					</tr>
					<tr>
						<th>Tipe Kamar</th>
						<td> 
							<select name="tipe">
								<option>A - [2x3]m</option>
								<option>B - [3x3]m</option>
								<option>C - [4x3]m</option>
							</select>    
						</th>
					</td>
  					<tr>
    					<th>Sumber Air</th>
    					<td>
      						<input type="radio" name="sumberair" value="pdam" checked> Air PDAM<br>
      						<input type="radio" name="sumberair" value="tanah"> Air Tanah
    					</td>
  					</tr>
  					<tr>
    					<th>Fasilitas</th>
    					<td>
							<input type="checkbox" name="fasilitas[]" value="internet" checked> Internet<br>
							<input type="checkbox" name="fasilitas[]" value="televisi"> Televisi<br>
							<input type="checkbox" name="fasilitas[]" value="komputer" checked> Komputer<br>
							<input type="checkbox" name="fasilitas[]" value="ricecooker"> Rice Cooker
						</td>
  					</tr>
  					<tr>
  						<td colspan="2" align="center">
  							<input type="submit" value="Hitung">
							<input type="reset" value="Reset">
						</td>
  					</tr>
				</table>

				<hr style="border:0px">

				<table border="1" style="width:25%">
					<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$tipe = $_POST['tipe'] ?? null;
							$air = $_POST['sumberair'] ?? null;
							$fasilitas = $_POST['fasilitas'] ?? [];

							$h_kamar = 0;
							$h_air = 0;
							$h_fasilitas = 0;

							$total = 0;
							$splitkode = str_split($tipe,1)[0];

							if ($splitkode == 'A') {
								$h_kamar = 200000;
							}elseif ($splitkode == 'B') {
								$h_kamar = 250000;
							}elseif ($splitkode == 'C') {
								$h_kamar = 300000;
							};

							if ($air == "pdam") {
								$h_air = 20000;
							}else{
								$h_air = 15000;
							};

							if (in_array("internet", $fasilitas)) {
								$h_fasilitas += 150000;
							}
							if (in_array("televisi", $fasilitas)) {
								$h_fasilitas += 30000;
							}
							if (in_array("komputer", $fasilitas)) {
								$h_fasilitas += 100000;
							}
							if (in_array("ricecooker", $fasilitas)) {
								$h_fasilitas += 10000;
							}


							$total = $h_kamar + $h_air + $h_fasilitas;

							if ($tipe && $air) {
								echo "<tr><td colspan='2' align='center'><h4>HASIL PERHITUNGAN</h4></td></tr>";
								echo "<tr><td colspan='2' align='center' style='background-color: grey;'>Pilihan Kamar</td></tr>";
								echo "<tr><td>".$tipe."</td><td>Rp. ".number_format(strval($h_kamar),0,".",".")."</td></tr>";
								echo "<tr><td colspan='2' align='center' style='background-color: grey;'>Jenis Air</td></tr>";
								echo "<tr><td>".$air."</td><td>Rp. ".number_format(strval($h_air),0,".",".")."</td></tr>";
								echo "<tr><td colspan='2' align='center' style='background-color: grey;'>Fasilitas - Fasilitas</td></tr>";
								if (!empty($fasilitas)) {
									foreach ($fasilitas as $item) {
										switch ($item) {
											case 'internet':
												echo "<tr><td>Internet</td><td>Rp. 150.000</td></tr>";
												break;
											case 'televisi':
												echo "<tr><td>Televisi</td><td>Rp. 30.000</td></tr>";
												break;
											case 'komputer':
												echo "<tr><td>Komputer</td><td>Rp. 100.000</td></tr>";
												break;
											case 'ricecooker':
												echo "<tr><td>Rice Cooker</td><td>Rp. 10.000</td></tr>";
												break;
										}
									}
								}
								echo "<tr><td align='center' style='background-color: grey;'><b>Total Bayar</b></td><td>Rp. ".number_format(strval($total),0,".",".")."</td></tr>";	
							};
						};
					?>
				</table>
			</form>
		</center>
	</body>
</html>