<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendaftaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li>
                        <li class="breadcrumb-item active">Pensiun</li>
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
                        <form action="<?= base_url('Pendaftaran/tambah'); ?>" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="hidden" class="form-control" id="idedit" name="idedit" readonly required>
                                            <select type id="nip" name="nip" class="itemNip form-control select2" style="width: 100%;" onchange="isi_otomatis()" required">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select id="jk" name="jk" class="form-control" style="width: 100%;" disabled required>
                                                <option value=""></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select id="jabatan" name="jabatan" class="form-control" style="width: 100%;" disabled required>
                                                <option value=""></option>
                                                <?php foreach ($xjabatan as $j) : ?>
                                                    <option value="<?= $j['id']; ?>"><?= $j['jabatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_pegawai">Nama Pegawai</label>
                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" readonly required>
                                        </div>
                                        <div class=" form-group">
                                            <label>Tanggal Lahir:</label>
                                            <div class="input-group date" id="tgl_lahirdata" data-target-input="nearest">
                                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#tgl_lahirdata" readonly required>
                                                <div class="input-group-append" data-target="#tgl_lahirdata" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" id="tgl_input" name="tgl_input" class="form-control" value="<?= $tgl_input; ?>" readonly required>
                                        </div>
                                        <div class=" form-group">
                                            <label>Tanggal Pensiun:</label>
                                            <div class="input-group date" id="tgl_pensiundata" data-target-input="nearest">
                                                <input type="text" id="tgl_pensiun" name="tgl_pensiun" class="form-control datetimepicker-input" data-target="#tgl_pensiundata" required>
                                                <div class="input-group-append" data-target="#tgl_pensiundata" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" readonly required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <a href="<?= base_url('Pendaftaran'); ?>" class="btn btn-danger">Kembali</a>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script>
    $(document).ready(function() {
        //Date picker
        $('#tgl_pensiundata').datetimepicker({
            format: 'Y-M-D'
        });
    });
    $(function() {
        $('.itemNip').select2({
            ajax: {
                url: "<?= base_url(); ?>/Pegawai/getNip",
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        nip: params.term
                    };
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.nip,
                            text: item.nip
                        });
                    });
                    return {
                        results: results
                    }
                }
            }
        });
    });

    function isi_otomatis() {
        var nip = $("#nip").val();
        $.ajax({
            type: "GET",
            url: '<?= base_url(); ?>Pegawai/pegawaiauto',
            data: "nip=" + nip,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('idedit').value = val.id;
                    document.getElementById('nama_pegawai').value = val.nama_pegawai;
                    document.getElementById('jk').value = val.jk;
                    document.getElementById('jabatan').value = val.jabatan;
                    document.getElementById('tgl_lahir').value = val.tgl_lahir;
                    document.getElementById('alamat').value = val.alamat;
                });
            }
        });
    }
</script>