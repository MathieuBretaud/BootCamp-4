<?php

class Category{

  private $name;

  public function __construct($nameParam){
    $this->name = $nameParam;
  }

  public function getName(){
    return $this->name;
  }

}