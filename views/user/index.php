<?php require 'views/public/header.php'; ?>



<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">


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

        <div id="form" class="card" style=" margin-right: 10%">
            <div class="card-header header-elements-inline">
                <h4 class="card-title"><i class="fas fa-address-card"></i> KULLANICI EKLE </h4>

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
                            <label class="col-form-label col-lg-2">Kullanıcı Adı:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control h-100" v-model="Vname">
                                    <div class="input-group-text"><i class="fas fa-signature"></i></div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Parola:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="password" v-model="Vpass" class="form-control h-100" placeholder="" autocomplete="off">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">E-Mail:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <input type="email" v-model="Vmail" class="form-control h-100" placeholder="" autocomplete="off">
                                    <div class="input-group-text"><i class="fas fa-at"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Rol:</label>
                            <div class="col-lg-6">
                                <div class="input-group-prepend">
                                    <select v-model="Vrole" class="form-select col-form-label col-lg-10 h-100" name="">
                                        <option value="-1">--- Rol Seçiniz ---</option>
                                        <option value="1">Yönetici</option>
                                        <option value="2">Moderatör</option>
                                        <option value="3">Üye</option>
                                    </select>
                                    <div class="input-group-text"><i class="fas fa-award"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row input-group">
                            <label class="col-form-label col-lg-2">Aktif:</label>
                            <div class="col-lg-6">
                                <div class="input-group-text"><input v-model="Vactive" type="checkbox" class="form-control"><i class="fas fa-check-circle"></i></div>
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

    </div>
    <!-- /content area -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="form.js"></script>
    <?php require 'views/public/footer.php'; ?>
</div>

</div>
<!-- /main content -->

</div>
<!-- /page content -->
</body>

</html>