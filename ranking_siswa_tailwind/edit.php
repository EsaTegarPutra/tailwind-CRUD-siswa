<?php
    include_once('./models/students.php');

    if(isset($_POST['edit'])){
        $respon = Students::update(
            [
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'nis' => $_POST['nis']
            ]
        );
        setcookie('message', $respon, time() + 10);
        header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- navigasi -->
    <nav class="bg-white top-0 left-0 w-full items-center z-1 sticky shadow-xl">
      <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#" class="font-bold text-3xl block py-4">Student <span class="text-blue-500 font-bold text-3xl block">Ranks</span></a>
                </div>
            </div>  
    </nav>

    <!-- form -->
    <div class="bg-slate-200 rounded-xl p-5 m-8">
        <h1 class="text-2xl mb-2 font-semibold">Form Edit Data</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="p-1 font-medium">Nama</label>
                <input type="text" id="name" name="name" class="rounded-xl p-2 block w-full hover:shadow-md" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label for="nis" class="p-1 font-medium">Nis</label>
                <input type="number" id="nis" name="nis" class="rounded-xl p-2 block w-full hover:shadow-md" placeholder="Masukkan nis">
            </div>
            <div class="flex">
                <button type="submit" name="edit" class="bg-blue-500 text-white mx-1 mt-3 px-3 py-2 rounded-lg hover:bg-blue-600 duration-300">
                    Submit
                </button>
                <button type="submit" class="bg-red-500 text-white mx-1 mt-3 px-3 py-2 rounded-lg hover:bg-red-600 duration-300">
                    <a href="index.php">Batal</a>
                </button>

            </div>
        </form>
    </div>

    <!-- footer -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3b82f6" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,133.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <!--footer-->
    <footer class="bg-blue-500 text-white text-center pb-8">
      <p>&copy; Copyright by <a href="" class="text-white font-bold">Esa Tegar Putra Utama</a></p>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>