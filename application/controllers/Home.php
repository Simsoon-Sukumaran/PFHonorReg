<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\IReader;

class Home extends CI_Controller {

	public function index()
	{
			$header['title'] = "Login";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/home_page');
			$this->load->view('templates/footer');
	}

	public function next()
	{
			$header['title'] = "Login";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/form1');
			$this->load->view('templates/footer');
	}

	public function eform(){
		 $this->load->model('master_model');

		 $data['users'] = $this->master_model->get_registree($this->input->post('uniqK'));

		if(!empty($data['users'])){

			$header['usrnm'] = $data['users']['0']['name'];
			// $header['usrnm'] = "Simsoon";
			$header['uniq'] = $data['users']['0']['uniqId'];

			/*
			if(!empty($data['users']['0']['isInst'])){
					$header['disableD1'] = $data['users']['0']['instDay1'] == 'Y' ? true : false;
					$header['disableD2'] = $data['users']['0']['instDay2'] == 'Y' ? true : false;
					$header['disableD3'] = $data['users']['0']['instDay3'] == 'Y' ? true : false;
			}
			*/
			$this->load->model('honor_model');

			$header['honor_day1'] = $this->honor_model->get_honor_list('2');
			$header['honor_day2'] = $this->honor_model->get_honor_list('3');
			$header['honor_day3'] = $this->honor_model->get_honor_list('4');

			$header['disable1'] = false;
			$header['disable2'] = false;
			$header['disable3'] = false;

			//echo 'asd';

			if($data['users']['0']['isInst'] == 'Y'){
					//echo 'success1';
					if($data['users']['0']['instDay1'] == 'Y'){
						//echo 'success2';
						$header['disable1'] = true;
					}
					if($data['users']['0']['instDay2'] == 'Y'){
						//echo 'success3';
						$header['disable2'] = true;
					}
					if($data['users']['0']['instDay3'] == 'Y'){
						//echo 'success4';
						$header['disable3'] = true;
					}
			}

			// echo $header['honor_day1']['0']['honor_nm'];

			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/eform');
			$this->load->view('templates/footer');
		}else{
			$header['err'] = "Our record shows that you have already submitted for the honor registration. Kindly take note that each person is allowed to register only once. Please consult the Honor Committee for further assistance.";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/form1');
			$this->load->view('templates/footer');

		}


	}

	public function registerHonor(){
		//$this->load->model('master_model');

		$header['title'] = "Login";

    //registration Module..

		$uniq =  $this->input->post('id');
		$day1_hn = $this->input->post('day1');
		$day2_hn = $this->input->post('day2');
		$day3_hn = $this->input->post('day3');

		//$maxCount = 50;
		$this->load->model('honor_model');

		$checkIfItStillAvailable = true;
		$checkIfItStillAvailable = $this->honor_model->checkHonorAvailability($day1_hn,$day2_hn,$day3_hn);

		//echo 'before';
		if(!$checkIfItStillAvailable){
			//return to select..
			$this->reeform($uniq);
			//return;
		}else{
			$maxCount = $this->honor_model->getMaxCount($day1_hn);
			$maxCount2 = $this->honor_model->getMaxCount($day2_hn);
			$maxCount3 = $this->honor_model->getMaxCount($day3_hn);

			$this->honor_model->honor_count($day1_hn,$maxCount);
			$this->honor_model->honor_count($day2_hn,$maxCount2);
			$this->honor_model->honor_count($day3_hn,$maxCount3);

			$this->load->model('Master_model');
			$this->Master_model->register_honor($uniq,$day1_hn,$day2_hn,$day3_hn);


	    $header['usr']  = $this->input->post('usr');
	    $header['day1'] = $this->honor_model->get_honor_name($this->input->post('day1'));
	    $header['day2'] = $this->honor_model->get_honor_name($this->input->post('day2'));
	    $header['day3'] = $this->honor_model->get_honor_name($this->input->post('day3'));

			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/resultPage');
			$this->load->view('templates/footer');
		}

	}

	public function reeform($uniqueID){
		 $this->load->model('master_model');

		 $data['users'] = $this->master_model->get_registree($uniqueID);

		if(!empty($data['users'])){

			$header['usrnm'] = $data['users']['0']['name'];
			// $header['usrnm'] = "Simsoon";
			$header['uniq'] = $data['users']['0']['uniqId'];


			$header['disable1'] = false;
			$header['disable2'] = false;
			$header['disable3'] = false;

			//echo 'asd';

			if($data['users']['0']['isInst'] == 'Y'){
					//echo 'success1';
					if($data['users']['0']['instDay1'] == 'Y'){
						//echo 'success2';
						$header['disable1'] = true;
					}
					if($data['users']['0']['instDay2'] == 'Y'){
						//echo 'success3';
						$header['disable2'] = true;
					}
					if($data['users']['0']['instDay3'] == 'Y'){
						//echo 'success4';
						$header['disable3'] = true;
					}
			}
			/*
			if(!empty($data['users']['0']['isInst'])){
					$header['disableD1'] = $data['users']['0']['instDay1'] == 'Y' ? true : false;
					$header['disableD2'] = $data['users']['0']['instDay2'] == 'Y' ? true : false;
					$header['disableD3'] = $data['users']['0']['instDay3'] == 'Y' ? true : false;
			}
			*/
			$this->load->model('honor_model');

			$header['honor_day1'] = $this->honor_model->get_honor_list('2');
			$header['honor_day2'] = $this->honor_model->get_honor_list('3');
			$header['honor_day3'] = $this->honor_model->get_honor_list('4');


			// echo $header['honor_day1']['0']['honor_nm'];
			$header['err'] = "One of the honor that you choose has already fully booked, please choose again.";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/eform');
			$this->load->view('templates/footer');
		}else{
			$header['err'] = "Our record shows that you have already submitted for the honor registration. Kindly take note that each person is allowed to register only once. Please consult the Honor Committee for further assistance.";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/form1');
			$this->load->view('templates/footer');

		}
	}

