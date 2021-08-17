<?php require "header.php";



?>


<body>


    <div class="container-fluid">
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html"><?= settings("blogName") ?></a>

                <div class="collapse navbar-collapse" id="navbarResponsive ">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="page-content" id="blog">

            <!-- Page Header-->
            <!-- Resim boyutları 1900 X 1300 -->
            <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
                <div class="container position-relative px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div id="particles-js"></div>
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <div class="site-heading">
                                <h2>Geleceğe Yatırım</h2>

                                <span class="subheading">Toplum 5.0</span>
                            </div>
                        </div>
                    </div>
                </div>

            </header>
            <nav class="floating-menu ">
                <ul class="main-menu">
                    <li>
                        <a href="/cms/anasayfa/uzay" class="ripple">
                            <i class="fas fa-home fa-lg"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="ripple">
                            <i class="far fa-address-card fa-lg"></i>
                        </a>
                    </li>

                    <li>
                        <a class="ripple" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                            <i class="fab fa-blogger-b fa-lg"></i>
                        </a>

                    </li>
                </ul>
                <div class="menu-bg"></div>
            </nav>

            <!-- Main Content-->
            <div class="container px-4 px-lg-5 top">

                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">

                        <div id="sidebar-wrapper">



                            <!--
                            <div class="category-sidebar" >
                            <button class="btn btn-primary"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                           << Kategoriler </button>
                                </div> -->
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Konu Başlıkları</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>


                                <div class="offcanvas-body offcanvasRenk">
                                    <div class="overflow-auto">
                                        <ul>

                                            <?php foreach ($blogCategoryData as $key => $value) : ?>

                                                <div class="list-group <?= $value['caturl'] == getLastPath(1) ? 'active' : null ?>">
                                                    <a class="list-group-item list-group-item-action" href="#list-iem-1" v-on:click.prevent="getPosts" data-id="<?= $value['caturl'] ?>">
                                                        <span class="far fa-bookmark"></span> <?= $value['name']; ?>
                                                    </a>
                                                </div>

                                            <?php endforeach; ?>

                                            <canvas class="space"></canvas>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- Post preview-->
                        <div class="post-preview ">

                            <?php if (isset($blogData)) : ?>
                                <?php foreach ($blogData as $key => $value) : ?>
                                    <div class="post-preview">
                                        <a href="post.html">
                                            <h2 class="post-title">
                                                <?= $value['title'] ?>
                                            </h2>

                                            <h3 class="post-subtitle">
                                                <?= $value['message'] ?>
                                            </h3>
                                            <p> <?= $value['text'] ?> </p>
                                            <div>
                                                <?php if (isset($value['uploadedImageName'])) : ?>
                                                    <img src="upload/<?= $value['uploadedImageName'] ?>">
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <p class="post-meta">Gönderen: <?= $value['author'] ?> - <a href="#"></a> Tarih: <?= $value['created'] ?> </p>
                                    </div>

                                    <hr class="my-4" />
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <!-- Pager-->
                        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Eski Gönderiler →</a></div>
                    </div>
                </div>
            </div>
            <?php require "footer.php" ?>
        </div>
    </div>
    <!-- PageContent -->


    <!-- Bootstrap core JS-->


    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@3.1.5/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="blogCategories.js"></script>
    <!-- scripts -->
    <script src="js/particles/particles.js"></script>
    <script src="js/particles/app.js"></script>
    <script src="js/particles/lib/stats.js"></script>
    <script src="js/space/index.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   


</body>

</html>