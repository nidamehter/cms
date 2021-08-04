<?php require 'views/public/header.php'; ?>



<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Kullanıcı</span> - Yönetici Ekle</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Kullanıcı Ekle</a>
                    <span class="breadcrumb-item active">Yönetici Ekle</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Form inputs -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Kullanıcı Ekle</h5>
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
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Yönetici Ekle</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kullanıcı Adı :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email :</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Parola :</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kullanıcı Rol :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>


                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Kaydet<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form inputs -->

    </div>
    <!-- /content area -->

    <?php require 'views/public/footer.php'; ?>

</div>
<!-- /main content -->

</div>
<!-- /page content -->
</body>

</html>