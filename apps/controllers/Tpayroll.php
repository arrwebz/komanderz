<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tpayroll extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        self::bindskins();
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }

        $hlp = ['form', 'date'];
        $this->load->helper($hlp);

        $lib = ['form_validation', 'PHPExcel'];
        $this->load->library($lib);

        $this->load->model('tpayroll_model', 'payrollmd');
        $this->load->model('tpengajuan_model', 'pmd');
        $this->load->model('tpinjaman_model', 'pinjamanmd');
        $this->load->model('tanggota_model', 'amd');
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
            'brand' => 'Payroll Anggota',
            'drd' => $get_drd,

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tpayroll/tpayroll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function search(){
        if($_POST){
            $post = $_POST;
            $drd = $this->payrollmd->getallpayroll($post);
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
            $this->load->view('modules/tpayroll/tpayroll_data', $data, FALSE);
        }else{
            echo 'Are You Need Something.?';
        }
    }

    function import(){
        if (isset($_FILES["txtFileImport"]["name"])) {
            $path = $_FILES["txtFileImport"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

            foreach($object->getWorksheetIterator() as $worksheet) {
                $title = $worksheet->getTitle();
                $a1 = $worksheet->getCell('A1')->getValue();
                $a2 = $worksheet->getCell('A2')->getValue();
                if($a1 == 'DAFTAR POTONGAN PAYROLL KARYAWAN' && $a2 == 'MELALUI KOPTEL'){
                    $bulan_tahun = $worksheet->getCell('A3')->getValue();
                    $clear_bt = trim(str_replace('BULAN : ', '', $bulan_tahun));

                    $length = strlen($clear_bt) - 4;
                    $length_bulan = substr($clear_bt, 0, $length);

                    $bulan = monthNumber($length_bulan);
                    $tahun = substr($clear_bt, -4, 4);
                    $note_payroll = 'Periode '.$clear_bt;

                    if(is_numeric($bulan)){

                        $cekpayroll = $this->payrollmd->cekpayrolexist($bulan, $tahun);
                        if(empty($cekpayroll[0]['totalpayrol'])){
                            $highestRow = $worksheet->getHighestRow();
                            $highestColumn = $worksheet->getHighestColumn();

                            $temp_array = array();
                            for($row=6; $row<=$highestRow; $row++){
                                $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                                $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                $iuran_simpanan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                $iuran_bank = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                $iuran_insidentil = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                                $total_payroll = $worksheet->getCellByColumnAndRow(13, 8)->getOldCalculatedValue();
                                $note_anggota = trim(addslashes($worksheet->getCellByColumnAndRow(15, $row)->getValue()));

                                if(is_numeric($nik) && is_numeric($iuran_simpanan)) {
                                    $temp_array[$row]['nik'] = $nik;
                                    $temp_array[$row]['nama'] = $nama;
                                    $temp_array[$row]['iuran_simpanan'] = $iuran_simpanan;
                                    $temp_array[$row]['iuran_bank'] = $iuran_bank;
                                    $temp_array[$row]['iuran_insidentil'] = $iuran_insidentil;
                                    $temp_array[$row]['note_anggota'] = $note_anggota;
                                    $temp_array[$row]['note_payroll'] = $note_payroll;

                                    /* start anggota baru */
                                    $get_pengajuan_anggota = $this->pmd->getanggotabaru($nik);
                                    if (count($get_pengajuan_anggota) > 0) {
                                        $pengajuan_anggota = $get_pengajuan_anggota[0];
                                        /* tambahkan ke tb_tanggota */
                                        $this->amd->strnik = $pengajuan_anggota['nik'];
                                        $this->amd->strsapaan = 'bapak/ibu';
                                        $this->amd->strname = $pengajuan_anggota['nama'];
                                        $this->amd->strdivision = $pengajuan_anggota['division'];
                                        $this->amd->strsegment = $pengajuan_anggota['segment'];
                                        $this->amd->intbandid = $pengajuan_anggota['bandid'];
                                        $this->amd->strsimpanan_pokok = $pengajuan_anggota['simpanan_pokok'];
                                        $this->amd->strsimpanan_sukarela = $pengajuan_anggota['simpanan_sukarela'];
                                        $this->amd->stremail_corp = $pengajuan_anggota['email'];
                                        $this->amd->stremail = $pengajuan_anggota['email'];
                                        $this->amd->strpassword = '';                               /* pehatikan ini */
                                        $this->amd->strtelp = $pengajuan_anggota['telp'];
                                        $this->amd->strlocation = $pengajuan_anggota['location'];
                                        $this->amd->strbank = $pengajuan_anggota['bank'];
                                        $this->amd->strnorek = $pengajuan_anggota['norek'];
                                        $this->amd->strnamarek = $pengajuan_anggota['atas_nama'];
                                        $this->amd->strjoinmonth = $bulan;
                                        $this->amd->strjoinyear = $tahun;
                                        $this->amd->inttipe_anggota = '1';
                                        $this->amd->strstatus = '1';
                                        $this->amd->strnotes = $note_anggota;
                                        $this->amd->strtoken_firebase = '';
                                        $this->amd->cruser = $this->session->userdata('userid');
                                        $this->amd->crdat = date('Y-m-d H:i:s');
                                        $this->amd->chuser = '';
                                        $this->amd->chdat = '';
                                        /* insert */
                                        $this->amd->adddata();

                                        /* update pengajuan status selesai */
                                        $this->pmd->strstatus = '3';
                                        $this->pmd->chuser = $this->session->userdata('userid');
                                        $this->pmd->chdat = date('Y-m-d H:i:s');
                                        $this->pmd->intpengajuanid = $pengajuan_anggota['pengajuanid'];
                                        /* update */
                                        $this->pmd->editstatus();
                                    }
                                    /* end anggota baru */

                                    /* start check iuran simpanan terpotong atau tidak */
                                    /* jika iuran simpanan tidak terpotong, update status tb_tanggota ke 3/konfirmasi */
                                    if (empty($iuran_simpanan)) {
                                        $get_anggota = $this->amd->gettipeanggotaaktif($nik);
                                        if(count($get_anggota) > 0){
                                            if($get_anggota[0]['status'] == '1'){
                                                /* hanya aktif yang bisa berubah ke konfirmasi */
                                                $this->amd->strnik = $nik;
                                                $this->amd->strstatus = '3';
                                                $this->amd->strnotes = $note_anggota;
                                                $this->amd->chuser = $this->session->userdata('userid');
                                                $this->amd->chdat = date('Y-m-d H:i:s');
                                                /* update */
                                                $this->amd->editstatus();
                                            }
                                        }
                                    }
                                    /* end check iuran simpanan terpotong atau tidak */

                                    /* pada saat payroll insert jika ada kolom insindetil, cek nik di table pinjaman yg status 1 hutang jika masa berakhir sama dengan bulan tahun skrg update tb pinjaman status 2 Lunas. */
                                    if(!empty($iuran_insidentil) && !empty($total_payroll)){
                                        $cekinsindetilberakhir = $this->pinjamanmd->getinsidentilberakhir($nik, $bulan, $tahun);
                                        if(count($cekinsindetilberakhir) > 0){
                                            $this->pinjamanmd->updatelunaspayroll($cekinsindetilberakhir[0]['pinjamanid']);
                                        }
                                    }

                                    /* start add payroll */
                                    $this->payrollmd->strnik = $nik;
                                    $this->payrollmd->striuran_simpanan = $iuran_simpanan;
                                    $this->payrollmd->striuran_bank = $iuran_bank;
                                    $this->payrollmd->striuran_insidentil = $iuran_insidentil;
                                    $this->payrollmd->strbulan = $bulan;
                                    $this->payrollmd->strtahun = $tahun;
                                    $this->payrollmd->strnote_payroll = $note_payroll;
                                    $this->payrollmd->strtipe_payroll = 1;
                                    $this->payrollmd->strbukti_transfer_simpanan = '';
                                    $this->payrollmd->strbukti_transfer_bank = '';
                                    $this->payrollmd->strbukti_transfer_insidentil = '';
                                    $this->payrollmd->intstatus = '1';
                                    $this->payrollmd->cruser = $this->session->userdata('userid');
                                    $this->payrollmd->crdat = date('Y-m-d H:i:s');
                                    $this->payrollmd->chuser = '';
                                    $this->payrollmd->chdat = '';
                                    $this->payrollmd->addpayroll();
                                    /* end add payroll */
                                }else{
                                    $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "ada format nik / payroll simpanan yang salah"));
                                    redirect(base_url($this->router->fetch_class().'/import'));
                                }
                            }

                            /* start save file excel to storage */
                            /* end save file excel to storage */

                            $this->session->set_flashdata("msg", $this->alert->alertMsg("success", "Payroll berhasil ditambahkan, silahkan update ke production"));
                            redirect(base_url($this->router->fetch_class()));
                        }else{
                            $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "Sentralisasi ". getIndMonth($bulan) ." ". $tahun ." sudah ada dalam database"));
                            redirect(base_url($this->router->fetch_class().'/import'));
                        }
                    }else{
                        $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "Bulan tidak diketahui"));
                        redirect(base_url($this->router->fetch_class().'/import'));
                    }
                }else{
                    $this->session->set_flashdata("msg", $this->alert->alertMsg("failed", "File tidak sesuai"));
                    redirect(base_url($this->router->fetch_class().'/import'));
                }
            }
        }

        $data = [
            'title' => 'ANGGOTA',
            'brand' => 'Import Payroll Anggota',

            'userid' => $this->session->userdata('userid'),
            'role' => $this->session->userdata('role'),
            'group' => $this->session->userdata('group'),
            'fullname' => $this->session->userdata('userfullname'),
            'photo' => $this->session->userdata('photo'),
            'position' => $this->session->userdata('position'),
            'joindate' => $this->session->userdata('joindate')
        ];

        $data['content'] = $this->load->view('modules/tpayroll/import_tpayroll_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }

    function delete(){
        if ($this->input->post()) {
            $this->payrollmd->delete($_POST['id']);
            echo "success";
        }
    }

}
