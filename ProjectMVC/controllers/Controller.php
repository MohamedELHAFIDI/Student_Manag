<?php

abstract class Controller{
    
    function __construct(string $model)
    {
        include_once ROOT.'models/'.$model.".php";
    }
    public function view(string $fichier,$data=null){
        include_once ROOT.'views/'.get_class($this)."/$fichier.php";
    }
    public function Redirect($chemin){
        header('Location:'.$chemin);
    }

}


?>