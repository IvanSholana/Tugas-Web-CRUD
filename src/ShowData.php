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
  <body class="bg-slate-300">
    <section class = "xl:hidden">
    <div id="container" class=" p-8 w-full xl:w-1/4 mx-auto">
        <div class="border shadow-2xl rounded-xl overflow-hidden bg-white">
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
            <div class="flex space-x-5">
            <button
                  class="next-button bg-slate-800 text-white w-1/2 py-2 rounded-lg"
                >
                  LANJUTKAN
                </button>
                <a href="listMahasiswa.php" class="bg-slate-800 text-white w-1/2 text-center py-2 rounded-lg hover:bg-slate-800">KEMBALI KE HOME</a>
                </div>
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
          <button class="prev-button bg-slate-800 text-white w-full py-2 rounded-lg">KEMBALI</button>
        </div>
      </div>
    </div>
    </div>
    </section>
    <section class="p-28 xl:block hidden">
      <div id="container" class="rounded-xl columns-2 w-3/4 flex mx-auto shadow-2xl bg-white">
        <div id="Form" class="w-1/2 py-24 border rounded-s-2xl ps-14">
          <h1 class="text-3xl text-center font-bold mb-5 -mt-16 me-5">DATA MAHASISWA</h1>
          <div class="mx-auto columns-2 space-y-5 relative">
            <!-- BARIS 1 -->
            <div id="NamaLengkap" class="w-full">
              <label for="NamaLengkap" class="text-sm">Nama Lengkap</label>
              <br />
              <input value="<?= $DataList['NAMALENGKAP'] ?>" type="text" disabled  class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"/>
            </div>
            <div id="NIM" class="w-full">
              <label for="NIM" class="text-sm">NIM</label>
              <br />
              <input value="<?= $DataList['NIM'] ?>" type="text" disabled class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div id="NoTelepon" class="w-full">
              <label for="NoTelepon" class="text-sm">No Telepon</label>
              <br />
              <input value="<?= $DataList['NoHP'] ?>" type="text" disabled class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div id="Alamat" class="w-full">
              <label for="Alamat" class="text-sm">Alamat</label>
              <br />
              <input value="<?= $DataList['Alamat'] ?>" type="text" disabled class="overflow-auto border focus:placeholder:text-transparent placeholder:text-sm overflow-auto focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div id="HOBI" class="w-full">
              <label for="HOBI" class="text-sm">Hobi</label>
              <br />
              <input value="<?= $DataList['Hobby'] ?>" type="text" disabled  class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500"/>
            </div>
            <div id="Prodi" class="w-full">
              <label for="Prodi" class="text-sm">Program Studi</label>
              <br />
              <input value="<?= $DataList['Prodi'] ?>" type="text" disabled class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div id="Fakultas" class="w-full">
              <label for="Fakultas" class="text-sm">Fakultas</label>
              <br />
              <input value="<?= $DataList['Fakultas'] ?>" type="text" disabled class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div id="JenisKelamin" class="w-full">
              <label for="JenisKelamin" class="text-sm">Jenis Kelamin</label>
              <br />
              <input value="<?= $DataList['JenisKelamin'] ?>" type="text" disabled class="border focus:placeholder:text-transparent placeholder:text-sm focus:outline-none w-3/4 mt-2 rounded-md py-1 px-3 border-slate-400 focus:border-sky-600 focus:ring-1 focus:ring-sky-500" />
            </div>
            <div class="flex w-3/4 justify-center mx-auto absolute left-0 ms-5">
              <a href="listMahasiswa.php" class="bg-slate-600 text-white font-bold w-3/4 text-center py-1 rounded-xl hover:bg-slate-800 mt-6">KEMBALI</a>
            </div>
          </div>
        </div>
        <div class="w-1/2 border rounded-e-2xl bg-cover bg-center" style="background-image: url(../dist/img/<?= $DataList['foto'] ?>);"></div>
        </div>
      </div>
    </section>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../dist/js/main2.js"></script>
  </body>
</html>
