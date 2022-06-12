<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Detail</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_pegawai">Nama Pegawai</label>
                                        <input type="hidden" value="<?= $pegawai['id'] ?>" class="form-control" id="idedit" name="idedit">
                                        <input type="text" value="<?= $pegawai['nama_pegawai'] ?>" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Ketik Nama Pegawai" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select id="jk" name="jk" class="form-control" style="width: 100%;" disabled>
                                            <option value="<?= $pegawai['jk'] ?>" selected><?= $pegawai['jk'] ?></option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select id="jabatan" name="jabatan" class="itemJabatan form-control select2" style="width: 100%;" disabled>
                                            <option value="<?= $pegawai['idjabatan']; ?>" selected> <?= $pegawai['jabatan']; ?> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" value="<?= $pegawai['nip']; ?>" class="form-control" id="nip" name="nip" placeholder="Ketik NIP" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir:</label>
                                        <div class="input-group date" id="tgl_lahirdata" data-target-input="nearest">
                                            <input type="text" value="<?= $pegawai['tgl_lahir']; ?>" id="tgl_lahir" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#tgl_lahirdata" disabled>
                                            <div class="input-group-append" data-target="#tgl_lahirdata" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" disabled><?= $pegawai['alamat']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-right">
                            <a href="<?= base_url('Laporan/cetaksurat?pegawai=') . $pegawai['id']; ?>" target="_blank" id="cetak" class="btn btn-success"><i class="fas fa-print"></i> Cetak Surat Keterangan</a>
                            <a href="<?= base_url('Pegawai'); ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('templates/footer'); ?>

<script>

</script>