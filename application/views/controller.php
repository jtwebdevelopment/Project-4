<?
	if(!$this->uri->segment(3)){
		$data['query'] = $this->AdminModel->get_category();
		$this->load->view('adminviews/adminview_category', $data);
	}

	if($this->uri->segment(3) == "add"){ //add new category
		if($this->uri->segment(4) == "save"){
			$this->load->database();
			$data = array(
			'category_name' => $_POST["category_name"],
			'metatags' => $_POST["metatags"] ,
			'template_id' => $_POST["template"]
			);
			$this->db->insert('category', $data);
		}
		if($this->uri->segment(4) <> "save"){
			$data['template'] = $this->AdminModel->get_template();
			$data['action'] = "add";
			$this->load->view("adminviews/adminview_category_addedit",$data);
		}
	}

	if($this->uri->segment(3) == "edit"){ //update category

		if($this->uri->segment(4) == "save"){
			$this->load->database();
			$data = array(
			'category_name' => $_POST["category_name"],
			'metatags' => $_POST["metatags"] ,
			'template_id' => $_POST["template"]
			);
			$this->db->where('category_id', $_POST["id"]);
			$this->db->update('category', $data);
		}

		if($this->uri->segment(4) <> "save"){
			$data['query'] = $this->AdminModel->get_one_category($this->uri->segment(4));
			$data['template'] = $this->AdminModel->get_template();
			$data['action'] = "edit";
			$this->load->view("adminviews/adminview_category_addedit",$data);
		}
	}  
?>