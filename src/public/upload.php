<?php
	$file = '../files/'.basename($_FILES['file']['name']);
	if($_FILES['file']['type'] == 'application/pdf')
	{
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			echo "File was uploaded";
		}
		else{
			echo "Oops we have problems";
		}
	}
	else{
		echo "You can upload only pdf files";
	}

?>
