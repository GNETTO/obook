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
        echo "<tr>
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
               <button class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' data-idanimal='".$book['id']."'   data-action='2'> - </button>
            </td>
        
        </tr>";
    }
?>

<?php $content=ob_get_clean();  ?>