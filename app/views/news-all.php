     <div class="cont">
      <div class="row">
        <div class="col12">
          <hr class="mnm mvat">
        </div>
      </div>
    </div>
    <section class="Section">
      <div class="cont">
        <div class="row">
         <div class="col4 NewsBlock-big">
          <h1><?=$title[$lang]; ?></h1>
        </div>
        <?php
        foreach ($news as $key => $value) {
          echo '<div class="col4 NewsBlock-big">';
          echo '<a class="h5 mnm" href="'.baseURL().'news/'.$key.'"><img src="'.baseURL().'assets/img/'.$key.'.png?c=1" alt="" class="mmb3" />';
          echo $value['title'][$lang].'</a>';
          echo '<span class="mdb mmb1">' . $value['date'] . '</span>';
          echo '<p>'. characterLimiter(strip_tags($value['content'][$lang]), 100) .'</p>';
          echo '</div>';
        }

        ?>
      </div>
    </div>
  </section>
