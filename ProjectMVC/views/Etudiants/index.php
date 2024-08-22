<center>
<h1 align=center >La liste des Etudiants</h1>
        <table border="1" align=center>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SPECIALITE</th>
                <th colspan="3"><a href="Etudiants/create">Ajouter</a></th>
            </tr>
            <?php
            foreach($data as $E)
            {?>

            <tr>
                <td><?=$E->ID ?></td>
                <td><?=$E->nom ?></td>
                <td><?=$E->prenom ?></td>
                <td><?=$E->specialite ?></td>
                <td><a href="Etudiants/destroy/<?=$E->ID ?>">delete</a></td>
                <td><a href="Etudiants/edit/<?=$E->ID ?>">edit</a></td>
                <td><a href="Etudiants/show/<?=$E->ID ?>">show</a></td>
            </tr>

            <?php
            }
            ?>
        </table>

        <a href="Etudiants/apiFETCH">Tester l'api rest</a>