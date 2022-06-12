<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pendaftaran Pensiun</h1>
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
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('Pendaftaran/FormInput'); ?>" class="btn btn-success">
                        Tambah
                    </a>
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
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pensiun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pendaftaran as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['nama_pegawai']; ?></td>
                                    <td><?= $b['nip']; ?></td>
                                    <td><?= $b['jk']; ?></td>
                                    <td><?= $b['tgl_lahir']; ?></td>
                                    <td><?= $b['alamat']; ?></td>
                                    <td><?= $b['jabatan']; ?></td>
                                    <td><?= $b['tgl_input']; ?></td>
                                    <td><?= $b['tgl_pensiun']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a id="edit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit" data-idedit="<?= $b['id']; ?>" data-tgl_pensiunedit="<?= $b['tgl_pensiun']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href='javascript:void(0)' class="del_pendaftaran btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
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
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Pendaftaran/edit'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl_pensiunedit">Tanggal Pensiun</label>
                        <input type="hidden" class="form-control" id="idedit" name="idedit">
                        <div class="input-group date" id="tgl_pensiuneditdata" data-target-input="nearest">
                            <input type="text" id="tgl_pensiunedit" name="tgl_pensiunedit" class="form-control datetimepicker-input" data-target="#tgl_pensiuneditdata" readonly required>
                            <div class="input-group-append" data-target="#tgl_pensiuneditdata" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
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
    });
    $(document).ready(function() {

        $('#tgl_pensiuneditdata').datetimepicker({
            format: 'Y-M-D'
        });

        $(document).on('click', '#edit', function() {
            var idedit = $(this).data('idedit');
            var tgl_pensiunedit = $(this).data('tgl_pensiunedit');

            $('#idedit').val(idedit);
            $('#tgl_pensiunedit').val(tgl_pensiunedit);
        })

        $(document).on('click', '.del_pendaftaran', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Pendaftaran/delete/" + kode;

            Swal.fire({
                title: 'Hapus Data',
                text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(async (result) => {
                if (result.value) {
                    window.location.href = delete_url;
                }
            });
        });
    });
</script>