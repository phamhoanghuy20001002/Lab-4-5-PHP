<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="bai2.css">
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['arr']))
     $arr=$_POST['arr'];
	else $arr="";

	$ketqua="";
	if(isset($_POST['hthi'])) 
	{	
        $arr1=explode(",", $arr);
		$ketqua	=array_sum($arr1);
	}
	
?>

        
      
<form action="" method="post">
	Nhập n: <input type="text" name="arr" value="<?php echo $arr?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>
