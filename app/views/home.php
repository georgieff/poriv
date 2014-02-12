
<section class="Section-header">
  <div class="cont">
    <div class="row">
      <div class="col12">
        <h1 class="large"><?= $headerHeading[$lang]; ?></h1>
        <h5><?= $headerText[$lang]; ?></h5>
        <a href="<?=baseURL();?>method" class="Button Button-seeMore mmb3"><?= $seemore[$lang]; ?></a>
      </div>
    </div>
  </div>
</section>

<section class="Section-big">
  <div class="cont">
    <div class="row">
      <div class="col12">
        <h3>
          <?= $underHeader[$lang] ?>
        </h3>
        <hr>
      </div>
      <div class="col4 NewsBlock">
        <h2><?=$latestNews[$lang]; ?></h2>
        <a href="news"><?=$seeAll[$lang]; ?>  &#8594;</a>
        <hr>
      </div>
      <?php
      $nCounter = 2;
      foreach ($news as $key => $value) {
        echo '<div class="col4 NewsBlock">';
        echo '<span class="Number">' . $value['date'] . '</span>';
        echo '<a class="h5 mnm" href="'.baseURL().'news/'.$key.'">'.$value['title'][$lang].'</a>';

        if($nCounter> 0) echo '<hr>';
        $nCounter--;
        echo '</div>';
      }

      ?>
    </div>
  </div>
</section>

<section class="Section-grey">
  <div class="cont">
    <div class="row">
      <div class="col10">
        <h2><?=$gallery[$lang]; ?> </h2>
      </div>
      <div class="col2 mtar">
         <!--  <a href="#" class="ShowAll">All</a>
          <a href="#" class="ShowPrev">Previous</a>
          <a href="#" class="ShowNext">Next</a> -->
        </div>
      </div>
      <div class="row">
        <div class="col4">
          <a href="<?=baseURL();?>assets/img/gallery1.png" data-lightbox="gallery">
            <img src="<?=baseURL();?>assets/img/gallery1.png?cache=2" alt="" >
          </a>
        </div>
        <div class="col4">
          <a href="<?=baseURL();?>assets/img/gallery2.png" data-lightbox="gallery">
            <img src="<?=baseURL();?>assets/img/gallery2.png?cache=2" alt="" >
          </a>
        </div>
        <div class="col4">
          <a href="<?=baseURL();?>assets/img/gallery3.png" data-lightbox="gallery">
            <img src="<?=baseURL();?>assets/img/gallery3.png?cache=2" alt="" >
          </a>
        </div>
      </div>
    </div>
  </section>
