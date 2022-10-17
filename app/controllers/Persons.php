<?php
class Persons extends Controller {

    public function __construct() {
        $this->personModel = $this->model('Person');
      }
  public function index() {
   
   $persons = $this->personModel->getPersons();

   /**
    * Maak de inhoud voor de tbody in de view
    */
   $rows = '';
   foreach ($persons as $value){
     $rows .= "<tr>
                 <td>" . htmlentities($value->MyName, ENT_QUOTES, 'ISO-8859-1') . "</td>
                 <td>" . number_format($value->Networth, 0, ',', '.') . "</td>
                 <td>" . number_format($value->Age, 0, ',', '.') . "</td>
                 <td>" . htmlentities($value->Company, ENT_QUOTES, 'ISO-8859-1') . "</td>
                 <td><a href='" .  URLROOT .  "/persons/delete/$value->Id'>delete</a></td>
               </tr>";
   }


   $data = [

     'persons' => $rows
   ];
   $this->view('persons/index', $data);

  }

  public function delete($Id) {
    if ($this->personModel->delete($Id)) {
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
  $this->view("persons/delete", $data);
  header("Refresh:3; url=" . URLROOT . "/persons/index");
  }
}