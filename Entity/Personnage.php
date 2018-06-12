<?php

namespace Entity;

/**
*
*/
class Personnage
{
  protected $id;
  protected $name;
  protected $strength;
  protected $health = 100;


  function __construct(array $data)
  {
    self::hydrate($data);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     *
     * @return self
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     *
     * @return self
     */
    public function setHealth($health = 100)
    {
        $this->health = $health;

        return $this;
    }

    public function attack(Personnage $perso)
    {
      $perso->beAttacked(self::getStrength());
    }

    public function beAttacked($strength)
    {
      $this->health -= $strength;
    }
}

//$igo = new Personnage(['name' => 'Igo', 'strength' => 100]);

//$gg = new Personnage(['name' => 'gg', 'strength' => 13]);

//$gg->attack($igo);


//var_dump($igo);

?>
