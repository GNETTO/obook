<?php

global  $includepage ;

require("Router.php");

//echo $_SERVER['REQUEST_METHOD'];

$router = new Router();

$globaldata ="";
$router->get('acceuil', function($req, $res){
    
   $res->render("acceuil.php",array("email"=>"tierogneto@gmail.com"));
   
});


$router->get('dashboard', function($req, $res){
    
    $res->render("dashboard.php");
});

$router->get('dashboard_tous_livres', function($req, $res){
    require("model/Books.php");
    try {

        $book = new Book();
        $sql = "SELECT * FROM  book";

        $books = $book->readBook($sql);
        $res->render("tous_livres.php",$books);
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
    
});


$router->get('dashboard_updatebook/:id', function($req, $res){

   try {
    require("model/Books.php");
    //$id =  $req->query()['id'];
    $id= 1 ;
    $book = new Book();
    $sql = "SELECT * FROM book where id='".$id."'";

    $books = $book->readBook($sql);
    $one_book =array();
    while($b= $books->fetch()){
        array_push($b,$one_book);
    }
    $res->render("updatebook.php",$one_book);
   }
   catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
});
$router->post('dashboard_updatebook', function($req, $res){
    
    $res->render("updatebook.php");
});


$router->get('dashboard_addbook', function($req, $res){
    
    $res->render("addbook.php");
});

$router->post('dashboard_addbook', function($req, $res){
    require("model/Books.php");


    try {
        $auteur_livre    =  $req->body()['auteur_livre'];
        $titre_livre     =  $req->body()['titre_livre'];
        $nbpage_livre    =  $req->body()['nbpage_livre'];
        $prix_livre      =  $req->body()['prix_livre'];
        $parution_livre  =  $req->body()['parution_livre'];
        $courant_livre   =  $req->body()['courant_livre'];
        $desc_livre      =  $req->body()['desc_livre'];
        $nat_livre      =  $req->body()['nationalite_livre'];

        $book = new Book();
        $sql = "INSERT INTO book VALUES(
            null,
            '".$auteur_livre."',
            '".$nat_livre."',
            '".$titre_livre."',
            '".$nbpage_livre."',
            '".$prix_livre."',
            '".$parution_livre."',
            '".$courant_livre."',
            '".$desc_livre."',
            ''
        )";

        $book->addBook($sql);

    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
    $res->render("addbook.php");
});



$router->get('', function($req){
    echo "get vente";
},"");

$router->post('vente', function($req){
    echo "post vente";
});



$router->nothing(function($req, $res){
    //$data_error = array('name'=> $req->query()['name'], 'message'=>$req->query()['message']);
    echo $_GET['id'];
    $res->render("error.php");
    //echo $req->query()['message'];
});

//echo $_SERVER['REQUEST_URI'];

/*$body  =array();
if($_SERVER['REQUEST_METHOD'] == "POST"){

    foreach($_POST as $key=>$val ){
        echo $key . " => ".$val ."<br>";
        $body[$key]= $val;
    }
}*/

//$bodytag = str_replace("body", "black", "body"); echo $bodytag . " hello" ;

/*$str = "maman travail" ; 
if( strpos($str, "travails") ){
    echo "Match";
}else {
    echo "no match";
}
 */
?>

