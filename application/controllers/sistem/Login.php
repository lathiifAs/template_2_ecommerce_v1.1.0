<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Coolpraz\PhpBlade\PhpBlade;

class Login extends Artdev_Controller{

    public function __construct()
    {        
        parent::__construct();

        //load models
        $this->load->model('sistem/M_user');
    }


    public function index()
	{
        //default notif
        $notif = $this->session->userdata('sess_notif');
		$data = [
			'tipe'	=> $notif['tipe'],
			'pesan' => $notif['pesan']
		];
		//delete session notif
		$this->session->sess_destroy('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template_custom('sistem/login', $data);
    }
    
    // login process
    public function login_process() {
        // cek input
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // process
        if ($this->form_validation->run() !== FALSE) {
            // params
            $username = trim($this->input->post('username', true));
            $password = trim($this->input->post('password', true));
    	    // get user detail
            $result = $this->M_user->get_user_login_all_roles($username, $password);
            //cek
            if (!empty($result)) {
                // cek lock status
                if ($result['user_st'] == 2) {
                    // default error
                    $this->notif_msg('sistem/login','Error', 'Akun anda terkunci !');
                }
                elseif($result['user_st'] == 0){
                    $this->notif_msg('sistem/login','Error', 'Akun belum aktif !');
                }
                // set session
                $this->session->set_userdata('com_user', $result);
                redirect($result['default_page']);
                // $this->tsession->set_userdata('session_pjp2u', array(
                //     'user_id' => $result['user_id'],
                //     'role_id' => $result['role_id'],
                //     'default_page' => $result['default_page'],
                // ));
                // // insert login time
                // $this->m_account->save_user_login($result['user_id'], $_SERVER['REMOTE_ADDR']);
                // $this->tsession->unset_userdata("data");
                // // redirect
                // redirect($result['default_page']);
            } else {
                // default error
                $this->notif_msg('sistem/login','Error', 'Username atau password salah !');
            }
            // captcha
	    /*
            $captcha = $this->input->post('captcha', true);
            $captcha_data = $this->tsession->userdata('data');
            $expiration = time() - 7200;
            if ($captcha_data['word'] == $captcha AND $captcha_data['ip_address'] == $_SERVER["REMOTE_ADDR"] AND $captcha_data['captcha_time'] > $expiration) {
                // get user detail
                $result = $this->m_account->get_user_login_all_roles($username, $password, $this->portal_id);
                // check
                if (!empty($result)) {
                    // cek lock status
                    if ($result['user_st'] == 'non aktif') {
                        // default error
                        $this->tnotification->sent_notification("error", "Maaf akun anda telah terkunci!");
                        // redirect
                        redirect('login/welcome');
                    }
                    // set session
                    $this->tsession->set_userdata('session_pjp2u', array(
                        'user_id' => $result['user_id'],
                        'role_id' => $result['role_default'],
                        'default_page' => $result['default_page'],
                    ));
                    // insert login time
                    $this->m_account->save_user_login($result['user_id'], $_SERVER['REMOTE_ADDR']);
                    // clear captcha
                    $capctha_path = 'resource/doc/captcha/' . $captcha_data['captcha_time'] . '.jpg';
                    if (is_file($capctha_path)) {
                        unlink($capctha_path);
                    }
                    $this->tsession->unset_userdata("data");
                    // make directory temporary
                    $path = "resource/temp/" . $result['user_id'];
                    if (!is_dir($path)) {
                        //create the folder if it's not already exists
                        mkdir($path, 0777, TRUE);
                    } else {
                        $path = "resource/temp/" . $result['user_id'];
                        $this->tupload->remove_dir($path);
                        // delete all files/folders
                        mkdir($path, 0777, TRUE);
                    }
                    // redirect
                    redirect($result['default_page']);
                } else {
                    // default error
                    $this->tnotification->sent_notification("error", "Username / Password Tidak Ditemukan!");
                }
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Captcha tidak tepat!");
            }
	    */
        } else {
            // default error
            $this->notif_msg('sistem/login','Error', 'Form tidak lengkap !');
        }
    }

    public function logout()
    {
        // set session
        $this->session->sess_destroy();
        redirect('sistem/login');
    }

}