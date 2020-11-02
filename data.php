
<?php
	

	/*$file = fopen("data.csv","r");
	$i=0;
	$data = [];
	while(! feof($file)){
		$tmp = fgetcsv($file); 
		//print_r($tmp);
		$id = $tmp[3];
		$alt= $tmp[1];
		echo '<img class="img-responsive" src="https://drive.google.com/uc?id='.$id.'" alt="'.$alt.'" style="width:100%"><br>';
		if($i==1){
			break;
		}
		$i++;
	}
	fclose($file);*/


	$data = json_decode(file_get_contents('data.json'), true);

	$awal = 0;
	$limit = 5;

	//print_r($_POST);

	if(isset($_POST['page'])){
		$p = (int)$_POST['page'];
		$awal = $p * $limit;
		if($p!=0){$awal+=$p;}
		//echo "<h1>post</h1>";
	}

	$end = $awal+$limit;
	
	for($i=$awal; $i<=$end; $i++){
		$id = $data[$i]['id'];
		$alt= $data[$i]['alt'];
		echo '<img class="img-responsive" src="https://drive.google.com/uc?id='.$id.'" alt="'.$alt.'" style="width:100%"><br>';
		//echo '<img class="img-responsive" src="'.$id.'" alt="'.$alt.'" style="width:100%">'.$i.'<br>';
		
	}
?>