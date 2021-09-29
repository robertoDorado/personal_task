<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">

    <title><?= (isset($title) ? $title . " :: " : "") ?>Personal Task</title>

    <link type="text/css" href="<?= theme("/assets/style.css") ?>" rel="stylesheet">

</head>


<body>
    <!-- Inicio da Seção content -->
    <?= $v->section("content"); ?>

    <?php if ($_SERVER['REQUEST_URI'] != "/personal-task/login" && $_SERVER['REQUEST_URI'] != "/personal-task/admin") : ?>
        <section class="section-footer">
            <footer class="footer">
                <ul class="links-footer">
                    <li class="link"><a href="#">Facebook</a></li>
                    <li class="link"><a href="#">Instagram</a></li>
                    <li class="link">robertodorado7@gmail.com</li>
                </ul>
                <div class="copyrigth">
                    @personal-task. Todos os direitos reservados.
                </div>
            </footer>
        </section>
    <?php endif; ?>

</body>

</html>
<script src="<?= theme("/assets/scripts.js") ?>"></script>