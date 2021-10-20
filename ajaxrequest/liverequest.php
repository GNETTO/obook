<?php

try {
    require("../model/Books.php");
    $id =  $_GET['id'];

    $book = new Book();
    $sql = "SELECT * FROM book where id='".$id."'";

    $books = $book->readBook($sql);
    $one_book =array();
    while($b = $books->fetch()){
        array_push($one_book,$b);
    }
    
    echo   '
    <table class="table m-auto w-75">
    <tr>
        <td> Auteur</td>
        <td> '.$one_book[0]['auteur'].'</td>
        <td rowspan=6><img src='.$one_book[0]['photo'].' width=160> </td>
    </tr>
    <tr>
        <td> Titre</td>
        <td>'.$one_book[0]['titre'].' </td>
        
    </tr>
    <tr>
        <td> Nationalité</td>
        <td> '.$one_book[0]['nationalite'].'</td>
        
    </tr>
    <tr>
        <td> Nombre de page</td>
        <td> '.$one_book[0]['page'].'</td>
        
    </tr>
    <tr>
        <td> Parution</td>
        <td>'.$one_book[0]['parution'].' </td>
        
    </tr>

    <tr>
        <td> Prix</td>
        <td> '.$one_book[0]['prix'].'</td>
        
    </tr>
    <tr>
        <td> Courant</td>
        <td> '.$one_book[0]['courant'].'</td>
        <td> </td>
    </tr>
    <tr>
        <td> Description</td>
        <td> '.$one_book[0]['description'].'</td>
        <td> </td>
    </tr>
</table>
    ';
   }
   catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
?>