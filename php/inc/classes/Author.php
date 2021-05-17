<?php

class Author {
  private $name;

  public function __construct($nameParam)
  {
    $this->name = $nameParam;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($newName){
    
    $this->name = $newName;

  }



}