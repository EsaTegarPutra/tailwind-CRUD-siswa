<?php
    include_once('./models/students.php');

    $student = Students::index();

    if(isset($_POST['submit'])) {
        $respon = Students::create(
            [
                'name' => $_POST['name'],
                'nis' => $_POST['nis']
            ]   
        );

        setcookie('message', $respon, time() + 5);
        header("Location: index.php");
    }

    if(isset($_POST['delete'])) {
        $respon = Students::delete($_POST['id']);
      
        setcookie('message', $respon, time() + 5);
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Ranking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=""> 
    <!-- header start -->
    <nav class="bg-white top-0 left-0 w-full flex items-center z-1 sticky shadow-xl">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#" class="font-bold text-3xl block py-4">Student <span class="text-blue-500 font-bold text-3xl block">Ranks</span></a>
                </div>

                <div class="flex items-center px-4">
                    <a href="" class="bg-blue-500 font-semibold text-white mt-3 px-3 py-2 rounded-lg hover:bg-blue-600 duration-300">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <?php if(isset($_COOKIE['message'])) : ?>
    <div class="p-3 bg-green-600 text-white mt-1 mb-2 mx-10 rounded-lg text-center">
      <p><?= $_COOKIE['message'] ?></p>
    </div>
    <?php endif ?>
    <!-- header end -->

    <!-- section home -->
    <!-- <section id="home" class="pt-20">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4">
                    <h1 class="font-bold text-blue-500 text-5xl pb-3">Selamat Datang!</h1>
                    <p class="">Website ini membantu menampilkan data nama dan nilai siswa kelas <span class="text-blue-500">XI RPL</span> dan juga membantu untuk menginput nama dan juga nilai siswa dengan simple dan aman. Kalau tidak percaya tanya aja sama Pak Haji hehe :)</p>
                    <hr class="mt-5 mb-5">
                    <p>Pelajari lebih lanjut klik <span class="text-blue-500">di bawah ini!</span></p>
                    <button class="bg-blue-500 text-white mt-3 px-3 py-2 rounded-lg hover:bg-blue-600 duration-300">
                        Learn Now!
                    </button>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-10 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L48,64C96,96,192,160,288,165.3C384,171,480,117,576,117.3C672,117,768,171,864,170.7C960,171,1056,117,1152,96C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L48,288C96,288,192,288,288,277.3C384,267,480,245,576,229.3C672,213,768,203,864,197.3C960,192,1056,192,1152,208C1248,224,1344,256,1392,272L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    </div> -->
 
    <div class="mt-11">
    <h1 class="font-bold text-blue-500 text-4xl pl-3 pb-5">Data Siswa</h1>
    <div class="flex flex-col sm:flex-row">
        <div class="basis-1/4 p-3">
            <div class="bg-slate-200 rounded-xl p-5">
                <h1 class="text-2xl mb-2 font-semibold">Form Input Data</h1>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="p-1 font-medium">Nama</label>
                        <input type="text" id="name" class="rounded-xl p-2 block w-full hover:shadow-md" placeholder="Masukkan Nama" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="p-1 font-medium">Nis</label>
                        <input type="number" id="nis" class="rounded-xl p-2 block w-full hover:shadow-md" placeholder="Masukkan Nilai" name="nis">
                    </div>
                    <div class="grid gap-2">
                        <button type="submit" class="bg-blue-500 text-white mt-3 px-3 py-2 rounded-lg hover:bg-blue-600 duration-300" name="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- content -->
        <div class="basis-3/4 p-3">
            <div class="bg-slate-200 rounded-xl p-3">
                <h1 class="text-2xl mb-2 font-semibold">Tabel Nilai Siswa</h1>
                <table class="w-full">
                    <thead>
                        <tr class="bg-blue-500 text-white border border-gray-500">
                            <th class="px-3 py-2">No</th>
                            <th class="px-3 py-2 text-left">Nama</th>
                            <th class="px-3 py-2">Nis</th>
                            <th class="px-3 py-2">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($student as $key => $student) : ?>
                        <tr class="text-center bg-white border border-gray-500 px-6 py-3">
                            <td class="px-3 py-2"><?= $key + 1 ?></td>
                            <td class="text-left px-3 py-2"><?= $student["name"] ?></td>
                            <td class="px-3 py-2"><?= $student["nis"] ?></td>
                            <td class="px-3 py-2">
                                <button title="Detail" class="bg-blue-500 p-2 rounded-xl text-white hover:bg-blue-600 duration-300"><a href="detail.php?id=<?= $student["id"] ?>">Detail</a></button>
                                <button title="Edit" class="bg-green-500 p-2 rounded-xl text-white hover:bg-green-600 duration-300"><a href="edit.php?id=<?= $student["id"] ?>">Edit</a></button>
                                <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                    <button name="delete" type="submit" class="bg-red-500 hover:bg-red-600 p-2 rounded-xl text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3b82f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,133.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <!--footer-->
    <footer class="bg-blue-500 text-white text-center pb-8">
      <p>&copy; Copyright by <a href="" class="text-white font-bold">Esa Tegar Putra Utama</a></p>
    </footer>
    
    <script>
    function toggleModal() { 
      document.getElementById('modal').classList.toggle('hidden')
    }
  </script>
</body>
</html>