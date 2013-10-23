<?php
  class User
  {
      private $idUsager;
      private $nom;
      private $prenom;
      private $profession;
      private $employeur;
      private $dateInscription;
      private $admin;
      private $connection;

      public function __construct()
      {   
        $this->connection = SinglePDO::getInstance();
      }

      public function insert($data)
      {
        $requete = $this->connection->prepare("INSERT INTO `usagers` (
                                                      `nom`,
                                                      `prenom`,
                                                      `profession`,
                                                      `employeur`,
                                                      `dateInscription`,
                                                      `admin`)
                                    VALUES (:nom, :prenom, :profession, :employeur, NOW(), :admin)");
        var_dump($requete);
        $requete->bindParam(":nom", $data['nom']);
        $requete->bindParam(":prenom", $data['prenom']);
        $requete->bindParam(":profession", $data['profession']);
        $requete->bindParam(":employeur", $data['employeur']);
        $requete->bindParam(":admin", $data['admin']);
        return $requete->execute();
      }

        public function remove($idUsager)
        {
            $requete = $this->connection->prepare("DELETE FROM usagers
                WHERE idUsager = :idUsager");
            $requete->bindParam(":idUsager", $idUsager);
            return $requete->execute();
        }

      public function getList()
      {
        $requete = 'SELECT  idUsager, nom, prenom, profession, employeur, dateInscription, admin FROM usagers ORDER BY idUsager DESC';
        $requete = $this->connection->query($requete);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

        $listUser = $requete->fetchAll();
        return $listUser;
      }


    /**
     * Gets the value of nom.
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Sets the value of nom.
     *
     * @param mixed $nom the nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Gets the value of prenom.
     *
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    /**
     * Sets the value of prenom.
     *
     * @param mixed $prenom the prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Gets the value of profession.
     *
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }
    
    /**
     * Sets the value of profession.
     *
     * @param mixed $profession the profession
     *
     * @return self
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Gets the value of employeur.
     *
     * @return mixed
     */
    public function getEmployeur()
    {
        return $this->employeur;
    }
    
    /**
     * Sets the value of employeur.
     *
     * @param mixed $employeur the employeur
     *
     * @return self
     */
    public function setEmployeur($employeur)
    {
        $this->employeur = $employeur;

        return $this;
    }

    /**
     * Gets the value of dateInscription.
     *
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
    
    /**
     * Sets the value of dateInscription.
     *
     * @param mixed $dateInscription the dateInscription
     *
     * @return self
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Gets the value of admin.
     *
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    
    /**
     * Sets the value of admin.
     *
     * @param mixed $admin the admin
     *
     * @return self
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

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
     * @param mixed $idUsager the idUsager
     *
     * @return self
     */
    public function setIdUsager($idUsager)
    {
        $this->idUsager = $idUsager;

        return $this;
    }
}
?>