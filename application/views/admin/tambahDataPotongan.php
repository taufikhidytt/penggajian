<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="pull-left">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
    </div>
    <div class="pull-right">
        <a href="<?=base_url('admin/potonganGaji')?>" class="btn btn-secondary btn-md">
            <i class="fa fa-reply-all"></i> Back
        </a>
    </div>
</div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="<?=base_url('admin/potonganGaji/tambahDataAksi')?>" method="post">
                    <div class="form-group">
                        <label for="potongan">Jenis Potongan :</label>
                        <input type="text" name="potongan" id="potongan" class="form-control" value="<?= set_value('potongan')?>">
                        <?= form_error('potongan')?>
                    </div>
                    <div class="form-group">
                        <label for="jml_potongan">Jumlah Potongan :</label>
                        <input type="number" name="jml_potongan" id="jml_potongan" class="form-control" value="<?= set_value('jml_potongan')?>">
                        <?= form_error('jml_potongan')?>
                    </div>
                    <button class="btn btn-success btn-md" type="submit" name="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