	public function login(){
		$this->load->model('church_model');

		$data['uop'] = 'Invalid Username or Password. Please Try Again';
		$data['users'] = $this->login_model->get_user($this->input->post('username'),$this->input->post('password'));

		if(!empty($data['users'])){
			// //need to session and to input the users data into session
			$churchInfo['details'] = $this->church_model->get_church($data['users']['0']['cid']);

			$loginSession = array(
			        'username'  => $data['users']['0']['username'],
			        'cid'     => $data['users']['0']['cid'],
							'churchName' => $churchInfo['details']['0']['church_nm'],
							'role' => $data['users']['0']['role'],
			        'isLoggedIn' => TRUE
			);

			//need to update user's table with isLoggedIn to 1..
			$this->session->set_userdata($loginSession);
			redirect('Members');
		}else{
			$header['title'] = "Login";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/home_page',$data);
			$this->load->view('templates/footer');
		}
	}


	public function printClassList(){
			$header['title'] = "";
			$this->load->view('templates/header_bak',$header);
			$this->load->view('User/printList');
			$this->load->view('templates/footer');
	}

	//this one is for testing purposes only... will be deleted when goes production
	public function testing(){
		/*
			$this->load->model('church_model');

			$data['users'] = $this->login_model->get_user('simsoon27','lala123');
			$churchInfo['details'] = $this->church_model->get_church('bic');
			echo $data['users']['0']['username'];
			echo $data['users']['0']['cid'];
			echo $churchInfo['details']['0']['church_nm'];
			*/
			// $this->load->library('excel');
			/*
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'Hello World !');

			$writer = new Xlsx($spreadsheet);
			$writer->save('hello world.xlsx');
				*/


			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::load("masterList.xlsx");
			// $reader->setReadDataOnly(true);
			// $reader->load("hello world.xlsx");

			$isExit = true;
			$count = 2;

			while($isExit){

					$a = 'A' . $count;
					$b = 'B' . $count;
					$c = 'C' . $count;
					$d = 'D' . $count;
					$e = 'E' . $count;
					$f = 'F' . $count;
					$g = 'G' . $count;

					if(!empty($reader->getActiveSheet()->getCell($a)->getValue())){
						/*
						$name = $reader->getActiveSheet()->getCell($b)->getValue();
						$day = $reader->getActiveSheet()->getCell($a)->getValue();
						$max = $reader->getActiveSheet()->getCell($c)->getValue();
						$isdisplay = 0;
						$count2 = 0;
						*/

						$unique = $reader->getActiveSheet()->getCell($b)->getValue();
						$name = $reader->getActiveSheet()->getCell($a)->getValue();
						$country = $reader->getActiveSheet()->getCell($c)->getValue();
						$day1 = 'null';
						$day2 = 'null';
						$day3 = 'null';
						$isReg = 'N';
						$isInst = $reader->getActiveSheet()->getCell($d)->getValue();
						$instDay1 = $reader->getActiveSheet()->getCell($e)->getValue();
						$instDay2 = $reader->getActiveSheet()->getCell($f)->getValue();
						$instDay3 = $reader->getActiveSheet()->getCell($g)->getValue();

						//echo "INSERT INTO `honor_tbl`(`honor_nm`, `day`, `isDisplay`, `count`, `maxCount`) VALUES ('$name',$day,$isdisplay,$count2,$max);";

						echo "INSERT INTO `master_list_tbl`(`uniqId`, `name`, `clubNm`, `day1`, `day2`, `day3`, `isReg`, `isInst`, `instDay1`, `instDay2`, `instDay3`) VALUES ('$unique','$name','$country',$day1,$day2,$day3,'$isReg','$isInst','$instDay1','$instDay2','$instDay3');";

						//echo "INSERT INTO `master_list_tbl`(`uniqId`, `name`, `clubNm`, `day1`, `day2`, `day3`, `isReg`, `isInst`, `instDay1`, `instDay2`, `instDay3`) VALUES ('$unique','$name','$day1',null,null,null,'N','Y','Y','Y','Y');";


						echo '<br>';
						$count++;
					}else{
						$isExit = false;
					}
			}

		 /*
			echo $reader->getActiveSheet()->getCell('A2')->getValue();
			echo $reader->getActiveSheet()->getCell('B2')->getValue();
			echo $reader->getActiveSheet()->getCell('C2')->getValue();
			echo $reader->getActiveSheet()->getCell('D2')->getValue();
			echo $reader->getActiveSheet()->getCell('E2')->getValue();
			echo $reader->getActiveSheet()->getCell('F2')->getValue();
			echo $reader->getActiveSheet()->getCell('G2')->getValue();
			*/

	}
}
