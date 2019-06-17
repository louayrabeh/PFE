<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
    }

    public function getdata()
	{
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('cin','cin','required');
		$this->form_validation->set_rules('nomspons','nom','required');
		$this->form_validation->set_rules('prenomspons','prénom','required');
		//$this->form_validation->set_rules('org','organisme','required');
		$this->form_validation->set_rules('adrspons','adresse','required');
		$this->form_validation->set_rules('telspons','téléphone','required');
		$this->form_validation->set_rules('emailspons','email','required');
		$this->form_validation->set_rules('passwordspons','password','required');
		if ($this->form_validation->run()) {
			$this->load->model('main_model');
			if(isset($_FILES["image_file"]["name"]))  
			{
				$config['upload_path'] = './upload/';  
				$config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
				$config['max_size']= 0;
				$config['filename']= url_title($this->input->post('image_file'));
				
				ini_set('upload_max_filesize','20M');
				$this->load->library('upload', $config);  
				if(!$this->upload->do_upload('image_file'))  
				{//  $this->load->view("display",$config);
						echo $this->upload->display_errors();  
				}  
				else 
				{ 
					$data = $this->upload->data(); 
					$imagedata = file_get_contents(base_url()."/upload/".$this->upload->file_name);
				// alternatively specify an URL, if PHP settings allow
				$imagebase64 = base64_encode($imagedata);
			//	echo $base64; 
					$this->db->insert('sponsor',array(
						"nomSpons"=>$this->input->post('nomspons'),
						"prenomSpons"=>$this->input->post('prenomspons'),
						"organismeSpons"=>$this->input->post('organismespons'),
						"adrSpons"=>$this->input->post('adrspons'),
						"telSpons"=>$this->input->post('telspons'),
						"emailSpons"=>$this->input->post('emailspons'),
						"mdpSpons"=>$this->input->post('passwordspons'),
						'img' => $imagebase64,
						'isactive' => '0',
						"centre"=>$this->input->post('centre'))
					);
					$this->db->insert('notifadmin',array(
						"titreNotif_admin"=>$this->input->post('nomspons')." is a new sponsor",
						'stat' => 0)
					);
				}
			}
		$this->display();	
		$session_data=array(
			"idSpons"=>"",
			"nomSpons"=>"",
			"prenomSpons"=>"",
			"organismeSpons"=>"",
			"adrSpons"=>"",
			"telSpons"=>"",
			"emailSpons"=>"",
			"centre"=>""
		);
		$this->session->set_userdata($session_data);
	}
		else {
			$session_data=array(
				"nomSpons"=>$this->input->post('nomspons'),
				"prenomSpons"=>$this->input->post('prenomspons'),
				"organismeSpons"=>$this->input->post('organismespons'),
				"adrSpons"=>$this->input->post('adrspons'),
				"telSpons"=>$this->input->post('telspons'),
				"emailSpons"=>$this->input->post('emailspons'),
				"centre"=>$this->input->post('centre')
			);
			$this->session->set_userdata($session_data);
			
			$this->load->view("login_spons");
		}
		
    }
    public function display()
	 {
		 
		 $this->load->view('display');
	 }
    function updateinfo(){
        $this->load->model('main_model');
        $this->db->where("idSpons",$this->session->userdata("idSpons"));
        $q=$this->db->get("sponsor");
        foreach($q->result() as $row){
            if(!empty($_FILES["image_file"]["name"]))  
            {
              //  redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/LOGINENTER');
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
               // redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/sponsor');
                $imagebase64=$row->img;
            }
            if(!empty($_FILES["file"]["name"]))  
            {
              //  redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/LOGINENTER');
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif|ico';  
                $config['max_size']= 0;
                $config['filename']= url_title($this->input->post('file'));
                ini_set('upload_max_filesize','20M');
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('file'))  
                {  $this->load->view("display");
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
               // redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/sponsor');
                $filebase64=$row->pieceSpons;
            }
            if(empty($_POST['nomSpons'])){
                
                    $nom=$row->nomSpons;
            }
            else {
                if(!empty($_POST['nomSpons'])){
                    $nom=$_POST['nomSpons'];
                }
            }
            if(empty($_POST['prenomSpons'])){
                
                $prenom=$row->prenomSpons;
            }
            else {
                if(!empty($_POST['prenomSpons'])){
                    $prenom=$_POST['prenomSpons'];
                }
            }
            if(empty($_POST['adrSpons'])){
                
                $adr=$row->adrSpons;
            }
            else {
                if(!empty($_POST['adrSpons'])){
                    $adr=$_POST['adrSpons'];
                }
            }
            if(empty($_POST['telSpons'])){
                
                $tel=$row->telSpons;
            }
            else {
                if(!empty($_POST['telSpons'])){
                    $tel=$_POST['telSpons'];
                }
            }
            if(empty($_POST['emailSpons'])){
                
                $email=$row->emailSpons;
            }
            else {
                if(!empty($_POST['emailSpons'])){
                    $email=$_POST['emailSpons'];
                }
            }
            if(empty($_POST['organismeSpons'])){
                
                $org=$row->organismeSpons;
            }
            else {
                if(!empty($_POST['organismeSpons'])){
                    $org=$_POST['organismeSpons'];
                }
            }
            if(empty($_POST['centre'])){
                
                $centre=$row->centre;
            }
            else {
                if(!empty($_POST['centre'])){
                    $centre=$_POST['centre'];
                }
            }
        }
        $this->db->set('nomSpons',$nom);
        $this->db->set('prenomSpons',$prenom);
        $this->db->set('organismeSpons',$org);
        $this->db->set('adrSpons',$adr);
        $this->db->set('telSpons', $tel);
        $this->db->set('organismeSpons', $org);
        $this->db->set('emailSpons',$email);
        $this->db->set('centre',$centre);
        $this->db->set('img',$imagebase64);
        $this->db->set('pieceSpons',$filebase64);
        $this->db->where('idSpons', $this->session->userdata("idSpons"));
        $this->db->update('sponsor');
        $this->db->insert('notifadmin',array(
            "titreNotif_admin"=>"Le sponsor ".$this->session->userdata("idSpons")." a modifié ses informations",
            'stat' => 0)
        ); 
        //$this->display();	
        redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_spons');
    }
    function load_demande(){
        $output="";
        $this->db->where("idSpons",$this->session->userdata("idSpons"));
        $q=$this->db->get("demande"); 
        foreach($q->result() as $row){
            $this->db->where("idEvent",$row->idEvent);
            $q1=$this->db->get("evenement"); 
            foreach($q1->result() as $row1){
                $output.="
                    <tr>
                    <td>
                        <a href=".base_url()."index.php/welcome/event/".$row->idEvent.">
                            <img src='data:image/png;base64,".$row1->URL_Image."' style='height:20px;width:20px'>
                        </a>
                    </td>
                    <td><a href=".base_url()."index.php/welcome/event/".$row->idEvent.">".$row->contenuDemande."</a></td>
                    ";
                    if($row->etat==0){
                        $output.="<td><button class='accepter btn' id='".$row->idDemande."'>Valider</button></td>";
                            
                    }else {
                        $output.="<td>Demande validée</td>";
                    }
                    $output.="</tr>";
            }
        }
        $this->db->where("idSpons",$this->session->userdata("idSpons"));
        $this->db->where("etat",0);
            $q2=$this->db->get("demande"); 
        $data = array(
            'demande'   => $output,
            'countdem'=>$q2->num_rows()
          );
          echo json_encode($data);
    }
    function accepter_demande(){
        $id=$_POST["id"];
        $this->db->set('etat', 1);
        $this->db->where('idDemande', $id);
        $this->db->update('demande');
        $this->db->where("idDemande",$id);
        $q=$this->db->get("demande");
        foreach ($q->result() as $row) {
            $this->db->where("idEvent",$row->idEvent);
            $q1=$this->db->get("evenement");
            foreach ($q1->result() as $row1) {
                $this->db->where("idSpons",$row->idSpons);
                $q2=$this->db->get("sponsor");
                foreach ($q2->result() as $row2) {
                    $data=array("titreNotif_org"=>"Le sponsor ".$row2->nomSpons." ".$row2->prenomSpons." a accepté votre demande",
                    "stat"=>0,
                    "idOrg"=>$row1->idOrg);
                    $this->db->insert("notiforg",$data);
                }
            }
        }
        echo json_encode(array("pp"=>$id));
    }
    function load_interestedEvent(){
        $output="";
        $this->db->where("idSpons",$this->session->userdata("idSpons"));
        $q=$this->db->get("interesse"); 
        foreach($q->result() as $row){
            $this->db->where("idEvent",$row->idEvent);
            $q1=$this->db->get("evenement"); 
            foreach($q1->result() as $row1){ 
            $output.='<div class="card breadcome-list" style="width: 18rem;text-align:center">
                <a href="'.base_url().'index.php/welcome/event/'.$row->idEvent.'"> <img class="card-img-top" src="data:image/png;base64,'. $row1->URL_Image .'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$row1->nomEvent.'</h5>
                    <p class="card-text" style="width:14rem;display:inline-block;overflow:hidden;white-space: 
                    nowrap;text-overflow:ellipsis">
                    '.$row1->descriptionEvent.'
                </p>
                </a>
                ';
                $this->db->where("idEvent", $row->idEvent);
                $this->db->where("idSpons", $this->session->userdata("idSpons"));
                $query=$this->db->get("interesse");
                
                if($query->num_rows()>0)
                {
                    $output.='<input type="button" id="'.$row1->idEvent.'" class="interesse btn" style="background-color:#5f1782;color:#fff" value="interessé(e)"/>
                    
                        </div>
                    </div>';
                }
                else{
                    $output.='<input type="button" id="'.$row1->idEvent.'" class="interesse btn" style="background-color:#888;color:#fff" value="interessé(e)"/>
                    
                        </div>
                    </div>';
                }
            }
        } 
        $data = array(
            'events'   => $output
          );
          echo json_encode($data);
    }

    function load_boughtEvent(){
        $output="";
        $this->db->where("idSpons",$this->session->userdata("idSpons"));
        $q=$this->db->get("achatpack"); 
        foreach($q->result() as $row){
            $temp[]="'".$row->idPack."'";
        }
        $packs=implode(",",$temp);
        $query = "
            SELECT * FROM pack where idPack in (".$packs.")
        ";
        $data=$this->db->query($query);
        foreach($data->result() as $row){
            $temp1[]="'".$row->idEvent."'";
        }
        $events=implode(",",$temp1);
        $query1 = "
            SELECT * FROM evenement where idEvent in (".$events.")
        ";
        $data1=$this->db->query($query1);
        foreach($data1->result() as $row){
            $output.='<div class="card breadcome-list" style="width: 18rem;text-align:center">
                            <a href="'.base_url().'index.php/welcome/event/'.$row->idEvent.'"> 
                                <img class="card-img-top" src="data:image/png;base64,'. $row->URL_Image .'" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row->nomEvent.'</h5>
                                    <p class="card-text" style="width:14rem;display:inline-block;overflow:hidden;white-space: 
                                    nowrap;text-overflow:ellipsis">
                                    '.$row->descriptionEvent.'</p>
                                </div>
                            </a>
                        </div>
                ';
        }
        $data = array(
            'events'   => $output
          );
          echo json_encode($data);
    }
    function load_statpack(){
        $id=$this->session->userdata("idSpons");
        $this->db->where("idSpons",$id);
        $q=$this->db->get("achatpack");
        $this->db->where("idSpons",$id);
        $q1=$this->db->get("demande");
        $this->db->where("idSpons",$id);
        $this->db->where("etat",1);
        $q2=$this->db->get("demande");
        echo json_encode(array("pack"=>$q->num_rows(),"demande"=>$q1->num_rows(),"accept"=>$q2->num_rows()));
    }
    function notif_spons()
      {
        if(isset($_POST["view"]))
        {
          if($_POST["view"] != '')
          {
            $data = array( 
              'stat'=>'1'
            );
            $this->db->where('stat', 0);
				    $this->db->update('notifspons', $data);
          }
        }
        $output='';
        $this->db->order_by('idNotif_spons', 'DESC');
        $this->db->where('idSpons',$this->session->userdata("idSpons"));
        $q=$this->db->get("notifspons",10);
        if($q->num_rows()>0)
       {
        foreach ($q->result() as $row) {
          $output .= '
          <li style="font-family:caviar dreams;color:#000">
           <a href="#">
            <strong style="color:#000">'.$row->titreNotif_spons.'</strong>
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
        $q=$this->db->get("notifspons");
        $count = $q->num_rows();
        $data = array(
          'notification'   => $output,
          'unseen_notification' => $count
        );
        echo json_encode($data);
	  }
}