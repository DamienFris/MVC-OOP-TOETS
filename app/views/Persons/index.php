<?php
  require APPROOT . '/views/includes/head.php';
?>
<div class="Table">
<table>
  <thead>
    <th>Naam</th>
    <th>Vermogen</th>
    <th>Leeftijd</th>
    <th>Bedrijf</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <tr><?=$data['persons']?></tr>
  </tbody>
</table>
</div>


<?php
require APPROOT . '/views/includes/footer.php';
?>
