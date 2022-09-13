<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from siswa where id_siswa = '".$_GET['id_siswa']."'");
    $data_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <h3>Ubah Siswa</h3>
    <form action="proses_ubah_siswa.php" method="post">
  <input type="hidden" name="id_siswa" value=" <?=$data_siswa['id_siswa']?>">
        Nama Siswa :
  <input type="text" name="nama_siswa" value=   "<?=$data_siswa['nama_siswa']?>" class="form-control">
        Tanggal Lahir :
  <input type="date" name="tanggal_lahir" value="<?=$data_siswa['tanggal_lahir']?>" class="form-control">
        Gender :
        <?php 
        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
        ?>
        <select name="gender" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$data_siswa['gender']){
                    $select="selected";
                } else {
                    $select="";
                }
             ?>
<option value="<?=$key_gender?>" <?=$select?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select>
        Alamat :
<textarea name="alamat" class="form-control" rows="4"><?=$data_siswa['alamat']?></textarea>
        Kelas :
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$data_siswa['id_kelas']){
                    $select="selected";
                } else {
                    $select="";
                }
echo '<option value="'.$data_kelas['id_kelas'].'" '.$select.'>'.$data_kelas['nama_kelas'].'</option>';   
            }
            ?>
        </select>
        Username :
<input type="text" name="username" value="<?=$data_siswa['username']?>" class="form-control">
        Password :
<input type="password" name="password" value="" class="form-control">
<br>
<input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>