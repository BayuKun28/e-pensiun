<!DOCTYPE html>

<head>
    <title>Surat Keterangan</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 20px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul><u>SURAT KETERANGAN</u></h3>
        <h4 id=judul>Nomor : ....................................................</h4>

        <p>Yang bertanda tangan dibawah ini :</p>

        <table style="width:100%">
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 75%;"><?= $ttd['nama_pegawai']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">NIP</td>
                <td style="width: 5%;">:</td>
                <td style="width: 75%;"><?= $ttd['nip']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Jabatan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 75%;"><?= $ttd['jabatan']; ?></td>
            </tr>
        </table>

        <p>Dengan ini menerangkan bahwa :</p>

        <table style="width:100%">
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 75%;"><?= $pegawai['nama_pegawai'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">NIP</td>
                <td style="width: 5%;">:</td>
                <td style="width: 75%;"><?= $pegawai['nip'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Pangkat, Gol/ Ruang</td>
                <td style="width: 5%;">:</td>
                <td style="width: 75%;"><?= $pegawai['pangkat'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Jabatan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 75%;"><?= $pegawai['jabatan'] ?></td>
            </tr>
        </table>


        <p>Dengan ini diberitahukan bahwa berdasarkan data yang ada pada kami, Saudara yang di lahirkan pada tanggal, <?= $tanggallahir; ?> akan diberhentikan dengan hormat sebagai Pegawai Negeri Sipil pada akhir <?= $tanggalpensiun; ?>, karena telah mencapai Batas Usia Pensiun. </p>
        <p>Sehubungan dengan hal tersebut diatas, Saudara diminta untuk menyerahkan kelengkapan persyaratan usulan pensiun sebagai berikut:</p>

        <table>
            <tr>
                <td style="vertical-align: top;">1. </td>
                <td style="vertical-align: top;">Surat Permohonan Pensiun</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">2. </td>
                <td style="vertical-align: top;">DPCP Pegawai Negeri Sipil yang mencapai batas usin pensiun</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">3. </td>
                <td style="vertical-align: top;">Surat Permintaan Pembayaran Pensiun Pertama (SP-4)</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">4. </td>
                <td style="vertical-align: top;">Fotocopy Surat Nikah / Akte Nikah rangkap 4 (empat), diligalisir pejabat berwenang</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">5. </td>
                <td style="vertical-align: top;">Fotocopy Akte Kelahiran anak yang belum berusia 25 tahun rangkap 4 (empat), diligalisir pejabat berwenang</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">6. </td>
                <td style="vertical-align: top;">Fotocopy SK Capeg, SK PNS, SK terakhir, Karpeg, KGB terakhir dan NIP masing rangkap 8 (delapan)</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">7. </td>
                <td style="vertical-align: top;">Surat Pernyataan belum pernah menerima hukuman disiplin berat</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">8. </td>
                <td style="vertical-align: top;">SKP- terakhir rangkap 4 (empat)</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">9. </td>
                <td style="vertical-align: top;">Pas photo terbaru ukuran 3 x 4 sebanyak 12 (dua belas ) lembar</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">10. </td>
                <td style="vertical-align: top;">Fotocopy KTP dan KK, masing-masing rangkap 4 (empat) diligalisir Lurah dan Camat.</td>
            </tr>
        </table>

        <p>Demikian atas perhatiannya diucapkan terima kasih.</p>

        <div style="width: 35%; text-align: left; float: right;">Surakarta, <?= $hariini; ?> <br>
            <?= $ttd['jabatan']; ?>, <br> <br> <br> <br>
            <?= $ttd['nama_pegawai']; ?> <br>
            NIP. <?= $ttd['nip']; ?>.
        </div><br><br><br><br><br><br>
        <p>Tembusan: <br>
            1. Kepala LPP RRI Surakarta <br>
            2. Bendahara Gaji RRI Surakarta <br>
            3. Arsip.
        </p>

    </div>
</body>

</html>