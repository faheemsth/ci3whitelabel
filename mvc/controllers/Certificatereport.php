<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificatereport extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			INILABS TEAM
| -----------------------------------------------------
| EMAIL:			info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:			http://inilabs.net
| -----------------------------------------------------
*/
	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model("regtype_m");
		$this->load->model("certificate_template_m");
		$this->load->model("certificatelogs_m");
		$this->load->model("mailandsmstemplatetag_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('certificatereport', $language);
	}

	public function index() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);

		$this->data['membertypes']   = $this->regtype_m->get_order_by_regtype(array(), TRUE);
		$this->data['templates'] = $this->certificate_template_m->get_certificate_template();
		$this->data["subview"] = "report/certificate/CertificateReportView";
		$this->load->view('_layout_main', $this->data);
	}

	protected function rules() {
		$rules = array(
			
			array(
				'field' => 'templateID',
				'label' => $this->lang->line('certificatereport_templatename'),
				'rules' => 'trim|required|xss_clean|callback_unique_data'
			)
		);

		return $rules;
	}

	public function unique_data($data) {
		if($data === "0") {
			$this->form_validation->set_message('unique_data', 'The %s field is required.');
			return FALSE;
		}
		return TRUE;
	}

	public function getStudentList() {
		$retArray['status'] = FALSE;
		$retArray['render'] = '';

		if(permissionChecker('certificatereport')) {
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if($this->form_validation->run() == FALSE) {
					$retArray = $this->form_validation->error_array();
					$retArray['status'] = FALSE;
				    echo json_encode($retArray);
				    exit;
				} else {		
					$membertype 		= $this->input->post('membertype');
					$templateID 	= $this->input->post('templateID');
					$this->data['users'] = $this->user_m->get_order_by_user(array('membertype' => $membertype));
					$this->data['regtype'] = $this->regtype_m->get_single_regtype(array('regtypeID' => $membertype), TRUE); 
					$this->data['templateID'] 	= $templateID;
					$retArray['render'] = $this->load->view('report/certificate/CertificateReport', $this->data, true);
					$retArray['status'] = TRUE;
					echo json_encode($retArray);
				    exit;
				}
			}
		} else {
			echo json_encode($retArray);
			exit;
		}
	}

	public function generate_certificate() {
		$this->data['headerassets'] = array(
            'js' => array(
                'assets/CircleType/dist/circletype.min.js'
            )
        );

		$tagArray = array();
		$this->data['themeArray'] = array(
            '1' => 'theme1',
            '2' => 'theme2',
            '3' => 'theme3'
        );

		$userID 		= htmlentities(escapeString($this->uri->segment(3)));
		$templateID 	= htmlentities(escapeString($this->uri->segment(4)));
		$usertypeID		= 18;
		if(permissionChecker('certificatereport')) {
			if((int)$userID && (int)$templateID) {
				$user = $this->user_m->get_single_user(array('userID' => $userID));
				
				$usertype = $this->usertype_m->get_single_usertype(array('usertypeID' => $usertypeID));
				$membertype = $user->membertype;
				$regtype = $this->regtype_m->get_single_regtype(array('regtypeID' => $membertype), TRUE); 

				$template = $this->certificate_template_m->get_single_certificate_template(array('certificate_templateID' => $templateID));

				if(customCompute($user) && customCompute($usertype) && customCompute($template)) {
					$this->data['certificate_template'] = $template;

					$tagArray['[name]'] 		= ucwords(strtolower($user->name));
					$tagArray['[membertype]'] 		= ucwords(strtolower($regtype->regtype));
					$tagArray['[member_since]'] 			= isset($user->member_since) ? date("d M Y", strtotime($user->member_since)) : '';
					$tagArray['[current_date]'] 		= date('l, d M Y');
					
					//$ddd =	strtolower('SFGHFGH FGHFGH');
					 

					$userTags = pluck($this->mailandsmstemplatetag_m->get_order_by_mailandsmstemplatetag(array('usertypeID' => 18)), 'tagname');
					 
					

					$this->data['template'] = $this->tagConvertForTemplate($userTags, $template->template, 18, $tagArray,false);
					
					$this->data['top_heading_title'] = $this->tagConvertForTemplate($userTags, $template->top_heading_title, 18, $tagArray, FALSE);

					$this->data['top_heading_left'] = $this->tagConvertForTemplate($userTags, $template->top_heading_left, 18, $tagArray, FALSE);

					$this->data['top_heading_middle'] = $this->tagConvertForTemplate($userTags, $template->top_heading_middle, 18, $tagArray, FALSE);
					
					$this->data['top_heading_right'] = $this->tagConvertForTemplate($userTags, $template->top_heading_right, 18, $tagArray, FALSE);
					
					
					$this->data['main_middle_text'] = $this->tagConvertForTemplate($userTags, $template->main_middle_text, 18, $tagArray, FALSE);

					$this->data['footer_left_text'] = $this->tagConvertForTemplate($userTags, $template->footer_left_text, 18, $tagArray, FALSE);

					$this->data['footer_middle_text'] = $this->tagConvertForTemplate($userTags, $template->footer_middle_text, 18, $tagArray, FALSE);

					$this->data['footer_right_text'] = $this->tagConvertForTemplate($userTags, $template->footer_right_text, 18, $tagArray, FALSE);

					$this->data['theme'] = $this->data['themeArray'][$template->theme];
					// $this->voucherPDF('vouchermodule.css',$this->data,'report/certificate/CertificateReportLayout');
					$this->load->view('report/certificate/CertificateReportLayout', $this->data);
					$datarray = array(
                            "userID"       => $userID,
                            "templateID"    => $templateID,
                            "filename"    => $userID.$templateID.'.pdf'
                        );
                $this->certificatelogs_m->insert_certificate_logs($datarray);		
				} else {
					$this->data["subview"] = "error";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	private function tagConvertForTemplate($userTags, $message, $usertypeID=1, $convertArray, $design = TRUE) {
        if($message) {
        	if($usertypeID == 18) {
	            if(customCompute($userTags)) {
	                foreach ($userTags as $key => $userTag) {
	                    if(array_key_exists($userTag, $convertArray)) {
	                        $length = strlen($convertArray[$userTag]);
	                        $width = (20*$length);
	                        if($design) {
	                        	$message = str_replace($userTag, '<span style="width:'.$width.'px;" class="dots widthcss" data-hover="'.$convertArray[$userTag].'"></span>' , $message);
	                        } else {
	                        	$message = str_replace($userTag, $convertArray[$userTag], $message);
	                        }

	                    }
	                }
	            }
        	}
        }
        return $message;
    }

	public function getSection() {
		$id = $this->input->post('id');
		if((int)$id) {
			$allSection = $this->section_m->get_order_by_section(array('classesID' => $id));
			echo "<option value='0'>", $this->lang->line("certificatereport_please_select"),"</option>";
			foreach ($allSection as $value) {
				echo "<option value=\"$value->sectionID\">",$value->section,"</option>";
			}
		}
	}
}
