<?= $this->extend('layouts/app'); ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->include('layouts/components/title'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Silahkan Isi Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('dashboard/company/'. $data->id .'/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data->id ?>" />
                            <div class="card-body">
                                <?= $this->include('layouts/components/validation_checker'); ?>
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="kode" value="<?= $data->kode ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama company</label>
                                    <input type="text" name="nama" value="<?= $data->nama ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Direktur company</label>
                                    <input type="text" name="direktur" value="<?= $data->direktur ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Dibentuk</label>
                                    <input type="text" name="tahun" value="<?= $data->tahun ?>" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>