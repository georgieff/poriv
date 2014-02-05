<?php
// $this->view->show('main_templates/footer', array('currentData' => $currentData));

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle[$lang]; ?></title>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:700,300&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
  <?= linkTag('assets/css/style.css', 'stylesheet'); ?>
</head>
<body id="mod">
  <section class="Section-nav">
    <div class="cont">
      <div class="row">
        <div class="col1 logo mtar">
          <img src="assets/img/poriv-logo.png" alt="poriv">
        </div>
        <div class="col11 mtar">
          <?php $this->view->show('common/nav'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="Section-eu mtac">
    <div class="cont">
      <div class="row">
        <?php $this->view->show('common/overheader'); ?>
      </div>
    </div>
  </section>

  <?php $this->view->show($page); ?>

  <section class="Section-black">
    <div class="cont">
      <div class="row">
        <div class="col12">
          <?php $this->view->show('common/nav'); ?>
          <hr>
        </div>
        <div class="col12">
          <h6 class="mmb1"><?= $pageTitle[$lang]; ?></h6>
        </div>
        <div class="col9">
          <span class="Small">
          <?= $footerTexts[$lang]; ?>
          </span>
        </div>
        <div class="col3">
          <span class="Phone mdb mmb1">GSM: 0893 522 519</span>
          <span>E-mail:</span> <a href="maito:gimr211@abv.bg">gimr211@abv.bg</a>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
