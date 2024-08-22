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
            <td><label for="Nom">date :</label></td>
            <td><input type="date" placeholder="Prenom..." name="date" value="<?=$data!=null?$data->date :''?>" required></td>
        </tr>
        <tr>
            <td><label for="Nom">type :</label></td>
            <td><input type="text" placeholder="type de manga..." name="type" value="<?=$data!=null?$data->type :''?>" required></td>
        </tr>
        
        <tr>
            <td><input type="submit" value="envoyer"></td>
            <td><input type="reset" value="Anuler"></td>
        </tr>
    </table>
    </form>
</center>