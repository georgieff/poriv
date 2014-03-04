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
         <div class="col4 ContactBlock">
          <h1><?=$title[$lang]; ?></h1>
          <hr>
        </div>
        <?php
        $cCounter = 2;
        foreach ($contacts as $key => $value) {
          echo '<div class="col4 ContactBlock">';
          echo '<span class="mdb type">'.$value['type'][$lang].'</span>';
          echo '  <div class="info">';
          echo '    <h3>' . $value['name'][$lang] . '</h3>';
          echo '    <span class="mdb">' . $addressName[$lang] . ': ' . $value['address'][$lang] . '</span>';
          echo '    <span class="mdb">GSM: ' . $value['phone'] . '</span>';
          echo '    <span class="mdb">E-mail: ' . $value['email'] . '</span>';
          if(isset($value['website']))
            echo '    <span class="mdb">' . $websiteName[$lang] . ': ' . $value['website'] . '</span>';
          echo '</div>';
          if($cCounter> 0) echo '<hr>';
          $cCounter--;
          echo '</div>';
        }

        ?>
      </div>
    </div>
  </section>
