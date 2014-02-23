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
          <div class="col4">
            <h1><?= $title[$lang] ?></h1>
          </div>
          <div class="col8">
            <a href="<?=baseURL();?>assets/img/<?=$newsid;?>.png?c=1" data-lightbox="gallery">
              <img src="<?=baseURL();?>assets/img/<?=$newsid;?>.png?c=1" alt="" >
            </a>
            <div class="NewsBlockInfo">
              <span class="Number mmb1 mmt5"><?= $news[$newsid]['date'] ?></span>
              <h3><?= $news[$newsid]['title'][$lang] ?></h3>
            </div>
          </div>
          <div class="col12 mmt5">
            <?= $news[$newsid]['content'][$lang] ?>
          </div>
        </div>
      </div>
    </section>
