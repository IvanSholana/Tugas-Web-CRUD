<?php

function InputData($connection,$NIM,$NamaLengkap,$Alamat,$NoTelepon,$Hobi,$Prodi,$Fakultas,$JenisKelamin,$gambar){
        if(mysqli_query($connection,"INSERT INTO data_mahasiswa (NIM, NAMALENGKAP, NoHP, Alamat, Hobby, Prodi, Fakultas, JenisKelamin,foto) values
        ('$NIM','$NamaLengkap','$NoTelepon','$Alamat','$Hobi','$Prodi','$Fakultas','$JenisKelamin','$gambar')")){
            echo "<script> 
            alert('SIMPAN DATA SUKSES!!!');
             </script>";
        }else{
            echo "<script> 
                      alert('SIMPAN DATA GAGAL');
                  </script>";
        }
}

function UpdateData($connection,$NIM,$NamaLengkap,$Alamat,$NoTelepon,$Hobi,$Prodi,$Fakultas,$JenisKelamin,$gambar){
    if(mysqli_query($connection,"UPDATE data_mahasiswa SET NIM = '$NIM', NAMALENGKAP = '$NamaLengkap', NoHP = '$NoTelepon', Alamat = '$Alamat', Hobby = '$Hobi', Prodi = '$Prodi', Fakultas = '$Fakultas', JenisKelamin = '$JenisKelamin', foto = '$gambar' WHERE NIM = $NIM"
    )){
        echo "<script> 
        alert('UPDATE DATA SUKSES!!!');
        window.location.href = 'ListMahasiswa.php'
         </script>";
    }else{
        echo "<script> 
                  alert('UPDATE DATA GAGAL');
              </script>";
    }
}

function Upload($NamaFile,$Error,$tmpName,$foto){
    $validformat = ['jpg','jpeg','png'];
    $formatGambar = explode('.',$NamaFile);
    if($Error == 4 && empty($foto)){
        echo "<script> 
        alert('Upload Gambar Error');
         </script>";
    return false;
    }
    if(!(in_array(strtolower(end($formatGambar)),$validformat)) && empty($foto)){
        echo "<script> 
        alert('Format Gambar Error');
         </script>";
    return false;
    }
    move_uploaded_file($tmpName,'../dist/img/'.$NamaFile);
    return $NamaFile;
}

function delete($connection,$NIM){
    if(mysqli_query($connection,"DELETE FROM data_mahasiswa WHERE NIM = $NIM")){
        echo "<script> 
        alert('HAPUS DATA SUKSES!!!');
        window.location.href = 'ListMahasiswa.php'
         </script>";
    }else{
        echo "<script> 
                  alert('HAPUS DATA GAGAL');
              </script>";
    }
}

?>