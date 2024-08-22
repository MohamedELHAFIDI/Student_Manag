<center>
    <h1>Formulaire</h1>
    <?=$data!=null?$id=$data->ID:''?>
    <form action="<?=$data==null?"store":"../update/$id"?>" method="post">
    <table>
        <tr>
            <td><label for="Nom">Nom :</label></td>
            <td><input type="text" placeholder="Nom..." name="nom"  value="<?=$data!=null?$data->nom:''?>" required></td>
        </tr>
        <tr>
            <td><label for="Nom">Prenom :</label></td>
            <td><input type="text" placeholder="Prenom..." name="prenom" value="<?=$data!=null?$data->prenom :''?>" required></td>
        </tr>
        <tr>
            <td><label for="Nom">specialite :</label></td>
            <td><input type="text" placeholder="specialite..." name="specialite" value="<?=$data!=null?$data->specialite :''?>" required></td>
        </tr>
        <tr>
            <td><input type="submit" value="envoyer"></td>
            <td><input type="reset" value="Anuler"></td>
        </tr>
    </table>
    </form>
</center>