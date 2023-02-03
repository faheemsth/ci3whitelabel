<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {
/*
| -----------------------------------------------------
| PRODUCT NAME:     INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:           INILABS TEAM
| -----------------------------------------------------
| EMAIL:            info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:        RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:          http://inilabs.net
| -----------------------------------------------------
*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model("signin_m");
        $this->load->model("user_m");
        $this->load->helper('cookie');
        $this->load->library('updatechecker');
        $this->load->model('usertype_m');
        $this->load->model('regtype_m');
        $this->load->model('document_m');   
        $this->load->model('user_m');   
        
        $this->session->set_userdata($this->data["siteinfos"]->language);
        $language = $this->session->userdata('lang');
        $this->lang->load('signin', $language);
        if ( !isset($this->data["siteinfos"]->captcha_status) ) {
            $this->data["siteinfos"]->captcha_status = 1;
        }
    }

    protected function rules()
    {
        $rules = [
            [
                'field' => 'username',
                'label' => "Username",
                'rules' => 'trim|required|max_length[40]|xss_clean'
            ],
            [
                'field' => 'password',
                'label' => "Password",
                'rules' => 'trim|required|max_length[40]|xss_clean'
            ]
        ];

        if ( $this->data["siteinfos"]->captcha_status == 0 ) {
            $rules[] = [
                'field' => 'g-recaptcha-response',
                'label' => "captcha",
                'rules' => 'trim|required'
            ];
        }
        return $rules;
    }

    protected function rules_cpassword() {
        $rules = array(
                array(
                    'field' => 'old_password',
                    'label' => $this->lang->line('old_password'),
                    'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean|callback_old_password_unique'
                ),
                array(
                    'field' => 'new_password',
                    'label' => $this->lang->line('new_password'),
                    'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean'
                ),
                array(
                    'field' => 're_password',
                    'label' => $this->lang->line('re_password'),
                    'rules' => 'trim|required|max_length[40]|min_length[4]|matches[new_password]|xss_clean'
                )
            );
        return $rules;
    }

    public function index() {
            $this->data['users'] = $this->user_m->get_order_by_user(array('status'=>1));
            $this->data['membertype'] = $this->regtype_m->get_order_by_regtype();
            $this->load->view('user/home', $this->data);

    }
    public function signup()
    {   
        if($_POST) {
            {
                $array["name"] = $this->input->post("name");
                $array["email"] = $this->input->post("email");
                $array["phone"] = $this->input->post("phone");
                $array["password"] = $this->user_m->hash($this->input->post("password"));
                $array["active"] = 1;
                // $this->usercreatemail($this->input->post('email'), $this->input->post('username'), $this->input->post('password'));
                
                $this->user_m->insert_user($array);
                echo json_encode($array);
                //$this->session->set_flashdata('success', $this->lang->line('menu_success'));
                //redirect(base_url("signin/signin"));
            }
        }
        else{
            $this->data["subview"] = "signin/signup";
        $this->load->view('_layout_signup', $this->data);
        }  
    }
    public function signin()
    {
       $this->data["subview"] = "signin/signin";
       $this->load->view('_layout_signup', $this->data); 
    }
    public function forget_password()
    {
       $this->data["subview"] = "signin/forget_password";
       $this->load->view('_layout_signup', $this->data); 
    }
    public function registration()
    {
       $this->data["subview"] = "signin/registration";
       $this->load->view('_layout_signup', $this->data); 
    }
    public function dashboard()
    { 
        $this->data["subview"] = "signin/register";
        $this->load->view('_layout_frontend', $this->data); 
    }
    public function cpassword()
    {
        $this->load->library("session");
        if ( $_POST ) {
            $rules = $this->rules_cpassword();
            $this->form_validation->set_rules($rules);
            if ( $this->form_validation->run() == false ) {
                $this->data["subview"] = "signin/cpassword";
                $this->load->view('_layout_main', $this->data);
            } else {
                redirect(base_url('signin/cpassword'));
            }
        } else {
            $this->data["subview"] = "signin/cpassword";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function old_password_unique()
    {
        if ( $this->signin_m->change_password() == true ) {
            return true;
        } else {
            $this->form_validation->set_message("old_password_unique", "%s does not match");
            return false;
        }
    }

    public function signout()
    {
        $this->signin_m->signout();
        $getPreviousData = $this->loginlog_m->get_single_loginlog([
            'userID'     => $this->session->userdata('loginuserID'),
            'usertypeID' => $this->session->userdata('usertypeID'),
            'ip'         => $this->updatechecker->getUserIP(),
            'browser'    => $this->updatechecker->getBrowser()->name,
            'logout'     => null
        ]);

        if ( customCompute($getPreviousData) ) {
            $this->loginlog_m->update_loginlog(['logout' => strtotime(date('YmdHis'))], $getPreviousData->loginlogID);
        }

        if ( $this->data["siteinfos"]->frontendorbackend === 'YES' || $this->data['siteinfos']->frontendorbackend == 1 ) {
            redirect(base_url('frontend/index'));
        } else {
            redirect(base_url("signin/index"));
        }
    }

    private function _setCookie()
    {
        if ( isset($_POST['remember']) ) {
            set_cookie('remember_username', $this->input->post('username'), time() + ( 86400 * 30 ));
            set_cookie('remember_password', $this->input->post('password'), time() + ( 86400 * 30 ));
        } else {
            delete_cookie('remember_username');
            delete_cookie('remember_password');
        }
    }

    private function _userChecker( $username, $password )
    {
        $tables   = [ 
            'user'        => 'user',
            'systemadmin' => 'systemadmin'
        ];
        $userInfo = [ 'info' => [], 'userID' => 0, 'idName' => '' ];
        foreach ( $tables as $table ) {
            $user = $this->user_m->get_user_table($table, $username, $password);
            if ( customCompute($user) ) {
                $id                 = $table . 'ID';
                $userInfo['info']   = $user;
                $userInfo['userID'] = $user->$id;
                $userInfo['idName'] = $table . 'ID';
            }
        }
        return (object) $userInfo;
    }

    private function _signInManager()
    {
        $returnArray         = [ 'return' => true, 'message' => 'Success' ];
        $verifyValidUser     = true;
        $setting             = $this->data['siteinfos'];
        $lang                = $setting->language;
        $defaultSchoolYearID = $setting->school_year;
        $username            = $this->input->post('username');
        $password            = $this->input->post('password');
        $user                = $this->_userChecker($username, $password);
        $userID              = customCompute($user) ? $user->userID : 0;
        $user                = customCompute($user) ? $user->info : [];

        if ( isset($setting->captcha_status) && $setting->captcha_status == 0 ) {
            $captchaResponse = $this->recaptcha->verifyResponse($this->input->post('g-recaptcha-response'));
        } else {
            $captchaResponse = [ 'success' => true ];
        }

        if ( $returnArray['return'] ) {
            if ( $captchaResponse['success'] ) {
                if ( customCompute($user) ) {
                    $userType = $this->usertype_m->get_single_usertype([ 'usertypeID' => $user->usertypeID ]);
                    if ( customCompute($userType) ) {
                        // if ($user->usertypeID != 3) {
                            $this->_loginLog($user->usertypeID, $userID);
                            $session = [
                                "loginuserID"         => $userID,
                                "name"                => $user->name,
                                "email"               => $user->email,
                                "usertypeID"          => $user->usertypeID,
                                'usertype'            => $userType->usertype,
                                "username"            => $user->username,
                                "photo"               => $user->photo,
                                "lang"                => $lang,
                                "defaultschoolyearID" => $defaultSchoolYearID,
                                "varifyvaliduser"     => $verifyValidUser,
                                "user_status"         => $user->active,
                                "loggedin"            => true
                                // "dev_test"            => 'Shuja'
                            ];

                            $this->session->set_userdata($session);


                            $returnArray = [ 'return' => true, 'message' => 'Success' ];
                        // }else{
                        //     $returnArray = [ 'return' => false, 'message' => 'System is in maintainance mode' ];
                        // }
                        // if ( $user->active ) {
                            // $this->_loginLog($user->usertypeID, $userID);
                            // $session = [
                            //     "loginuserID"         => $userID,
                            //     "name"                => $user->name,
                            //     "email"               => $user->email,
                            //     "usertypeID"          => $user->usertypeID,
                            //     'usertype'            => $userType->usertype,
                            //     "username"            => $user->username,
                            //     "photo"               => $user->photo,
                            //     "lang"                => $lang,
                            //     "defaultschoolyearID" => $defaultSchoolYearID,
                            //     "varifyvaliduser"     => $verifyValidUser,
                            //     "user_status"         => $user->active,
                            //     "loggedin"            => true
                            // ];

                            // $this->session->set_userdata($session);
                            // $returnArray = [ 'return' => true, 'message' => 'Success' ];
                        // } else {
                        //     $returnArray = [ 'return' => false, 'message' => 'You are blocked' ];
                        // }
                    } else {
                        $returnArray = [ 'return' => false, 'message' => 'This user role does not exist' ];
                    }
                } else {
                    $returnArray = [ 'return' => false, 'message' => 'Incorrect Signin' ];
                }
            } else {
                $captchaResponseError = ( is_array($captchaResponse['error-codes']) ) ? $captchaResponse['error-codes'][0] : $captchaResponse['error-codes'];
                $returnArray          = [ 'return' => false, 'message' => $captchaResponseError ];
            }
        } else {
            $returnArray = [ 'return' => false, 'message' => $returnArray['message'] ];
        }

        return json_encode($returnArray);
    }

    private function _loginLog( $userTypeID, $userID )
    {
        $getPreviousData = $this->loginlog_m->get_single_loginlog([
            'userID'     => $userID,
            'usertypeID' => $userTypeID,
            'ip'         => $this->updatechecker->getUserIP(),
            'browser'    => $this->updatechecker->getBrowser()->name,
            'logout'     => null
        ]);

        if ( customCompute($getPreviousData) ) {
            $this->loginlog_m->update_loginlog(['logout' => ( $getPreviousData->login + ( 60 * 5 ) )], $getPreviousData->loginlogID);
        }

        $this->loginlog_m->insert_loginlog([
            'ip'              => $this->updatechecker->getUserIP(),
            'browser'         => $this->updatechecker->getBrowser()->name,
            'operatingsystem' => $this->updatechecker->getBrowser()->platform,
            'login'           => strtotime(date('YmdHis')),
            'usertypeID'      => $userTypeID,
            'userID'          => $userID,
        ]);
    }

    private function _updateCodeChecker()
    {
        return $this->updatechecker->verifyValidUser();
    }
}



