<?php require 'views/public/header.php'; ?>

<div class="content-wrapper">


    <!-- Right icons -->
    <div class="content">
        <div class="col-md-10">
            <div class="card">
                <form action="" method="post">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Ayarlar</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="nav-item"><a href="#admin-icon-tab1" class="nav-link active" data-toggle="tab">Admin Panel<i class="icon-menu7 ml-2"></i></a></li>

                            <li class="nav-item"><a href="#generalPage-icon-tab2" class="nav-link" data-toggle="tab">Sayfa Ayarları<i class="icon-mention ml-2"></i></a></li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sayfalar<i class="icon-gear ml-2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#blog-icon-tab3" class="dropdown-item" data-toggle="tab">Blog Sayfası</a>
                                    <a href="#right-icon-tab4" class="dropdown-item" data-toggle="tab">Diğer</a>
                                </div>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="admin-icon-tab1">

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
                                        <option value="1" <?= settings('bakim') == 1 ? 'selected' : null ?>>Açık</option>
                                        <option value="2" <?= settings('bakim') == 2 ? 'selected' : null ?>>Kapalı</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                                    <input type="hidden" name="submit" value="1">
                                    <button type="submit" class="btn bg-blue ml-3">Kaydet<i class="icon-paperplane ml-2"></i></button>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="generalPage-icon-tab2">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                coffee squid laeggin.
                            </div>

                            <div class="tab-pane fade" id="blog-icon-tab3">
                                <div class="form-group">
                                    <label>Site Adı:</label>
                                    <input type="text" class="form-control" placeholder="Blog Site Adı" name="setting[blogTitle]" value="<?= settings("blogTitle") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Footer:</label>
                                    <input type="text" class="form-control" placeholder="Footer Açıklama" name="setting[blogFooter]" value="<?= settings("blogFooter") ?>">
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
                                    <input type="hidden" name="submit" value="1">
                                    <button type="submit" class="btn bg-blue ml-3">Kaydet<i class="icon-paperplane ml-2"></i></button>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="right-icon-tab4">
                                Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda
                                labore aesthet.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /right icons -->

    <?php require 'views/public/footer.php'; ?>
</div>

<!-- /main content -->
</div>
<!-- /page content -->
</div>

</body>

</html>