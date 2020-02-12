<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {


	public function index()
	{

		//get the cid from Session
		//getChurchName
		if(isset($_SESSION['isLoggedIn'])){
				$cid = 'bic';
				$header['title'] = "Membership List of ". $_SESSION['churchName'];
				$data['membersList'] = $this->membership_model->getMembersByChurch($_SESSION['cid']);
				// print_r($data);
				$this->load->view('templates/header',$header);
				$this->load->view('common/members_maintenance/members_view',$data);
				$this->load->view('templates/footer');
		}else{
			show_404();
		}
	}

	public function memberR()
	{
		//need to check for the session.. if has session directly
		//goes into memberR
		if(isset($_SESSION['isLoggedIn'])){
			$header['title'] = "Register Member..";
			$this->load->view('templates/header',$header);
			$this->load->view('common/members_maintenance/membership_reg');
			$this->load->view('templates/footer');
		}else{
			show_404();
		}

	}

	public function registerMember(){

		//compiling the post data to an array..
		$data = array(
		        'cid' => $_SESSION['cid'],
		        'fName' => $this->input->post('firstNm'),
		        'mName' => $this->input->post('middleNm'),
						'lName' => $this->input->post('lastNm'),
						'icNo' => $this->input->post('icno'),
						'dob' => $this->input->post('dob'),
						'addr' => $this->input->post('add1'),
						'city' => $this->input->post('city'),
						'zcode' => $this->input->post('zipCode'),
						'state' => $this->input->post('state'),
						'status' => $this->input->post('status'),
						'email' => $this->input->post('email'),
						'telNo' => $this->input->post('telNo'),
						'homeNo' => $this->input->post('homeNo'),
						'member_stat' => $this->input->post('member_stat'),
						'isDelete' => 'N'
		);
		$this->membership_model->register_member($data);
		$this->index();

		// printf($this->input->post('firstNm').'-'.$this->input->post('status'));

	}

	public function member_single_view($id){
		$data['memberEditData'] = $this->membership_model->getMemberById($id);
		$header['title'] = "Member Details";
		$this->load->view('templates/header',$header);
		$this->load->view('common/members_maintenance/member_single_view',$data);
		$this->load->view('templates/footer');
	}

	public function member_edit_view($id){

		$data['memberEditData'] = $this->membership_model->getMemberById($id);
		$header['title'] = "Update Member's details..";
		$this->load->view('templates/header',$header);
		$this->load->view('common/members_maintenance/member_edit',$data);
		$this->load->view('templates/footer');
	}

	public function member_edit_action(){
		$data = array(
		        'cid' => $_SESSION['cid'],
		        'fName' => $this->input->post('firstNm'),
		        'mName' => $this->input->post('middleNm'),
						'lName' => $this->input->post('lastNm'),
						'icNo' => $this->input->post('icno'),
						'dob' => $this->input->post('dob'),
						'addr' => $this->input->post('add1'),
						'city' => $this->input->post('city'),
						'zcode' => $this->input->post('zipCode'),
						'state' => $this->input->post('state'),
						'status' => $this->input->post('status'),
						'email' => $this->input->post('email'),
						'telNo' => $this->input->post('telNo'),
						'homeNo' => $this->input->post('homeNo'),
						'member_stat' => $this->input->post('member_stat')
		);

		$this->membership_model->editMembers($data,$this->input->post('id'));
		$this->index();
	}

	public function member_delete($id){
			$this->membership_model->delete_member($id);
			$this->index();
	}



}
