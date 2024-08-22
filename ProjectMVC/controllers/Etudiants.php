<?php

    class Etudiants extends Controller{
        public function __construct()
        {
            parent::__construct('etudiant');
        }
        public function index(){
            parent::view("index", etudiant::All());
        }
        public function show($id){
            parent::view("show",etudiant::find($id));
        }
        public function destroy($id){
            $E=etudiant::find($id);
            $E->delete();
            $this->Redirect("../Etudiants");
        }
        public function store($request){
            $E= new Etudiant();
            $E->nom=$request->nom;
            $E->prenom=$request->prenom;
            $E->specialite=$request->specialite;
            $E->save();
            $this->Redirect("../Etudiants");
        }
        public function edit($id)
        {
            parent::view("form",etudiant::find($id));
        }
        public function update($id,$request)
        {
            $E=etudiant::find($id);
            $E->nom=$request->nom;
            $E->prenom=$request->prenom;
            $E->specialite=$request->specialite;
            $E->save();
            $this->Redirect("../Etudiants");
        }
        public function create()
        {
            parent::view("form");
        } 
        public function apiFETCH(){
            $E = new Etudiant();
            parent::view("testApi",$E->AllAPI());
        }

    }

?>