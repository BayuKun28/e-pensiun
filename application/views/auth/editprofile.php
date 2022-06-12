<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                            <h3 class="card-title">Form Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Auth/simpanprofile'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="idedit" id="idedit" value="<?= $pengguna['id']; ?>" class="form-control" required>
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna['username']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password">Passowrd</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nama">Nama Pengguna</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $pengguna['nama']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="unit_pengguna">Level</label>
                                            <label>Level</label>
                                            <select name="level" id="level" class="form-control">
                                                <option selected value="<?= $pengguna['level']; ?>"><?php
                                                                                                    if ($pengguna['level'] == 1) {
                                                                                                        echo "Admin";
                                                                                                    } else if ($pengguna['level'] == 2) {
                                                                                                        echo "Direktur";
                                                                                                    }
                                                                                                    ?></option>
                                                <option value="1">Admin</option>
                                                <option value="2">Direktur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-right">
                                    <a href="<?= base_url('Dashboard'); ?>" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
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