<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tpengajuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        self::bindskins();
//        if ($this->session->userdata('logged_in') == FALSE) {
//            redirect('login');
//        }

        $hlp = ['form', 'date'];
        $this->load->helper($hlp);

        $lib = ['form_validation'];
        $this->load->library($lib);

        $this->load->model('tpengajuan_model', 'pmd');
        $this->load->model('tanggota_model', 'amd');
        $this->load->model('tspbsp_model', 'spbspmd');
        $this->load->model('tpinjaman_model', 'pinjamanmd');
        $this->load->model('tpayroll_model', 'payrollmd');
    }

    private function bindskins(){
        $css_head = array(
            array($this->config->item('skins_uri').'css/styles.css'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/assets/owl.carousel.min.css'),
            array($this->config->item('skins_uri').'libs/select2/dist/css/select2.min.css'),
            array($this->config->item('skins_uri').'libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'),
        );
        $js_head = array(
            array($this->config->item('skins_uri').'libs/jquery/dist/jquery.min.js'),
        );
        $js_content  = array(
            array($this->config->item('skins_uri').'js/app.min.js'),
            array($this->config->item('skins_uri').'js/app.init.js'),
            array($this->config->item('skins_uri').'libs/bootstrap/dist/js/bootstrap.bundle.min.js'),
            array($this->config->item('skins_uri').'libs/simplebar/dist/simplebar.min.js'),
            array($this->config->item('skins_uri').'js/sidebarmenu.js'),
            array($this->config->item('skins_uri').'js/theme.js'),
            array($this->config->item('skins_uri').'libs/owl.carousel/dist/owl.carousel.min.js'),
            array($this->config->item('skins_uri').'libs/datatables.net/js/jquery.dataTables.min.js'),
            array($this->config->item('skins_uri').'js/datatable/datatable-basic.init.js'),
            array($this->config->item('skins_uri').'libs/select2/dist/js/select2.full.min.js'),
            array($this->config->item('skins_uri').'js/widget/ui-card-init.js'),
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }

    function index(){
        $get_drd = array();

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Pengajuan',
            'drd' => $get_drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tpengajuan/tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function debug(){
        $date = date('Y-m-d', strtotime('+1 month', strtotime('2015-12-30')));
        echo "<pre>"; print_r($date); echo "</pre>";exit;

        $param = array(
            'txtNomorpengajuan' => '3',
            'txtNik' => '',
            'txtNama' => '',
            'optPlatform' => '',
            'optTipepengajuan' => '',
            'optStatus' => '',
        );
        $param = array();
        $get_drd = $this->pmd->getallpengajuan($param);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Pengajuan',
            'drd' => $get_drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tpengajuan/tpengajuandebug_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function search(){
        if($_POST){
            $post = $_POST;
            $drd = $this->pmd->getallpengajuan($post);
            $data = array(
                'drd' => $drd,

                'userid' => $this->session->userdata('userid'),
                'role' => $this->session->userdata('role'),
                'group' => $this->session->userdata('group'),
                'fullname' => $this->session->userdata('userfullname'),
                'photo' => $this->session->userdata('photo'),
                'position' => $this->session->userdata('position'),
                'joindate' => $this->session->userdata('joindate')
            );
            $this->load->view('modules/tpengajuan/tpengajuan_data', $data, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    function addpengajuan() {
        if (isset($_POST['cmdsave'])) {
            $post = $this->input->post();
            $tipe_pengajuan = $post['optTipepengajuan'];

            if(empty($tipe_pengajuan)){
                $this->session->set_flashdata("msg", $this->alert->alertMsg("failed","Tipe Pengajuan belum dipilih"));
                redirect(base_url($this->router->fetch_class().'/addpengajuan'));
            }else{
                /* anggota baru */
                if($tipe_pengajuan == '1'){
                    $nik = $post['txtNikBaru'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/PB/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikBaru');
                        $this->pmd->strsimpanan_pokok = str_replace('.','',$this->input->post('txtSimpananpokok'));
                        $this->pmd->intbandid = $this->input->post('bandidanggotabaru');
                        $this->pmd->strsimpanan_sukarela = str_replace('.','',$this->input->post('txtSimpanansukarela'));
                        $this->pmd->strnama = $this->input->post('txtNama');
                        $this->pmd->stremail = $this->input->post('txtEmail');
                        $this->pmd->strdivision = $this->input->post('txtDivision');
                        $this->pmd->strsegment = $this->input->post('txtSegment');
                        $this->pmd->strlocation = $this->input->post('txtLocation');
                        $this->pmd->inttelp = $this->input->post('txtTelp');
                        $this->pmd->strbank = $this->input->post('txtBank');
                        $this->pmd->intnorek = $this->input->post('txtNorek');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnama');

                        $path = 'anggotabaru/'.date('Y', strtotime($post['txtTanggalpengajuan'])).'/';
                        $filename = 'NIK-'.strtolower(str_replace(' ','',trim($this->input->post('txtNikBaru'))));
                        $this->pmd->strfile_anggota_baru = $this->doupload($path, $filename, 'txtFileanggotabaru');

                        $this->pmd->inttipe_penarikan = '';
                        $this->pmd->strnominal_penarikan = '';

                        $this->pmd->strnominal_pinjaman_insidentil = '';
                        $this->pmd->intjangka_waktu_insidentil = '';
                        $this->pmd->strfile_pinjaman_insidentil = '';

                        $this->pmd->strnominal_pinjaman_koptel = '';
                        $this->pmd->strjangka_waktu_koptel = '';
                        $this->pmd->strfile_pinjaman_koptel = '';

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        $this->pmd->addpengajuan();
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Anggota Baru berhasil ditambahkan"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Penarikan simpanan */
                if($tipe_pengajuan == '2'){
                    $nik = $post['txtNikPenarikan'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPenarikan'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];
                        $nama_anggota = $get_anggota[0]['name'];

                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/PS/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPenarikan');
                        $this->pmd->strsimpanan_pokok = '';
                        $this->pmd->intbandid = '';
                        $this->pmd->strsimpanan_sukarela = '';
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->stremail = '';
                        $this->pmd->strdivision = '';
                        $this->pmd->strsegment = '';
                        $this->pmd->strlocation = '';
                        $this->pmd->inttelp = '';
                        $this->pmd->strbank = $this->input->post('txtBankPenarikan');
                        $this->pmd->intnorek = $this->input->post('txtNorekPenarikan');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaPenarikan');
                        $this->pmd->strfile_anggota_baru = '';

                        $this->pmd->inttipe_penarikan = $this->input->post('txtTipepenarikan');
                        $this->pmd->strnominal_penarikan = str_replace('.','',$this->input->post('txtNominalpenarikan'));

                        $this->pmd->strnominal_pinjaman_insidentil = '';
                        $this->pmd->intjangka_waktu_insidentil = '';
                        $this->pmd->strfile_pinjaman_insidentil = '';

                        $this->pmd->strnominal_pinjaman_koptel = '';
                        $this->pmd->strjangka_waktu_koptel = '';
                        $this->pmd->strfile_pinjaman_koptel = '';

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan penarikan simpanan';
                        $data_push['body'] = 'Hallo pengajuan penarikan simpanan '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        /*$this->fcm->pushnotif($data_push);*/

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Penarikan Simpanan berhasil dibuat"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Perubahan simpanan */
                if($tipe_pengajuan == '3'){
                    $nik = $post['txtNikPerubahanSimpanan'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPerubahanSimpanan'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];
                        $nama_anggota = $get_anggota[0]['name'];

                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/US/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPerubahanSimpanan');
                        $this->pmd->strsimpanan_pokok = '';
                        $this->pmd->intbandid = $this->input->post('bandidperubahansimpanan');
                        $this->pmd->strsimpanan_sukarela = str_replace('.','',$this->input->post('txtSimpanansukarelaPerubahansimpanan'));
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->stremail = '';
                        $this->pmd->strdivision = '';
                        $this->pmd->strsegment = '';
                        $this->pmd->strlocation = '';
                        $this->pmd->inttelp = '';
                        $this->pmd->strbank = '';
                        $this->pmd->intnorek = '';
                        $this->pmd->stratas_nama = '';
                        $this->pmd->strfile_anggota_baru = '';

                        $this->pmd->inttipe_penarikan = '';
                        $this->pmd->strnominal_penarikan = '';

                        $this->pmd->strnominal_pinjaman_insidentil = '';
                        $this->pmd->intjangka_waktu_insidentil = '';
                        $this->pmd->strfile_pinjaman_insidentil = '';

                        $this->pmd->strnominal_pinjaman_koptel = '';
                        $this->pmd->strjangka_waktu_koptel = '';
                        $this->pmd->strfile_pinjaman_koptel = '';

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan perubahan simpanan';
                        $data_push['body'] = 'Hallo pengajuan perubahan simpanan '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        /*$this->fcm->pushnotif($data_push);*/

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Perubahan Simpanan berhasil dibuat"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Perubahan Data */
                if($tipe_pengajuan == '4'){
                    $nik = $post['txtNikPerubahanData'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPerubahanData'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/PD/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPerubahanData');
                        $this->pmd->strsimpanan_pokok = str_replace('.','',$this->input->post('txtSimpananpokokPerubahanData'));
                        $this->pmd->intbandid = '';
                        $this->pmd->strsimpanan_sukarela = '';
                        $this->pmd->strnama = $this->input->post('txtNamaPerubahanData');
                        $this->pmd->stremail = $this->input->post('txtEmailPerubahanData');
                        $this->pmd->strdivision = $this->input->post('txtDivisionPerubahanData');
                        $this->pmd->strsegment = $this->input->post('txtSegmentPerubahanData');
                        $this->pmd->strlocation = $this->input->post('txtLocationPerubahanData');
                        $this->pmd->inttelp = $this->input->post('txtTelpPerubahanData');
                        $this->pmd->strbank = $this->input->post('txtBankPerubahanData');
                        $this->pmd->intnorek = $this->input->post('txtNorekPerubahanData');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaPerubahanData');
                        $this->pmd->strfile_anggota_baru = '';

                        $this->pmd->inttipe_penarikan = '';
                        $this->pmd->strnominal_penarikan = '';

                        $this->pmd->strnominal_pinjaman_insidentil = '';
                        $this->pmd->intjangka_waktu_insidentil = '';
                        $this->pmd->strfile_pinjaman_insidentil = '';

                        $this->pmd->strnominal_pinjaman_koptel = '';
                        $this->pmd->strjangka_waktu_koptel = '';
                        $this->pmd->strfile_pinjaman_koptel = '';

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan perubahan data';
                        $data_push['body'] = 'Hallo pengajuan perubahan data '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        /*$this->fcm->pushnotif($data_push);*/

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Perubahan Data berhasil dibuat"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Pinjaman Insidentil */
                if($tipe_pengajuan == '5'){
                    $nik = $post['txtNikInsidentil'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikInsidentil'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];
                        $nama_anggota = $get_anggota[0]['name'];

                        $topupid = $this->input->post('txtPinjamanid');
                        if(!empty($topupid)){
                            $pencairan = trim(str_replace('.','',$this->input->post('txtPencairanInsidentil')));
                        }else{
                            $pencairan = trim(str_replace('.','',$this->input->post('txtNominalpinjamaninsidentil')));
                        }

                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/PI/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikInsidentil');
                        $this->pmd->strsimpanan_pokok = '';
                        $this->pmd->intbandid = '';
                        $this->pmd->strsimpanan_sukarela = '';
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->stremail = '';
                        $this->pmd->strdivision = '';
                        $this->pmd->strsegment = '';
                        $this->pmd->strlocation = '';
                        $this->pmd->inttelp = '';
                        $this->pmd->strbank = $this->input->post('txtBankInsidentil');
                        $this->pmd->intnorek = $this->input->post('txtNorekInsidentil');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaInsidentil');
                        $this->pmd->strfile_anggota_baru = '';

                        $this->pmd->inttipe_penarikan = '';
                        $this->pmd->strnominal_penarikan = '';

                        $this->pmd->strnominal_pinjaman_insidentil = trim(str_replace('.','',$this->input->post('txtNominalpinjamaninsidentil')));
                        $this->pmd->strpencairan_insidentil = $pencairan;
                        $this->pmd->strtopupid_insidentil = $topupid;
                        $this->pmd->intjangka_waktu_insidentil = $this->input->post('txtJangkawaktuinsidentil');
                        $this->pmd->strfile_pinjaman_insidentil = $this->input->post('txtFileinsidentil');

                        $this->pmd->strnominal_pinjaman_koptel = '';
                        $this->pmd->strjangka_waktu_koptel = '';
                        $this->pmd->strfile_pinjaman_koptel = '';

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan pinjaman insidentil';
                        $data_push['body'] = 'Hallo pengajuan pinjaman insidentil '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        /*$this->fcm->pushnotif($data_push);*/

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Pinjaman Insidentil berhasil dibuat"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Pinjaman Koptel */
                if($tipe_pengajuan == '6'){
                    $nik = $post['txtNikKoptel'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/addpengajuan'));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikKoptel'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];
                        $nama_anggota = $get_anggota[0]['name'];

                        $formatnum = trim($this->input->post('txtNomorPengajuan')).'/PA/PK/'.date('m').'/'.date('y');
                        $this->pmd->strnomor_pengajuan = $formatnum;

                        $this->pmd->strnik = $this->input->post('txtNikKoptel');
                        $this->pmd->strsimpanan_pokok = '';
                        $this->pmd->intbandid = '';
                        $this->pmd->strsimpanan_sukarela = '';
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->stremail = '';
                        $this->pmd->strdivision = '';
                        $this->pmd->strsegment = '';
                        $this->pmd->strlocation = '';
                        $this->pmd->inttelp = '';
                        $this->pmd->strbank = $this->input->post('txtBankKoptel');
                        $this->pmd->intnorek = $this->input->post('txtNorekKoptel');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaKoptel');
                        $this->pmd->strfile_anggota_baru = '';

                        $this->pmd->inttipe_penarikan = '';
                        $this->pmd->strnominal_penarikan = '';

                        $this->pmd->strnominal_pinjaman_insidentil = '';
                        $this->pmd->intjangka_waktu_insidentil = '';
                        $this->pmd->strfile_pinjaman_insidentil = '';

                        $this->pmd->strnominal_pinjaman_koptel = $this->input->post('txtNominalpinjamankoptel');
                        $this->pmd->strjangka_waktu_koptel = $this->input->post('txtJangkawaktukoptel');
                        $this->pmd->strfile_pinjaman_koptel = $this->input->post('txtFilekoptel');

                        $this->pmd->strstatus = '1';
                        $this->pmd->strnotes = '';
                        $this->pmd->intplatform = '2';
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        $this->pmd->cruser = $this->session->userdata('userid');
                        $this->pmd->crdat = date('Y-m-d H:i:s');
                        $this->pmd->chuser = '';
                        $this->pmd->chdat = '';

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan pinjaman koptel';
                        $data_push['body'] = 'Hallo pengajuan pinjaman koptel '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        /*$this->fcm->pushnotif($data_push);*/

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Pengajuan Pinjaman Koptel berhasil dibuat"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }
            }
        }

        $nik = $this->pmd->getallnik();
        $band = $this->pmd->getallband();
        $lastpengajuan = $this->pmd->getlastpengajuan();
        $addnum = $lastpengajuan[0]['lastnum']+1;
        $newnum = str_pad($addnum, 3, '0', STR_PAD_LEFT);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Tambah Pengajuan',
            'nik' => $nik,
            'band' => $band,
            'lastpengajuan' => $lastpengajuan,
            'newnum' => $newnum,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/add_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function editpengajuan() {
        if (isset($_POST['cmdsave'])) {
            $post = $this->input->post();
            $pengajuanid = $post['txtPengajuanid'];
            $tipe_pengajuan = $post['optTipepengajuan'];

            if(empty($tipe_pengajuan)){
                $this->session->set_flashdata("msg", $this->alert->alertMsg("failed","Tipe Pengajuan belum dipilih"));
                redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
            }else{
                /* anggota baru */
                if($tipe_pengajuan == '1'){
                    $nik = $post['txtNikBaru'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikBaru');
                        $this->pmd->strsimpanan_pokok = str_replace('.','',$this->input->post('txtSimpananpokok'));
                        $this->pmd->intbandid = $this->input->post('bandidanggotabaru');
                        $this->pmd->strsimpanan_sukarela = str_replace('.','',$this->input->post('txtSimpanansukarela'));
                        $this->pmd->strnama = $this->input->post('txtNama');
                        $this->pmd->stremail = $this->input->post('txtEmail');
                        $this->pmd->strdivision = $this->input->post('txtDivision');
                        $this->pmd->strsegment = $this->input->post('txtSegment');
                        $this->pmd->strlocation = $this->input->post('txtLocation');
                        $this->pmd->inttelp = $this->input->post('txtTelp');
                        $this->pmd->strbank = $this->input->post('txtBank');
                        $this->pmd->intnorek = $this->input->post('txtNorek');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnama');
                        $this->pmd->strfile_anggota_baru = $this->input->post('txtFileanggotabaru');
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;

                        $this->pmd->editanggotabaru();
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Penarikan simpanan */
                if($tipe_pengajuan == '2'){
                    $nik = $post['txtNikPenarikan'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPenarikan'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $nama_anggota = $get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPenarikan');
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->strbank = $this->input->post('txtBankPenarikan');
                        $this->pmd->intnorek = $this->input->post('txtNorekPenarikan');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaPenarikan');
                        $this->pmd->inttipe_penarikan = $this->input->post('txtTipepenarikan');
                        $this->pmd->strnominal_penarikan = str_replace('.','',$this->input->post('txtNominalpenarikan'));
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;

                        /* insert table */
                        $this->pmd->editpenarikan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan penarikan simpanan';
                        $data_push['body'] = 'Hallo pengajuan penarikan simpanan '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        $this->fcm->pushnotif($data_push);

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Perubahan simpanan */
                if($tipe_pengajuan == '3'){
                    $nik = $post['txtNikPerubahanSimpanan'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPerubahanSimpanan'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $nama_anggota = $get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPerubahanSimpanan');
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->intbandid = $this->input->post('bandidperubahansimpanan');
                        $this->pmd->strsimpanan_sukarela = str_replace('.','',$this->input->post('txtSimpanansukarelaPerubahansimpanan'));
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        /* insert table */
                        $this->pmd->editsimpanan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan perubahan simpanan';
                        $data_push['body'] = 'Hallo pengajuan perubahan simpanan '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        $this->fcm->pushnotif($data_push);

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Perubahan Data */
                if($tipe_pengajuan == '4'){
                    $nik = $post['txtNikPerubahanData'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikPerubahanData'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikPerubahanData');
                        $this->pmd->strsimpanan_pokok = str_replace('.','',$this->input->post('txtSimpananpokokPerubahanData'));
                        $this->pmd->strnama = $this->input->post('txtNamaPerubahanData');
                        $this->pmd->stremail = $this->input->post('txtEmailPerubahanData');
                        $this->pmd->strdivision = $this->input->post('txtDivisionPerubahanData');
                        $this->pmd->strsegment = $this->input->post('txtSegmentPerubahanData');
                        $this->pmd->strlocation = $this->input->post('txtLocationPerubahanData');
                        $this->pmd->inttelp = $this->input->post('txtTelpPerubahanData');
                        $this->pmd->strbank = $this->input->post('txtBankPerubahanData');
                        $this->pmd->intnorek = $this->input->post('txtNorekPerubahanData');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaPerubahanData');
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        /* insert table */
                        $this->pmd->editdataanggota();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan perubahan data';
                        $data_push['body'] = 'Hallo pengajuan perubahan data '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        $this->fcm->pushnotif($data_push);

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Pinjaman Insidentil */
                if($tipe_pengajuan == '5'){
                    $nik = $post['txtNikInsidentil'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikInsidentil'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $nama_anggota = $get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikInsidentil');
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->strbank = $this->input->post('txtBankInsidentil');
                        $this->pmd->intnorek = $this->input->post('txtNorekInsidentil');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaInsidentil');
                        $this->pmd->strnominal_pinjaman_insidentil = $this->input->post('txtNominalpinjamaninsidentil');
                        $this->pmd->intjangka_waktu_insidentil = $this->input->post('txtJangkawaktuinsidentil');
                        $this->pmd->strfile_pinjaman_insidentil = $this->input->post('txtFileinsidentil');
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        /* insert table */
                        $this->pmd->editinsidentil();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan pinjaman insidentil';
                        $data_push['body'] = 'Hallo pengajuan pinjaman insidentil '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        $this->fcm->pushnotif($data_push);

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }

                /* Pinjaman Koptel */
                if($tipe_pengajuan == '6'){
                    $nik = $post['txtNikKoptel'];
                    if(empty($nik)){
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "NIK Kosong"));
                        redirect(base_url($this->router->fetch_class().'/editpengajuan/'.$pengajuanid));
                    }else{
                        $get_anggota = $this->amd->getanggotaaktif($this->input->post('txtNikKoptel'));
                        $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
                        $nama_anggota = $get_anggota[0]['name'];
                        $token = $get_anggota[0]['token_firebase'];

                        $this->pmd->strnomor_pengajuan = $this->input->post('txtNomorPengajuan');
                        $this->pmd->inttipe_pengajuan = $this->input->post('optTipepengajuan');
                        $this->pmd->strnik = $this->input->post('txtNikKoptel');
                        $this->pmd->strnama = $nama_anggota;
                        $this->pmd->strbank = $this->input->post('txtBankKoptel');
                        $this->pmd->intnorek = $this->input->post('txtNorekKoptel');
                        $this->pmd->stratas_nama = $this->input->post('txtAtasnamaKoptel');
                        $this->pmd->strnominal_pinjaman_koptel = $this->input->post('txtNominalpinjamankoptel');
                        $this->pmd->strjangka_waktu_koptel = $this->input->post('txtJangkawaktukoptel');
                        $this->pmd->strfile_pinjaman_koptel = $this->input->post('txtFilekoptel');
                        $this->pmd->chuser = $this->session->userdata('userid');
                        $this->pmd->chdat = date('Y-m-d H:i:s');
                        $this->pmd->intpengajuanid = $pengajuanid;
                        $this->pmd->strtanggal_pengajuan = date('Y-m-d', strtotime($this->input->post('txtTanggalpengajuan')));

                        /* insert table */
                        $this->pmd->addpengajuan();

                        /* push notif */
                        $data_push['title'] = 'Pengajuan pinjaman koptel';
                        $data_push['body'] = 'Hallo pengajuan pinjaman koptel '. $sapaan_nama_anggota .' dibuat';
                        $data_push['clickAction'] = 'pengajuan';
                        $data_push['token'] = $token;
                        $this->fcm->pushnotif($data_push);

                        $this->session->set_flashdata("msg", $this->alert->alertMsg("success","update berhasil"));
                        redirect(base_url($this->router->fetch_class()));
                    }
                }
            }
        }

        $id = $this->uri->segment(3);
        $pengajuan = $this->pmd->getsinglepengajuan($id);

        $nik = $this->pmd->getallnikaktif();
        $band = $this->pmd->getallband();

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Edit Pengajuan',
            'pengajuan' => $pengajuan,
            'nik' => $nik,
            'band' => $band,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/edit_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function detail() {
        $id = $this->uri->segment(3);
        $pengajuan = $this->pmd->getsinglepengajuan($id);

        $nik = $this->pmd->getallnikaktif();
        $band = $this->pmd->getallband();

        $spb = $this->spbspmd->getsinglespbbypengajuan($id);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Detail Pengajuan',
            'pengajuan' => $pengajuan,
            'nik' => $nik,
            'band' => $band,
            'spb' => $spb,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate'),
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/detail_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function addspb(){
        if (isset($_POST['cmdsave'])) {
            $this->spbspmd->intpengajuanid = $this->input->post('txtPengajuanid');

            $spbd = $this->input->post('txtTanggalspb');
            $intnomor = $this->input->post('txtNomorspb');
            $intmonth = date('m', strtotime($spbd));
            $intyear = date('y', strtotime($spbd));
            $strformat = trim($intnomor) ."/SPB/SP/". $intmonth . "/" . $intyear;

            $this->spbspmd->strnomor = $strformat;
            $this->spbspmd->strnik = $this->input->post('txtNik');
            $this->spbspmd->strnominal = str_replace('.','',$this->input->post('txtNominalspb'));
            $this->spbspmd->strtanggal_spb = date('Y-m-d', strtotime($this->input->post('txtTanggalspb')));
            $this->spbspmd->strtanggal_proses = '';
            $this->spbspmd->intstatus = '2';
            $this->spbspmd->strbukti_transfer = '';

            $this->spbspmd->cruser = $this->session->userdata('userid');
            $this->spbspmd->crdat = date('Y-m-d H:i:s');
            $this->spbspmd->chuser = '';
            $this->spbspmd->chdat = '';

            /* insert table */
            $this->spbspmd->addspb();

            $this->pmd->strstatus = '2';
            $this->pmd->chuser = $this->session->userdata('userid');
            $this->pmd->chdat = date('Y-m-d H:i:s');
            $this->pmd->intpengajuanid = $this->input->post('txtPengajuanid');;

            /* update status pengajuan */
            $this->pmd->editstatus();

            /* push notif */
            $get_anggota = $this->amd->getsingleanggota($_POST['txtNik']);
            $sapaan_nama_anggota = $get_anggota[0]['sapaan'].' '.$get_anggota[0]['name'];
            $data_push['title'] = 'SPB dibuat';
            $data_push['body'] = 'Hallo pengajuan '. $sapaan_nama_anggota .' sudah dibuat SPB, hanya menunggu transfer masuk';
            $data_push['clickAction'] = 'pengajuan';
            $token = $get_anggota[0]['token_firebase'];
            $data_push['token'] = $token;
            /*$this->fcm->pushnotif($data_push);*/

            $this->session->set_flashdata("msg", $this->alert->alertMsg("success","spb berhasil dibuat"));
            redirect(base_url($this->router->fetch_class()));
        }

        $codespb = $this->spbspmd->getlastcodespbsp();
        $addnum = $codespb[0]['last_code_spb']+1;
        $newnum = str_pad($addnum, 3, '0', STR_PAD_LEFT);

        $id = $this->uri->segment(3);
        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Add SPB',
            'pengajuan' => $this->pmd->getsinglepengajuan($id),
            'nik' => $this->pmd->getallnikaktif(),
            'band' => $this->pmd->getallband(),
            'code_spb' => $newnum,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/addspb_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function perubahansimpanan(){
        if (isset($_POST['cmdsave'])) {
            $post = $this->input->post();

            if($post['txtStatus'] == '4'){
                if(empty($post['txtNotes'])){
                    $this->session->set_flashdata("msg", $this->alert->alertMsg("failed","harap kasih catatan"));
                    redirect(base_url().$this->router->fetch_class().'/perubahansimpanan/'.$post['txtPengajuanid']);
                }
            }

            $this->pmd->strnotes = $this->input->post('txtNotes');
            if($post['txtStatus'] == '3'){
                $this->spbspmd->strnotes = '';
            }

            $this->pmd->intpengajuanid = $this->input->post('txtPengajuanid');
            $this->pmd->strstatus = $this->input->post('txtStatus');
            $this->pmd->chuser = $this->session->userdata('userid');
            $this->pmd->chdat = date('Y-m-d H:i:s');

            /* update status pengajuan */
            $this->pmd->editstatusperubahansimpanan();

            /* update tb_tanggota */
            if($post['txtStatus'] == '3'){
                $this->amd->intbandid = $this->input->post('txtBandid');
                $this->amd->strsimpanan_sukarela = str_replace('.','',$this->input->post('txtSimpanansukarela'));
                $this->amd->chuser = $this->session->userdata('userid');
                $this->amd->chdat = date('Y-m-d H:i:s');
                $this->amd->strnik = $this->input->post('txtNik');
                $this->amd->editsimpanansukarela();
            }

            $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Perubahan simpanan berhasil diupdate"));
            redirect(base_url($this->router->fetch_class()));
        }

        $id = $this->uri->segment(3);
        $pengajuan = $this->pmd->getperubahansimpanan($id);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Perubahan Simpanan',
            'pengajuan' => $pengajuan,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/perubahansimpanan_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function perubahandata(){
        if (isset($_POST['cmdsave'])) {
            $post = $this->input->post();

            if($post['txtStatus'] == '4'){
                if(empty($post['notes'])){
                    $this->session->set_flashdata("msg", $this->alert->alertMsg("failed","harap kasih catatan"));
                    redirect(base_url().$this->router->fetch_class().'/perubahansimpanan/'.$post['txtPengajuanid']);
                }
            }

            $this->pmd->strnotes = $this->input->post('txtNotes');
            if($post['txtStatus'] == '3'){
                $this->spbspmd->strnotes = '';
            }

            $this->pmd->intpengajuanid = $this->input->post('txtPengajuanid');
            $this->pmd->strstatus = $this->input->post('txtStatus');
            $this->pmd->chuser = $this->session->userdata('userid');
            $this->pmd->chdat = date('Y-m-d H:i:s');

            /* update status pengajuan */
            $this->pmd->editstatusperubahansimpanan();

            /* update tb_tanggota */
            if($post['txtStatus'] == '3'){
                $this->amd->strname = $this->input->post('txtNamaPerubahanData');
                $this->amd->strsimpanan_pokok = str_replace('.','',$this->input->post('txtSimpananpokokPerubahanData'));
                $this->amd->stremail = $this->input->post('txtEmailPerubahanData');
                $this->amd->strdivision = $this->input->post('txtDivisionPerubahanData');
                $this->amd->strsegment = $this->input->post('txtSegmentPerubahanData');
                $this->amd->strlocation = $this->input->post('txtLocationPerubahanData');
                $this->amd->strtelp = $this->input->post('txtTelpPerubahanData');
                $this->amd->strbank = $this->input->post('txtBankPerubahanData');
                $this->amd->strnorek = $this->input->post('txtNorekPerubahanDataP');
                $this->amd->strnamarek = $this->input->post('atas_nama');

                $this->amd->chuser = $this->session->userdata('userid');
                $this->amd->chdat = date('Y-m-d H:i:s');
                $this->amd->strnik = $this->input->post('txtNik');
                $this->amd->editdata();
            }

            $this->session->set_flashdata("msg", $this->alert->alertMsg("success","Perubahan data berhasil diupdate"));
            redirect(base_url($this->router->fetch_class()));
        }

        $id = $this->uri->segment(3);
        $pengajuan = $this->pmd->getperubahandata($id);

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Perubahan Data',
            'pengajuan' => $pengajuan,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];
        $data['content'] = $this->load->view('modules/tpengajuan/perubahandata_tpengajuan_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function simpanansukarela(){
        $result = array( 'msg' => 'are you need something?','status' => 'failed' );

        $post = $this->input->post();
        if($post){
            $get_simpanan = $this->amd->getanggotaaktif($post['nik']);
            if(empty($get_simpanan)){
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak ditemukan',
                    'data' => '',
                );
            }else{
                $data = $get_simpanan[0];
                $result = array(
                    'status' => 'success',
                    'msg' => 'fetch data berhasil',
                    'data' => $data,
                );
            }
        }

        echo json_encode($result);
    }

    function dataanggota(){
        $result = array( 'msg' => 'are you need something?','status' => 'failed' );

        $post = $this->input->post();
        if($post){
            $get_simpanan = $this->amd->getanggotaaktif($post['nik']);
            if(empty($get_simpanan)){
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak ditemukan',
                    'data' => '',
                );
            }else{
                $data = $get_simpanan[0];
                $result = array(
                    'status' => 'success',
                    'msg' => 'fetch data berhasil',
                    'data' => $data,
                );
            }
        }

        echo json_encode($result);
    }

    function detailspb(){
        $result = array( 'msg' => 'are you need something?','status' => 'failed' );

        $post = $this->input->post();
        if($post){
            $get_spb = $this->spbspmd->getsinglespbbypengajuan($post['pengajuanid']);
            if(empty($get_spb)){
                $result = array(
                    'status' => 'failed',
                    'msg' => 'data tidak ditemukan',
                    'data' => '',
                );
            }else{
                $data = $get_spb[0];
                $result = array(
                    'status' => 'success',
                    'msg' => 'fetch data berhasil',
                    'data' => $data,
                );
            }
        }

        echo json_encode($result);
    }

    function ajaxcheckspb() {
        if (isset($_POST['txtNomorspb'])) {
            $spb = $_POST['txtNomorspb'];
            $results = $this->spbspmd->checkspb($spb);
            if ($results === TRUE) {
                echo 'FALSE';
            } else {
                echo 'TRUE';
            }
        } else {
            echo '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Nomor SPB tidak boleh kosong.</span>';
        }

    }

    function ajaxinfosaldo() {
        $response = array('status' => 'failed','msg' => 'do you need something.?');
        $post = $this->input->post();

        if (isset($post['nik'])) {
            $detail = $this->amd->getsingleanggota($post['nik']);
            if(count($detail) > 0){
                $data = $detail[0];
                $data['total_saldo_simpanan'] = strrev(implode('.',str_split(strrev(strval($data['total_saldo_simpanan'])),3)));
                $data['saldo_tahun_lalu'] = strrev(implode('.',str_split(strrev(strval($data['saldo_simpanan_tahun_lalu_ok'])),3)));
                $response = array(
                    'status' => 'success',
                    'msg' => 'oke',
                    'data' => $data,
                );
            }else{
                $response = array(
                    'status' => 'failed',
                    'msg' => '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Anggota tidak terdaftar.</span>',
                    'data' => array(),
                );
            }
        } else {
            $response = array(
                'status' => 'failed',
                'msg' => '<span class="help-block" style="color: #f39c12;"><i class="fa fa-bell-o"></i> Anggota tidak diketahui.</span>',
                'data' => array(),
            );
        }

        echo json_encode($response);
    }
    
    function ajaxinsidentilaktif(){
        $post = $this->input->post();
        
        if($post){
            $nik = $post['nik'];
            $detail = $this->pinjamanmd->getinsidentilaktif($nik);
        
            if(empty($detail)){
                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }else{
                $data['drd'] = $detail;
                $view = $this->load->view('modules/tpengajuan/ajax_insidentilaktif', $data, TRUE);
        
                $response = array(
                    'status' => 'success',
                    'data' => $detail,
                    'view' => $view,
                    'msg' => 'ajax success',
                );
            }
        
        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }
        
        echo json_encode($response);
    }

    function ajaxrinciantopupinsidentil(){
        $post = $this->input->post();

        if($post){
            $pinjamanid = $post['topupid'];
            $detail = $this->pinjamanmd->getsinglepinjaman($pinjamanid);
            if(count($detail) > 0){
                $pokok = round($detail[0]['nominal_pinjaman']/$detail[0]['jangka_waktu']);
                $getpayroll = $this->payrollmd->getiuraninsidentilbynik($detail[0]['nik'],$detail[0]['mulai'],$detail[0]['berakhir']);
                $totalpayroll = count($getpayroll);
                $volsisaiuran = $detail[0]['jangka_waktu']-$totalpayroll;

                $rincian['nik'] = $detail[0]['nik'];
                $rincian['name'] = $detail[0]['name'];
                $rincian['pinjamanid'] = $pinjamanid;
                $rincian['lama']['mulai'] = $detail[0]['mulai'];
                $rincian['lama']['berakhir'] = $detail[0]['berakhir'];
                $rincian['lama']['nominal'] = $detail[0]['nominal_pinjaman'];
                $rincian['lama']['jw'] = $detail[0]['jangka_waktu'];
                $rincian['lama']['pokok'] = $pokok;

                $sum_komet = 0;
                $sum_koptel = 0;
                $additional_koptel = 0;
                for($i=0; $i<$detail[0]['jangka_waktu']; $i++){
                    $date = date("Y-m-d", strtotime($detail[0]['mulai']." +". $i ." months"));
                    $rincian['lama']['iuran'][$i]['bulan'] = getIndMonth(date('m', strtotime($date))).' '.date('Y', strtotime($date));
                    if (array_key_exists($i,$getpayroll)){
                        $rincian['lama']['iuran'][$i]['pay_insidentil'] = $getpayroll[$i]['iuran_insidentil'];
                        $rincian['lama']['iuran'][$i]['unpay_insidentil'] = 0;
                        $rincian['lama']['iuran'][$i]['date'] = $getpayroll[$i]['tahun'].'-'.$getpayroll[$i]['bulan'].'-01';
                        $rincian['lama']['iuran'][$i]['catatan'] = '';
                    }else{
                        $rincian['lama']['iuran'][$i]['pay_insidentil'] = 0;
                        $rincian['lama']['iuran'][$i]['unpay_insidentil'] = '';
                        $rincian['lama']['iuran'][$i]['date'] = $date;

                        $tagihan = date('m', strtotime($date));
                        $day = date('d');
                        $curmonth = date('m');
                        if($day >= 10 && $tagihan-1 == $curmonth){
                            $sum_komet += 0;
                            $sum_koptel += 0;
                            $rincian['lama']['iuran'][$i]['catatan'] = '(Proses payroll Koptel)';
                        }elseif($day < 10 && $tagihan == $curmonth-1){
                            $sum_komet += 1;
                            $sum_koptel += 0;
                            $additional_koptel -= 1;
                            $rincian['lama']['iuran'][$i]['catatan'] = '(Menunggu Realisasi Koptel)';
                        }else{
                            if($day >= 10 && $tagihan == $curmonth){
                                $sum_komet += 1;
                                $sum_koptel += 0;
                                $rincian['lama']['iuran'][$i]['catatan'] = '(Menunggu Realisasi Koptel)';
                            }elseif($day < 10 && $tagihan == $curmonth){
                                $sum_komet += 1;
                                $rincian['lama']['iuran'][$i]['catatan'] = '(Menunggu Realisasi Koptel)';
                            }else{
                                $sum_komet += 1;
                                $sum_koptel += 1;
                                $rincian['lama']['iuran'][$i]['unpay_insidentil'] = $pokok;
                                $rincian['lama']['iuran'][$i]['catatan'] = '';
                            }
                        }
                    }
                }
                $rincian['lama']['volkomet'] = $sum_komet;
                $rincian['lama']['valkomet'] = $pokok*$sum_komet;
                $rincian['lama']['volkoptel'] = $sum_koptel-$additional_koptel;
                $valkoptel = $pokok*($sum_koptel-$additional_koptel);
                $rincian['lama']['valkoptel'] = $valkoptel;
                $pencairan = $post['nominal']-$valkoptel;

                $rincian['baru']['nominal'] = $post['nominal'];
                $rincian['baru']['jw'] = $post['jw'];
                $rincian['baru']['pencairan'] = $pencairan;
                $rincian['baru']['cicilan'] = round($post['nominal']/$post['jw']);

                $data = $rincian;
                $view = $this->load->view('modules/tpengajuan/ajax_rinciantopupinsidentil', $data, true);

                $response = array(
                    'status' => 'success',
                    'data' => $rincian,
                    'view' => $view,
                    'msg' => 'ajax success',
                );
            }else{

                $response = array(
                    'status' => 'failed',
                    'msg' => 'Data not found in database',
                );
            }

        }else{
            $response = array(
                'status' => 'failed',
                'msg' => 'Unknown data',
            );
        }

        echo json_encode($response);
    }

    function delete(){
        if ($this->input->post()) {
            $this->pmd->delete($_POST['id']);
            echo "success";
        }
    }

    function doupload($additionalpath, $filename, $txtupload)
    {
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $additionalpath;

        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'jpg|png|jpeg|pdf|word',
            'max_size' => '50000',
            'file_ext_tolower' => TRUE,
            'remove_spaces' => TRUE,
            'detect_mime' => TRUE,
            'mod_mime_fix' => TRUE,
            'file_name' => strtolower($filename)
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($txtupload)) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error_doupload',$this->upload->display_errors());
            return FALSE;
        }
    }
}
