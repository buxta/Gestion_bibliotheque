<?php

class Emprunt
{
  private $idEmprunt;
  private $idUsager;
  private $idDocument;
  private $dateEmprunt;
  private $dateRetour;

  public function __construct()
  {
    $this->connection = SinglePDO::getInstance();
  }

  public function borrow($idUsager, $idDocument)
  {

    $requete = $this->$connection->prepare("
      INSERT INTO emprunt
      (idUsager, idDocument, dateEmprunt, dateRetour)
      VALUES
      (:idUsager, :idDocument, NOW(),
        (SELECT nbJourEmprunt FROM document
          JOIN typeDocument
          USING(idTypeDocument)
          WHERE idDocument = :idDocument
        )
      )
      ");
  }

    /**
     * Gets the value of idEmprunt.
     *
     * @return mixed
     */
    public function getIdEmprunt()
    {
        return $this->idEmprunt;
    }
    
    /**
     * Sets the value of idEmprunt.
     *
     * @param mixed $idEmprunt the id emprunt
     *
     * @return self
     */
    public function setIdEmprunt($idEmprunt)
    {
        $this->idEmprunt = $idEmprunt;

        return $this;
    }

    /**
     * Gets the value of idUsager.
     *
     * @return mixed
     */
    public function getIdUsager()
    {
        return $this->idUsager;
    }
    
    /**
     * Sets the value of idUsager.
     *
     * @param mixed $idUsager the id usager
     *
     * @return self
     */
    public function setIdUsager($idUsager)
    {
        $this->idUsager = $idUsager;

        return $this;
    }

    /**
     * Gets the value of idDocument.
     *
     * @return mixed
     */
    public function getIdDocument()
    {
        return $this->idDocument;
    }
    
    /**
     * Sets the value of idDocument.
     *
     * @param mixed $idDocument the id document
     *
     * @return self
     */
    public function setIdDocument($idDocument)
    {
        $this->idDocument = $idDocument;

        return $this;
    }

    /**
     * Gets the value of dateEmprunt.
     *
     * @return mixed
     */
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }
    
    /**
     * Sets the value of dateEmprunt.
     *
     * @param mixed $dateEmprunt the date emprunt
     *
     * @return self
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    /**
     * Gets the value of dateRetour.
     *
     * @return mixed
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }
    
    /**
     * Sets the value of dateRetour.
     *
     * @param mixed $dateRetour the date retour
     *
     * @return self
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }
}
?>