<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12"> <label for="tahun">Tahun</label></div><br>
                        <form method="post" action="<?= base_url('Laporan') ?>">
                            <div class="form-group">
                                <select id="tahun" name="tahun" class="itemTahun form-control select2" style="width: 100%;" required>
                                    <option selected value="<?= $xthn; ?>"> <?= $xthn; ?> </option>
                                </select>
                            </div>
                            <div class="form-group align-items-end">
                                <button name="action" type="submit" class="btn btn-success btn-col-1 " role="button" aria-disabled="true">Tampilkan</button>
                                <a href="<?= base_url('Laporan/cetak?xthn=') . $xthn; ?>" name="cetak" class="btn btn-danger btn-col-1" target="_blank" role="button" aria-disabled="true"><i class="fa fa-balance-scale fa-fw"></i>Cetak</a>
                            </div>
                        </form>
                    </div>
                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>NIP</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>Tanggal Pensiun</th>
                                <th>Sisa Masa (Tahun (bulan) )</th>
                                <th>Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($laporan as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['nama_pegawai']; ?></td>
                                    <td><?= $b['nip']; ?></td>
                                    <td><?= $b['jk']; ?></td>
                                    <td><?= $b['tgl_lahir']; ?></td>
                                    <td><?= $b['alamat']; ?></td>
                                    <td><?= $b['jabatan']; ?></td>
                                    <td><?= $b['tgl_pensiun']; ?></td>
                                    <td><?php
                                        if (($b['selisih_bulan'] < 1) && ($b['bt'] <> 1)) {
                                            echo " <a id='btverifikasi' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#modal-verifikasi' data-idverifikasi='" . $b['idpegawai'] . "'><i class='fa fa-window-close'></i> Pensiun Belum Terverifikasi</a>";
                                        } else if (($b['selisih_bulan'] < 1) && ($b['bt'] = 1)) {
                                            echo " <a class='btn btn-sm btn-success'><i class='fas fa-check-circle'></i> Pensiun Terverifikasi</a>";
                                        } else {
                                            echo " " . $b['sisamasa'] . " Tahun /(" . $b['selisih_bulan'] . ") Bulan";
                                        }
                                        ?>
                                    </td>
                                    <td><a href="<?= base_url('Laporan/cetaksurat?pegawai=') . $b['idpegawai'] ?>" class='btn btn-sm btn-warning' target="_blank"><i class='fas fa-print'></i> Cetak Surat Keterangan</a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal fade" id="modal-verifikasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Verifikasi Pensiun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Laporan/verifikasi'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="vverifikasi">Keputusan</label>
                                <input type="hidden" class="form-control" id="idverifikasi" name="idverifikasi">
                                <select class="form-control" name="vverifikasi" id="vverifikasi">
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.content-wrapper -->
<?php $this->load->view('templates/footer'); ?>
<script>
    $(function() {
        $("#tabledata").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        })
        $('.itemTahun').select2({
            ajax: {
                url: "<?= base_url(); ?>/Tahun/getTahun",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        thn: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.tahun,
                            text: item.tahun
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
        $(document).on('keypress', '.select2-search__field', function() {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    });
    $(document).ready(function() {
        $(document).on('click', '#btverifikasi', function() {
            var idverifikasi = $(this).data('idverifikasi');
            var idpegawaisurat = $(this).data('idpegawaisurat');
            $('#idverifikasi').val(idverifikasi);
            $('#idpegawaisurat').val(idpegawaisurat);
        })
    });
</script>