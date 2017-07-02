<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Pliki prywatne - szafirow
 */

class PA extends CI_Controller{
    
    function index() {
       
      $this->load->model('model_panel');
      $data['returnMainName'] = $this->model_panel->returnMainName();
      $data['returnSubpage'] = $this->model_panel->returnSubpage();
      @$data['breadcrumbs'] = $this->model_panel->breadcrumbs(); 
      
        
         $this->load->view('panel/view_top',$data);
         $this->load->view('panel/view_menu',$data);
         $this->load->view('panel/view_main',$data);
         $this->load->view('panel/view_footer',$data);
   
    }
    
    
    function newsViews(){
        
      $this->load->model('model_panel');
      $data['returnMainName'] = $this->model_panel->returnMainName();
      $data['returnSubpage'] = $this->model_panel->returnSubpage();
      @$data['breadcrumbs'] = $this->model_panel->breadcrumbs(); 
      
        
     $this->load->model('model_panel');
    // $data['sql']=$this->model_panel->getAllNews();


     $limit = 5;
     $config['base_url'] = base_url().'PA/newsView/';
    
     $config['total_rows'] = $this->model_panel->countNews();
     $config['per_page'] = $limit;
     $config['num_links'] = 10;
     $config['uri_segment'] = 3;
     $config['first_link'] = 'Start';
     $config['last_link'] = 'Koniec';
      
     $this->pagination->initialize($config);
   
     $data['pagination'] = $this->pagination->create_links();
     $data['sql'] = $this->model_panel->getAllNews($limit, $this->uri->segment($config['uri_segment']));
     
    
    
    
    
      
         $this->load->view('panel/view_top',$data);
         $this->load->view('panel/view_menu',$data);
         $this->load->view('panel/view_main',$data);
         $this->load->view('panel/view_newsView',$data);
         $this->load->view('panel/view_footer',$data);
    }
    
    
    function newsAdd(){
        
      $this->load->database();  
      $this->load->model('model_panel');
      $data['returnMainName'] = $this->model_panel->returnMainName();
      $data['returnSubpage'] = $this->model_panel->returnSubpage();
      @$data['breadcrumbs'] = $this->model_panel->breadcrumbs(); 
      
        
      
       
       if($this->input->post()){  
        $query = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'dateAdd' => date('Y-m-d H:i:s')
                 );
        $this->model_panel->form_insert('news',$query);
       
        if($this->db->affected_rows() > 0){
         $data['message'] = $this->model_panel->successMessage('Pomyślnie dodano ogłoszenie!');   
        }
        
       }  
       
       
        $this->load->view('panel/view_top',$data);
         $this->load->view('panel/view_menu',$data);
         $this->load->view('panel/view_main',$data);
         $this->load->view('panel/view_newsAdd',$data);
         $this->load->view('panel/view_footer',$data);
     
    }
    
    
    
    
    
    
    
}
