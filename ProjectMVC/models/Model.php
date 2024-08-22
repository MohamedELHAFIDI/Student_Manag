<?php

   abstract class Model{
        private static $pdo=null;
        public function __construct()
        {
        $chemin = substr($_SERVER['SCRIPT_FILENAME'],0,-9);
        $info_cnx = file($chemin."/.env");
        $StdClass = new stdClass();
        foreach($info_cnx as $key => $value){
            $key = explode("=",$value)[0];
            $StdClass->$key = explode("=",$value)[1];
        }
        $DB_Connection = trim($StdClass->DB_CONNECTION);
        $DB_HOST       = trim($StdClass->DB_HOST);
        $DB_DATABASE   = trim($StdClass->DB_DATABASE);
        $DB_USERNAME   = trim($StdClass->DB_USERNAME);
        $DB_PASSWORD   = trim($StdClass->DB_PASSWORD);

            try{
                self::$pdo = new PDO($DB_Connection.":host=".$DB_HOST.";dbname=".$DB_DATABASE,$DB_USERNAME,$DB_PASSWORD);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }

/*--------------------------------*/
        public static function Connect(){
            if(self::$pdo == null){
                new Model();
            }
            return self::$pdo;
        }
/*--------------------------------*/
        public static function All()
        {
            $class= get_called_class();
            $cls=new $class();
            $req="select * from ".$class."";
            $self=self::$pdo->query($req);
            return $self->fetchAll(PDO::FETCH_OBJ);
        }
//FOR API
        public  function AllAPI()
        {
            /*preparation du statement*/
            $class= get_called_class();
            $cls=new $class();
            $req="select * from ".$class."";
            $self=self::$pdo->prepare($req);
            $self->execute();
           
            
            $temp = array();
                
                while($row = $self->fetch(PDO::FETCH_ASSOC)){
                    $temp[] = $row;  
                } 
                echo json_encode($temp,JSON_PRETTY_PRINT);
            }      
/*--------------------------------*/
        public function save()
    {
        $data=(array)$this;
        // var_dump($data);
        $class=get_called_class();
        $fileds=$values="";

        //  echo $class;
        if($this->id==0){

            foreach($data as $key=>$value){
                if($key!="id"){
                    $fileds.=$key.",";
                    $values.="'".$value."',";
                }}
            $fieldFinal=substr($fileds,0,-1);
            $valuesFinal=substr($values,0,-1);

            $req="insert into {$class}($fieldFinal) values($valuesFinal);";
            //echo $req;

        }
        else{
            $req="update $class set ";
            foreach($data as $key=>$value)
            {
                if($key!="id")
                {
                if($value!=null)
                    {
                    $req.=$key."='".$value."',";

                    }
                }
                
            }
            $req=substr($req,0,-1);
            $req.=" where id=".$this->id;
            
        }
        self::$pdo->exec($req);

    }
/*--------------------------------*/
    public static function find($id)
    {
        $class= get_called_class();

        $cls=new $class();

        $req="select * from ".$class." where id= '$id'";
        $self=self::$pdo->query($req);
        $res=$self->fetch(PDO::FETCH_ASSOC);
        foreach($res as $key=>$value)
        {
            $cls->$key=$value;
        }
        return $cls;
    }
/*--------------------------------*/
    public function delete()
    {
        $Model=get_class($this);
        $req="delete  from ".$Model." where id=".$this->id;
        echo $req;
        self::$pdo->exec($req);
    }



    }


?>