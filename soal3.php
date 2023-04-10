<?php
$conn = mysqli_connect("localhost", "root", "", "testdb");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="container my-5">
    <center>
        <h4>List Hobi Manusia</h4>
    </center>
    <?php
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian nama : " . $cari . "</b><br>";
        }
        ?>
    <?php
        if (isset($_GET['alamat'])) {
            $alamat = $_GET['alamat'];
            echo "<b>Hasil pencarian alamat : " . $alamat . "</b>";
        }
        ?>
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Hobi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_GET['cari']) || isset($_GET['alamat'])){
                $cari = $_GET['cari'];
                $alamat = $_GET['alamat'];
                // $data = mysql_query("select * from mhs where nama like '%".$cari."%'");				
                $tampil_data = mysqli_query($conn, "SELECT hobi.*, person.nama, person.alamat FROM hobi INNER JOIN person ON hobi.person_id = person.id where nama like '%".$cari."%' and alamat like '%".$alamat."%'");

            }else{
                $tampil_data = mysqli_query($conn, "SELECT hobi.*, person.nama, person.alamat FROM hobi INNER JOIN person ON hobi.person_id = person.id");
            }
            
            $i = 1;
            while ($data = mysqli_fetch_array($tampil_data)) {
                $id = $data['id'];
            ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['hobi']; ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
    <center>
        <h4>Pencarian Hobi</h4>
    </center>
    <form class="" method="GET">
        <div class="mb-3">
            <label for="text1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="text1" name="cari" value="<?php if (isset($_GET['cari'])) { $cari = $_GET['cari']; echo $cari;}?>">
        </div>
        <div class="mb-3">
            <label for="text1" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="text1" name="alamat" value="<?php if (isset($_GET['alamat'])) { $alamat = $_GET['alamat']; echo $alamat;}?>">
        </div>
        <button type="submit" class="btn btn-primary" value="cari">Search</button>
        
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>