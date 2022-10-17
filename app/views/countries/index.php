<?php
  require APPROOT . '/views/includes/head.php';

 echo $data["title"]; ?>

<table>
  <thead>
    <th>id</th>
    <th>Land</th>
    <th>hoofdstad</th>
    <th>continent</th>
    <th>aantalinwoners</th>
    <th>Update</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <tr><?=$data['countries']?></tr>
  </tbody>
</table>


<a href="<?=URLROOT;?>/homepages/index">terug</a>
<?php
require APPROOT . '/views/includes/footer.php';
?>
