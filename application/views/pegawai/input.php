<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Input Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Input</a></li>
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
                            <h3 class="card-title">Form Input</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Pegawai/tambah'); ?>" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_pegawai">Nama Pegawai</label>
                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Ketik Nama Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select id="jk" name="jk" class="form-control" style="width: 100%;" required>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select id="jabatan" name="jabatan" class="itemJabatan form-control select2" style="width: 100%;" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Ketik NIP" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir:</label>
                                            <div class="input-group date" id="tgl_lahirdata" data-target-input="nearest">
                                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#tgl_lahirdata" required>
                                                <div class="input-group-append" data-target="#tgl_lahirdata" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat</label>
                                            <select id="pangkat" name="pangkat" class="itemPangkat form-control select2" style="width: 100%;" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <a href="<?= base_url('Pegawai'); ?>" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
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
    $(document).ready(function() {
        //Date picker
        $('#tgl_lahirdata').datetimepicker({
            format: 'Y-M-D'
        });
    });
    $(function() {
        $('.itemJabatan').select2({
            ajax: {
                url: "<?= base_url(); ?>/Jabatan/getJabatan",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        jab: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.jabatan
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
        $('.itemPangkat').select2({
            ajax: {
                url: "<?= base_url(); ?>/Pangkat/getPangkat",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        pang: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.pangkat
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
    });
</script>