<?php
class Router {
    var $get ;
    var $post;
    var $method ;
    var $query ;
    var $root ;
    var $current_dir;
    var $uri ;
    var $body  = array();
    var $request ;
    var $response ;
    var $nopath = true ;
    var $parsedQuery = array();
    var $params = array();

    function __construct(){
        $this->request = new Request($this);
        $this->response = new Response($this);
        $this->init();
        echo "<div class='text-end p-2'> query =".$this->query ."<br> uri =>".$this->uri . "<br> current_dir =>".$this->current_dir . " <br> root=>".$this->root. "<br> </div>";
    }

    function init(){

        $this->method = $_SERVER['REQUEST_METHOD'];  
        $this->root = dirname(__DIR__); 
        $this->current_dir = __DIR__ ;
        $this->uri=    strtolower($_SERVER['REQUEST_URI']);
        $this->query = strtolower($_SERVER['QUERY_STRING']);
        $this->parseBody();
        $this->parseQuery();
        $this->pareseParams();
    }

    function parseBody(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           
            foreach($_POST as $key=>$val ){
                $this->body[$key]= $val;
            }
        }
    }

    
    function parseQuery(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
           
            foreach($_GET as $key=>$val ){
                $this->parsedQuery[$key]= $val;
            }
        }
    }

    function get($reqString, $handler){
        //echo "QUERY STRING ". $reqString ;
        if($reqString == null) return ; // prevent empty needle error
        if($this->method == "GET") {

           // echo var_dump($_GET);
            if( strpos($this->uri, $reqString) && $this->compareDirectory($reqString)){
            
               
                $handler($this->request, $this->response);
                $this->nopath =false ;
             }
        } 
    }
    function pareseParams(){

    }
    private function compareDirectory($reqString){
        $path = str_replace("\\","/",$this->current_dir.DIRECTORY_SEPARATOR.$reqString) ; //echo $path ."<br>";
        
        if(strpos(strtolower($path), $this->uri) ==true ){
            return true ;
        }
        return false;
    }

    function post($reqString, $handler){
        if($reqString == null) return ; // prevent empty needle error
        if($this->method == "POST"){
           
            if(strpos($this->uri,$reqString) && $this->compareDirectory($reqString)){
                
                $handler($this->request,$this->response);
                $this->nopath =false ;
            }
        }
    }

    function nothing($handler){
        if($this->nopath == true){
            $handler($this->request, $this->response);
        }
     }


}

class Request {
    var $router ;
    function __construct($router){
        $this->router = $router;
    }

    function body(){
        return $this->router->body;
    }

    function query(){
        return $this->router->parsedQuery;
    }

}


class Response {
    var $router ;
    function __construct($router){
        $this->router = $router;
    }

    function render($page, $data=null){
     
       /*if($dashbordHeader == "d"){

        require("Pages/dashboardheader.php");
        require("Pages/".$page);
        
       }
       else if($dashbordHeader == "self_header")
       {
        require("Pages/login.php");
       }
       else
       {
        require("Pages/header.php");
        require("Pages/".$page);
        require("Pages/footer.php");

       } */

       require("page/".$page);
       require("page/template.php");

    }

}
?>