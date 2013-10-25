<?php

class Document
{
  private $idDocument;
  private $titre;
  private $code;
  private $aEmporter;
  private $documentRef;
  private $idTypeDocument;
  private $disponible;

  public function __construct()
  {
    $this->connection = SinglePDO::getInstance();
  }    

  public function insert($data)
  {    
    $requete = $this->connection->prepare("INSERT INTO `document`(
      `titre`,
      `code`,
      `aEmporter`,
      `documentRef`,
      `idTypeDocument`)
    VALUES (:titre, :code, :aEmporter, :documentRef, :idTypeDocument)");
    
    $requete->bindParam(":titre", $data['titre']);
    $requete->bindParam(":code", $data['code']);
    $requete->bindParam(":aEmporter", $data['aEmporter']);
    $requete->bindParam(":documentRef", $data['documentRef']);
    $requete->bindParam(":idTypeDocument", $data['idTypeDocument']);
    return $requete->execute();
  }

  public function getList()
  {
      $sql = 'SELECT idDocument, titre, code, document.aEmporter, documentRef, idTypeDocument, disponible, dateRetour FROM document ORDER BY idDocument DESC';
      $requete = $this->connection->query($sql);
      $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Document');
      $listDocument = $requete->fetchAll();
      return $listDocument;
  }

  public function remove($idDocument)
  {
      $requete = $this->connection->prepare("DELETE FROM document
        WHERE idDocument = :idDocument");
      $requete->bindParam(":idDocument", $idDocument);
      $requete->execute();
      
      return $requete->errorInfo();
  }

  public function search($content)
  {
    $sql = "SELECT * FROM document WHERE titre LIKE '%".$content."%'";
    $requete = $this->connection->query($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Document');

    $results = $requete->fetchAll();

    if(!empty($results)) {
        foreach ($results as $result) {
            unset($result->connection);
            $documents[]=$result;
        }
        return $documents;
    }
    else {
        return false;
    }
  }



    /**
     * Gets the value of cote.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the value of cote.
     *
     * @param mixed $cote the cote
     *
     * @return self
     */
    public function setCode($cote)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the value of titre.
     *
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Sets the value of titre.
     *
     * @param mixed $titre the titre
     *
     * @return self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

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
     * @param mixed $idDocument the idDocument
     *
     * @return self
     */
    public function setIdDocument($idDocument)
    {
        $this->idDocument = $idDocument;

        return $this;
    }

    /**
     * Gets the value of documentRef.
     *
     * @return mixed
     */
    public function getDocumentRef()
    {
        return $this->documentRef;
    }

    /**
     * Sets the value of documentRef.
     *
     * @param mixed $documentRef the documentRef
     *
     * @return self
     */
    public function setDocumentRef($documentRef)
    {
        $this->documentRef = $documentRef;

        return $this;
    }

    /**
     * Gets the value of idTypeDocument.
     *
     * @return mixed
     */
    public function getIdTypeDocument()
    {
        return $this->idTypeDocument;
    }

    /**
     * Sets the value of idTypeDocument.
     *
     * @param mixed $idTypeDocument the idTypeDocument
     *
     * @return self
     */
    public function setIdTypeDocument($idTypeDocument)
    {
        $this->idTypeDocument = $idTypeDocument;

        return $this;
    }

    /**
     * Gets the value of aEmporter.
     *
     * @return mixed
     */
    public function getAEmporter()
    {
        return $this->aEmporter;
    }
    
    /**
     * Sets the value of aEmporter.
     *
     * @param mixed $aEmporter the a emporter
     *
     * @return self
     */
    public function setAEmporter($aEmporter)
    {
        $this->aEmporter = $aEmporter;

        return $this;
    }

    /**
     * Gets the value of disponible.
     *
     * @return mixed
     */
    public function getDisponible()
    {
        return $this->disponible;
    }
    
    /**
     * Sets the value of disponible.
     *
     * @param mixed $disponible the disponible
     *
     * @return self
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }
}



?>