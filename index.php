<?php

require("Router.php");

$router = new Router();

$router->get('acceuil', function($req, $res){
    
    try {
        require("model/Books.php");
    
        $book = new Book();
        $sql = "SELECT * FROM book ";
    
        $books = $book->readBook($sql);
       
      
        $res->render("acceuil.php",$books);
       }
       catch(Exception $e){
            header("Location:erreur?name=creation de livre&message=".$e->getMessage());
        }
   
});


$router->get('dashboard', function($req, $res){
    
    $res->render_dashboard("dashboard.php");
});

$router->get('dashboard_tous_livres', function($req, $res){
    require("model/Books.php");
    try {

        $book = new Book();
        $sql = "SELECT * FROM  book";

        $books = $book->readBook($sql);
        $res->render_dashboard("tous_livres.php",$books);
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
    
});


$router->get('dashboard_updatebook', function($req, $res){

   try {
    require("model/Books.php");
    $id =  $req->query()['id'];

    $book = new Book();
    $sql = "SELECT * FROM book where id='".$id."'";

    $books = $book->readBook($sql);
    $one_book =array();
    while($b = $books->fetch()){
        array_push($one_book,$b);
    }
    $res->render_dashboard("updatebook.php",$one_book[0]);
   }
   catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
});

$router->post('dashboard_updatebook', function($req, $res){
  
    try {
        require("model/Books.php");
       // echo "<div class='text-end p-2'>  ".var_dump($req->body())." </div>";
        $auteur_livre    =  $req->body()['auteur_livre'];
        $titre_livre     =  $req->body()['titre_livre'];
        $nbpage_livre    =  $req->body()['nbpage_livre'];
        $prix_livre      =  $req->body()['prix_livre'];
        $parution_livre  =  $req->body()['parution_livre'];
        $courant_livre   =  $req->body()['courant_livre'];
        $desc_livre      =  $req->body()['desc_livre'];
        $nat_livre       =  $req->body()['nationalite_livre'];
        $path_livre       =  $req->body()['path_livre'];
        $id =  $req->body()['id_livre'];
        
        ///$file_path ;
        if(isset($_FILES['file_livre']['name'])){
           // echo "<div class='text-end p-2'> post update : ".$_FILES['file_livre']['name']." </div>";
            $filename = $_FILES['file_livre']['name'];
        
            /* Location */
            $location = "upload/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            
             /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");  
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
                if(move_uploaded_file($_FILES['file_livre']['tmp_name'], $location)){
                    $location = "upload/".$filename;
                    $path_livre = $location;
                }  
            }
        }

        $book = new Book();
        $sql = "UPDATE book SET
                auteur='".$auteur_livre."',
                nationalite='".$nat_livre."',
                titre='".$titre_livre."',
                page='".$nbpage_livre."',
                prix='".$prix_livre."',
                parution='".$parution_livre."',
                courant='".$courant_livre."',
                description='".$desc_livre."',
                photo='".$path_livre."'
           where id='".$id."'";
        

        $one_book = $book->updateBook($sql);
        if ($one_book == 1 ) {
            $one_book = array(
                'auteur'=>".$auteur_livre.",
                'nationalite'=>".$nat_livre.",
                'titre'=>".$titre_livre.",
                'page'=>".$nbpage_livre.",
                'prix'=>".$prix_livre.",
                'parution'=>".$parution_livre.",
                'courant'=>".$courant_livre.",
                'description'=>".$desc_livre.",
                'photo'=>".$path_livre."
            );
            
        }else{

        }
        //$res->render_dashboard("updatebook.php",$one_book);
        
        header("Location:dashboard_updatebook?id=".$id."");
        
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
});


$router->get('dashboard_addbook', function($req, $res){
    
    $res->render_dashboard("addbook.php");
});

$router->post('dashboard_addbook', function($req, $res){
    require("model/Books.php");
    try {

        $auteur_livre    =  htmlspecialchars($req->body()['auteur_livre']);
        $titre_livre     =  htmlspecialchars($req->body()['titre_livre']);
        $nbpage_livre    =  htmlspecialchars($req->body()['nbpage_livre']);
        $prix_livre      =  htmlspecialchars($req->body()['prix_livre']);
        $parution_livre  =  htmlspecialchars($req->body()['parution_livre']);
        $courant_livre   =  htmlspecialchars($req->body()['courant_livre']);
        $desc_livre      =  htmlspecialchars($req->body()['desc_livre']);
        $nat_livre       =  htmlspecialchars($req->body()['nationalite_livre']);
        $path_livre="";
        if(isset($_FILES['file_livre']['name'])){
            // echo "<div class='text-end p-2'> post update : ".$_FILES['file_livre']['name']." </div>";
             $filename = $_FILES['file_livre']['name'];
         
             /* Location */
             $location = "upload/".$filename;
             $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
             $imageFileType = strtolower($imageFileType);
             
              /* Valid extensions */
             $valid_extensions = array("jpg","jpeg","png");  
             /* Check file extension */
             if(in_array(strtolower($imageFileType), $valid_extensions)) {
             /* Upload file */
                 if(move_uploaded_file($_FILES['file_livre']['tmp_name'], $location)){
                     $location = "upload/".$filename;
                     $path_livre = $location;
                 }  
             }
         }
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
            '".$path_livre."'
        )";

         if($book->addBook($sql) != 0){
            header("Location:dashboard_tous_livres");
         }
         else{ 

         }
     
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
    $res->render_dashboard("addbook.php");
});



$router->get('dashboard_deletebook', function($req, $res){
    
    try {
        require("model/Books.php");
        $id =  $req->query()['id'];
    
        $book = new Book();
        $sql = "SELECT * FROM book where id='".$id."'";
    
        $books = $book->readBook($sql);
        $one_book =array();
        while($b = $books->fetch()){
            array_push($one_book,$b);
        }
        $res->render_dashboard("deletebook.php",$one_book[0]);
       }
       catch(Exception $e){
            header("Location:erreur?name=creation de livre&message=".$e->getMessage());
        }
});


$router->post('dashboard_deletebook', function($req, $res){
    
    try {
        require("model/Books.php");
        $id =  $req->body()['id_livre'];

        $book = new Book();
        $sql = "DELETE FROM book WHERE  id='".$id."'";
        $one_book = $book->deleteBook($sql);
        
        header("Location:dashboard_deletebook");
        
    }
    catch(Exception $e){
        header("Location:erreur?name=creation de livre&message=".$e->getMessage());
    }
    
});


$router->get('test', function($req, $res){
    $res->render_dashboard('test.php');
});


$router->get('login', function($req, $res){
    session_start();
    if( $_SESSION['user'] != null  ){
        header("Location:dashboard"); 
    }else{ 
        $res->render_self('login.php');
    }
    
});

$router->post('login', function($req, $res){
       
        require("model/users.php");
        $email =     $req->body()['email'];
        $password =  $req->body()['password'];

        try {
            $user = new Users();
            $sql = "SELECT * FROM collaborateur where email='".$email."' AND pass ='".$password."'";
    
            $u = $user->readUser($sql);
            $current_user = '' ;
            $counter = 0 ;
            while( $row=$u->fetch() ){
                $counter++;
                $current_user= $row;
            }
           
            if( $counter == 1){
                session_start();
                $_SESSION['user']= $current_user ;
                header("Location:dashboard"); 
            }else{ 
                $res->render_self('login.php');
            }
        }
        catch(Exception $e){
            header("Location:erreur?name=creation de livre&message=".$e->getMessage());
        }
    //header("Location:dashboard");
   // $res->render_self('login.php');
});

$router->get('livre', function($req, $res){
    
    try {
        require("model/Books.php");
        $id =  $req->query()['id'];
    
        $book = new Book();
        $sql = "SELECT * FROM book where id='".$id."'";
    
        $books = $book->readBook($sql);
        $one_book =array();
        while($b = $books->fetch()){
            array_push($one_book,$b);
           
        }
        $res->render("livre.php",$one_book[0]);
       }
       catch(Exception $e){
            header("Location:erreur?name=creation de livre&message=".$e->getMessage());
        }
});

$router->get('logout', function($req, $res){
    session_start();
    $_SESSION['user'] = null ;
    header("Location:acceuil"); 
});


$router->nothing(function($req, $res){
    
    $res->render("error.php");
    
});


