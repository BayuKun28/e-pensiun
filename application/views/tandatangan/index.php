<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Setting Tanda Tangan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Setting</a></li>
                        <li class="breadcrumb-item active">Tanda Tangan</li>
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
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($ttd as $b) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $b['jabatan']; ?></td>
                                    <td>
                                        <a id="edit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit" data-idedit="<?= $b['id']; ?>" data-jabatanedit="<?= $b['jabatan']; ?>"><i class="fas fa-pencil-alt"></i></a>
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
                <h4 class="modal-title">Edit Tanda Tangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Tandatangan/edit'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idedit" name="idedit">
                        <label>Jabatan</label>
                        <select id="jabatanedit" name="jabatanedit" class="itemJabatan form-control select2" style="width: 100%;" required>
                        </select>
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
    });
    $(document).ready(function() {
        $(document).on('click', '#edit', function() {
            var idedit = $(this).data('idedit');
            var jabatanedit = $(this).data('jabatanedit');

            $('#idedit').val(idedit);
            $('#jabatanedit').val(jabatanedit);
        })
    });
</script>