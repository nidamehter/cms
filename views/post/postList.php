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

        <div id="userAddForm" class="card">
            <div class="card-header header-elements-inline">
                <h4 class="card-title"><i class="fas fa-address-card"></i> Postlar </h4>
                <div class="header-elements">
                    <div classW="list-icons">
                        <a class="list-icons-item" href="/cms/admin/postekle">
                            <button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Ekle"><i class="fa fa-plus"></i>
                                Post Ekle
                            </button>
                        </a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="margin-left: 1px; height:auto">
                <div class="card-columns">
                    <?php if (isset($posts)) : ?>
                        <?php foreach ($posts as $key => $value) : ?>
                            <!-- Multiple titles -->
                            <div class="card">
                                <div class="card-header bg-light d-flex justify-content-between">
                                    <span><i class="icon-user-check mr-2"></i> <a href="#"><?= $value["author"]; ?></a></span>
                                    <span class="text-muted"><?= $value["created"]; ?></span>
                                </div>

                                <div class="card-img-actions ">
                                    
                                    <img class="img-fluid " src="<?= isset($value["uploadedImageName"]) ? "/cms/views/blog/upload/".$value["uploadedImageName"] : "/cms/views/public/src/image/noimage.gif" ?>" alt="">
                                    <div class="card-img-actions-overlay">
                                        <a href="/cms/views/blog/upload/<?= $value["uploadedImageName"]; ?>" class="btn btn-outline bg-white text-white border-white border-2" data-popup="lightbox">
                                            İncele
                                        </a>
                                        <a href="#" class="btn btn-outline bg-white text-white border-white border-2 ml-2">
                                            Detaylar
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h6 class="card-title font-weight-semibold"> <?= $value["title"]; ?> </h6>
                                    <p class="card-text"> <?= $value["message"]; ?></p>
                                </div>

                                <div class="card-footer bg-transparent d-flex justify-content-between border-top-0 pt-0">
                                    <ul class="list-inline mb-0 mr-2">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-pink-400"><i class="icon-heart5"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default"><i class="icon-bubble2"></i></a>
                                        </li>
                                    </ul>

                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#">Düzenle</a></li>
                                        <li class="list-inline-item"><a href="#">Sil</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /multiple titles -->

                        <?php endforeach; ?>
                    <?php endif; ?>
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