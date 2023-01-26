<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membertype extends Admin_Controller {
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
        $this->load->model("membertype_m");
        $language = $this->session->userdata('lang');
        $this->lang->load('membertype', $language);
    }

    public function index() {
        $this->data['membertypes'] = $this->membertype_m->get_membertype();
        $this->data["subview"] = "/membertype/index";
        $this->load->view('_layout_main', $this->data);
    }

    protected function rules() {
        $rules = array(
            array(
                'field' => 'membertype',
                'label' => $this->lang->line("membertype_title"),
                'rules' => 'trim|required|xss_clean|max_length[128]'
            ),
            array(
                'field' => 'amount',
                'label' => 'Amount',
                'rules' => 'trim|numeric|required|xss_clean|max_length[128]'
            )
        );
        return $rules;
    }

    public function add() {
        $this->data['headerassets'] = array(
            'css' => array(
                // 'assets/datepicker/datepicker.css',
                // 'assets/editor/jquery-te-1.4.0.css'
            ),
            'js' => array(
                // 'assets/editor/jquery-te-1.4.0.min.js',
                // 'assets/datepicker/datepicker.js'
            )
        );
        if($_POST) {
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->data["subview"] = "/membertype/add";
                $this->load->view('_layout_main', $this->data);
            } else {
                 $array = array(
                            "membertype"       => $this->input->post("membertype"),
                            "amount"    => $this->input->post("amount")
                        );
                $this->membertype_m->insert_membertype($array);
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                redirect(base_url("membertype/index"));
            }
        } else {
            $this->data["subview"] = "/membertype/add";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function edit() {
        $this->data['headerassets'] = array(
            'css' => array(
                'assets/datepicker/datepicker.css',
                'assets/editor/jquery-te-1.4.0.css'
            ),
            'js' => array(
                'assets/editor/jquery-te-1.4.0.min.js',
                'assets/datepicker/datepicker.js'
            )
        );
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if((int)$id) {
            $this->data['membertype'] = $this->membertype_m->get_single_membertype(array('membertypeID' => $id));
            if($this->data['membertype']) {
                if($_POST) {
                    $rules = $this->rules();
                    $this->form_validation->set_rules($rules);
                    if ($this->form_validation->run() == FALSE) {
                        $this->data["subview"] = "/membertype/edit";
                        $this->load->view('_layout_main', $this->data);
                    } else {
                        $array = array(
                            "membertype"       => $this->input->post("membertype"),
                            "amount_type"    => $this->input->post("amount_type"),
                            "amount"    => $this->input->post("amount")
                        );

                        $this->membertype_m->update_membertype($array, $id);
                        $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                        redirect(base_url("membertype/index"));
                    }
                } else {
                    $this->data["subview"] = "/membertype/edit";
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

    public function view() {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if((int)$id) {
            $this->data['membertype'] = $this->membertype_m->get_single_membertype(array('membertypeID' => $id));
            if($this->data['membertype']) {
                $this->data["subview"] = "/membertype/view";
                $this->load->view('_layout_main', $this->data);
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function delete() {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if((int)$id) {
            $this->data['membertype'] = $this->membertype_m->get_single_membertype(array('membertypeID' => $id));
            if(count($this->data['membertype'])) {
                $this->membertype_m->delete_membertype($id);
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                redirect(base_url("membertype/index"));
            } else {
                redirect(base_url("membertype/index"));
            }
        } else {
            redirect(base_url("membertype/index"));
        }
    }

    public function print_preview() {
        $id = htmlentities(escapeString($this->uri->segment(3)));
        if((int)$id) {
            $this->data['membertype'] = $this->membertype_m->get_single_membertype(array('membertypeID' => $id));
            if($this->data['membertype']) {
                $this->data['panel_title'] = $this->lang->line('panel_title');
                $this->reportPDF($this->data, '/membertype/print_preview');
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }
    }
    public function send_mail() {
        $id = $this->input->post('id');
        if ((int)$id) {
            $this->data['membertype'] = $this->membertype_m->get_single_membertype(array('membertypeID' => $id));
            if($this->data['membertype']) {
                $email = $this->input->post('to');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');

                $this->reportSendToMail($this->data['membertype'], '/membertype/print_preview', $email, $subject, $message);
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }

    }
}
