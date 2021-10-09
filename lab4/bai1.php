<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['n'])) $n=$_POST['n'];
	else $n=0;

	$ketqua="";
	if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		

	
        if (is_numeric($n) )  
        {
                $arr=array();
	    	for($i=0;$i<$n;$i++)
	    	{
		    	$x=rand(-200,200);
		    	$arr[$i]=$x;
		    }
            asort($arr);
            $y=rand(-200,200);
           
            $pt=rand(1,$n);
           

           
		//In ra mảng vừa tạo
		    $ketqua="Mảng được tạo là:" .implode(",",$arr)."&#13;&#10;";
			$ketqua.="phần tử chền:$y";
			$ketqua.=" vị trí:$pt";
			array_splice( $arr, $pt, 0, $y ); 
			$ketqua.="\nMảng sau khi chèn:";
			foreach($arr as $v){
				$ketqua.="$v &nbsp;";
			}

			$ketqua.="\n mang sau khi sap xep:";
			for($i=0;$i<$pt;$i++){
				$arr1[$i]=$arr[$i];
			}
			sort($arr1);
		

			for($i=$pt+1;$i<count($arr);$i++){
				$arr2[$i]=$arr[$i];
			}
			rsort($arr2);
			$arr3=array_merge($arr1, $arr2);
			array_splice( $arr3, $pt, 0, $y ); 
			foreach($arr3 as $v){
				$ketqua.="$v &nbsp";
			}
        }

        else {

                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $n="";
            }
	}
?>
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>