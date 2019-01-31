<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend
{

    public function index()
    {
        $this->data['produk'] = $this->produkModel->get();

        $this->blade->view("homepage", $this->data);
    }

    public function produk_list($offset = 0)
    {
        $this->data['categori'] = $this->kategoriModel->get();
        $this->data['related'] = $this->viewStokModel->get(false, 6, false, [], ['rand()']);

        $page = $this->uri->segment(3);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $num_rows = $this->viewStokModel->count();

        $this->data["paginator"] = $this->pagination($num_rows, $limit);

        $this->data['produk'] = $this->viewStokModel->get(false, $limit, $offset);

        $this->blade->view('produk_list', $this->data);
    }

    public function kategori($id_kategori = '', $offset = 0)
    {

        $this->data['categori'] = $this->kategoriModel->get();
        $this->data['related'] = $this->produkModel->get(false, 6, false, [], ['rand()']);

        $page = $this->uri->segment(4);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $num_rows = $this->produkModel->count(['id_kategori' => $id_kategori]);

        $this->data["paginator"] = $this->pagination($num_rows, $limit);

        $this->data['produk'] = $this->produkModel->get(false, $limit, $offset, ['id_kategori' => $id_kategori]);

        $this->blade->view('produk_list', $this->data);
    }

    public function detail($id_produk)
    {
        $this->data['produk'] = $this->viewStokModel->get($id_produk);
        $this->data['related'] = $this->viewStokModel->get(false, 6, false, [], ['rand()']);

        $this->blade->view('detail', $this->data);
    }

    public function about()
    {
        $this->blade->view("about", $this->data);
    }

    public function contact()
    {
        $this->blade->view('contact', $this->data);
    }

    public function replacepasword()
    {
        $hash = $this->input->get("hash");

        if ($hash !== false) {
            $data_konstumer = $this->konsumenModel->getResetPassword($hash);

            var_dump($data_konstumer);
        }
    }

    public function lupapassword()
    {
        if ($this->input->post("email") !== false) {
            $email = $this->input->post("email");

            $tmp_forgot_password = $this->randomPassword();

            $costumer = $this->konsumenModel->getEmail($email);

            if ($costumer != null) {
                $this->konsumenModel->put($costumer->id_konsumen, [
                    'tmp_forgot_password' => $tmp_forgot_password,
                ]);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => '',
                    'smtp_pass' => '',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                );

                $this->load->library('email');
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from("wahyu.creator911@gmail.com");
                $this->email->to("wahyu.creator911@gmail.com");

                $this->email->subject("Reset Password");
                $this->email->message("Testing reset email " . $tmp_forgot_password);

                if ($this->email->send()) {
                    echo "berhasil mengirim data";
                } else {
                    echo $this->email->print_debugger(array('headers'));
                    echo "tidak berhasil mengirim data";
                }
            } else {
                $this->data["email_not_exists"] = "Email tidak ditemukan !";
            }

        } else {
            $this->blade->view("forgotpassword", $this->data);
        }
    }

    private function randomPassword()
    {
        $digit = 15;
        $karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

        srand((double) microtime() * 1000000);
        $i = 0;
        $pass = "";
        while ($i <= $digit - 1) {
            $num = rand() % 32;
            $tmp = substr($karakter, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }

}
