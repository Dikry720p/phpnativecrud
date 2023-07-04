<?php

require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
?>


<?php if ($process == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data berhasil dimasukkan
    </div>
<?php endif; ?>
<?php if ($status == 'successE') : ?>
    <div class="alert alert-success" role="alert">
        Data berhasil diubah
    </div>
<?php endif; ?>
<?php if ($status == 'successD') : ?>
    <div class="alert alert-success" role="alert">
        Data berhasil hapus
    </div>
<?php endif; ?>

<!-- Mengambil data dari database -->
<?php

$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");

?>

<div class="card shadow" style="background-color: rgba(255, 255, 255, 0.8);">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4" style="color: #185ADB;">Daftar Dokter Aktif</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor ID</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Spesialis</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $p) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['noid'] ?></td>
                                <td><?= $p['nohp'] ?></td>
                                <td><?= $p['email'] ?></td>
                                <td><?= $p['alamat'] ?></td>
                                <td>
                                    <a class="btn btn-danger" href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Delete</a>
                                    <a class="btn btn-info" href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
