<?php
require_once "koneksi.php";
$connection = koneksi("mahasiswa");

  $query = mysqli_query($connection,"SELECT * FROM data_mahasiswa where NIM = $_GET[NIM]");
  $DataList = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css" />
  </head>
  <body>
    <div id="container" class=" p-8 w-full xl:w-1/4 mx-auto">
        <div class="border shadow-2xl rounded-xl overflow-hidden">
      <div
        class="border border-slate-900 w-full h-60 bg-cover bg-center rounded-t-xl rounded-b-3xl "
        style="background-image: url(../dist/img/<?= $DataList['foto'] ?>)"
      ></div>
        <div id="caoursel-container" class="flex">
          <div class="carousel-slide flex-shrink-0 justify-center w-full p-5">
            <h1 class="text-center font-bold text-2xl -mt-2 mb-2"><?= $DataList['NAMALENGKAP'] ?></h1>
            <label for="nama_panjang" class="text-sm">NIM</label>
            <input
              disabled
              value="<?= $DataList['NIM'] ?>"
              name="nama_panjang"
              id="nomer_telepon"
              type="text"
              class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
            />
            <label for="nama_panjang" class="text-sm">No Telepon</label>
            <input
              disabled
              value="<?= $DataList['NoHP'] ?>"
              name="nama_panjang"
              id="nomer_telepon"
              type="text"
              class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
            />
            <label for="nama_panjang" class="text-sm">Alamat</label>
            <textarea
              disabled
              name="Alamat"
              id="Alamat"
              cols="30"
              rows="3"
              class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-3 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
            ><?= $DataList['Alamat'] ?></textarea>
            <button
                  class="next-button bg-slate-800 text-white w-full py-2 rounded-lg"
                >
                  LANJUTKAN
                </button>
          </div>
          <div class="carousel-slide flex-shrink-0 justify-center w-full px-5 pt-5 ">
            <h1 class="text-center font-bold text-2xl -mt-2"><?= $DataList['NAMALENGKAP'] ?></h1>
            <label for="nama_panjang" class="text-sm">Hobi</label>
            <input
            disabled
            value="<?= $DataList['Hobby'] ?>"
            name="Hobi"
            id="Hobi"
            type="text"
            class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
          />
          <label for="nama_panjang" class="text-sm">Program Studi</label>
            <input
            disabled
            value="<?= $DataList['Prodi'] ?>"
            name="Fakultas"
            id="Fakultas"
            type="text"
            class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
          />
          <label for="nama_panjang" class="text-sm">Fakultas</label>
          <input
          disabled
          value="<?= $DataList['Fakultas'] ?>"
          name="Fakultas"
          id="Fakultas"
          type="text"
          class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
        />
          <label for="Jenis_Kelamin" class="text-sm">Jenis Kelamin</label>
            <input
            disabled
            value="<?= $DataList['JenisKelamin'] ?>"
            name="Jenis_Kelamin"
            id="Jenis_Kelamin"
            type="text"
            class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-full mt-2 rounded-md py-1 px-3 border-slate-400 mb-4 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"
          />
          <button
                  class="prev-button bg-slate-800 text-white w-full py-2 rounded-lg"
                >
                  KEMBALI
                </button>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/main2.js"></script>
  </body>
</html>
