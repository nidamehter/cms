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
                <form action="#">
                    <div class="form-group">
                        <label>Your name:</label>
                        <input type="text" class="form-control" placeholder="Eugene Kopyov">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                        <button type="submit" class="btn bg-blue ml-3">Submit <i class="icon-paperplane ml-2"></i></button>
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