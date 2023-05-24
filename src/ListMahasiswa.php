<?php
  require "koneksi.php";
  require "alloperation.php";
  $connection = koneksi("mahasiswa");

  $data1 = mysqli_query($connection,"SELECT * FROM data_mahasiswa");
  $datalist1 = mysqli_fetch_array($data1);

  if(isset($_POST['delete'])){
    delete($connection,$datalist1['NIM']);
  };
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Mahasiswa</title>
    <link rel="stylesheet" href="../dist/output.css" />
  </head>
  <body class="bg-slate-300">
    <form action="" method="POST">
    <section class="pt-48 px-5 xl:pt-40 xl:px-40">
      <div id="container" class="bg-white border p-5 rounded-lg shadow-xl">
        <h1 class="text-center text-xl font-bold mb-4">DAFTAR MAHASISWA</h1>
        <div
          class="container border border-slate-500 overflow-hidden p-0 rounded-lg w-full"
        >
          <table class="w-full">
            <thead class="bg-slate-500 text-white">
              <tr class="text-center">
                <th class="w-10">No</th>
                <th class="w-52">Nama</th>
                <th class="w-60">Action</th>
              </tr>
            </thead>
            <tbody class="text-center divide-y-2 divide-slate-100">
              <?php 
              $data = mysqli_query($connection,"SELECT * FROM data_mahasiswa");
              $a = 1;
              while($datalist = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td class="border-e"><?= $a++ ?></td>
                <td><a href="ShowData.php?get=detail&NIM=<?= $datalist['NIM'] ?>" class="btn btn-success"><?= $datalist['NAMALENGKAP'] ?></a></td>
                <td>
                  <div class="flex items-center justify-center">
                    <a
                      href="input_data.php?get=detail&NIM=<?= $datalist['NIM'] ?>"
                      class="bg-slate-600 text-white px-6 py-1 rounded-lg m-2"
                      ><img
                        src="../dist/img/edit-pencil-02-svgrepo-com.png"
                        alt=""
                        width="20px"
                    /></a>
                    <button
                      name = "delete"
                      class="bg-red-600 text-white px-6 py-1 rounded-lg m-2"
                    >
                      <svg
                        fill="#ffffff"
                        height="20px"
                        width="20px"
                        version="1.1"
                        id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512"
                        xml:space="preserve"
                        stroke="#ffffff"
                      >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                          id="SVGRepo_tracerCarrier"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                          <g>
                            <g>
                              <path
                                d="M0,0v512h512V0H0z M462.452,462.452H49.548V49.548h412.903V462.452z"
                              ></path>
                            </g>
                          </g>
                          <g>
                            <g>
                              <polygon
                                points="355.269,191.767 320.233,156.731 256,220.964 191.767,156.731 156.731,191.767 220.964,256 156.731,320.233 191.767,355.269 256,291.036 320.233,355.269 355.269,320.233 291.036,256 "
                              ></polygon>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
              <?php } ?>
              <!-- Tambahkan baris tambahan sesuai kebutuhan -->
            </tbody>
          </table>
        </div>
        <div class="mt-5 flex justify-center">
          <a
            href="input_data.php"
            class="text-white font-bold bg-green-500 px-8 py-1 rounded-lg"
            >TAMBAH DATA</a
          >
        </div>
      </div>
      <div class="flex justify-center">
        <img src="../dist/img/Logo.png" alt="" width="150px" class="-mt-6" />
      </div>
    </section>
    </form>
  </body>
</html>
