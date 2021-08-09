<?php require 'views/public/header.php'; ?>

<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">


        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Kategori Ekle</a>
                    <span class="breadcrumb-item active">Kategori Ekle</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Form inputs -->

        <div id="categoryAddForm" class="card" style=" margin-right: 10%">
            <div class="card-header header-elements-inline">
                <h4 class="card-title"><i class="fas fa-address-card"></i> KATEGORİ EKLE </h4>

                <div class="header-elements">
                    <div classW="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="margin-left: 1px; height:auto">

                <div>
                    <fieldset class="mb-12">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Gerekli Bilgiler</legend>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Kategori Adı:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control h-100" v-model="post.VcategoryName">
                                    <div class="input-group-text"><i class="fas fa-align-left"></i></div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Kategori URL:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="text" v-model="post.VcategoryUrl" class="form-control h-100" placeholder="" autocomplete="off">
                                    <div class="input-group-text"><i class="fas fa-anchor"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Kategori Açıklaması:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="text" v-model="post.VcategoryDescription" class="form-control h-100" placeholder="" autocomplete="off">
                                    <div class="input-group-text"><i class="fab fa-adn"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Resim Ekle:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input id="formFile" class="form-control" type="file" @change="selectImage">

                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Aktif:</label>
                            <div class="col-lg-6">
                                <div class="input-group-text"><input v-model="post.VcategoryActive" type="checkbox" class="form-control"><i class="fas fa-check-circle"></i></div>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2 "></label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input v-on:click="check_userAddForm" type="submit" value="Kaydet" style="margin-left: 35%; margin-right: 35%" class="form-submit btn btn-success h-100">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

    </div> <!-- /content area -->


    <?php require 'views/public/footer.php'; ?>

    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- VUE 3 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.1.5/dist/vue.global.js"></script>
    <script src="categoryForm.js"></script>

</div>

</div>
<!-- /main content -->
</div>
<!-- /page content -->
</body>

</html>