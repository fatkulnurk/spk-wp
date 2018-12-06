<?php
		$data = array(
				array('42','66000','60','75','2355'),
				array('50','90000','72','60','1421'),
				array('63','91500','65','80','2585'),
		);

		$jmldata=count($data);
		$bobot=array(5,3,4,4,2);
		$jmlbobot=count($bobot);
		$countbobot=0;
		

		for($i=0;$i<$jmlbobot;$i++){
			$countbobot+=$bobot[$i];
		}
		for($i=0;$i<$jmlbobot;$i++){
			$hslbobot[$i]=$bobot[$i]/$countbobot;
		}	
		echo "Perhitungan Bobot Kriteria";
		echo "<br><br>";
		print_r($hslbobot);
		$biaya=array(1,0,1,1,0);
		
		for($j=0;$j<5;$j++){
				if($biaya[$j]==0){
					$hslbobot[$j]=$hslbobot[$j]*(-1);
				}
		}

		$jml[0]=1;
		$jml[1]=1;
		$jml[2]=1;
		echo "<br>";
		echo "<br>";
		for($i=0;$i<3;$i++){
			 echo "============<br>"; 
			 echo "Data Baris ke - $i"; 
			for($j=0;$j<5;$j++){
					$jml[$i]=$jml[$i]*pow($data[$i][$j],$hslbobot[$j]);
				
				echo "<br>";
			    print_r($biaya[$j]);
			    echo "<br>";
			    print_r($data[$i][$j]);
			    echo "<br>";
			    print_r($hslbobot[$j]);
			    echo "<br>";
			}
			echo "<br>";
		}
			  echo "============<br>";
			  echo"Perhitungan Vektor S";
			  echo "<br>";
			  echo "<br>";
			  print_r($jml);
			  echo "<br><br>";
			  echo "============<br>";
			  echo"Perhitungan Vektor V";
			  echo "<br>";
			  echo "<br>";

		
		//jml data s
		$counts=0;
		for($i=0;$i<$jmldata;$i++){
			$counts+=$jml[$i];
		}

		//hitung bobot tiap v
		for($i=0;$i<$jmldata;$i++){
			$bobotrank[$i]=$jml[$i]/$counts;
			print_r($i . " -> " . $bobotrank[$i]);
			echo "<br>";
		}	
		echo "<br>";
		echo "============<br>";
		echo"V Terbesar : ";
		$max=max($bobotrank);
		print_r($max);




		
?>