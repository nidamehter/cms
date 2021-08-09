<?php require 'views/public/header.php'; ?>

<div class="content-wrapper">
<div class="content">

        <div class="card" style="margin-right:10%">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">AYARLAR</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
    <!-- /cms/admin/Ayar -->
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Site Adı:</label>
                        <input type="text" class="form-control" placeholder="Site Adı" name="setting[title]" value="<?= settings("title") ?>">
                    </div>
                    <div class="form-group">
                        <label>Footer:</label>
                        <input type="text" class="form-control" placeholder="Açıklama" name="setting[footer]" value="<?= settings("footer") ?>">
                    </div>
                    <div class="form-group">
                        <label>Bakım Modu:</label>
                        <select name="setting[bakim]">
                            <option value="1" <?= settings('bakim')==1 ? 'selected' : null ?> >Açık</option>
                            <option value="2"  <?= settings('bakim')==2 ? 'selected' : null ?> >Kapalı</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                        <input type="hidden" name="submit" value="1">
                        <button type="submit" class="btn bg-blue ml-3">Kaydet<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>

            </div>
        </div>

</div>

<?php require 'views/public/footer.php'; ?>
</div>

<!-- /main content -->
</div>
<!-- /page content -->
</div>

</body>

</html>