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
                <h4 class="card-title"><i class="fas fa-address-card"></i> Kullanıcı/Yönetici Listesi </h4>
                <div class="header-elements">
                    <div classW="list-icons">
                        <a class="list-icons-item" href="/cms/admin/userAdd">
                            <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Ekle"><i class="fa fa-plus"></i>
                                Kullanıcı Ekle
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
                                <th>email</th>
                                <th>password</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?= $user["id"]; ?></td>
                                    <td><?= $user["name"]; ?></td>
                                    <td><?= $user["email"]; ?></td>
                                    <td><?= $user["passwords"]; ?></td>
                                    <td><?= $user["role"]; ?></td>
                                    <td><span <?= $user["active"] == 1 ? 'class="badge badge-success"' : 'class="badge badge-warning"' ?>> <?= $user["active"]; ?></span></td>
                                    <td>
                                        <ul class="list-inline m-0">

                                            <li class="list-inline-item">
                                                <a href="/cms/admin/userEdit/<?= $user["id"]; ?>">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Güncelle"><i class="fa fa-edit"></i></button>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <a href="/cms/admin/userDelete/<?= $user["id"]; ?>">
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