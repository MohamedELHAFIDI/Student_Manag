<center>
<h1 align=center >La liste des Mangas</h1>
        <table border="1" align=center>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>DATE</th>
                <th>TYPE</th>
                <th colspan="3"><a href="Mangas/create">Ajouter</a></th>
            </tr>
            <?php
            foreach($data as $M)
            {?>

            <tr>
                <td><?=$M->ID ?></td>
                <td><?=$M->nom ?></td>
                <td><?=$M->date ?></td>
                <td><?=$M->type ?></td>
                <td><a href="Mangas/destroy/<?=$M->ID ?>">delete</a></td>
                <td><a href="Mangas/edit/<?=$M->ID ?>">edit</a></td>
                <td><a href="Mangas/show/<?=$M->ID ?>">show</a></td>
                
            </tr>
                    
            <?php
            }
            ?>
            
        </table>
        
        