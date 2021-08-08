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

        <div id="userAddForm" class="card" style=" margin-right: 10%">
            <div class="card-header header-elements-inline">
                <h4 class="card-title"><i class="fas fa-address-card"></i> Kategori Listesi </h4>
                <div class="header-elements">
                    <div classW="list-icons">
                        <a class="list-icons-item" href="/cms/admin/categoryAdd">
                            <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Ekle"><i class="fa fa-plus"></i>
                                Kategori Ekle
                            </button>
                        </a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="margin-left: 1px; height:auto">
                <div>
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>caturl</th>
                                <th>description</th>
                                <th>image</th>
                                <th>Active</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <td><?= $category["id"]; ?></td>
                                    <td><?= $category["name"]; ?></td>
                                    <td><?= $category["caturl"]; ?></td>
                                    <td><?= $category["description"]; ?></td>
                                    <td><?= $category["image"]; ?></td>
                                    <td><span <?= $category["active"] == 1 ? 'class="badge badge-success"' : 'class="badge badge-warning"' ?>> <?= $category["active"]; ?></span></td>
                                    <td>
                                        <ul class="list-inline m-0">

                                            <li class="list-inline-item">
                                                <a href="/cms/admin/categoryEdit/<?= $category["id"]; ?>">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Güncelle"><i class="fa fa-edit"></i></button>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="/cms/admin/categoryDelete/<?= $category["id"]; ?>">
                                                    <button onclick="window.location.href='/cms/'" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Sil"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->


    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.1.5/dist/vue.global.js"></script>
    <script src="userForm.js"></script>
    <?php require 'views/public/footer.php'; ?>
</div>

</div>
<!-- /main content -->

</div>
<!-- /page content -->
</body>

</html>