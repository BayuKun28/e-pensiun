<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaltambah">
                        Tambah
                    </button>
                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengguna as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['username']; ?></td>
                                    <td><?= $b['nama']; ?></td>
                                    <td><?php
                                        if ($b['level'] == 1) {
                                            echo 'Admin';
                                        } else {
                                            echo 'Direktur';
                                        }
                                        ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaledit" data-idedit="<?= $b['id']; ?>" data-namaedit="<?= $b['nama']; ?>" data-usernameedit="<?= $b['username']; ?>" data-leveledit="<?= $b['level']; ?>" id="editpengguna" name="editpengguna"><i class="fa fa-edit"></i></a>
                                        <a href='javascript:void(0)' class="del_pengguna btn btn-sm btn-danger" data-kode="<?= $b['id']; ?>"><i class=" fa fa-trash"></i></a>
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
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Auth/tambah'); ?>" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Ketik Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ketik Password" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Ketik Nama Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" id="level" class="form-control">
                                <option value="">Pilih Level</option>
                                <option value="1">Admin</option>
                                <option value="2">Direktur</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Auth/edit'); ?>" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="usernameedit">Username</label>
                            <input type="hidden" class="form-control" id="idedit" name="idedit">
                            <input type="text" class="form-control" id="usernameedit" name="usernameedit" placeholder="Ketik Username" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordedit">Password</label>
                            <input type="password" class="form-control" id="passwordedit" name="passwordedit" placeholder="Ketik Password" required>
                        </div>
                        <div class="form-group">
                            <label for="namaedit">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaedit" name="namaedit" placeholder="Ketik Nama Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="leveledit" id="leveledit" class="form-control">
                                <option value="">Pilih Level</option>
                                <option value="1">Admin</option>
                                <option value="2">Direktur</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        $(document).on('click', '#editpengguna', function() {
            var idedit = $(this).data('idedit');
            var namaedit = $(this).data('namaedit');
            var usernameedit = $(this).data('usernameedit');
            var leveledit = $(this).data('leveledit');
            $('#idedit').val(idedit);
            $('#namaedit').val(namaedit);
            $('#usernameedit').val(usernameedit);
            $('#leveledit').val(leveledit);
        })

        $(document).on('click', '.del_pengguna', function(event) {
            event.preventDefault();
            let kode = $(this).attr('data-kode');
            let delete_url = "<?= base_url(); ?>/Auth/delete/" + kode;

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