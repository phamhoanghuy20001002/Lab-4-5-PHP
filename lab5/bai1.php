<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tinh chu vi va dien tich</title>
<style>
fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}

input {
  margin: 5px;
}
</style>
</head>
<body>
<?php 
abstract class Hinh{
	protected $ten, $dodai;
	public function setTen($ten){
		$this->ten=$ten;
	}
	public function getTen(){
		return $this->ten;
	}
	public function setDodai($doDai){
		$this->dodai=$doDai;
	}
	public function getDodai(){
		return $this->dodai;
	}
	abstract public function tinh_CV();
	abstract public function tinh_DT();
}
class HinhTron extends Hinh{
	const PI=3.14;
	function tinh_CV(){
		return $this->dodai[0]*2*self::PI;
	}
	function tinh_DT(){
		return pow($this->dodai[0],2)*self::PI;
	}
}
class HinhVuong extends Hinh{
	public function tinh_CV(){
		return $this->dodai[0]*4;
	}
	public function tinh_DT(){
		return pow($this->dodai[0],2);
	}
}
class HinhTamGiacDeu extends Hinh{
    const le=0.433;
	public function tinh_CV(){
		return $this->dodai[0]*3;
	}
	public function tinh_DT(){
		return pow($this->dodai[0],2)*self::le;
	}
}
class HinhChuNhat extends Hinh{
   
	public function tinh_CV(){
		return ($this->dodai[0]+$this->dodai[1])*2;
	}
	public function tinh_DT(){
		return $this->dodai[0]*$this->dodai[1];
	}
}
class HinhTCnom extends Hinh{
   
	public function tinh_CV(){
		return $this->dodai[0]+$this->dodai[1]+$this->dodai[2];
	}
	public function tinh_DT(){
		$nuaCV=0.5*($this->dodai[0]+$this->dodai[1]+$this->dodai[2]);
		return sqrt($nuaCV*($nuaCV-$this->dodai[0])*($nuaCV-$this->dodai[1])*($nuaCV-$this->dodai[2]));
	}
}
$str=NULL;
if(isset($_POST['tinh'])){
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hv"){
		$hv=new HinhVuong();
		$hv->setTen($_POST['ten']);
		$hv->setDodai($_POST['dodai']);
		$str= "Diện tích hình vuông ".$hv->getTen()." là : ".$hv->tinh_DT()." \n".
		 		"Chu vi của hình vuông ".$hv->getTen()." là : ".$hv->tinh_CV();
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){
		$ht=new HinhTron();
		$ht->setTen($_POST['ten']);
		$ht->setDodai($_POST['dodai']);
		$str= "Diện tích của hình tròn ".$ht->getTen()." là : ".$ht->tinh_DT()." \n".
				"Chu vi của hình tròn ".$ht->getTen()." là : ".$ht->tinh_CV();
	}
    if(isset($_POST['hinh']) && ($_POST['hinh'])=="htgd"){
		$htgd=new HinhTamGiacDeu();
		$htgd->setTen($_POST['ten']);
		$htgd->setDodai($_POST['dodai']);
		$str= "Diện tích hình tam giác ".$htgd->getTen()." là : ".$htgd->tinh_DT()." \n".
		 		"Chu vi của hình tam giác ".$htgd->getTen()." là : ".$htgd->tinh_CV();
	}
    if(isset($_POST['hinh']) && ($_POST['hinh'])=="hcn"){
        $dodai=$_POST['dodai'];
		$arr=explode(",",$dodai);
		if(count($arr)==2)
		{
		$hcn=new HinhChuNhat();
		
		$hcn->setTen($_POST['ten']);
		$hcn->setDodai($arr);
		$str= "Diện tích hình chu nhat ".$hcn->getTen()." là : ".$hcn->tinh_DT()." \n".
		 		"Chu vi của hình chu nhat ".$hcn->getTen()." là : ".$hcn->tinh_CV();
		}
		else $str="nhap lai do dai";
	}
	if(isset($_POST['hinh']) && ($_POST['hinh'])=="htg"){
        $dodai=$_POST['dodai'];
		$arr=explode(",",$dodai);
		if(count($arr)==3)
		{
		if($arr[0]+$arr[1]>$arr[2] && $arr[0]+$arr[2]>$arr[1] && $arr[2]+ $arr[1]>$arr[0])
		{
		$hcn=new HinhChuNhat();
		
		$hcn->setTen($_POST['ten']);
		$hcn->setDodai($arr);
		$str= "Diện tích hình tam giac ".$hcn->getTen()." là : ".$hcn->tinh_DT()." \n".
		 		"Chu vi của hình tam giac ".$hcn->getTen()." là : ".$hcn->tinh_CV();
			}
			else $str="nhap lai nha";
		}
		else $str="nhap lai do dai";
	}
}
?>
<form action="" method="post">
<fieldset>
	<legend>Tính chu vi và diện tích các hình đơn giản</legend>
	<table border='0'>
		<tr>
			<td>Chọn hình</td>
			<td><input type="radio" name="hinh" value="hv" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hv") echo 'checked'?>/>Hình vuông
				<input type="radio" name="hinh" value="ht"
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="ht") echo 'checked'?>/>Hình tròn
                <input type="radio" name="hinh" value="htgd" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htgd") echo 'checked'?>/>Hình tam giác đều
					<input type="radio" name="hinh" value="hcn" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hcn") echo 'checked'?>/>Hình chu nhat 
					<input type="radio" name="hinh" value="htg" 
					<?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="htg") echo 'checked'?>/>Hình tam giac  
			</td>
		</tr>
		<tr>
			<td>Nhập tên:</td>
			<td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
		</tr>
		<tr>
			<td>Nhập độ dài:</td>
			<td><input type="text"  name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td>
		</tr>
		<tr><td>Kết quả:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="ok"/></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>

