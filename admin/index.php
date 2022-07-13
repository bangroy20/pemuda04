<?php include 'header.php';
include '../db.php';

$baju = query("SELECT * FROM baju04");



?>


<h3>Daftar Nama Pemuda 04</h3>

<a href="tambah.php" class="btn btn-sm btn-primary m-3">Tambah Pesanan</a>
<br>
<small>geser -></small>
<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead class="card-header table">
            <tr>
                <th width="1%" rowspan="2">NO</th>
                <th rowspan="2" class="text-center">Nama</th>
                <th rowspan="2" width="10%" class="text-center">Size</th>
                <th colspan="2" width="10%" class="text-center">Reques Lengan</th>
                <th rowspan="2" class="text-center">Nick Name</th>
                <th rowspan="2" class="text-center">Bayar</th>
                <th rowspan="2" width="8%" class="text-center">OPSI</th>
            </tr>
            <tr>
                <th class="text-center">Pendek</th>
                <th class="text-center">Panjang</th>
            </tr>
        </thead>
        <tbody class="card-text">
            <?php
            $no = 1;

            foreach ($baju as $b) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $b['nama']; ?></td>
                    <td class="text-center"><?php echo $b['size']; ?></td>
                    <td class="text-center"><?php
                                            if ($b['lengan'] == "Pendek") {
                                                echo '<i class="fa-solid fa-check"></i>';
                                            } else {
                                                echo "-";
                                            } ?>
                    </td>
                    <td class="text-center"><?php
                                            if ($b['lengan'] == "Panjang") {
                                                echo '<i class="fa-solid fa-check"></i>';
                                            } else {
                                                echo "-";
                                            } ?>
                    </td>
                    <td class="text-center"><?php echo $b['nick']; ?></td>
                    <td><?php echo "Rp. " . number_format($b['bayar']) . " ,-" ?></td>
                    <td class="text-center">
                        <a href="ubah.php?id=<?php echo $b["id"]; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-gear"></i></a>
                        <a href="hapus.php?id=<?php echo $b["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data??');"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
</div>


<?php include 'footer.php'; ?>