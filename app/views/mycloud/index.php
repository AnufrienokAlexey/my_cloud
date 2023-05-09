</head>
<body class="text-center">


<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="/app/views/public/images/favicon.ico" alt="" width="47" height="47">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
            <li><a href="/about_me" class="nav-link px-2">Обо мне</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
            if (isset($_SESSION['email'])) {
                echo '<span>Здравствуйте, ' . $_SESSION['email'] . '!</span>';
                unset($_SESSION['unsuccessfully_login']);
            }
            ?>
            <a href="account/logout" class="">Выход</a>
        </div>
    </header>
</div>

<form action="mycloud/savefile" enctype="multipart/form-data" method="post">
    <div class="input-group">
        <input class="form-control" type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <input class="btn btn-outline-primary" type="submit" value="Отправить" name="downloaded_file">
    </div>
</form>
</body>
</html>

