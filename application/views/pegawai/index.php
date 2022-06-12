<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
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
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('Pegawai/FormInput'); ?>" class="btn btn-success">
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
                                <th>Jabatan (Pangkat) </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pegawai as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['nama_pegawai']; ?></td>
                                    <td><?= $b['nip']; ?></td>
                                    <td><?= $b['jk']; ?></td>
                                    <td><?= $b['tgl_lahir']; ?></td>
                                    <td><?= $b['alamat']; ?></td>
                                    <td><?= $b['jabatan']; ?> (<?= $b['pangkat']; ?>) </td>
                                    <td>
                                        <a href="<?= base_url('Pegawai/FormEdit/') . $b['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <a href='javascript:void(0)' class="del_pegawai btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class="fa fa-trash"></i></a>
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
        $(document).on('click', '.del_pegawai', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Pegawai/delete/" + kode;

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