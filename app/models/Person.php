<?php
  class Person {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getPersons() {

        $this->db->query("SELECT * FROM `richestpeople` ORDER BY `richestpeople`.`Networth` DESC");
        $result = $this->db->resultSet();

        return $result;
    }
    public function delete($Id){
        try {
          $this->db->query("DELETE FROM `richestpeople` WHERE Id = :Id");
          $this->db->bind("Id", $Id, PDO::PARAM_INT);
          return $this->db->execute();
      } catch(PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
  }
}
  ?>