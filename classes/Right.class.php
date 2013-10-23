<?php
  class Right
  {
      private $id;
      private $libelle;

      public function __construct()
      {   
        $db = $this->connection = SinglePDO::getInstance();
      }

      public function insert($data)
      {
        $requete = $this->connection->prepare("INSERT INTO `droits` (`libelle`) VALUES (:libelle)");
        $requete->bindParam(":libelle", $data);
        return $requete->execute();
      }

      public function getList()
      {
        $requete = $this->connection->prepare("SELECT idDroit, libelle FROM `droits` ORDER BY idDroit DESC");
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Right');
        return $requete->fetchAll();
      }
}
?>