<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak</title>
</head>

<body>
    <div>
        <center>
            <h3>Laporan Data Pensiun </h3>
            <h3> <?= $xthn; ?></h3>
            <table border="1" width="100%" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="25%">Nama Pegawai</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th>Tanggal Pensiun</th>
                        <th width="25%">Sisa Masa (Tahun (bulan) )</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $b) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td width="25%"><?= $b['nama_pegawai']; ?></td>
                            <td><?= $b['nip']; ?></td>
                            <td><?= $b['jk']; ?></td>
                            <td><?= $b['tgl_lahir']; ?></td>
                            <td><?= $b['alamat']; ?></td>
                            <td><?= $b['jabatan']; ?></td>
                            <td><?= $b['tgl_pensiun']; ?></td>
                            <td width="25%"><?php
                                            if (($b['selisih_bulan'] < 1) && ($b['bt'] <> 1)) {
                                                echo " <a id='btverifikasi' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#modal-verifikasi' data-idverifikasi='" . $b['idpegawai'] . "'><i class='fa fa-window-close'></i> Pensiun Belum Terverifikasi</a>";
                                            } else if (($b['selisih_bulan'] < 1) && ($b['bt'] = 1)) {
                                                echo " <a class='btn btn-sm btn-success'><i class='fas fa-check-circle'></i> Pensiun Terverifikasi</a>";
                                            } else {
                                                echo " " . $b['sisamasa'] . " Tahun /(" . $b['selisih_bulan'] . ") Bulan";
                                            }
                                            ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </center>
    </div>
</body>

</html>