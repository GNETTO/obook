<?php ob_start()  ?>

<table class="table table-sm">
<thead>
    <tr>
        <th>id</th>
        <th>Titre</th>
        <th>Nb page</th>
        <th>Prix</th>
        <th>Parution</th>
        <th>Courant</th>
        <th>Auteur</th>
        <th>Action</th>
        
    </tr>
</thead>
<?php 
// href='dashboard_updatebook?id=".$book['id']."'
    while($book = $data->fetch()){
        echo "<tr class='ligne-livre' data-bgmouseover='lightblue' data-bgmouseout='white' data-book=".$book['id'].">
                <td>".$book['id']."</td>
                <td>".$book['titre']."</td>
                <td>".$book['page']."</td>
                <td>".$book['prix']."</td>
                <td>".$book['parution']."</td>
                <td>".$book['courant']."</td>
                <td>".$book['auteur']."</td>
                <td>
                    <button class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' data-idanimal='".$book['id']."' data-action='0' > ... </button>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_updatebook?id=".$book['id']."' data-idanimal='".$book['id']."'  data-action='1'> <img src''> </a>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_deletebook?id=".$book['id']."' data-idanimal='".$book['id']."'   data-action='2'> - </a>
                </td>
        
        </tr>";
    }
?>
</table>
<div class="" id="vision-livre">
   ss
</div>

<script>
    //

    let checkAjaxOject = function(){

    return new Promise( (resolve, reject)=>{
        let ajaxr ;
        try {
            ajaxr = new XMLHttpRequest();
        }catch(e){
            try {
                ajaxr = new ActiveXObject("Msxml2.XMLHTTP")
            }catch(e){
                try {
                    ajaxr = new ActiveXObject("Microsoft.XMLHTTP")
                }catch(e){
                    //alert("La connexion Ajax a échoué .")
                    reject(ajaxr);
                }
            }
        }
        resolve(ajaxr);
    })
}


function AjaxRequest(method, action, query, callback){

    checkAjaxOject().
        then(ajaxr=>{
        
        ajaxr.onreadystatechange = function(){

            if( ajaxr.readyState == 4){
            callback(ajaxr)    
            }    
        }

        if(method == "GET"){
            ajaxr.open("GET",`${action}?${query}`);
            ajaxr.send(null);
        }else if(method == "POST"){
            
            ajaxr.open("POST",`${action}`,true);
            ajaxr.send(query); 
        }
        
    }).
    catch(failure=>{
        console.log(failure)
    })
}

    let ligne_tous_livre = document.querySelectorAll(".ligne-livre");

    Array.prototype.map.call(ligne_tous_livre , ligne=>{

        ligne.addEventListener("mouseover", event=>{
            event.currentTarget.style.backgroundColor = event.currentTarget.getAttribute('data-bgmouseover');
        });

        ligne.addEventListener("mouseout", event=>{
            event.currentTarget.style.backgroundColor = event.currentTarget.getAttribute('data-bgmouseout');
        });


        ligne.addEventListener("click", event=>{
            let book = event.currentTarget.getAttribute('data-book');
            let query="id="+book;
            AjaxRequest("GET","ajaxrequest/liverequest.php",query, ajaxr =>{
              if(ajaxr.responseText != -1 ){
                  document.getElementById("vision-livre").innerHTML=ajaxr.responseText
                //alert(ajaxr.responseText)
                console.log(ajaxr.responseText)
              }else{
                alert("Echec d enregistrement")
              }
            })
        });
    });

</script>
<?php $content=ob_get_clean();  ?>