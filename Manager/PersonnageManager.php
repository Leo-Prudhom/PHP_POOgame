<?php

namespace Manager;

require_once '../Entity/Personnage.php';
use Entity\Personnage;
use PDO;
//drop perso if getHealth()<=0*/

/**
*
*/
class PersonnageManager
{
  protected $pdo;
  protected $pdoStatement;
  protected $id;

  function __construct($pdo)
  {
    self::setPdo($pdo);
  }

/**
 * Insertion d'un objet personnage ds la BDD
 * @param  Personnage $personnage [Objet et attributs]
 * @return [bool]                 [true si insertion réussie false si non]
 */
  public function create(Personnage $personnage)
  {
    //prepare la requete insert
    $this->pdoStatement = $this->pdo->prepare('INSERT INTO personnage VALUES(NULL, :name, :strenght, :health)');

    //liaison des valeurs
    $this->pdoStatement->bindValue(':name', $personnage->getName(), PDO::PARAM_STR);
    $this->pdoStatement->bindValue(':strenght', $personnage->getStrength(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(':health', $personnage->getHealth(), PDO::PARAM_INT);

    //verification de l'execution
    $isExecuteOk = $this->pdoStatement->execute();

    if (!$isExecuteOk)
    {
      return false;
    }

    else
    {
      //$personnage->setId('SELECT id FROM personnage')
      return true;
    }

  }

/**
 * Lecture de tous les Personnages présents en bdd
 * @return [Personnage/null/false] [description]
 */
  public function readAll()
  {

    $persos = [];

    $this->pdoStatement = $this->pdo->query('SELECT * FROM personnage ORDER BY name');

    while ($donnees = $this->pdoStatement->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($donnees);
    }

    return $persos;

  }

/**
 * Lecture de tous les Personnages présents en bdd sauf celui comportant l'id $id
 * @return [Personnage/null/false] [description]
 */
  public function readAllExcept(Personnage $personnage)
  {

    $id = $personnage->getId();
    $perso = [];

    $this->pdoStatement = $this->pdo->query("SELECT * FROM personnage WHERE id!=". $id ."");

    while ($data = $this->pdoStatement->fetch(PDO::FETCH_ASSOC))
    {
      $perso[] = new Personnage($data);
    }

    return $perso;
  }

/**
 * Lecture et affichage d'un seul perso en fct de son id
 * @param  [int] $id [description]
 * @return [Personnage/false]     [retour de type Personnage si correspondance et false si R ds la bdd]
 */
  public function read($id)
  {
    $this->pdoStatement = $this->pdo->prepare('SELECT * FROM personnage WHERE id=:id');

    //liaison des valeurs
    $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

    $isExecuteOk = $this->pdoStatement->execute();

    if ($isExecuteOk)
    {
      $data = $this->pdoStatement->fetch(PDO::FETCH_ASSOC);
      $personnage = new Personnage($data);

      if (!$personnage)
      {
        return null;
      }

      else
      {
        return $personnage;
      }
    }

    else
    {
      return false;
    }

  }

/**
 * Gestion d'une attaque d'un perso1 à un perso2
 * @param  Personnage $personnage1 [Attaquant]
 * @param  Personnage $personnage2 [Attaqué]
 * @return TRUE / FALSE
 */
  public function attackPersoToTarget(Personnage $personnage1, Personnage $personnage2)
  {
    $personnage1->attack($personnage2);
    $updatedLife = $personnage2->getHealth();

    $this->pdoStatement = $this->pdo->prepare("UPDATE personnage
                                                 SET health=:health
                                                      WHERE id =:id ");

    $this->pdoStatement->bindValue(":id", $personnage2->getId(), PDO::PARAM_INT);
    $this->pdoStatement->bindValue(":health", $updatedLife, PDO::PARAM_INT);


    $isExecuteOk = $this->pdoStatement->execute();

    if ($isExecuteOk)
    {
      return $isExecuteOk;
    }

    else
    {
      return false;
    }
  }

  private function setPdo($pdo)
  {
    $this->pdo = $pdo;
  }
}

?>

