<?php
  require APPROOT . '/views/includes/head.php';

?>
<div class="card">
  <div class="card-body">
    <form action="<?= URLROOT; ?>/countries/update" method="post">
  <div class="mb-3">
  <label class= "form-label" for="name">Naam van het land</label>          
          <input class="form-control" type="text" name="name" id="name" value="<?= $data["name"]; ?>"></div>
<div class="mb-3">
<label class= "form-label" for="capitalCity">Naam van de hoofdstad</label>
          <input class="form-control" type="text" name="capitalCity" id="capitalCity" value="<?= $data["capitalCity"]; ?>"></div>
<div class="mb-3">
<label class= "form-label" for="continent">Naam continent</label>
<input class="form-control" type="text" name="continent" list="continentlist" id="continent" value="<?= $data["continent"]; ?>">
<datalist id="continentlist">    
  <option value='Afrika'>
  <option value='Antarctica'>
  <option value='Azië'>
  <option value='Australië/Oceanië'>
  <option value='Europa'>
  <option value='Noord-Amerika'>
  <option value='Zuid-Amerika'>
</datalist>
</div>
<div class="mb-3">
<label class= "form-label" for="population">Aantal inwoners</label>
         <input class="form-control" type="number" name="population" id="population" value="<?= $data["population"]; ?>">
</div>
<input type="hidden" name="id" value="<?= $data["id"]; ?>">
<input class="btn btn-primary btn-lg" type="submit" value="Verzenden">
</form>
  </div>
</div>

<?php
  require APPROOT . '/views/includes/footer.php';

?>