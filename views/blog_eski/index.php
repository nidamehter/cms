<?php require 'header.php'; ?>

<body data-spy="scroll" data-target=".sidebar">
    
    <div id="blog">z
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        Menü <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.html">Anasayfa</a>
                        </li>
                        <li>
                            <a href="about.html">Hakkında</a>
                        </li>
                        <li>
                            <a href="post.html">Örnek Post</a>
                        </li>
                        <li>
                            <a href="contact.html">İletişim</a>
                        </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h2>Yaşamdan Kesitler</h2>
                            <hr class="small">
                            <span class="subheading">En Güncel Bilgiler</span>
                        </div>
                    </div>
                </div>

                <div id="sidebar-wrapper">
                    <nav id="spy">
                        <ul class="sidebar-nav nav">
                            <li class="sidebar-brand">
                                <a href="#home"><span class="fa fa-home solo">Home</span></a>
                            </li>
                            <?php foreach ($blogCategoryData as $key => $value) : ?>
                                <li class="<?= $value['caturl']==getLastPath(1) ? 'active' : null ?>" >
                                    <a data-scroll="" v-on:click.prevent="getPosts" data-id="<?= $value['caturl'] ?>">
                                        <span class="fa fa-pencil" style="color:black"><?= $value['name'] ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <?php if (isset($blogData)) : ?>
                        <!-- Main Content -->
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

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
                                    <hr>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <hr />


                    <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a>Eski Gönderiler &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <?php require 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@3.1.5/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        //VUE3
        const blogApp = Vue.createApp({
            data() {
                return {
                    id: 1
                }
            },
            methods: {
                async getPosts(event) {
                    this.id = event.target.getAttribute('data-id');
                    window.location = "/cms/anasayfa/" + this.id;
                }
            }
        });

        //Mount
        const userApp = blogApp.mount('#blog')
    </script>

</body>

</html>