<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @property document_m $document_m
 * @property email_m $email_m
 * @property error_m $error_m
 */
class Frontend_Controller extends MY_Controller {
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

    private $_frontendTheme = '';
    private $_frontendThemePath = '';
    private $_frontendThemeBasePath = '';


    protected $bladeView;

    function __construct () {
        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'file'));
        $this->load->library('blade');
        $this->load->library("session");
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('language');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper("frontenddata");
        $this->load->model('frontend_setting_m');
        $this->load->model('setting_m');
        $this->load->model('classes_m');
        $this->load->model('pages_m');
        $this->load->model('posts_m');
        $this->load->model('fmenu_relation_m');
        $this->load->model('fmenu_m');
        $this->load->model('event_m');
        $this->load->model('teacher_m');
        $this->load->model('notice_m');
        $this->load->model('sociallink_m');

        $this->data['backend_setting'] = $this->setting_m->get_setting();
        $this->data['frontend_setting'] = $this->frontend_setting_m->get_frontend_setting();
        $this->data['frontend_topbar'] = $this->fmenu_m->get_single_fmenu(array('topbar' => 1));
        $this->data['frontend_social'] = $this->fmenu_m->get_single_fmenu(array('social' => 1));
        
        $schoolyearID = $this->data['backend_setting']->school_year;
        if($this->session->userdata('defaultschoolyearID')) {
            $schoolyearID = $this->session->userdata('defaultschoolyearID');
        }

        /* Start All Data Call */
        $this->data['events'] = $this->event_m->get_order_by_event(array('schoolyearID' => $schoolyearID));
        $this->data['teachers'] = $this->teacher_m->get_teacher();
        $this->data['notices'] = $this->notice_m->get_order_by_notice(array('schoolyearID' => $schoolyearID));
        $this->data['sociallink'] = pluck_multi_array_key($this->sociallink_m->get_sociallink(), 'obj', 'usertypeID', 'userID');
        $this->data['classes'] = $this->classes_m->general_get_classes();
        $this->data['countrys'] = $this->getCountrys();
        /* Close All Data Call */

        $this->data['homepage'] = $this->pages_m->get_one($this->data['frontend_topbar']);

        $this->data['forntend_pages'] = pluck($this->pages_m->get_pages(), 'obj', 'pagesID');
        $this->data['forntend_posts'] = pluck($this->posts_m->get_posts(), 'obj', 'postsID');
        $this->data['menu'] = $this->callMenu();

        $this->_frontendTheme = strtolower($this->data["backend_setting"]->frontend_theme);;
        $this->_frontendThemePath = 'frontend/'. $this->_frontendTheme.'/';
        $this->_frontendThemeBasePath = FCPATH.'frontend/'. $this->_frontendTheme.'/';

        $this->blade->load_view_root($this->_frontendThemeBasePath);
        $this->bladeView = $this->blade;
        $this->bladeView->set('backend', $this->data['backend_setting']);
        $this->bladeView->set('frontend', $this->data['frontend_setting']);
        $this->bladeView->set('frontendThemePath', $this->_frontendThemePath);

        if ( customCompute($this->data['homepage']) ) {
            $this->data['homepageTitle'] = $this->data['homepage']->menu_label;
            $this->bladeView->set('homepageTitle', $this->data['homepage']->menu_label);
            if ( $this->data['homepage']->menu_typeID == 1 ) {
                $page                       = $this->pages_m->get_single_pages([ 'pagesID' => $this->data['homepage']->menu_pagesID ]);
                $this->data['homepage']     = $page;
                $this->data['homepageType'] = 'page';
                $this->bladeView->set('homepage', $page);
                $this->bladeView->set('homepageType', 'page');
            } elseif ( $this->data['homepage']->menu_typeID == 2 ) {
                $post                       = $this->posts_m->get_single_posts([ 'postsID' => $this->data['homepage']->menu_pagesID ]);
                $this->data['homepage']     = $post;
                $this->data['homepageType'] = 'post';
                $this->bladeView->set('homepage', $post);
                $this->bladeView->set('homepageType', 'post');
            } else {
                $nonehomepage           = (object) [ 'url' => '' ];
                $this->data['homepage'] = $nonehomepage;
                $this->bladeView->set('homepage', $nonehomepage);
                $this->bladeView->set('homepageType', 'none');
            }
        } else {
            $nonehomepage                = (object) [ 'url' => '' ];
            $this->data['homepage']      = $nonehomepage;
            $this->data['homepageTitle'] = '';
            $this->bladeView->set('homepage', $nonehomepage);
            $this->bladeView->set('homepageType', 'none');
            $this->bladeView->set('homepageTitle', $this->data['homepageTitle']);
        }

        $this->bladeView->set('events', $this->data['events']);
        $this->bladeView->set('teachers', $this->data['teachers']);
        $this->bladeView->set('notices', $this->data['notices']);
        $this->bladeView->set('sociallink', $this->data['sociallink']);
        $this->bladeView->set('classes', $this->data['classes']);
        $this->bladeView->set('countrys', $this->data['countrys']);
        $this->bladeView->set('fpages', $this->data['forntend_pages']);
        $this->bladeView->set('fposts', $this->data['forntend_posts']);
        $this->bladeView->set('menu', $this->data['menu']);
        $this->bladeView->set('schoolyearID', $schoolyearID);
    }

    private function callMenu() {
        $frontendTopbarMenu = [];
        $frontendSocialMenu = [];
        $frontendTopbarQueryMenus = [];
        $frontendSocialQueryMenus = [];
        if(customCompute($this->data['frontend_topbar'])) {
            $frontendTopbarQueryMenus = $this->fmenu_relation_m->get_order_by_fmenu_relation(array('fmenuID' => $this->data['frontend_topbar']->fmenuID));
            $frontendTopbarMenu = $this->orderMenu($frontendTopbarQueryMenus);
        }

        if(customCompute($this->data['frontend_topbar'])) {
            if($this->data['frontend_topbar']->social == 1) {
                $frontendSocialMenu = $frontendTopbarMenu;
                $frontendSocialQueryMenus = $frontendTopbarQueryMenus;
            } else {
                if(customCompute($this->data['frontend_social'])) {
                    $frontendSocialQueryMenus = $this->fmenu_relation_m->get_order_by_fmenu_relation(array('fmenuID' => $this->data['frontend_social']->fmenuID));
                    $frontendSocialMenu = $this->orderMenu($frontendSocialQueryMenus);
                }
            }
        } else {
            if(customCompute($this->data['frontend_social'])) {
                $frontendSocialQueryMenus = $this->fmenu_relation_m->get_order_by_fmenu_relation(array('fmenuID' => $this->data['frontend_social']->fmenuID));
                $frontendSocialMenu = $this->orderMenu($frontendSocialQueryMenus);
            }
        }

        $returnArray = array('frontendTopbarMenus' => $frontendTopbarMenu, 'frontendSocialMenus' => $frontendSocialMenu, 'frontendTopbarQueryMenus' => $frontendTopbarQueryMenus, 'frontendSocialQueryMenus' => $frontendSocialQueryMenus);

        return $returnArray;
    }

    private function orderMenu($elements) {
        $mergeElements = [];
        if(customCompute($elements)) {
            $elements = json_decode(json_encode($elements), true);

            if(customCompute($elements)) {
                foreach ($elements as $elementKey => $element) {
                    if($element['menu_parentID'] == 0) {
                        $mergeElements[] = $element;
                        unset($elements[$elementKey]);
                    }
                }

                foreach ($elements as $elementKey => $element) {
                    if(customCompute($mergeElements)) {
                        foreach ($mergeElements as $mergeElementKey =>  $mergeElement) {
                            if($element['menu_rand_parentID'] == $mergeElement['menu_rand']) {
                                $mergeElements[$mergeElementKey]['child'][] = $element;
                                unset($elements[$elementKey]);
                            }       
                        }
                    }
                }
                
                foreach ($elements as $elementKey => $element) {
                    if(customCompute($mergeElements)) {
                        foreach ($mergeElements as $mergeElementKey =>  $mergeElement) {
                            if(isset($mergeElement['child'])) {
                                if(customCompute($mergeElement['child'])) {
                                    foreach ($mergeElement['child'] as $secondLayerKey => $secondLayer) {
                                        if($secondLayer['menu_rand'] == $element['menu_rand_parentID']) {
                                            $mergeElements[$mergeElementKey]['child'][$secondLayerKey]['child'][] = $element;
                                        }
                                    }
                                }
                            }       
                        }
                    }
                }
            }
        }

        return $mergeElements;
    }


}

