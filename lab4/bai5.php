<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<body>
<?php 
$mang= array();
if(isset($_POST['ma'])) $ma=$_POST['ma'];
    else $ma="";
    if(isset($_POST['ten'])) $ten=$_POST['ten'];
    else $ten="";
    if(isset($_POST['dv']))  $dv=$_POST['dv'];
    else $dv="";
    if(isset($_POST['sl']))   $sl=$_POST['sl'];
    else $sl="";
if(isset($_POST['hthi'])) 
{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
   
    

    $mang[0]=$ma;
    $mang[1]=$ten;
    $mang[2]=$dv;
    $mang[3]=$sl;
   
    
      
 }

   

	$splist=array(
		 array("A001","Sữa tắm XMen","Chai 50ml","50"),
         array("A002","Dầu gội đầu lifeboy","chai 50ml","20"),
         array("B001","Dầu ăn cái lân","chai 1 lít","10"),
         array("B002","Đường cát","kg","15"),
         array("C001","chén sứ minh long","bộ 10 cái","2")

    );
    array_push($splist,$mang);
    

	?>
	 <h2>Danh sách sản phẩm</h2>
	 <table border="1">
	 	<tr>
	 		<th>
	 			<b>mã sản phẩm</b>
	 		</th>
	 		<th>
                 <b>tên sản phẩm</b>
            </th>
            <th>
                <b>Đơn vị tính</b>
            </th>
            <th>
                <b>Số lượng</b>
            </th>

	 	</tr>
      <?php
      for ($row = 0; $row <count($splist); $row++)
      {
      echo "<tr>\n";
      foreach ($splist[$row] as $val)
      {
      echo "<td>$val</td>\n";
      }
      echo "</tr>\n";
      }
      ?>
	 </table>

     <form action="" method="post">
         <table class="table">
             
             <tbody>
                 <tr>
                     <td scope="row">Nhập mã sản phẩm :</td>
                     <td> <input type="text" name="ma" value="<?php echo $ma?>"/></td>
                    
                 </tr>
                 <tr>
                     <td scope="row"> Nhập tên sản phẩm:</td>
                     <td> <input type="text" name="ten" value="<?php echo $ten?>"/></td>
                     
                 </tr>
                 <tr>
                     <td scope="row">  Nhập đơn vị:</td>
                     <td> <input type="text" name="dv" value="<?php echo $dv?>"/></td>
                     
                 </tr>
                 <tr>
                     <td scope="row">  Nhập số lượng</td>
                     <td>  <input type="text" name="sl" value="<?php echo $sl?>"/></td>
                     
                 </tr>
                 
             </tbody>
         </table>
	 
   
    
    
	<input type="submit" name="hthi" value="Hiển thị"/>

</form> 
	

</body>
</html>