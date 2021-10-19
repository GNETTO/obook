<?php
require("crud.php");
class Book {

    var $pdo ;
    var $crud;
    function __construct(){
        $this->pdo = new PDO("mysql:dbname=obook; host=localhost","root","");
        $this->crud =  new Crud();
    }

    function dbConnection(){
        
    }
    
    function addBook($sql){
        return $this->crud->create($sql, $this->pdo);
    }

    function readBook($sql){
        return $this->crud->read($sql, $this->pdo);
    }

    function updateBook($sql){
        return $this->crud->update($sql, $this->pdo);
    }
}