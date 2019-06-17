<?php
class Main_model extends CI_Model
{
    function fetch_cat()
      {
       $this->db->order_by("libCateg", "ASC");
       $query = $this->db->get("categorie");
       return $query->result();
      }
      function fetch_sous($idCateg)
 {
  $this->db->where('idCateg', $idCateg);
  $this->db->order_by('libSous_categ', 'ASC');
  $query = $this->db->get('sous_categorie');
  $output ='';
  //if($query->num_rows()>0){
  $output = '<option value="">Sélectionner sous catégorie</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->idSous_categ.'">'.$row->libSous_categ.'</option>';
  }
  return $output;
 // }
 }

    function insert_data($data)
    {
        $this->db->insert("sponsor",$data);
    }
    function achatpack($data)
    {
        $this->db->insert("achatpack",$data);
    }
    function fetch_data()
    {
        $query=$this->db->get("sponsor");
        return $query;
    }
    function fetch_dataOrg()
    {
        $query=$this->db->get("organisateur");
        return $query;
    }
    function fetch_dataEvents()
    {
        $query=$this->db->get("evenement");
        return $query;
    }
    function fetch_data_where($id)
    {
        $this->db->where("idSpons", $id);
        $query=$this->db->get("sponsor");
        return $query;
    }
    function validerEvent($id,$action){
        if($action=="Valider"){
            $this->db->set('isvalid', 1);
            $this->db->where('idEvent', $id);
            $this->db->update('evenement');
        }else{
            $this->db->set('isvalid', 0);
            $this->db->where('idEvent', $id);
            $this->db->update('evenement');
        }
    }
    function validerOrg($id,$action){
        if($action=="Valider"){
            $this->db->set('isvalid', 1);
            $this->db->where('idOrg', $id);
            $this->db->update('organisateur');
        }else{
            $this->db->set('isvalid', 0);
            $this->db->where('idOrg', $id);
            $this->db->update('organisateur');
        }
    }
    function insert_data_v($data)
    {
        $this->db->insert("sponsorconf",$data);
    }
    function delete_data($id){  
        $this->db->where("idSpons", $id);  
        $this->db->delete("sponsor");  
   } 
   function delete_dataOrg($id){  
    $this->db->where("idOrg", $id);  
    $this->db->delete("organisateur");
} 
   function deleteEvent($id){  
    $this->db->where("idEvent", $id);  
    $this->db->delete("evenement");  
} 
   function delete_categ($id){  
    $this->db->where("idCateg", $id);  
    $this->db->delete("categorie");  
    } 
    function delete_souscateg($id){  
        $this->db->where("idSous_categ", $id);  
        $this->db->delete("sous_categorie");  
    } 
   function adminlogin($login,$password)
   {
       $this->db->where("login", $login);
       $this->db->where("motdepasse", $password);
       $query=$this->db->get("admin");
       if($query->num_rows()>0)
       {
           return true;
       }
       else{
           return false;
       }
   }

   function loginorg($login,$password)
   {
       $this->db->where("emailOrg", $login);
       $this->db->where("mdpOrg", $password);
       $query=$this->db->get("organisateur");
       if($query->num_rows()>0)
       {
        foreach ($query->result() as $row) {
            $session_data=array(
                "idOrg"=>$row->idOrg
            );
            $this->session->set_userdata($session_data);
           }
           return true;
       }
       else{
           return false;
       }
   }

   function loginspons($login,$password)
   {
       $this->db->where("emailSpons", $login);
       $this->db->where("mdpSpons", $password);
       $this->db->where("isactive", 1);
       $query=$this->db->get("sponsor");
       
       if($query->num_rows()>0)
       {
        foreach ($query->result() as $row) {
            $session_data=array(
                "idSpons"=>$row->idSpons,
                "nomSpons"=>$row->nomSpons,
                "prenomSpons"=>$row->prenomSpons,
                "organismeSpons"=>$row->organismeSpons,
                "adrSpons"=>$row->adrSpons,
                "telSpons"=>$row->telSpons,
                "emailSpons"=>$row->emailSpons,
                "centre"=>$row->centre,
                "imgSpons"=>$row->img
            );
            $this->session->set_userdata($session_data);
           }
           return true;
       }
       else{
           return false;
       }
   }
 function make_query($budget, $categ,$isfree,$date,$q)
 {
  $query = "
  SELECT * FROM evenement where idEvent != 0
  ";

  if(isset($budget) && !empty($budget))
  {
   $query .= "
    AND (budget BETWEEN 0 AND ".$budget.")
   ";
  }

  if(isset($categ))
  {
   $categ_filter = implode("','", $categ);
   $query .= "
    and  categ in ('".$categ_filter."')
   ";
  }
  if(isset($isfree))
  {
   $query .= "
    and  isfree = ".$isfree."
   ";
  }
  /*if(isset($q))
  {
   $query .= "
    and nomEvent LIKE '%".$q."%';
   ";
  }*/
  if(isset($date))
  {
   $query .= "
    order by dateDeb
   ";
  }
  return $query;
 }

 function filter($budget, $categ,$isfree,$date,$q)
 {
  $query = $this->make_query($budget, $categ,$isfree,$date,$q);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch($limit, $start, $budget, $categ,$isfree,$date,$q)
 {
  $query = $this->make_query($budget, $categ,$isfree,$date,$q);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <span class="card event" style="text-align:center" id="'.$row->idEvent.'">
        <a href="'.base_url().'index.php/welcome/event/'.$row->idEvent.'" class="purple-text">
            <img src="data:image/jpeg;base64,'. $row->URL_Image.'" alt="" style="cursor:grab;height:80px;width:80px">
            <h5>'.$row->nomEvent.'</h5>
            <b>De</b> '.$row->dateDeb.'<br><b>jusqu\'à</b> '.$row->dateFin.'<br>
            <b style="text-transform: uppercase;">à</b> '.$row->lieuEvent.'<br>
            
       </a>
      
    ';
            if($this->session->userdata("idSpons")!=""){
                $this->db->where("idEvent", $row->idEvent);
                $this->db->where("idSpons", $this->session->userdata("idSpons"));
                $query=$this->db->get("interesse");
                
                if($query->num_rows()>0)
                {
                    $output.="<input type='button' id='".$row->idEvent."' class='interesse btn' style='background-color:#9c27b0' value='interessé(e)'/>";
                }
                else{
                    $output.="<input type='button' id='".$row->idEvent."' class='interesse btn' style='background-color:#888' value='interessé(e)?'/>";
                }
            }
            $output.="</span>";
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }






}
?>