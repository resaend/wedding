<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbwedding";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

if (isset($_POST['submit'])) {
    $submit = mysqli_query($koneksi, "INSERT INTO wedding (nama, text, tanggal) 
                                    VALUES ('$_POST[nama]',
                                             '$_POST[text]',
                                             '$_POST[tanggal]')
                                    ");
    // if ($simpan) {
    //     echo "<script>
    //         alert('Pesan Berhasil Dikirim.');
    //         document.location='index.php';
    //     </script>";
    // } else {
    //     echo "<script>
    //         alert('Pesan Berhasil Dikirim.');
    //         document.location='index.php';
    //     </script>";
    // }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- mycss -->
    <link rel="stylesheet" href="style.css?v=4">
    <title>Guest Book</title>
</head>

<body>
    <div class="judul">
        <h1>Guest Book</h1>
    </div>
    <form method="post" action="">
        <div class="container container-input mb-5">
            <div class="form-atas">
                <div class="mb-3 mt-2">
                    <label for="nama" class="form-label mt-4">Nama</label>
                    <input type="text" name="nama" class="form-control" required id="exampleFormControlInput1" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan / Doa</label>
                    <textarea class="form-control" name="text" required id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-10">
                        <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y"); ?>">
                    </div>
                </div>
                <div class="form-row text-center">
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary btn-kirim mb-4">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- form bawah -->

    <div class="container container-output">
        <div class="form-bawah">
            <div class="row">
                <!-- <div class="col-lg-2 foto">foto disini</div> -->

                <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * from wedding order by id desc");
                while ($data = mysqli_fetch_array($tampil)) :
                ?>
                    <div class="text">
                        <h3 class="mt-3 nama-output"><?= $data['nama'] ?></h3>
                        <p class="mb-3 tanggal tanggal-output"><?= $data['tanggal'] ?></p>
                        <p class="text-output"><?= $data['text'] ?></p>
                        <hr>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

</body>

</html>