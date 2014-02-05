<ul class="Nav">
  <?php
  foreach ($menu as $key => $value) {
  echo "<li><a href=\" " . baseURL() . $key . " \">" . $value[$lang] . "</a></li>";
}
?>
    <li>
      <a href="<?=baseURL()?>home/<?= $lang == 'en' ? 'inbulgarian' : 'inenglish'; ?>" class="special"><?= $lang == 'en' ? 'Bg' : 'En'; ?></a>
    </li>
</ul>
