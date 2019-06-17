<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function getdata()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nomorg','nom','required');
		$this->form_validation->set_rules('prenomorg','prénom','required');
		$this->form_validation->set_rules('adrorg','adresse','required');
		$this->form_validation->set_rules('telorg','téléphone','required');
		$this->form_validation->set_rules('emailorg','email','required');
		$this->form_validation->set_rules('passwordorg','password','required');
		if ($this->form_validation->run()) {
			$this->load->model('main_model');
			if(isset($_FILES["image_file"]["name"]))  
			{
				$config['upload_path'] = './upload/';  
				$config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
				$config['max_size']= 0;
				$config['filename']= url_title($this->input->post('image_file'));
				echo $this->input->post('image_file');
				ini_set('upload_max_filesize','20M');
				$this->load->library('upload', $config);  
				if(!$this->upload->do_upload('image_file'))  
				{  //$this->load->view("display",$config);
						echo $this->upload->display_errors();  
				}  
				else 
				{ 
					$data = $this->upload->data(); 
					$imagedata = file_get_contents(base_url()."/upload/".$this->upload->file_name);
				// alternatively specify an URL, if PHP settings allow
				$imagebase64 = base64_encode($imagedata);
					$this->db->insert('organisateur',array(
						"nomOrg"=>$this->input->post('nomorg'),
						"prenomOrg"=>$this->input->post('prenomorg'),
						"organismeOrg"=>$this->input->post('organismeorg'),
						"adrOrg"=>$this->input->post('adrorg'),
						"telOrg"=>$this->input->post('telorg'),
						"emailOrg"=>$this->input->post('emailorg'),
						"mdpOrg"=>$this->input->post('passwordorg'),
						'img' => $imagebase64,
						'isactive' => '0',
						"centreOrg"=>$this->input->post('centre'))
						);
					$this->db->insert('notifadmin',array(
						"titreNotif_admin"=>$this->input->post('nomorg')." is a new organiser",
						'stat' => 0)
					);
				}
			}
		$this->display();	
		$session_data=array(
			"idOrg"=>"",
			"nomOrg"=>"",
			"prenomOrg"=>"",
			"organismeOrg"=>"",
			"adrOrg"=>"",
			"telOrg"=>"",
			"emailOrg"=>"",
			"centre"=>""
		);
		$this->session->set_userdata($session_data);
	}
		else {
			$session_data=array(
				"nomOrg"=>$this->input->post('nomorg'),
				"prenomOrg"=>$this->input->post('prenomorg'),
				"organismeOrg"=>$this->input->post('organismeorg'),
				"adrOrg"=>$this->input->post('adrorg'),
				"telOrg"=>$this->input->post('telorg'),
				"emailOrg"=>$this->input->post('emailorg'),
				"centre"=>$this->input->post('centre')
			);
			$this->session->set_userdata($session_data);
			
			$this->load->view("login_org");
		}
		
    }
	public function display()
	 {
		 
		 $this->load->view('display');
	 }
	 function ajouterEvent(){
		if(!empty($_FILES["image_file"]["name"]))  
		{
			$config['upload_path'] = './upload/';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
			$config['max_size']= 0;
			$config['filename']= url_title($this->input->post('image_file'));
			ini_set('upload_max_filesize','20M');
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('image_file'))  
			{ $this->display();
					echo $this->upload->display_errors();  
			}  
			else 
			{  
				$data = $this->upload->data();  
				$filedata = file_get_contents(base_url()."/upload/".$this->upload->file_name);
				$filebase64 = base64_encode($filedata);
			}
		}
		$this->db->where("idCateg",$_POST["categEvent"]);
		$q=$this->db->get("categorie");
		$this->db->where("idSous_categ",$_POST["souscategEvent"]);
		$q1=$this->db->get("sous_categorie");
		foreach ($q->result() as $row) {
			$cat=$row->libCateg;
		}
		foreach ($q1->result() as $row) {
			$souscat=$row->libSous_categ;
		}
		$data=array(
			"nomEvent"=>$_POST['nomEvent'],
			"dateDeb"=>$_POST['dateDeb'],
			"dateFin"=>$_POST['dateFin'],
			'heureEvent'=>$_POST['heureEvent'],
			"descriptionEvent"=>$_POST["descriptionEvent"],
			"URL_Image"=>$filebase64,
			"lieuEvent"=>$_POST["lieuEvent"],
			"budget"=>$_POST['budgetEvent'],
			"categ"=>$cat,
			"sous_categ"=>$souscat,
			"idOrg"=>$this->session->userdata('idOrg'),
			"isfree"=>$_POST["isfree"],
			"isvalid"=>0
		);
		$this->db->insert("evenement",$data);
		$this->db->insert('notifadmin',array(
			"titreNotif_admin"=>"L'organisateur' ".$this->session->userdata("idOrg")." a créé un nouvel événement",
			'stat' => 0)
		);
		redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_orgCreerPack');
	}
	function supprimer_demande(){
		$id=$_POST["id"];
		$this->db->where("idDemande", $id);  
        $this->db->delete("demande");
	}
	function load_demande(){
        $output="";
        $idEvents=array();
		$this->db->where("idOrg",$this->session->userdata("idOrg"));
		$result1=$this->db->get('evenement');
		foreach($result1->result() as $row){
			$idEvents[]="'".$row->idEvent."'";
		}
		$events=implode(",",$idEvents);
		$query1="SELECT * FROM demande where idEvent in (".$events.")";
		$data=$this->db->query($query1);
        foreach($data->result() as $row){
            $this->db->where("idEvent",$row->idEvent);
            $q1=$this->db->get("evenement"); 
            foreach($q1->result() as $row1){
				$this->db->where("idSpons",$row->idSpons);
					$d=$this->db->get("sponsor");
        			foreach($d->result() as $row2){
                $output.="
                    <tr id='".$row->idDemande."'>
                    <td>
                        <a href=".base_url()."index.php/welcome/event/".$row->idEvent.">
                            <img src='data:image/png;base64,".$row1->URL_Image."' style='height:20px;width:20px'>
                        </a>
					</td>";
					
					$output.="<td><a href=".base_url()."index.php/welcome/event/".$row->idEvent.">Vous avez invité 
					".$row2->nomSpons." ".$row2->prenomSpons." à votre événement ".$row1->nomEvent."</a></td>
					<td><button class='supprimer btn' id='".$row->idDemande."'>Supprimer</button></td>
                    ";
                    if($row->etat==0){
                        $output.="<td>Demande non validée</td>";
                            
                    }else {
                        $output.="<td>Demande validée</td>";
                    }
					$output.="</tr>";
				}
            }
		}
		$idEvents=array();
		$this->db->where("idOrg",$this->session->userdata("idOrg"));
		$result1=$this->db->get('evenement');
		foreach($result1->result() as $row){
			$idEvents[]="'".$row->idEvent."'";
		}
		$events=implode(",",$idEvents);
        $this->db->where_in("idEvent",$events);
        $this->db->where("etat",0);
		$q2=$this->db->get("demande"); 
        $data = array(
            'demande'   => $output,
            'countdem'=>$q2->num_rows()
          );
          echo json_encode($data);
	}
	
	function loadEventsOrg(){
		$output="";
        $this->db->where("idOrg",$this->session->userdata("idOrg"));
        $q=$this->db->get("evenement"); 
        foreach($q->result() as $row){
			$output.='<div class="card breadcome-list" style="width: 18rem;text-align:center">
                <a href="'.base_url().'index.php/welcome/event/'.$row->idEvent.'"> <img class="card-img-top" src="data:image/png;base64,'. $row->URL_Image .'" alt="Card image cap">
                <div class="card-body">
					<h5 class="card-title">'.$row->nomEvent.'</h5><br>
					</div>
				</a>
				<div class="row">
					<button class="btn supp" id="'.$row->idEvent.'" style="background-color:#5f1782;color:#fff">x</button>
					<a href="'.base_url().'index.php/welcome/dash_orgModifEvent/'.$row->idEvent.'">
					<button class="btn modif" id="'.$row->idEvent.'" 
					style="background-color:#5f1782;color:#fff">Modifier</button></a>
					<button data-toggle="modal" data-target="#myModal" class="btn ajout" id="'.$row->idEvent.'" 
					style="background-color:#5f1782;color:#fff">Ajouter pack</button>
					</div>
					</div>
                ';
        } 
        $data = array(
            'events'   => $output
          );
          echo json_encode($data);
	}
	function loadSponsor(){
		$output="";
		$idSpons=array();
		$this->db->where("idEvent",$_POST["id"]);
		$data=$this->db->get("demande");
		foreach($data->result() as $row){
			$idSpons[]="'".$row->idSpons."'";
		}
		$sponsors=implode(",",$idSpons);
		if(!empty($sponsors)){
			$query = "SELECT * FROM sponsor where idSpons not in (".$sponsors.")";
		}else{
			$query = "SELECT * FROM sponsor ";
		}
		$data=$this->db->query($query);
		foreach($data->result() as $row){
			$output.="<div class='row'>
			<div class='left-align'>
					<span style='font-size:20px;margin-left:10px'>".$row->nomSpons." ".$row->prenomSpons."</span></div>
					<div class='right-align'><input type='button' id='".$row->idSpons."' value='Inviter' class='inviter btn'
					style='background-color:#5f1782;color:#fff;margin-right:10px'
					 class='inviter btn '/>
					</div>
					</div>
			";
		}
		echo $output;
	}

	function invitersponsor(){
		$idEvent=$_POST["id"];
		$idSpons=$_POST["idSpons"];
		$this->db->where("idOrg",$this->session->userdata("idOrg"));
		$q=$this->db->get("organisateur");
		foreach ($q->result() as $row) {
			$nomOrg=$row->nomOrg." ".$row->prenomOrg;
		}
		$this->db->where("idEvent",$idEvent);
		$q1=$this->db->get("evenement");
		foreach ($q->result() as $row) {
			$nomEvent=$row->nomEvent;
		}
		$data=array("idEvent"=>$idEvent,
					"idSpons"=>$idSpons,
					"etat"=>0,
					"contenuDemande"=>"L'organisateur ".$nomOrg." vous invite à consulter son événement ".$nomEvent
				);
		$this->db->insert("demande",$data);
		echo json_encode($data);
	}
	function creerPack(){
		$nomPack=$_POST["nomPack"];
		$descriptionPack=$_POST["descriptionPack"];
		$montant=$_POST["montant"];
		$audience=$_POST["audience"];
		$typePack=$_POST["typePack"];
		$this->db->select_max("idEvent");
		$this->db->where("idOrg",$this->session->userdata("idOrg"));
		$q=$this->db->get("evenement");
		foreach ($q->result() as $row) {
			$temp=$row->idEvent;
		}
		$data=array("nomPack"=>$nomPack,
					"descriptionPack"=>$descriptionPack,
					"idEvent"=>$temp,
					"typePack"=>$typePack,
					"montant"=>$montant,
					"audience"=>$audience
				);
		$this->db->insert("pack",$data);
	}
	function suppevent(){
		$id=$_POST["id"];
		$this->db->where("idEvent", $id);  
        $this->db->delete("evenement");  
	}
	 function updateinfo(){
        $this->load->model('main_model');
        $this->db->where("idOrg",$this->session->userdata("idOrg"));
        $q=$this->db->get("organisateur");
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
                }
            }
            else{
                $imagebase64=$row->img;
            }
            if(!empty($_FILES["file"]["name"]))  
            {
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
                $config['max_size']= 0;
                $config['filename']= url_title($this->input->post('file'));
                ini_set('upload_max_filesize','20M');
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('file'))  
                {  
                        echo $this->upload->display_errors();  
                }  
                else 
                {  
                    $data = $this->upload->data();  
                    $filedata = file_get_contents(base_url()."/upload/".$this->upload->file_name);
                    $filebase64 = base64_encode($filedata);
                }
            }
            else{
                $filebase64=$row->pieceOrg;
            }
            if(empty($_POST['nomOrg'])){
                
                    $nom=$row->nomOrg;
            }
            else {
                if(!empty($_POST['nomOrg'])){
                    $nom=$_POST['nomOrg'];
                }
            }
            if(empty($_POST['prenomOrg'])){
                
                $prenom=$row->prenomOrg;
            }
            else {
                if(!empty($_POST['prenomOrg'])){
                    $prenom=$_POST['prenomOrg'];
                }
            }
            if(empty($_POST['adrOrg'])){
                
                $adr=$row->adrOrg;
            }
            else {
                if(!empty($_POST['adrOrg'])){
                    $adr=$_POST['adrOrg'];
                }
            }
            if(empty($_POST['telOrg'])){
                
                $tel=$row->telOrg;
            }
            else {
                if(!empty($_POST['telOrg'])){
                    $tel=$_POST['telOrg'];
                }
            }
            if(empty($_POST['emailOrg'])){
                
                $email=$row->emailOrg;
            }
            else {
                if(!empty($_POST['emailOrg'])){
                    $email=$_POST['emailOrg'];
                }
            }
            if(empty($_POST['organismeOrg'])){
                
                $org=$row->organismeOrg;
            }
            else {
                if(!empty($_POST['organismeOrg'])){
                    $org=$_POST['organismeOrg'];
                }
            }
            if(empty($_POST['centreOrg'])){
                
                $centre=$row->centreOrg;
            }
            else {
                if(!empty($_POST['centreOrg'])){
                    $centre=$_POST['centreOrg'];
                }
            }
        }
        $this->db->set('nomOrg',$nom);
        $this->db->set('prenomOrg',$prenom);
        $this->db->set('organismeOrg',$org);
        $this->db->set('adrOrg',$adr);
        $this->db->set('telOrg', $tel);
        $this->db->set('organismeOrg', $org);
        $this->db->set('emailOrg',$email);
        $this->db->set('centreOrg',$centre);
        $this->db->set('img',$imagebase64);
        $this->db->set('pieceOrg',$filebase64);
        $this->db->where('idOrg', $this->session->userdata("idOrg"));
        $this->db->update('organisateur');
        $this->db->insert('notifadmin',array(
            "titreNotif_admin"=>"L'organisateur' ".$this->session->userdata("idOrg")." a modifié ses informations",
            'stat' => 0)
        ); 
        //$this->display();	
        redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_org');
	}
	
	function notif_org()
      {
        if(isset($_POST["view"]))
        {
          if($_POST["view"] != '')
          {
            $data = array( 
              'stat'=>'1'
            );
            $this->db->where('stat', 0);
				    $this->db->update('notiforg', $data);
          }
        }
        $output='';
        $this->db->order_by('idNotif_org', 'DESC');
        $this->db->where('idOrg',$this->session->userdata("idOrg"));
        $q=$this->db->get("notiforg",10);
        if($q->num_rows()>0)
       {
        foreach ($q->result() as $row) {
          $output .= '
          <li style="font-family:caviar dreams;color:#000">
           <a href="#">
            <strong style="color:#000">'.$row->titreNotif_org.'</strong>
          </li>
          <hr>
          ';
         }
        }
        else
        {
         $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
        }
        $this->db->where('stat',0);
        $q=$this->db->get("notiforg");
        $count = $q->num_rows();
        $data = array(
          'notification'   => $output,
          'unseen_notification' => $count
        );
        echo json_encode($data);
	  }
}