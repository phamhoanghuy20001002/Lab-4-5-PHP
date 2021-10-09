<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>
<?php
abstract class nguoi{
  protected  $hoten;
  protected $diachi;
  protected $gt;
  public function sethoten($hoten){
    $this->hoten=$hoten;
}
  public function gethoten(){
      return $this->hoten;
  }
  public function setdiachi($diachi){
    $this->diachi=$diachi;
}
  public function getdiachi(){
      return $this->diachi;
  }

  public function setgt($gt){
    $this->gt=$gt;
}
  
  function getgt()
  {
      return $this->gt;
  }
}
class sinhVien extends nguoi{
	protected $LopHoc;
    protected $nganh;
   
    public function setnganh($nganh){
        $this->nganh=$nganh;
    }
      
     public function getnganh()
      {
          return $this->nganh;
      }

	function tinhdiem(){
		if($this->nganh=="CNTT")
        {
            return 1;
        } 
        else if($this->nganh=="KT")
            {
                
                return 1.5;
            }
            else return 0;
            }


	}
	

class giaoVien extends nguoi{
    const Luongcb=1500000;
	protected $trinhdo;
    public function settrinhdo($trinhdo){
        $this->trinhdo=$trinhdo;
    }
      
      function gettrinhdo()
      {
          return $this->trinhdo;
      }
	
	function Luong(){
        if($this->trinhdo=="CN")
		return 2.34*self::Luongcb;
        else if ($this->trinhdo=="ThacS")
                return 3.67*self::Luongcb;
                else if($this->trinhdo="TienS")
                    return 5.66*self::Luongcb;
	}
}
$str=NULL;
if(isset($_POST['tinh'])){
	if(isset($_POST['nguoi']) && ($_POST['nguoi'])=="sv"){
		$sv=new sinhVien();
		$sv->sethoten($_POST['hoten']);
		$sv->setdiachi($_POST['diachi']);
        $sv->setgt($_POST['gt']);
        $sv->setnganh($_POST['nganh']);
		$str= "TenSV ".$sv->gethoten()."\n".
             "diachi ".$sv->getdiachi()."\n".
             "gioiTinh ".$sv->getgt()."\n".
             "nganh ".$sv->getnganh()."\n".
             "diem ".$sv->tinhdiem()."\n";
    } 		
	}
	if(isset($_POST['nguoi']) && ($_POST['nguoi'])=="gv"){
		if(isset($_POST['nguoi']) && ($_POST['nguoi'])=="gv"){
            $gv=new giaoVien();
            $gv->sethoten($_POST['hoten']);
            $gv->setdiachi($_POST['diachi']);
            $gv->setgt($_POST['gt']);
            $gv->settrinhdo($_POST['trinhdo']);
            $str= "Tengv ".$gv->gethoten()."\n".
                 "diachi ".$gv->getdiachi()."\n".
                 "gioiTinh ".$gv->getgt()."\n".
                 "trinh do ".$gv->gettrinhdo()."\n".
                 "Luong ".$gv->Luong()."\n";
        }		
	}
   

	
?>
<form action="" method="post">
<fieldset>
	<legend>Nhap thong tin</legend>
	<table border='0'>
		<tr>
			<td>Chọn </td>
			<td><input type="radio" name="nguoi" value="sv" 
					<?php if(isset($_POST['nguoi'])&&($_POST['nguoi'])=="sv") echo 'checked'?>/>sinh vien
				<input type="radio" name="nguoi" value="gv"
					<?php if(isset($_POST['nguoi'])&&($_POST['nguoi'])=="gv") echo 'checked'?>/>giao vien
                
			</td>
		</tr>
		<tr>
			<td>Nhập tên:</td>
			<td><input type="text"  name="hoten" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten'];?>"/></td>
		</tr>
		<tr>
			<td>Dia chi:</td>
			<td><input type="text"  name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>"/></td>
		</tr>
        <tr>
			<td>gioi tinh </td>
			<td><input type="radio" name="gt" value="nam" 
					<?php if(isset($_POST['gt'])&&($_POST['gt'])=="nam") echo 'checked'?>/>nam
				<input type="radio" name="gt" value="nu"
					<?php if(isset($_POST['nguoi'])&&($_POST['nguoi'])=="nu") echo 'checked'?>/>nu
			</td>
		</tr>

        <tr>
			<td>nganh(sv) </td>
			<td><input type="radio" name="nganh" value="CNTT" 
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="CNTT") echo 'checked'?>/>cntt
				<input type="radio" name="nganh" value="KT"
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="KT") echo 'checked'?>/>kt
                    <input type="radio" name="nganh" value="Khac"
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="khac") echo 'checked'?>/>khac
			</td>
		</tr>

        <tr>
			<td>trinhdo(gv) </td>
			<td><input type="radio" name="trinhdo" value="CN" 
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="CN") echo 'checked'?>/>cu nhan
				<input type="radio" name="trinhdo" value="ThacS"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="ThacS") echo 'checked'?>/>thac si
                    <input type="radio" name="trinhdo" value="TienS"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="TienS") echo 'checked'?>/>tien si
			</td>
		</tr>
		<tr><td>Kết quả:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>