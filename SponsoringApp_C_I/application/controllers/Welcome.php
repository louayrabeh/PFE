<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	function dash_sponsEvent()
      {
          $this->load->view("dash_sponsEvent");
      }
	public function index()
	{
		$this->load->view("SponsoRise");
	} 
	public function sponsor()
	{
		$this->load->model('main_model');
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
		$data['cat'] = $this->main_model->fetch_cat();
		$this->session->set_userdata($session_data);
		$this->load->view('login_spons',$data);
	}
	public function dash_spons()
	{
		$this->load->model('main_model');
		$data['cat'] = $this->main_model->fetch_cat();
		$this->load->view("dash_spons",$data);
	} 
	public function dash_sponsDemande()
	{
		$this->load->view("dash_sponsDemande");
	} 
	public function dash_sponsStat()
	{
		$this->load->view("dash_sponsStat");
	}
	public function dash_org()
	{
		$this->load->model('main_model');
		$data['cat'] = $this->main_model->fetch_cat();
		$this->load->view("dash_org",$data);
	}
	public function dash_orgModifEvent()
	{
		$data["id"] = $this->uri->segment(3);
		$this->load->model('main_model');
		$data['cat'] = $this->main_model->fetch_cat();
		$this->load->view("dash_orgModifEvent",$data);
	}
	public function dash_orgAjout()
	{
		$this->load->model('main_model');
		$data['cat'] = $this->main_model->fetch_cat();
		$this->load->view("dash_orgAjout",$data);
	}
	public function dash_orgCreerPack()
	{
		$this->load->model('main_model');
		$data['cat'] = $this->main_model->fetch_cat();
		$this->load->view("dash_orgCreerPack");
	}
	public function dash_orgStat()
	{
		$this->load->view("dash_orgStat");
	}
	public function org()
	{
		$session_data=array(
			"idOrg"=>""
		);
		$this->load->model("main_model");
		$data['cat'] = $this->main_model->fetch_cat();
		$this->session->set_userdata($session_data);
		$this->load->view('login_org',$data);
	}
	public function recherche()
	 {
		 $this->load->view('recherche');
	 }
	 public function event()
	 {
		$data["id"] = $this->uri->segment(3);
		$this->load->view('preview_event',$data);
	 }
	

	public function delete_data(){ 
		$id=$this->input->post('id'); 
		$this->db->where('idSpons',$id);
		$q=$this->db->get("sponsor");
		foreach ($q->result() as $row) {
			$sub="ACCOUNT REMOVAL";
			   $msg.="Madame, Monsieur,
			   Votre compte SponsoRise ".$row->nomSpons." a été supprimé par l'administrateur";
               $config=array(
                 'protocol'=>'smtp',
                 'smtp_host'=>'ssl://smtp.googlemail.com',
                 'smtp_port'=>465,
                 'smtp_user'=>'peakyblinders2im8@gmail.com',
                 'smtp_pass'=>'isamm2017',
                 'mailtype'=>'text',
                 'charset'=>'iso-8859-1',
                 'wordwrap'  => TRUE
               );
               $this->load->library('email', $config);
              $this->email->set_newline("\r\n");
              $this->email->from('peakyblinders2im8@gmail.com');
              $this->email->to($row->emailSpons);
              $this->email->subject($sub);
              $this->email->message($msg);
              $this->email->send();
		}
		$this->load->model("main_model");  
		$this->main_model->delete_data($id);
   }
   public function delete_dataOrg(){ 
	$id=$this->input->post('id'); 
	$this->db->where('idOrg',$id);
	$q=$this->db->get("organisateur");
	foreach ($q->result() as $row) {
		$sub="ACCOUNT REMOVAL";
		   $msg.="Madame, Monsieur,
		   Votre compte SponsoRise ".$row->nomOrg." ".$row->prenomOrg." a été supprimé par l'administrateur";
		   $config=array(
			 'protocol'=>'smtp',
			 'smtp_host'=>'ssl://smtp.googlemail.com',
			 'smtp_port'=>465,
			 'smtp_user'=>'peakyblinders2im8@gmail.com',
			 'smtp_pass'=>'isamm2017',
			 'mailtype'=>'text',
			 'charset'=>'iso-8859-1',
			 'wordwrap'  => TRUE
		   );
		   $this->load->library('email', $config);
		  $this->email->set_newline("\r\n");
		  $this->email->from('peakyblinders2im8@gmail.com');
		  $this->email->to($row->emailOrg);
		  $this->email->subject($sub);
		  $this->email->message($msg);
		  $this->email->send();
	}
	$this->load->model("main_model");  
	$this->main_model->delete_dataOrg($id);
}  
   public function deleteEvent(){    
	$id=$this->input->post('id'); 
	$this->db->where('idEvent',$id);
	$q=$this->db->get("evenement");
	foreach ($q->result() as $row) {
		$this->db->where('idOrg',$row->idOrg);
		$q1=$this->db->get("organisateur");
		foreach ($q1->result() as $row1) {
			$sub="Evénement supprimé";
			$msg.="Madame, Monsieur,
			Votre événement ".$row->nomEvent." a été supprimé par l'administrateur";
			$config=array(
				'protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.googlemail.com',
				'smtp_port'=>465,
				'smtp_user'=>'peakyblinders2im8@gmail.com',
				'smtp_pass'=>'isamm2017',
				'mailtype'=>'text',
				'charset'=>'iso-8859-1',
				'wordwrap'  => TRUE
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('peakyblinders2im8@gmail.com');
			$this->email->to($row1->emailOrg);
			$this->email->subject($sub);
			$this->email->message($msg);
			$this->email->send();
		}
	}
	$this->load->model("main_model");  
	$this->main_model->deleteEvent($id);
	
}  
public function valider_data(){  
	$id=$this->input->post('id'); 
	$this->db->where("idSpons",$id);
	$q=$this->db->get("sponsor");
	$this->load->model("main_model");
	foreach($q->result() as $row)  
	{  
		$sub="VALIDATION DU COMPTE";
		$msg.="Madame, Monsieur
		Votre compte SponsoRise : \" ".$row->nomSpons." ".$row->prenomSpons." \" a été validé. 
		Félicitations.";
		$config=array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=>465,
			'smtp_user'=>'peakyblinders2im8@gmail.com',
			'smtp_pass'=>'isamm2017',
			'mailtype'=>'text',
			'charset'=>'iso-8859-1',
			'wordwrap'  => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('peakyblinders2im8@gmail.com');
		$this->email->to($row->emailSpons);
		$this->email->subject($sub);
		$this->email->message($msg);
		$this->email->send();
	}
	$data=array("isvalid"=>1);
	$this->db->where('idSpons', $id);
	$this->db->update('sponsor', $data);
	redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/loginenter');
}

public function valider_dataOrg(){  
	$id=$this->input->post('id'); 
	$this->db->where("idOrg",$id);
	$q=$this->db->get("organisateur");
	$this->load->model("main_model");
	foreach($q->result() as $row)  
	{  
		$sub="VALIDATION DU COMPTE";
		$msg.="Madame, Monsieur
		Votre compte SponsoRise : \" ".$row->nomOrg." ".$row->prenomOrg." \" a été validé. 
		Félicitations.";
		$config=array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=>465,
			'smtp_user'=>'peakyblinders2im8@gmail.com',
			'smtp_pass'=>'isamm2017',
			'mailtype'=>'text',
			'charset'=>'iso-8859-1',
			'wordwrap'  => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('peakyblinders2im8@gmail.com');
		$this->email->to($row->emailOrg);
		$this->email->subject($sub);
		$this->email->message($msg);
		$this->email->send();
	}
	$data=array("isvalid"=>1);
	$this->db->where('idOrg', $id);
	$this->db->update('organisateur', $data);
	redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/loginenter');
}
function fetch_sous()
 {
	 $this->load->model("main_model");
  if($this->input->post('cat'))
  {
   echo json_encode(array("sous"=>$this->main_model->fetch_sous($this->input->post('cat'))));
  }
 }
public function validerEvent(){  
	$id=$this->input->post('id'); 
	$this->db->where('idEvent',$id);
	$q=$this->db->get("evenement");
	foreach ($q->result() as $row) {
		if($this->input->post('action')=="Valider"){
			$this->db->where('idOrg',$row->idOrg);
			$q1=$this->db->get("organisateur");
			foreach ($q1->result() as $row1) {
				$sub="Evénement validé";
				$msg.="Madame, Monsieur,
				Votre événement ".$row->nomEvent." a été validé par l'administrateur";
				$config=array(
					'protocol'=>'smtp',
					'smtp_host'=>'ssl://smtp.googlemail.com',
					'smtp_port'=>465,
					'smtp_user'=>'peakyblinders2im8@gmail.com',
					'smtp_pass'=>'isamm2017',
					'mailtype'=>'text',
					'charset'=>'iso-8859-1',
					'wordwrap'  => TRUE
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('peakyblinders2im8@gmail.com');
				$this->email->to($row1->emailOrg);
				$this->email->subject($sub);
				$this->email->message($msg);
				$this->email->send();
			}
		}
		else{
			$this->db->where('idOrg',$row->idOrg);
			$q1=$this->db->get("organisateur");
			foreach ($q1->result() as $row1) {
				$sub="Evénement validé";
				$msg.="Madame, Monsieur,
				Votre événement ".$row->nomEvent." a été validé par l'administrateur";
				$config=array(
					'protocol'=>'smtp',
					'smtp_host'=>'ssl://smtp.googlemail.com',
					'smtp_port'=>465,
					'smtp_user'=>'peakyblinders2im8@gmail.com',
					'smtp_pass'=>'isamm2017',
					'mailtype'=>'text',
					'charset'=>'iso-8859-1',
					'wordwrap'  => TRUE
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('peakyblinders2im8@gmail.com');
				$this->email->to($row1->emailOrg);
				$this->email->subject($sub);
				$this->email->message($msg);
				$this->email->send();
			}
		}
		$this->load->model("main_model");
		$this->main_model->validerEvent($id,$this->input->post('action'));
	}
}


public function loginadmin()
{
	if ($this->session->userdata('login')=='') 
	{
		$this->load->view('loginadmin');	
	}
	else{
		redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/loginenter_dash');
	}
}
public function valideradmin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('loginadmin','Login','required');
		$this->form_validation->set_rules('pdadmin','Password','required');
		if ($this->form_validation->run()) {
			$login=$this->input->post('loginadmin');
			$pass=$this->input->post('pdadmin');
			$this->load->model("main_model");
			if($this->main_model->adminlogin($login,$pass))
			{
				$session_data=array(
					'login'=>$login
				);
				$this->session->set_userdata($session_data);
				redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/loginenter_dash');
			}
			else
			{
				$this->session->set_flashdata('error','combinaison invalide !!');
				$this->loginadmin();
			}
		}
		else {
			$this->loginadmin();
		}
	}
	
	public function loginorg()
	{
			$login=$this->input->post('emaillog');
			$pass=$this->input->post('passwordlog');
			$this->load->model("main_model");
			if($this->main_model->loginorg($login,$pass))
			{
				$session_data=array(
					'loginorg'=>$login
				);
				$this->session->set_userdata($session_data);
				redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_org/');
			}
			else
			{
				redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/org');
			}
	}

	public function loginspons()
	{
			$login=$this->input->post('emaillog');
			$pass=$this->input->post('passwordlog');
			$this->load->model("main_model");
			if($this->main_model->loginspons($login,$pass))
			{
				$session_data=array(
					'loginspons'=>$login
				);
				$this->session->set_userdata($session_data);
				redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/dash_spons');
			}
			else
			{
				redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/sponsor');
			}
		}
	function dash_orgEvent(){
		$this->load->view("dash_orgEvent");
	}
	function dash_orgDemande(){
		$this->load->view("dash_orgDemande");
	}
	function rech(){
		$output = '';
		if(isset($_POST["query"]))
		{
		 $this->db->like("nomSpons",$this->input->post('query'),"both");
		 $q=$this->db->get("sponsor");
		}
		else
		{
		  $q=$this->db->get("sponsor");
		}
		 foreach($q->result() as $row)
		 {
		  $output .= '
			<a href="http://localhost/Sponsoringapp_c_i/index.php/welcome/index?search_text='.$row->idSpons.'"><li>'.$row->nomSpons.'</li></a>
		  ';
		 }
		 if(!isset($_POST["query"]))
		{
		  $output = '
		  <li> </li>
		';
		}
		 echo $output;
		  }

	function rechEvents(){
	$output = '';
	if(isset($_POST["query"]))
	{
		$this->db->like("nomEvent",$this->input->post('query'),"both");
		$q=$this->db->get("evenement");
	}
	else
	{
		$q=$this->db->get("evenement");
	}
		foreach($q->result() as $row)
		{
		$output .= '
		<a href="http://localhost/Sponsoringapp_c_i/index.php/welcome/event/'.$row->idEvent.'">
		<li><img src="data:image/jpeg;base64,'.$row->URL_Image.'" style="height:40px;width:40px" class="img-thumbnail"/>'.$row->nomEvent.'</li>
		</a>
		<hr>';
		}
		if(!isset($_POST["query"]))
	{
		$output = '
		<li> </li>
	';
	}
	$out=array("rech"=>$output);
	echo json_encode($out);
}
function filterEvents(){
	$output = '';
	if(isset($_POST["query"]))
	{
		$this->db->like("nomEvent",$this->input->post('query'),"both");
		$q=$this->db->get("evenement");
	}
	else
	{
		$q=$this->db->get("evenement");
	}
		foreach($q->result() as $row)
		{
			$output .= '
			<span class="card event" style="text-align:center" id="'.$row->idEvent.'">
			<a href="'.base_url().'index.php/welcome/event/'.$row->idEvent.'" class="purple-text">
				<img src="data:image/jpeg;base64,'. $row->URL_Image.'" alt="" style="cursor:grab;height:80px;width:80px">
				<h5>'.$row->nomEvent.'</h5>
				<b>De</b> '.$row->dateDeb.'<br><b>jusqu\'à</b> '.$row->dateFin.'<br>
				<b style="text-transform: uppercase;">à</b> '.$row->lieuEvent.'<br>
				
		</a>';
		$this->db->where("idEvent", $row->idEvent);
			$this->db->where("idSpons", $this->session->userdata("idSpons"));
			$query=$this->db->get("interesse");
			
			if($query->num_rows()>0)
			{
				$output.="<input type='button' id='".$row->idEvent."' class='interesse btn' style='background-color:#9c27b0' value='interessé(e)'/></span>";
			}
			else{
				$output.="<input type='button' id='".$row->idEvent."' class='interesse btn' style='background-color:#888' value='interessé(e)?'/></span>";
			}
		}
		if(!isset($_POST["query"]))
	{
		$output = '
	';
	}
	$out=array("rech"=>$output);
		echo json_encode($out);
		}

	public function filter()
	{
		$this->load->model("main_model");
		sleep(1);
		$action = $this->input->post('action');
		$budget = $this->input->post('budget');
		$categ = $this->input->post('categ');
		$isfree = $this->input->post('isfree');
		$date = $this->input->post('date');
		$q = $this->input->post('query');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->main_model->filter($budget, $categ,$isfree,$date,$q);
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='active purple'><a href='#'>";
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 3;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config['per_page'];
		$output = array(
		'pagination_link'  => $this->pagination->create_links(),
		'filter_list'   => $this->main_model->fetch($config["per_page"], $start, $budget, $categ,$isfree,$date,$q)
		);
		echo json_encode($output);
	}

	function upload_modal()
	{
		echo '<style>.modal{height:10000px}<style/> ';  
		$this->db->where('idSpons',$this->input->post('id'));
		$q=$this->db->get("sponsor");
		foreach ($q->result() as $row) {
			echo '<div  style="margin:2%;text-align:center"><img src="data:image/jpeg;base64,'.$row->img.'" width="100%" height="100%" class="img-thumbnail"/></div>';
			echo '<span style="font-size:20px;margin-left:2%">SPONSOR N°: </span><span left:0%>'.$row->idSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">NOM: </span>'.$row->nomSpons.' '.$row->prenomSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">ORGANISME: </span>'.$row->organismeSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">ADRESSE: </span>'.$row->adrSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">TELEPHONE: </span>'.$row->telSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">EMAIL: </span>'.$row->emailSpons;
			echo '<br><span style="font-size:20px;margin-left:2%">CENTRE D\'INTERET: </span>'.$row->centre;
			if($row->isvalid==0){
				if($row->isactive==1){
					echo '<div style="text-align:center"><input type="submit" 
					name="valider" id="validermodalbutt" value="Valider" class="btn" 
					style="background-color:#9c27b0;color:#fff" data-dismiss="modal"/></div> <br>';
				}else{
					echo "<div style='text-align:center'><div style='font-size:30px;margin-left:2%;color:#9c27b0'><b>Afin de pouvoir valider ce compte, tu dois l'activer</b></div></div>";
				}
			}
		}			
	}

	function upload_modalOrg()
	{
		echo '<style>.modal{height:10000px}<style/> ';  
		$this->db->where('idOrg',$this->input->post('id'));
		$q=$this->db->get("organisateur");
		foreach ($q->result() as $row) {
			echo '<div  style="margin:2%;text-align:center"><img src="data:image/jpeg;base64,'.$row->img.'" width="100%" height="100%" class="img-thumbnail"/></div>';
			echo '<span style="font-size:20px;margin-left:2%">SPONSOR N°: </span><span left:0%>'.$row->idOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">NOM: </span>'.$row->nomOrg.' '.$row->prenomOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">ORGANISME: </span>'.$row->organismeOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">ADRESSE: </span>'.$row->adrOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">TELEPHONE: </span>'.$row->telOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">EMAIL: </span>'.$row->emailOrg;
			echo '<br><span style="font-size:20px;margin-left:2%">CENTRE D\'INTERET: </span>'.$row->centreOrg;
			if($row->isvalid==0){
				if($row->isactive==1){
					echo '<div style="text-align:center"><input type="submit" 
					name="valider" id="validermodalbutt" value="Valider" class="btn" 
					style="background-color:#9c27b0;color:#fff" data-dismiss="modal"/></div> <br>';
				}else{
					echo "<div style='text-align:center'><div style='font-size:30px;margin-left:2%;color:#9c27b0'><b>Afin de pouvoir valider ce compte, tu dois l'activer</b></div></div>";
				}
			}
		}			
	}

	function upload_modalEvent()
	{
		echo '<style>.modal{height:10000px}<style/> ';  
		$this->db->where('idEvent',$this->input->post('id'));
		$q=$this->db->get("evenement");
		foreach ($q->result() as $row) {
			echo '<div  style="margin:2%;text-align:center"><img src="data:image/jpeg;base64,'.$row->URL_Image.'" width="100%" height="100%" class="img-thumbnail"/></div>';
			echo '<span style="font-size:20px;margin-left:2%"><b>Evénement N°:</b> </span><span left:0%>'.$row->idEvent;
			
            $this->db->where("idOrg",$row->idOrg);
            $q1=$this->db->get("organisateur");
            foreach ($q1->result() as $row1) {
                echo "<div class='left-align' style='font-size:20px;margin-left:2%'><b>Organisé par</b> <a href='#".$row1->idOrg."'>".$row1->nomOrg." ".$row1->prenomOrg."</a></div>";
            }
			echo "<div style='font-size:20px;margin-left:2%'><b>Du </b>".$row->dateDeb." <b>à</b> ".$row->dateFin."</div>";
            echo "<div style='font-size:20px;margin-left:2%'><b>Heure </b>".$row->heureEvent."</div>";
			echo "<div style='font-size:20px;margin-left:2%'><b>Lieu </b>".$row->lieuEvent."</div>";
			echo "<div style='font-size:20px;margin-left:2%'><b>Catégorie </b>".$row->categ."</div>";
			echo "<div style='font-size:20px;margin-left:2%'><b>Sous-catégorie: </b>".$row->sous_categ."</div>";
			echo "<div style='font-size:20px;margin-left:2%'><b>Description: </b>".$row->descriptionEvent."</div>";
			echo "<div style='font-size:20px;margin-left:2%'><b>Budget de l'événement: </b>".$row->budget."</div>";
			if($row->isfree==0)
			{
				echo "<div style='font-size:20px;margin-left:2%'><b>L'entrée est </b> gratuite</div>";
			}else
			{
				echo "<div style='font-size:20px;margin-left:2%'><b>L'entrée est </b> payante</div>";
			}
			$temp=array();
			echo "<div style='text-align:center'><div style='font-size:30px;margin-left:2%;color:#9c27b0'><b>Liste des packs</b></div></div>";
			echo "<div style='text-align:center'><hr style='width:100px;border-color:#9c27b0'</div>";
			$this->db->where('idEvent',$row->idEvent);
			$q4=$this->db->get("pack");
			foreach($q4->result() as $row2){
				echo "<div style='text-align:center'><div style='font-size:20px;margin-left:2%'><b>Le pack ".$row2->nomPack."</b></div>";
				echo "<div style='font-size:20px;margin-left:2%'><b> </b> ".$row2->descriptionPack."</div>";
				echo "<div style='font-size:20px;margin-left:2%'><b> </b> ".$row2->typePack."</div>";
				echo "<div style='font-size:20px;margin-left:2%'><b> </b> ".$row2->montant."</div>";
				echo "<div style='font-size:20px;margin-left:2%'><b> </b> ".$row2->audience."</div></div>";
				echo "<div style='text-align:center'><hr style='width:300px;border-color:#aaa'</div>";
				$temp[]="'".$row2->idPack."'";
			}
			echo "<div style='text-align:center'><div style='font-size:30px;margin-left:2%;color:#9c27b0'><b>Statistiques de l'événement</b></div></div>";
			$this->db->where('idEvent',$row->idEvent);
			$q2=$this->db->get("interesse");
			echo "<div style='font-size:20px;margin-left:2%'><b>Le nombre de sponsors intéressés :</b> ".$q2->num_rows()."</div>";
			$this->db->where('idEvent',$row->idEvent);
			$q3=$this->db->get("demande");
			echo "<div style='font-size:20px;margin-left:2%'><b>Le nombre de demandes envoyées :</b> ".$q3->num_rows()."</div>";
			$pack = implode(",", $temp);
			if($pack != ""){
				$query = "
				SELECT * FROM achatpack where idPack in (".$pack.")
				";
				$data=$this->db->query($query);
				$d=$data->num_rows();
				echo "<div style='font-size:20px;margin-left:2%'><b>Le nombre de packs :</b> ".$d."</div>";
			}
			if($row->isvalid!=1)
			{
				echo '<div style="text-align:center"><input type="submit" name="valider" id="validermodalbutt" value="Valider" class="btn" style="background-color:#9c27b0;color:#fff" data-dismiss="modal"/></div> <br>';
			}else{
				echo '<div style="text-align:center"><input type="submit" name="annuler" id="validermodalbutt" value="annuler" class="btn" style="background-color:#9c27b0;color:#fff" data-dismiss="modal"/></div> <br>';
			}
		}	
	}
	function isactive()
	{
		$this->db->where('idSpons',$this->input->post('id'));
		$q=$this->db->get("sponsor");
		foreach ($q->result() as $row) {
			switch($row->isactive)
			{
				case '1':
				$data = array( 
					'isactive'=>'0'
				);
				$this->db->where('idSpons', $this->input->post('id'));
				$this->db->update('sponsor', $data);
				break;
				case '0':
				$data = array( 
					'isactive'=>'1'
				);
				$this->db->where('idSpons', $this->input->post('id'));
				$this->db->update('sponsor', $data);
				break;
			}
		}
	}

	function isactiveOrg()
	{
		$this->db->where('idOrg',$this->input->post('id'));
		$q=$this->db->get("organisateur");
		foreach ($q->result() as $row) {
			switch($row->isactive)
			{
				case '1':
				$data = array( 
					'isactive'=>'0'
				);
				$this->db->where('idOrg', $this->input->post('id'));
				$this->db->update('organisateur', $data);
				break;
				case '0':
				$data = array( 
					'isactive'=>'1'
				);
				$this->db->where('idOrg', $this->input->post('id'));
				$this->db->update('organisateur', $data);
				break;
			}
		}
	}

	function loginenter()
	{
		if ($this->session->userdata('login')!='') 
		{
			$this->load->model('main_model');
			$data['fetch_data']=$this->main_model->fetch_data();
			$this->load->view('admin',$data);
		}
		else {
			$this->loginadmin();
		}
	}
	function loginenter_org()
	{
		if ($this->session->userdata('login')!='') 
		{
			$this->load->model('main_model');
			$data['fetch_data']=$this->main_model->fetch_dataOrg();
			$this->load->view('admin_org',$data);
		}
		else {
			$this->loginadmin();
		}
	}
	function loginenter_dash()
	{
		if ($this->session->userdata('login')!='') 
		{
			$this->load->view('admin_dashboard');
		}
		else {
			$this->loginadmin();
		}
	}
	function stat_admin()
	{
		$q1=$this->db->get("sponsor");
		$q2=$this->db->get("organisateur");
		$q3=$this->db->get("evenement");
		$q4=$this->db->get("demande");
		$count1 = $q1->num_rows();
		$count2 = $q2->num_rows();
		$count3 = $q3->num_rows();
		$count4 = $q4->num_rows();
        $data = array(
			'count1'   => $count1,
			'count2' => $count2,
			'count3' => $count3,
			'count4' => $count4
        );
        echo json_encode($data);
	}
	public function loginenter_categ()
	{
		if ($this->session->userdata('login')!='') 
		{
			$this->load->view('admin_categ');
		}
		else {
			$this->loginadmin();
		}
	}
	public function loginenter_events()
	{
		if ($this->session->userdata('login')!='') 
		{
			$this->load->model('main_model');
			$data['fetch_dataEvents']=$this->main_model->fetch_dataEvents();
			$this->load->view('admin_events',$data);
		}
		else {
			$this->loginadmin();
		}
	}
	function notif_admin()
      {
        if(isset($_POST["view"]))
        {
          if($_POST["view"] != '')
          {
            $data = array( 
              'stat'=>'1'
            );
            $this->db->where('stat', 0);
				    $this->db->update('notifadmin', $data);
          }
        }
        $output='';
        $this->db->order_by('idNotif_admin', 'DESC');
        $q=$this->db->get("notifadmin",10);
        if($q->num_rows()>0)
       {
        foreach ($q->result() as $row) {
          $output .= '
          <li style="font-family:caviar dreams;" class="alert alert_default">
           <a href="#">
            <strong>'.$row->titreNotif_admin.'</strong>
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
        $q=$this->db->get("notifadmin");
        $count = $q->num_rows();
        $data = array(
          'notification'   => $output,
          'unseen_notification' => $count
        );
        echo json_encode($data);
	  }
	  function notif_adminPop()
      {
        $output='';
        $this->db->where('stat',0);
        $q=$this->db->get("notifadmin",10);
        if($q->num_rows()>0)
       {
        foreach ($q->result() as $row) {
          $output .= '
          <div style="font-family:caviar dreams;" class="alert alert_default">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>'.$row->titreNotif_admin.'</strong>
          </div>
          ';
         }
        }
        $data = array(
          'notification'   => $output
        );
        echo json_encode($data);
	  }
	  public function delete_categ(){  
		$id=$this->input->post('id'); 
		$this->load->model("main_model");  
		$this->main_model->delete_categ($id);
   }
   public function delete_souscateg(){  
	$id=$this->input->post('id'); 
	$this->load->model("main_model");  
	$this->main_model->delete_souscateg($id);
}
   public function insert_categ(){  
	$this->db->insert('categorie',array(
		"idCateg"=>$this->input->post('id'),
		'libCateg' =>$this->input->post('lib')
		)
	);
	foreach($_POST["sous"] as $sous)
	{
		$this->db->insert('sous_categorie',array(
			'libSous_categ' =>$sous,
			"idCateg"=>$this->input->post('id')
			)
		);
	}
}
public function insert_souscateg(){  
	foreach($_POST["sous"] as $sous)
	{
		$this->db->insert('sous_categorie',array(
			'libSous_categ' =>$sous,
			"idCateg"=>$this->input->post('id')
			)
		);
	}
}
public function modif_categ(){
	$data=array(
		"idCateg"=>$this->input->post("id"),
		"libCateg"=>$this->input->post("lib")
	);
	$this->db->where("idCateg",$this->input->post("id"));
	$this->db->update("categorie",$data);
}
public function select_categ(){  
	$count=1;
	$output='';
	$output2='';
	if(isset($_POST['id'])){
	$this->db->where('idCateg', $this->input->post('id'));
	$q=$this->db->get("categorie");
	$this->db->where('idCateg', $this->input->post('id'));
	$q1=$this->db->get("sous_categorie");
	foreach ($q->result() as $row) {
		$output2=$row->idCateg;
		$output=$row->libCateg;
	}
	$output1='';
	foreach ($q1->result() as $row) {
		$button = '';
		$output1 .= '
			<tr id="row'.$count.'">
			<td>'.$row->libSous_categ.'</td>
			
			</tr>
		';
		$count++;
	}
}
	$data = array(
		'id'=>$output2,
	'lib'=> $output,
	'sous'=>$output1
	);
	echo json_encode($data);
}
public function modif_souscateg(){
	$data=array(
		"libSous_categ"=>$this->input->post("lib")
	);
	$this->db->where("idSous_categ",$this->input->post("id"));
	$this->db->update("sous_categorie",$data);
}
public function select_souscateg(){  
	$output='';
	if(isset($_POST['id'])){
		$this->db->where('idSous_categ', $this->input->post('id'));
		$q=$this->db->get("sous_categorie");
		foreach ($q->result() as $row) {
			$output=$row->libSous_categ;
		}
	}
	$data = array(
	'lib'=> $output
	);
	echo json_encode($data);

}
	function logout()
	{
		$this->session->unset_userdata('login');
		redirect('http://localhost/Sponsoringapp_c_i/index.php/welcome/loginadmin');
	}
}