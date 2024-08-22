<?php
$path =  substr($_SERVER['SCRIPT_FILENAME'],0,-9);
define("ROOT",$path);
define('PROOT','/projectMVC/');

include_once ROOT.'Models/Model.php';
include_once ROOT.'Controllers/Controller.php';

$url=$_GET['url'];
// echo"$url";
$id=0;
$info_url=explode("/",$url);

if($info_url[0]!='')
    
    if(file_exists(ROOT.'controllers/'.$info_url[0].".php"))
    {
        
        include_once ROOT.'controllers/'.$info_url[0].".php";
        $Controllers=new $info_url[0]();
        $action="index";
        if(isset($info_url[1]))
        $action=$info_url[1];
        
        if(method_exists($Controllers,$action))
        {
        $request=null;
                if(isset($info_url[2]))
                $id=$info_url[2];
                if(!empty($_POST))
                    {
                        $request=new stdClass();
                        foreach($_POST as $key=>$value)
                            $request->$key=$value;
                    }
            if($request!=null)
                if($id!=0)
                        $Controllers->$action($id,$request);
                    else
                        $Controllers->$action($request);
                    else
                        if($id==0)
                            $Controllers->$action();
                    else 
                            $Controllers->$action($id);
        }
            else
                echo"url introuvable !";
    }
    else
                echo"URL introuvable !!!";
    else
    {    ?>
<center>
        <h1> <a href="Mangas"> Gestion des Mangas</a></h1>
        <h1> <a href="Etudiants">  Gestion des etudiants</a></h1>
</center>    

<?php }


