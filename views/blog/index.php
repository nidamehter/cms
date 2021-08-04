<?php require 'header.php'; ?>

<body>
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
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <?php foreach($blogData as $key => $value): ?>
                <hr>
                <div class="post-preview">
                    <a href="post.html">

                        <h2 class="post-title">
                            <?= $value['title'] ?>
                        </h2>

                        <h3 class="post-subtitle">
                            <?= $value['message'] ?>
                        </h3>
                        <p> <?= $value['text'] ?> </p>
                    </a>
                    <p class="post-meta">Gönderen: <?= $value['author'] ?> - <a href="#"></a> Tarih: <?= $value['created'] ?> </p>
                </div>
                <hr>
            <?php endforeach; ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a >Eski Gönderiler &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <hr>
    <?php require 'footer.php'; ?>

    
</body>
</html>