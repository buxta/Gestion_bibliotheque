<?php 
	class TypeDocument
	{
        private $idTypeDocument;
		private $libelle;
		private $nbJourEmprunt;


		public function __construct()
		{
        	$db = $this->connection = SinglePDO::getInstance();
		}

		public function insert($data)
		{
			$requete = $this->connection->prepare("INSERT INTO `typeDocument` (
                                                      `libelle`,
                                                      `nbJourEmprunt`)                                        
                                    			   VALUES (:libelle, :nbJourEmprunt)");
        	$requete->bindParam(":libelle", $data['libelle']);
        	$requete->bindParam(":nbJourEmprunt", $data['nbJourEmprunt']);
        	return $requete->execute();

		}

        public function remove($idTypeDocument)
        {
            $requete = $this->connection->prepare("DELETE FROM typeDocument
            WHERE idTypeDocument = :idTypeDocument");
            $requete->bindParam(":idTypeDocument", $idTypeDocument);
            return $requete->execute();
        }

		public function getList()
		{
			$sql = 'SELECT idTypeDocument, libelle, nbJourEmprunt FROM typeDocument ORDER BY idTypeDocument DESC';
        	$requete = $this->connection->query($sql);
        	$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'TypeDocument');

        	$listTypeDocument = $requete->fetchAll();
        	return $listTypeDocument;

		}

	
    /**
     * Gets the value of libelle.
     *
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Sets the value of libelle.
     *
     * @param mixed $libelle the libelle
     *
     * @return self
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Gets the value of nbJourEmprunt.
     *
     * @return mixed
     */
    public function getNbJourEmprunt()
    {
        return $this->nbJourEmprunt;
    }

    /**
     * Sets the value of nbJourEmprunt.
     *
     * @param mixed $nbJourEmprunt the nb jour emprunt
     *
     * @return self
     */
    public function setNbJourEmprunt($nbJourEmprunt)
    {
        $this->nbJourEmprunt = $nbJourEmprunt;

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
     * @param mixed $idTypeDocument the genere sous document
     *
     * @return self
     */
    public function setIdTypeDocument($idTypeDocument)
    {
        $this->idTypeDocument = $idTypeDocument;

        return $this;
    }
}

 ?>