<?php require 'views/public/header.php'; ?>

<div class="content">
    <div class="card">
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

        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label>Site Adı:</label>
                    <input type="text" class="form-control" placeholder="Site Adı" name="setting[title]">
                </div>
                <div class="form-group">
                    <label>Site Açıklaması:</label>
                    <input type="text" class="form-control" placeholder="Açıklama" name="setting[description]">
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                    <input type="hidden" name="submit" value="1">
                    <button type="submit" class="btn bg-blue ml-3">Kaydet<i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>


    <?php require 'views/public/footer.php'; ?>
    <!-- /main content -->
</div>
<!-- /page content -->
</div>

</body>

</html>