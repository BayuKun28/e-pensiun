<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting Usia Pensiun</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Setting</a></li>
                        <li class="breadcrumb-item active">Usia Pensiun</li>
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
                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Usia</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($usia as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['usia']; ?></td>
                                    <td>
                                        <a id="edit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit" data-idedit="<?= $b['id']; ?>" data-usiaedit="<?= $b['usia']; ?>"><i class="fas fa-pencil-alt"></i></a>
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
                <h4 class="modal-title">Edit Usia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Usiapensiun/edit'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usiaedit">Usia Pensiun</label>
                        <input type="hidden" class="form-control" id="idedit" name="idedit">
                        <input type="number" class="form-control" id="usiaedit" name="usiaedit" placeholder="Ketik Tahun" required>
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
        $(document).on('click', '#edit', function() {
            var idedit = $(this).data('idedit');
            var usiaedit = $(this).data('usiaedit');

            $('#idedit').val(idedit);
            $('#usiaedit').val(usiaedit);
        })
    });
</script>