<?php require 'views/public/header.php'; ?>

<div class="content-wrapper">

    <!-- Right icons -->
    <div class="content">
        <form action="" method="post">
            <div class="col-md-12">
                <div class="card">

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
                            <li class="nav-item"><a href="#" class="nav-link active" data-toggle="tab">Deneme<i class="icon-menu7 ml-2"></i></a></li>

                            <li class="nav-item"><a href="#admin-icon-tab1" class="nav-link" data-toggle="tab">Admin Panel<i class="icon-gear ml-2"></i></a></li>

                            <li class="nav-item"><a href="#generalPage-icon-tab2" class="nav-link" data-toggle="tab">Sayfa Ayarları<i class="icon-mention ml-2"></i></a></li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog Sayfası<i class="icon-gear ml-2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#blog-icon-tab3" class="dropdown-item" data-toggle="tab">Genel</a>
                                    <a href="#menuAyar" class="dropdown-item" data-toggle="tab">Navbar Menüleri</a>
                                </div>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <!-- Blog Menü Ayarları -->

                            <div class="tab-pane fade" id="admin-icon-tab1">

                                <div class="form-group">
                                    <label>Site Başlığı:</label>
                                    <input type="text" class="form-control" placeholder="Site Başlığı" name="setting[title]" value="<?= settings("title") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Logo Adı:</label>
                                    <input type="text" class="form-control" placeholder="Logo Adı" name="setting[name]" value="<?= settings("name") ?>">
                                </div>
                                <div class="form-group">
                                    <label>Footer:</label>
                                    <input type="text" class="form-control" placeholder="Footer Açıklama" name="setting[footer]" value="<?= settings("footer") ?>">
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
                                    <label>Site Başlığı:</label>
                                    <input type="text" class="form-control" placeholder="Blog Site Başlığı" name="setting[blogTitle]" value="<?= settings("blogTitle") ?>">
                                </div>

                                <div class="form-group">
                                    <label>Site Adı:</label>
                                    <input type="text" class="form-control" placeholder="Blog Site Adı" name="setting[blogName]" value="<?= settings("blogName") ?>">
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

                            <div class="tab-pane fade" id="menuAyar">

                                <div class="card">

                                    <div class="card-header header-elements-inline">
                                        <h6 class="card-title">Menü Ekle</h6>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                                <a class="list-icons-item" data-action="reload"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="menuAyar" class="box- menu-container">
                                            
                                            <p ref="gelen" style="display:none"> <?php isset($menus[0]['content']) ? print_r($menus[0]['content']) : null ?></p>
                                            <p> </p>

                                            <div ref="menuRef">
                                                <div class="tab-pane fade show active">
                                                    <!-- Menü Array ini döngüye al ve her bir değeri v-model ile BIND la-->
                                                    <div v-for="menu in menus">
                                                        <div class="col-md-4" style="padding-bottom: 10px">
                                                            <button @click.prevent="menuSil(menu.id)" class="delete-menu btn btn-light">
                                                                <i class="icon-cancel-circle2"></i>
                                                            </button>
                                                            <input class="form-control " type="text" v-model="menu.name" placeholder="Ana Menü Başlığı">

                                                            <input class="form-control " type="text" v-model="menu.value" placeholder="Ana Menü Linki">
                                                        </div>

                                                        <!-- Alt Menü Varsa Döngüye Sok -->
                                                        <div v-if="menu.subMenus">
                                                            <div v-for="sub in menu.subMenus">
                                                                <ul>
                                                                    <li>
                                                                        <div class="menu-item col-md-4">
                                                                            <button @click.prevent="menuSil(menu.id, sub.id)" class="delete-menu btn btn-light">
                                                                                <i class="icon-cancel-circle2"></i>
                                                                            </button>

                                                                            <input class="form-control" type="text" v-model="sub.name" placeholder="Alt Menü Adı">

                                                                            <input class="form-control" type="text" v-model="sub.value" placeholder="Alt Menü Linki">

                                                                        </div>

                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                        <button @click.prevent="subMenuAdd(menu.id)" class="btn btn-warning add-submenu">Alt Menü Ekle</button>
                                                        <hr />
                                                    </div>

                                                    <div class="menu-btn">
                                                        <button id="add-menu" class="btn btn-warning" @click.prevent="mainMenuAdd()">Menü Ekle</button>

                                                        <span class="btn btn-success" @click="menuKaydet()">Kaydet</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="card">

                                    <div class="card-header header-elements-inline">
                                        <h6 class="card-title">Navbar Menüleri</h6>
                                        <div class="header-elements">
                                            <div class="list-icons">
                                                <a class="list-icons-item" data-action="collapse"></a>
                                                <a class="list-icons-item" data-action="reload"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /right icons -->

    <?php require 'views/public/footer.php'; ?>
</div>

<!-- /main content -->
</div>
<!-- /page content -->
</div>

<script nomodule src="node_modules/clipboard/src/clipboard.js"> </script>
<script src="https://unpkg.com/vue@3.2.2/dist/vue.global.js"></script>
<script src="menuAdd.js"></script>

</body>

</html>