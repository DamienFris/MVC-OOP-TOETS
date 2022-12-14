<?php
class Countries extends Controller {

  public function __construct() {
    $this->countryModel = $this->model('Country');
  }

  public function index() {
    /**
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $countries = $this->countryModel->getCountries();

    /**
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($countries as $value){
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>" . htmlentities($value->name, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->capitalCity, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->continent, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . number_format($value->population, 0, ',', '.') . "</td>
                  <td><a href='" .  URLROOT .  "/countries/update/$value->id'>update</a></td>
                  <td><a href='" .  URLROOT .  "/countries/delete/$value->id'>delete</a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>Landenoverzicht</h1>',
      'countries' => $rows
    ];
    $this->view('countries/index', $data);
  }

  public function update($id = null){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->countryModel->updateCountries($_POST);
      header("Location: " . URLROOT . "countries/index");
    } else {
  $row = $this->countryModel->getSingleCountry($id);
            $data = [
                'title' => '<h3>Update landenoverzicht</h3>',
                'id' => $row->id,
                'name' => $row->name,
                'capitalCity' => $row->capitalCity,
                'continent' => $row->continent,
                'population' => $row->population,
            ];
$this->countryModel->updateCountries($data);
  $this->view('countries/update', $data);
}
}
public function delete($id) {
  if ($this->countryModel->delete($id)) {
    $data = [
        'deleteStatus' =>  "<div class='alert alert-danger' role='alert'>
                                Het record is verwijdert
                            </div>"
    ];
} else {
    $data =[
        'deleteStatus' =>  "<div class='alert alert-danger' role='alert'>
                                Interne servererror het record is niet verwijdert
                            </div>"
    ];
}
$this->view("countries/delete", $data);
header("Refresh:3; url=" . URLROOT . "/countries/index");
}

public function create() {


  
}
}

?>