<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Pengambilan Keputusan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bulma.min.css" /> 
</head>
<body>
	<div class="hero is-info has-text-centered is-medium is-bold">
		<div class="hero-body container">
			<h1 class="title is-1">Sistem Pengambilan Keputusan</h1>
			<h1 class="subtitle is-2">Metode wp</div>
		</div>
	</div>
	<section class="section">
	<div class="container">
		
		<?php
		// data
		$data = array(
			// rata2 pembeli | harga beli | kepadatan penduduk | waktu jualan | biaya parkir
				array('42','66000','60','75','2355'),
				array('50','90000','72','60','1421'),
				array('63','91500','65','80','2585'),
		);

		
		echo '
		<table class="table is-bordered is-hoverable is-fullwidth">
		';
		 echo '<thead>
		 <th colspan="5">
		 INI DATA ASLINYA
		 </th>
		 </thead>'; 
		 for ($i=0; $i < count($data);$i++){
			echo '<tr>';
			 for($j=0; $j< count($data[0]);$j++){
				 echo '<td>'.$data[$i][$j].'</td>';
			 }
			 echo '</tr>';
		 }
		 echo '</table>';

		// hitung jumlah data
		$jmldata=count($data);

		// rating kriteria
		$bobot=array(5,3,4,4,2);

		// n rating
		$jmlbobot=count($bobot);

		// jumlah total rating
		$countbobot=0;
		

		// total value bobot
		for($i=0;$i<$jmlbobot;$i++){
			$countbobot+=$bobot[$i];
		}

		// menghitung bobot tiap rating kriteria
		for($i=0;$i<$jmlbobot;$i++){
			$hslbobot[$i]=$bobot[$i]/$countbobot;
		}	

		echo '<h3 class="title is-3">Perhitungan Hasil Bagi Bobot</h3>';
		echo '
		<table class="table is-bordered is-hoverable is-fullwidth">
	   ';
		foreach ($hslbobot as $value) {
			echo '
			<tr>
			<td>'.$value.'</td>
			</tr>
			';
		}
		echo '
		 </table>
		';
		

		// ini max min
		$biaya=array(1,0,1,1,0);
		
		// hitung biaya (yang ada pangkat)
		for($j=0;$j<5;$j++){
				if($biaya[$j]==0){
					$hslbobot[$j]=$hslbobot[$j]*(-1);
				}
		}

		// ini S1 - S3 (jumlah data)
		$jml[0]=1;
		$jml[1]=1;
		$jml[2]=1;
		
		echo "<hr>";


		for($i=0;$i<3;$i++){ 
			echo '
			<table class="table is-bordered is-hoverable is-fullwidth">
			';
			 echo '<thead>
			 <th colspan="3">
			 '."Data Baris ke - $i".'
			 </th>
			 </thead>'; 

			 // menghitung vektor s
			for($j=0;$j<5;$j++){
					$jml[$i]=$jml[$i]*pow($data[$i][$j],$hslbobot[$j]);
				
				echo "<tr><td>";
			    print_r($biaya[$j]);
			    echo "</td><td>";
			    print_r($data[$i][$j]);
			    echo "</td><td>";
			    print_r($hslbobot[$j]);
			    echo "</td></tr>";
			}
			echo "</table>";
		}
			  echo "<hr>"; 

			  echo '
			  <table class="table is-bordered is-hoverable is-fullwidth">
			  ';
			   echo '<thead>
			   <th colspan="3">
			   Perhitungan Vektor S
			   </th>
			   </thead>'; 
			   for ($i=0; $i<count($jml);$i++){
				   echo '
					   <tr>
					   <td>'.$i.'</td>
					   <td>'.$jml[$i].'</td>
					   </tr>
				   ';
			   }
			   echo '</table>';
		
		//jml data s
		$counts=0;
		for($i=0;$i<$jmldata;$i++){
			$counts+=$jml[$i];
		}

		echo "<hr>";

		//hitung bobot tiap v
		echo '
		<table class="table is-bordered is-hoverable is-fullwidth">
		';
		 echo '<thead>
		 <th colspan="3">
		 Perhitungan Vektor V
		 </th>
		 </thead>'; 

		for($i=0;$i<$jmldata;$i++){
			$bobotrank[$i]=$jml[$i]/$counts; 
			
			echo '
			<tr>
			<td>'.$i.'</td>
			<td>'.$bobotrank[$i].'</td>
			</tr>
		';
		}	 
		echo '</table>';

		echo "<hr>";
		echo"Nah ketemu, berikut adalah V Terbesar : ";
		$max=max($bobotrank);
		print_r($max);




		
?>