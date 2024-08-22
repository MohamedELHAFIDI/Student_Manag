<?php

    class Mangas extends Controller{


        public function __construct()
        {
            parent::__construct('manga');
        }
        public function index(){
            parent::view("index",manga::All());
        }
        public function show($id){
            parent::view("show",manga::find($id));
        }
        public function destroy($id){
            $M=manga::find($id);
            $M->delete();
            $this->Redirect("../../Mangas");
        }
        public function store($request){
            $M = new Manga();
            $M->nom = $request->nom;
            $M->date = $request->date;
            $M->type = $request->type;
            $M->save();
            $this->Redirect("../Mangas");
        }
        public function edit($id){
            parent::view("form",manga::find($id));
        }
        public function update($id,$request){
            $M=manga::find($id);
            $M->nom = $request->nom;
            $M->date = $request->date;
            $M->type = $request->type;
            $M->save();
            $this->Redirect("../../Mangas");
        }
        public function create(){
            parent::view("form");
        }

/************************************************/
       public function apiFETCH(){
            $M = new Manga();
            parent::view("testApi",$M->AllAPI());
        }
    
    }
?>