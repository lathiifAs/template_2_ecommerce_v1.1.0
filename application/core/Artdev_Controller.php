<?php

defined('BASEPATH') OR exit('No direct script access allowed');
    use Coolpraz\PhpBlade\PhpBlade;
    class Artdev_Controller extends CI_Controller {

        protected $views = APPPATH . 'views';
        protected $cache = APPPATH . 'cache';
        protected $blade;
        protected $tmp_var=[];
        protected $tmp_data;
        protected $tmp_navbar;
        // init portal variable
        protected $portal_id;
        protected $com_portal;
        protected $com_user;
        protected $nav_id = 0;
        protected $nav_url = 0;
        protected $parent_id = 0;
        protected $parent_selected = 0;
        protected $role_tp = array();
    
        public function __construct(){
            parent::__construct();
            $this->load->model('sistem/M_site');
            $this->load->model('sistem/M_user');
            $this->blade = new PhpBlade($this->views, $this->cache);
            
            // display current page
            self::_display_current_page();
            //display authorize
            self::_check_authority();
            // display sidebar navigation
            self::_display_sidebar_navigation();
 
        }

        //template admin
        public function parsing_template($content, $data ='')
        {
            //cek validate login
            if (empty($this->session->userdata('com_user'))) {
                // default error
                $this->notif_msg('sistem/login','Error', 'Harus login terlebih dulu !');
            }else{
                $u_login = array('user_login' => $this->session->userdata('com_user'));
            }

            $content = ['content' => $content];
            //get semget url
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            if (!empty($uri_segments[3])) {
                $segment = array(
                    'seg_menu' => $uri_segments[3]
                );
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $this->tmp_navbar, $segment,$u_login);
            }else{
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data, $this->tmp_navbar, $u_login);
            }
            $all = array('all_data' => $params_parsing); 
            //change name of array to js     
            if (!empty($all['all_data'][0])){
                $all['all_data']['js'] = $all['all_data'][0];
                unset($all['all_data'][0]);
            }  
            //change name of array to css       
            if (!empty($all['all_data'][1])){
                $all['all_data']['css'] = $all['all_data'][1];
                unset($all['all_data'][1]); 
            }  
            $update_params = $all['all_data'];
            // echo "<pre>";print_r($update_params);exit;
            echo $this->blade->view()->make('template/template',  $update_params);
        }

        //template client
        public function client_template($content, $data ='')
        {
            // display current page
            self::_display_current_page_client();
            // display sidebar navigation
            self::_display_sidebar_navigation_client();
            $content = ['content' => $content];
            //get semget url
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            if (!empty($uri_segments[3])) {
                $segment = array(
                    'seg_menu' => $uri_segments[3]
                );
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data,  $this->tmp_navbar, $segment);
            }else{
                $params_parsing = array_merge($content, $this->tmp_var,$data, $this->tmp_data,  $this->tmp_navbar);
            }
            $all = array('all_data' => $params_parsing); 
            //change name of array to js     
            if (!empty($all['all_data'][0])){
                $all['all_data']['js'] = $all['all_data'][0];
                unset($all['all_data'][0]);
            }  
            //change name of array to css       
            if (!empty($all['all_data'][1])){
                $all['all_data']['css'] = $all['all_data'][1];
                unset($all['all_data'][1]); 
            }  
            $update_params = $all['all_data'];
            echo $this->blade->view()->make('client_template/template',  $update_params);
        }

        // //pasring template login
        // public function parsing_template_login($data ='')
        // {
        //     if (!empty($data)) {
        //         echo $this->blade->view()->make('sistem/login',  $data);
        //     }else{
        //         echo $this->blade->view()->make('sistem/login');
        //     }
        // }

        public function parsing_template_custom($content, $data ='')
        {
            if (!empty($data)) {
                echo $this->blade->view()->make($content,  $data);
            }else{
                echo $this->blade->view()->make($content);
            }
        }

        //kirim notifikasi
        public function notif_msg($content, $tipe, $pesan)
        {

            if (!empty($tipe) && !empty($pesan)) {
                if ($tipe == 'Sukses') {
                    $tipe_notif = 'Sukses';
                }else{
                    $tipe_notif = 'Error';
                }
                $data = [
                    'tipe'	=> $tipe_notif,
                    'pesan' => $pesan
                ];
                $this->session->set_userdata('sess_notif', $data);
                redirect($content);
            }
        }

        //parsing url js
        public function parsing_js($data)
        {   
            $result = array();
            if (!empty($data)) {
                foreach ($data as $key) {
                    array_push($result, $key);
                }
                return array_push($this->tmp_var, $result);
            }else{
                return $result;
            }
        }

        //parsing url css
        public function parsing_css($data)
        {
            $result = array();
            if (!empty($data)) {
                foreach ($data as $key) {
                    array_push($result,  $key);
                }
                return array_push($this->tmp_var, $result);
            }else{
                return $result;
            }
        }

        public function parsing($data)
        {
            if (!empty($this->tmp_data)) {
                return array_merge($this->tmp_data, $data);
            }else{
                return $this->tmp_data = $data;
            }
        }
        
        public function parsing_navbar($navbar)
        {
            return $this->tmp_navbar = $navbar;
        }

        //get data login
        public function get_login($key=[])
        {
            $data_login = $this->session->userdata('com_user');
            if (empty($key)) {
                    return $data_login;
            }else{
                    if (is_array($key)){
                        $data = array();
                        foreach ($key as $p_key) {
                            $data[] = $data_login[$p_key];
                        }
                    }else{
                        $data = $data_login[$key];
                    }
                return $data;
            }

        }

        /* --

        System Base
        
        */

        private function _display_current_page() {
            // get current page (segment 1 : folder, segment 2 : sub folder, segment 3 : controller)
            $url_menu = $this->uri->segment(1) . '/' . $this->uri->segment(2);
            if (is_dir(APPPATH . 'controllers' . '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2))) {
                $url_menu .= '/' . $this->uri->segment(3);
            }
            $url_menu = trim($url_menu, '/');
            $url_menu = (empty($url_menu)) ? 'welcome' : $url_menu;
            $result = $this->M_site->get_current_page($url_menu);
            if (!empty($result)) {
                $this->parsing_navbar([
                    'page' => $result
                ]);
                $this->nav_id = $result['nav_id'];
                $this->parent_id = $result['parent_id'];
            }
        }

        private function _display_current_page_client() {
            // get current page (segment 1 : folder, segment 2 : sub folder, segment 3 : controller)
            $url_menu = $this->uri->segment(1) . '/' . $this->uri->segment(2);
            if (is_dir(APPPATH . 'controllers' . '/' . $this->uri->segment(1) . '/' . $this->uri->segment(2))) {
                $url_menu .= '/' . $this->uri->segment(3);
            }
            $url_menu = trim($url_menu, '/');
            $url_menu = (empty($url_menu)) ? 'welcome' : $url_menu;
            $result = $this->M_site->get_current_page($url_menu);
            if (!empty($result)) {
                $this->parsing_navbar([
                    'page' => $result
                ]);
                $this->nav_id = $result['nav_id'];
                $this->nav_url = $result['nav_url'];
                $this->parent_id = $result['parent_id'];
            }
        }

        // authority
        protected function _check_authority() {
            // default rule tp
            $this->role_tp = array("C" => "0", "R" => "0", "U" => "0", "D" => "0");
            // check
            if (!empty($this->get_login())) {
                // user authority
                $params = array($this->get_login('user_id'), $this->nav_id);
                $role_tp = $this->M_site->get_user_authority_by_nav($params);
                // get rule tp
                $i = 0;
                foreach ($this->role_tp as $rule => $val) {
                    $N = substr($role_tp, $i, 1);
                    $this->role_tp[$rule] = $N;
                    $i++;
                }
                
            } else {
                // tidak memiliki authority
                // redirect('sistem/Authorize');
            }
        }
        
        // set rule per pages
        protected function _set_page_rule($rule) {
            
            if (!isset($this->role_tp[$rule]) or $this->role_tp[$rule] != "1") {
                // redirect to forbiden access
                // tidak memiliki authority
                redirect('sistem/Authorize');
            }
        }

        // sidebar navigation
        protected function _display_sidebar_navigation() {
            $html = "";
            // get data
            $params = array($this->get_login('user_id'), 0);
            $rs_id = $this->M_site->get_navigation_user_by_parent($params);
            if (!empty($rs_id)) {
                foreach ($rs_id as $rec) {
                    // check selected
                    $parent_selected = self::_get_parent_group($this->parent_id, $this->parent_selected);
                    if ($parent_selected == 0) {
                        $parent_selected = $this->nav_id;
                    }
                    // get child navigation
                    $child = $this->_get_child_navigation($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                        // $sub_toggle = 'class="sidebar-sub-toggle"';
                        $data_toggle = '<ul aria-expanded="false" class="collapse  first-level base-level-line">';
                        //parse
                        $html .='
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="'.$url_parent.'"
                            aria-expanded="false"><i class="'.$rec['nav_icon'].'"></i><span
                            class="hide-menu">'.$rec['nav_title'].' </span></a>';
                            if (!empty($child)) {
                                $html .= '<ul aria-expanded="false" class="collapse  first-level base-level-line">'.$child.'</ul>';
                            }
                        $html .='</li>';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                        $data_toggle = '';
                        // $sub_toggle = '';
                        $html .='
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="'.$url_parent.'"
                        aria-expanded="false"><i class="'.$rec['nav_icon'].'"></i><span
                            class="hide-menu">'.$rec['nav_title'].'</span></a></li>';
                    }

                }
            }
            // output
            $this->parsing_navbar([
                'list_sidebar_nav' => $html
            ]);
        }

        // menu navigation client
        protected function _display_sidebar_navigation_client() {
            $html = "";
            // get data
            $rs_id = $this->M_site->get_navigation_user_by_parent_client(0);
            if (!empty($rs_id)) {
                foreach ($rs_id as $rec) {
                    // check selected
                    $parent_selected = self::_get_parent_group($this->parent_id, $this->parent_selected);
                    if ($parent_selected == 0) {
                        $parent_selected = $this->nav_url;
                    };
                    // get child navigation
                    $child = $this->_get_child_navigation_client($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                        $sub_toggle = 'class="sidebar-sub-toggle"';
                        $data_toggle = '<span class="sidebar-collapse-icon ti-angle-down"></span>';
                        //parse
                        $html .='
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="'. $url_parent.'" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                            .$rec['nav_title'].
                            '</a>
                            '.$child.'
                        </li>';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                        $data_toggle = '';
                        $sub_toggle = '';
                        //parse 
                        $html .='
                        <li class="nav-item"><a class="nav-link" href="'. $url_parent.'">'.$rec['nav_title'].'</a>
                        '.$child.'
                        </li>';
                    }
                }

                if (!empty($this->get_login())) {
                    if ($this->get_login(['role_id'][0]) < 3) {
                        $html .='
                        <li class="nav-item"><a class="nav-link" href="'.site_url('welcome').'">admin</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="'.site_url('sistem/login/logout').'">logout</a>
                        </li>';
                    }else{
                        $html .='
                        <li class="nav-item"> <a class="nav-link" href="'.site_url('client/profile').'">'.$this->get_login('user_name').'</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="'.site_url('sistem/login/logout').'">logout</a>
                        </li>';
                    }
                }else{
                    $html .='
                    <li class="nav-item"><a class="nav-link" href="'.site_url('sistem/login').'">Login</a>
                    </li>';
                }
            }
            // output
            $this->parsing_navbar([
                'list_navbar'               => $html
            ]);
        }
        
        // utility to get parent selected
        protected function _get_parent_group($int_nav, $int_limit) {
            $selected_parent = 0;
            $result = $this->M_site->get_menu_by_id($int_nav);
            if (!empty($result)) {
                if ($result['parent_id'] == $int_limit) {
                    $selected_parent = $result['nav_id'];
                } else {
                    return self::_get_parent_group($result['parent_id'], $int_limit);
                }
            } else {
                $selected_parent = $result['nav_id'];
            }
            return $selected_parent;
        }

        // get child
        protected function _get_child_navigation($parent_id) {
            $html = '';
            // get parent selected
            $parent_selected = self::_get_parent_group($this->parent_id, $parent_id);
            if ($parent_selected == 0) {
                $parent_selected = $this->nav_id;
            }
            $params = array($this->get_login('user_id'), $parent_id);
            $rs_id = $this->M_site->get_navigation_user_by_parent($params);
            if (!empty($rs_id)) {
                $html .= '<ul>';
                foreach ($rs_id as $rec) {
                    // get child navigation
                    $child = $this->_get_child_navigation($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                    }
                    // parse
                    $html .= '<li class="sidebar-item">';
                    $html .= '<a href="' . $url_parent . '" class="sidebar-link"><span class="hide-menu">'. $rec['nav_title'] . '</span></a>';
                    $html .= $child;
                    $html .= '</li>';
                }
                $html .= '</ul>';
            }
            // return
            return $html;
        }

        // get child
        protected function _get_child_navigation_client($parent_id) {
            $html = '';
            // get parent selected
            $parent_selected = self::_get_parent_group($this->parent_id, $parent_id);
            if ($parent_selected == 0) {
                $parent_selected = $this->nav_id;
            }
            $rs_id = $this->M_site->get_navigation_user_by_parent_client($parent_id);
            if (!empty($rs_id)) {
                $html .= '<div class="dropdown-menu" aria-labelledby="navbarDropdown_1">';
                foreach ($rs_id as $rec) {
                    // get child navigation
                    $child = $this->_get_child_navigation_client($rec['nav_id']);
                    if (!empty($child)) {
                        $url_parent = 'javascript:void(0)';
                    } else {
                        $url_parent = site_url($rec['nav_url']);
                    }
                    // parse
                    $html .= '<a class="dropdown-item"  href="' . $url_parent . '">'. $rec['nav_title'] . '</a>';
                    $html .= $child;
                }
                $html .= '</div>';
            }
            // return
            return $html;
        }

    }
