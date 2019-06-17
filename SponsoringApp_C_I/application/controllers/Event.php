<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
    }
    function achatpack() {
        $idPack=$this->input->post("id");
        $idSpons=$this->session->userdata("idSpons");
        $data=array("idPack"=>$idPack,"idSpons"=>$idSpons);
        $this->load->model("main_model");
        $this->main_model->achatpack($data);
        echo json_encode($data);
    }
    function ajoutpack() {
        $output='<form action="'.base_url().'index.php/event/ajouter_p" id="creerPack" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick " id="demo1-upload" method="post">
                    <div class="row" style="margin:10px">
                            <div class="form-group">
                                <input name="nomPack" type="text" class="form-control" id="nomPack" placeholder="Nom du pack">
                            </div>
                            <div class="form-group">
                                <textarea name="descriptionPack" class="form-control" id="descriptionPack" placeholder="Description du pack"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" name="montant" class="form-control" id="montant" placeholder="Montant du pack">
                            </div>
                            <div class="form-group">
                                <input type="text" name="audience"  class="form-control" id="audience" placeholder="Audience">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <h5>
                                    Type du pack
                                </h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="radio">
                                    <label><input type="radio" class="typePack" name="typePack" checked value=0>Service</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" class="typePack" name="typePack" value=1>Subvention</label>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="button" class="subButt btn btn-primary waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-primary waves-effect waves-light">retour</button>
                            </div>
                        </div>
                    </div>
                </form>';
        echo json_encode($output);
    }


    function modifier_event(){
        $this->load->model('main_model');
        $this->db->where("idEvent",$_POST["hidbutt"]);
        $q=$this->db->get("evenement");
        foreach($q->result() as $row){
            if(!empty($_FILES["image_file"]["name"]))  
            {
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
                $config['max_size']= 0;
                $config['filename']= url_title($this->input->post('image_file'));
                ini_set('upload_max_filesize','20M');
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  $this->load->view("display");
                        echo $this->upload->display_errors();  
                }  
                else 
                {  
                    $data = $this->upload->data();  
                    $imagedata = file_get_contents(base_url()."/upload/".$this->upload->file_name);
                    $imagebase64 = base64_encode($imagedata);
                   // echo $imagebase64;
                }
            }
            else{
                $imagebase64=$row->URL_Image;
            }
            if(empty($_POST["nomEvent"])){
                
                    $nomEvent=$row->nomEvent;
            }
            else {
                if(!empty($_POST['nomEvent'])){
                    $nomEvent=$_POST["nomEvent"];
                }
            }
            if(empty($_POST["dateDeb"])){
                
                $dateDeb=$row->dateDeb;
            }
            else {
                if(!empty($_POST["dateDeb"])){
                    $dateDeb=$_POST["dateDeb"];
                }
            }
            if(empty($_POST["dateFin"])){
                
                $tel=$row->dateFin;
            }
            else {
                if(!empty($_POST["dateFin"])){
                    $dateFin=$_POST["dateFin"];
                }
            }
            if(empty($_POST["heureEvent"])){
                
                $email=$row->heureEvent;
            }
            else {
                if(!empty($_POST["heureEvent"])){
                    $heureEvent=$_POST["heureEvent"];
                }
            }
            if(empty($_POST["descriptionEvent"])){
                
                $org=$row->descriptionEvent;
            }
            else {
                if(!empty($_POST["descriptionEvent"])){
                    $descriptionEvent=$_POST["descriptionEvent"];
                }
            }
            if(empty($_POST["lieuEvent"])){
                
                $centre=$row->lieuEvent;
            }
            else {
                if(!empty($_POST["lieuEvent"])){
                    $lieuEvent=$_POST["lieuEvent"];
                }
            }
            if(empty($_POST["budgetEvent"])){
                
                $centre=$row->budget;
            }
            else {
                if(!empty($_POST["budgetEvent"])){
                    $budget=$_POST["budgetEvent"];
                }
            }
            if(empty($_POST["cat"])){
                
                $cat=$row->categ;
            }
            else {
                if(!empty($_POST["cat"])){
                    $cat=$_POST["cat"];
                }
            }
            if(empty($_POST["sous"])){
                
                $sous=$row->sous_categ;
            }
            else {
                if(!empty($_POST["sous"])){
                    $sous=$_POST["sous"];
                }
            }
            if(empty($_POST["isfree"])){
                
                $sous=$row->isfree;
            }
            else {
                if(!empty($_POST["isfree"])){
                    $isfree=$_POST["isfree"];
                }
            }
        }
        $this->db->set('nomEvent',$nomEvent);
        $this->db->set('dateDeb',$dateDeb);
        $this->db->set('dateFin',$dateFin);
        $this->db->set('heureEvent',$heureEvent);
        $this->db->set('lieuEvent', $lieuEvent);
        $this->db->set('descriptionEvent', $descriptionEvent);
        $this->db->set('budget',$budget);
        $this->db->set('categ',$cat);
        $this->db->set('sous_categ',$sous);
        $this->db->set('isfree',$isfree);
        $this->db->set('URL_Image',$imagebase64);
        $this->db->where('idEvent',$_POST["hidbutt"]);
        $this->db->update('evenement');
        $this->db->insert('notifadmin',array(
            "titreNotif_admin"=>"L'organisateur' ".$this->session->userdata("idOrg")." a modifié son événement ".$_POST["hidbutt"],
            'stat' => 0)
        );
        redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_orgEvent');
    }

    function supp_pack(){
		$id=$_POST["id"];
		$this->db->where("idPack", $id);  
        $this->db->delete("pack");  
	}
    function loadpacks(){
		$output="";
        $this->db->where("idOrg",$this->session->userdata("idOrg"));
        $q=$this->db->get("evenement"); 
        foreach($q->result() as $row){
            $temp[]="'".$row->idEvent."'";
        } 
        $events = implode(",", $temp);
        $query = "
				SELECT * FROM pack where idEvent in (".$events.")
				";
				$data=$this->db->query($query);
				$d=$data->result();
                foreach ($d as $row1) {
                   $output.='
                    <div class="pack card-content breadcome-list" id='.$row1->idPack.'>
                    <div class="left-align"><div style="font-size: 1.17em">Pack <b>'.$row1->nomPack.'</b></div></div>
                    <ul>
                      <li><b>Description</b><br>   '.$row1->descriptionPack.'</li>
                      <li><b>Type</b><br>';
                      if($row1->typePack==1){
                          $output.='Subvention</li>';
                      }else{
                        $output.="Service</li>";
                    }
                    $output.="<li><b>Montant</b><br>   ".$row1->montant."</li>
                    <li><b>Audience</b><br>   ".$row1->audience."</li>";
                    $this->db->where("idEvent",$row1->idEvent);
                    $q1=$this->db->get("evenement"); 
                    foreach($q1->result() as $row2){
                        $output.="<li><b>Evénement</b><br>   ".$row2->nomEvent."</li>";
                    }
                    $output.="</ul>
                    <div style='text-align:center'> <button class='btn supp_p' id=".$row1->idPack." style='background-color:#5f1782;color:#fff'>Supprimer <b>Pack</b></button></div>
                    </div>";
                }
        $data = array(
            'packs'   => $output
          );
          echo json_encode($data);
	}

    
    function ajouter_p(){
        $id=$_POST["id"];
		$nomPack=$_POST["nomPack"];
		$descriptionPack=$_POST["descriptionPack"];
		$montant=$_POST["montant"];
		$audience=$_POST["audience"];
		$typePack=$_POST["typePack"];
		$data=array("nomPack"=>$nomPack,
					"descriptionPack"=>$descriptionPack,
					"idEvent"=>$temp,
					"typePack"=>$typePack,
					"montant"=>$montant,
                    "audience"=>$audience,
                    "idEvent"=>$id
				);
        $this->db->insert("pack",$data);
        echo json_encode($data);
	}
    public function interesse(){
        $this->db->where("idSpons",$this->session->userdata('idSpons'));
        $this->db->where("idEvent",$_POST["id"]);
        $query=$this->db->get("interesse");
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
                $this->db->where("idInt",$row->idInt);
                $this->db->delete("interesse");
            }
        }
        else{
            
            $this->db->insert("interesse",array('idEvent' => $_POST["id"],'idSpons'=>$this->session->userdata('idSpons') ));
            $this->db->where("idEvent",$_POST["id"]);
            $query=$this->db->get("evenement");
            foreach ($query->result() as $row) {
                $this->db->where("idSpons",$this->session->userdata('idSpons'));
                $query1=$this->db->get("sponsor");
                foreach ($query1->result() as $row1) {
                    $nomspons=$row1->nomSpons." ".$row1->prenomSpons;
                    $nomevent=$row->nomEvent;
                    $idorg=$row->idOrg;
                }
            }
            $data=array(
                "titreNotif_org"=>"Le sponsor ".$nomspons." est intéressé à votre événement ".$nomevent,
                'stat' => 0,
                'idOrg'=>$idorg);
            $this->db->insert('notiforg',$data);
            echo json_encode($data);
        }
    }
}