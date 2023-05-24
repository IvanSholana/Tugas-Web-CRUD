<?php

require_once "alloperation.php";
require "koneksi.php";
$connection = koneksi("mahasiswa");

$NIM = null;
$Nama_Lengkap = null;
$NomerHP = null;
$Alamat = null;
$Hobi = null;
$JenisKelamin = null;
$Prodi = null;
$Fakultas = null;
$foto = null;

if(isset($_GET['NIM'])){
  $query = mysqli_query($connection,"SELECT * FROM data_mahasiswa where NIM = $_GET[NIM]");
  $DataList = mysqli_fetch_array($query);
  $NIM = $DataList['NIM'];
  $Nama_Lengkap = $DataList['NAMALENGKAP'];
  $NomerHP = $DataList['NoHP'];
  $Alamat = $DataList['Alamat'];
  $Hobi = explode(',', $DataList['Hobby']);
  $json_string = json_encode($Hobi);
  $Prodi = $DataList['Prodi'];
  $Fakultas = $DataList['Fakultas'];
  $JenisKelamin = $DataList['JenisKelamin'];
  $foto = $DataList['foto'];
}


if(isset($_POST['submit_data'])){
  $nama_file = $_FILES['gambar']['name'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  $ImgName = Upload($nama_file,$error,$tmpName,$foto);
  
  if(isset($_POST['hobi'])){
    $Hobi = $_POST['hobi'];
    $HobiValue = implode(',',$Hobi); 
  }
  if(isset($_GET['NIM'])){
    if(!empty($ImgName)){
      $ImgName = Upload($nama_file,$error,$tmpName);
    }
    elseif(!empty($foto)){
      $ImgName = $foto;
    }
    UpdateData($connection, $_POST['NIM'],$_POST['NamaLengkap'],$_POST['NoHP'],$_POST['Alamat'],$HobiValue,$_POST['Prodi'],$_POST['Fakultas'],$_POST['JenisKelamin'],$ImgName);
  }else if(!empty($_POST['NIM']) && !empty($_POST['NamaLengkap']) && !empty($_POST['NoHP']) && !empty($_POST['Alamat']) && !empty($HobiValue) && !empty($_POST['Prodi']) && !empty($_POST['Fakultas']) && !empty($_POST['JenisKelamin'])){
    if($ImgName == false){
      return die;
    }
    InputData($connection, $_POST['NIM'],$_POST['NamaLengkap'],$_POST['NoHP'],$_POST['Alamat'],$HobiValue,$_POST['Prodi'],$_POST['Fakultas'],$_POST['JenisKelamin'],$ImgName);
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../dist/output.css" rel="stylesheet" />
    <title>INPUT DATA</title>
  </head>
  <body class="bg-slate-400">
    <form action="" method="post" enctype="multipart/form-data">
    <section>
      <div class="container flex xl:columns-2 mx-auto pt-14 xl:px-48 p-5">
        <div class="p-9 border xl:rounded-s-lg xl:rounded-none rounded-lg w-full xl:w-1/2 bg-white">
          <div
            id="carousel-container"
            class="mx-auto overflow-hidden flex w-full gap-5 "
          >
            <div class="carousel-item flex-shrink-0 w-full">
              <h1 class="text-3xl font-bold mt-3 mb-3 text-slate-800">
                TAMBAH DATA
              </h1>
              <p class="mb-3 text-sm text-slate-500">
                Isikan data dengan baik dan benar!
              </p>
              <input
                value="<?= $NIM ?>"
                placeholder="NIM"
                type="text"
                name="NIM"
                id="NIM"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 mb-4 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              />
              <input
                value="<?= $Nama_Lengkap ?>"
                name="NamaLengkap"
                placeholder="Nama Lengkap"
                type="text"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              />
              <input
                value="<?= $NomerHP ?>"
                placeholder="Nomer Telepon"
                name="NoHP"
                id="nomer_telepon"
                type="text"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              />
              <textarea
                value="<?= $Alamat?>"
                placeholder="Alamat"
                name="Alamat"
                id="Alamat"
                cols="30"
                rows="5"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-3 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              ><?= $Alamat ?> </textarea>
              <div class="flex justify-center">
                <button type="button"
                  class="next-button bg-slate-800 text-white w-full py-2 rounded-lg mt-10"
                >
                  LANJUTKAN
                </button>
              </div>
            </div>
            <!-- FORM 2 -->
            <div class="carousel-item flex-shrink-0 w-full">
              <h1 class="text-3xl font-bold mt-3 mb-3 text-slate-800">
                TAMBAH DATA
              </h1>
              <p class="mb-3 text-sm text-slate-500">
                Isikan data dengan baik dan benar!
              </p>
              <div class="border p-4 box-border rounded-lg border-slate-800 bg-slate-50 mb-2">
                <p class="font-bold mb-3">Hobi</p>
              <div class="flex items-center">
                <input value="Belajar" id="Belajar" name="hobi[]" type="checkbox" class="h-5 w-5 text-indigo-600 transition duration-150 ease-in-out" >
                <label for="hobi[]" class="ml-2 text-gray-700 me-3">Belajar</label>
                <input value ="Bekerja" id="Bekerja" name="hobi[]" type="checkbox" class="h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                <label for="hobi[]" class="ml-2 text-gray-700 me-3">Bekerja</label>
                <input value = "Makan" id="Makan" name="hobi[]" type="checkbox" class="h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                <label for="hobi[]" class="ml-2 text-gray-700 me-3">Makan</label>
              </div>
            </div>
              <input
                value ="<?= $Prodi ?>"
                name = "Prodi"
                placeholder="Program Studi"
                type="text"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              />
              <div class="border p-5 rounded-lg bg-slate-50 border-slate-900 mb-3">
                <p class="mb-3 -mt-1 font-bold">Fakultas</p>
              <div class="flex items-center space-x-5">
              <div>
                <input value="FTIB" type="radio" id="FTIB" name="Fakultas" class="form-radio h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                <label for="gender" class="ml-2 text-gray-700" >FTIB</label>
              </div>
              <div>                
                <input value="FTEIC" type="radio" id="FTEIC" name="Fakultas" class="form-radio h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                <label for="gender" class="ml-2 text-gray-700">FTEIC</label>
              </div>
              </div>  
            </div>
            <input
                value = "<?= $JenisKelamin ?>"
                placeholder="Jenis Kelamin"
                name="JenisKelamin"
                id="JenisKelamin"
                type="text"
                class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
              />
              <div class="mb-4">
                <label for="upload" class="block font-bold text-gray-700">Upload Foto</label>
                <div class="mt-1 flex items-center">
                  <input id="gambar" type="file" name="gambar">
                  
                </div>
              </div> 
              <div class="flex justify-between mt-5">
                <button type ="button"
                  class="prev-button bg-slate-800 w-2/6 text-white py-1 rounded-lg"
                > 
                  KEMBALI 
                </button>
                <button type="submit" name="submit_data"
                  class="bg-slate-800 w-2/6 text-white  py-2 rounded-lg"
                >
                  KUMPULKAN
                </button>
              </div>
            </div>
            </div>
            </div>
            <div
          class="bg-bottom rounded-e-lg w-1/2 hidden xl:inline-block shadow-2xl relative"
          style="
            background-image: url(../dist/img/bg.jpg);
            background-size: cover;"
        >
          <img
            src="../dist/img/Logo.png"
            width="120px"
            alt=""
            class="absolute -top-5 -right-3 me-5"
          />
        </div>
            </div>
          </div>      
        </div>
      </div>
      </form>
    </section>
  </body>
  <script>
    var checkbox1 = <?php echo $json_string ?>;
    var Fakultas = <?php echo $Fakultas ?>;
    if(checkbox1.includes("Belajar")){
        document.getElementById("Belajar").checked = true;
    };
    if(checkbox1.includes("Makan")){
        document.getElementById("Makan").checked = true;
    };
    if(checkbox1.includes("Bekerja")){
        document.getElementById("Bekerja").checked = true;
    };

    if(Fakultas == "FTIB"){
      document.getElementById("FTIB").checked = true;
    }else{
      document.getElementById("FTEIC").checked = true;
    }
  </script>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../dist/js/main.js"></script>
</html>
