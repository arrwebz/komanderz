<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assets extends CI_Controller
{
	public $intassetid;
	public $intcategoryid;
	public $intastypeid;
	public $intastbrandid;
	
	public $strcategory;
	public $strtype;
	public $strbrand;
	
	public $strassetname;
	public $strseries;
	public $strspec;
	public $strserialnumber;
	public $strcolor;
	public $strassetcondition;
	public $strprice;
	public $strassetdate;
	public $strpurchasedate;
	public $strwarranty;
	public $stramount;
	public $strnotes;
	public $struser;	
	public $strlocation;
	public $strphoto;
	public $intstatus;
	
    public $strcruser;
    public $strcrdat;
	public $strchuser;
    public $strchdat;

    public function __construct()
    {
        parent::__construct();
		self::bindskins();
		if ($this->session->userdata('logged_in') == FALSE) {
            redirect('login');
        }
		$hlp = [
            'form',
            'date'
        ];
        $this->load->helper($hlp);
        $lib = [
            'form_validation'
        ];
        $this->load->library($lib);
		$this->load->model('Assets_model', 'astmd');
		$this->load->model('Dropdown_model', 'drdmd'); 
		$this->load->model('Report_model', 'repmd');
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
            array($this->config->item('skins_uri').'libs/sweetalert/sweetalert.min.js'),
            array($this->config->item('skins_uri').'libs/lazyload/vanilla-lazyload-8.17.0.min.js'),
        );

        $this->carabiner->group('css_head', array('css'=>$css_head));
        $this->carabiner->group('js_head', array('js'=>$js_head));
        $this->carabiner->group('js_content', array('js'=>$js_content));
    }
	
	public function index() {
		$data = [ 
			'drd' => $this->astmd->getallassets(),
			'cat' => $this->drdmd->getallcategory(),
			'type' => $this->drdmd->getalltype(),
			'brandname' => $this->drdmd->getallbrand(),
			'title' => 'Daftar Aktiva',
			'brand' => 'Perusahaan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		
		$data['content'] = $this->load->view('modules/assets/assets_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
    }
	
	public function detail() {
		$drd = $this->astmd->getsingleassets($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intassetid = $row['assetid'];
				$this->strcategory = $row['categoryname'];
				$this->strtype = $row['typename'];
				$this->strbrand = $row['brandname'];
				
				
				$this->strassetname = $row['assetname'];
				$this->strseries = $row['series'];
				$this->strspec = $row['spec'];
				$this->strserialnumber = $row['serialnumber'];
				$this->strcolor = $row['color'];
				$this->strassetcondition = $row['assetcondition'];
				$this->strprice = $row['price'];
				$this->strassetdate = $row['assetdate'];
				$this->strpurchasedate = date('d-m-Y', strtotime($row['purchasedate'])); 
				$this->strwarranty = $row['warranty'];
				$this->stramount = $row['amount'];
				$this->strnotes = $row['notes'];
				$this->struser = $row['user'];	
				$this->strlocation = $row['location'];
				$this->strphoto = $row['photo'];
				$this->intstatus = $row['status'];
                
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }
		
		$data = [
            'assetid' => $this->intassetid,
            'catname' => $this->strcategory,
			'typename' => $this->strtype,
			'brandname' => $this->strbrand,
			'assetname' => $this->strassetname,
             'seri' =>   $this->strseries,
             'spec' =>   $this->strspec,
             'serialnumber' =>  $this->strserialnumber,
			 'color' => $this->strcolor,
			 'condition' => $this->strassetcondition,
			 'price' =>	strrev(implode('.',str_split(strrev(strval($this->strprice)),3))),
			 'assetdate' => $this->strassetdate,			 
			 'purchasedate' => $this->strpurchasedate,			 
			 'warranty' => $this->strwarranty,			 
			 'amount' => $this->stramount,			 
			 'notes' => $this->strnotes,			 
			 'client' => $this->struser,			 
			 'location' => $this->strlocation,	
			 'assetphoto' => $this->strphoto,			 
			'status' =>	$this->intstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
            'title' => 'Detail Aktiva',
			'brand' => 'Perusahaan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/assets/detail_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function add() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtSeries', 'Seri', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->astmd->intastypeid = $this->input->post('optType');
				$this->astmd->intastbrandid = $this->input->post('optBrand');
				$this->astmd->strassetname = $this->input->post('txtName');
				$this->astmd->strseries = $this->input->post('txtSeries');
				$this->astmd->strspec = $this->input->post('txtSpecs');
				$this->astmd->strserialnumber = $this->input->post('txtSerialnum');
				$this->astmd->strcolor = $this->input->post('optColor');
				$this->astmd->strassetcondition = $this->input->post('optCondition');
				$this->astmd->strassetdate = $this->input->post('txtAssetdate');
				
				$p = $this->input->post('txtPrice');
				$this->astmd->strprice =  str_replace(".", "", $p);	
				$prdat = $this->input->post('txtPricedate');
				$this->astmd->strpurchasedate = date('Y-m-d', strtotime($prdat)); 
				
				$this->astmd->strwarranty = $this->input->post('txtWarranty');
				$this->astmd->stramount = $this->input->post('txtAmount');
				$this->astmd->struser = $this->input->post('txtUser');
				$this->astmd->strlocation = $this->input->post('optLocation');
				$this->astmd->strnotes = $this->input->post('txtNotes');
								
				if (! empty($_FILES['txtPhoto']['name'])) {
                    $this->astmd->strphoto = $this->doupload();
                }
				
				$this->astmd->intstatus = $this->input->post('optStatus');
				
				
                $this->astmd->strcruser = $this->session->userdata('userid');
                $this->astmd->strcrdat = mdate($datestring, $time);
				$this->astmd->strchuser = '';
                $this->astmd->strchdat = '';
				
                $this->astmd->addassets();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		$data = [ 
			'type' => $this->drdmd->getalltype(),
			'brandname' => $this->drdmd->getallbrand(),
			'title' => 'Tambah Aktiva',
			'brand' => 'Aktiva Perusahaan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
		];
		$data['content'] = $this->load->view('modules/assets/add_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	public function edit() {
		if (isset($_POST['cmdsave'])) {
            
            $error = [
                'required' => '<div style="color:red;"> %s still empty!</div>'
            ];
            $this->form_validation->set_rules('txtSeries', 'Seri', 'required', $error);
            if ($this->form_validation->run() == TRUE) {
                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
				
				$this->astmd->intassetid = $this->input->post('hdnAssetid');
				$this->astmd->intastypeid = $this->input->post('optType');
				$this->astmd->intastbrandid = $this->input->post('optBrand');
				$this->astmd->strassetname = $this->input->post('txtName');
				$this->astmd->strseries = $this->input->post('txtSeries');
				$this->astmd->strspec = $this->input->post('txtSpecs');
				$this->astmd->strserialnumber = $this->input->post('txtSerialnum');
				$this->astmd->strcolor = $this->input->post('optColor');
				$this->astmd->strassetcondition = $this->input->post('optCondition');
				$this->astmd->strassetdate = $this->input->post('txtAssetdate');
				
				$p = $this->input->post('txtPrice');
				$this->astmd->strprice =  str_replace(".", "", $p);	
				$prdat = $this->input->post('txtPricedate');
				$this->astmd->strpurchasedate = date('Y-m-d', strtotime($prdat)); 
				
				$this->astmd->strwarranty = $this->input->post('txtWarranty');
				$this->astmd->stramount = $this->input->post('txtAmount');
				$this->astmd->struser = $this->input->post('txtUser');
				$this->astmd->strlocation = $this->input->post('optLocation');
				$this->astmd->strnotes = $this->input->post('txtNotes');
								
				if (! empty($_FILES['txtPhoto']['name'])) {
                    $this->astmd->strphoto = $this->doupload();
                } else {
					$this->astmd->strphoto = $this->input->post('hdnPhoto');
				}
				
				$this->astmd->intstatus = $this->input->post('optStatus');
				
				
                $this->astmd->strcruser = $this->session->userdata('userid');
                $this->astmd->strcrdat = mdate($datestring, $time);
				$this->astmd->strchuser = '';
                $this->astmd->strchdat = '';
				
                $this->astmd->editassets();
                redirect(base_url($this->router->fetch_class()));
            }
        }
		
		$drd = $this->astmd->getsingleassets($this->uri->segment(3));
        if (count($drd) > 0) {
            foreach ($drd as $row) {
				$this->intassetid = $row['assetid'];
				$this->intastypeid = $row['astypeid'];
				$this->intastbrandid = $row['astbrandid'];
				
				$this->strassetname = $row['assetname'];
				$this->strseries = $row['series'];
				$this->strspec = $row['spec'];
				$this->strserialnumber = $row['serialnumber'];
				$this->strcolor = $row['color'];
				$this->strassetcondition = $row['assetcondition'];
				$this->strprice = $row['price'];
				$this->strassetdate = $row['assetdate'];
				$this->strpurchasedate = date('d-m-Y', strtotime($row['purchasedate'])); 
				$this->strwarranty = $row['warranty'];
				$this->stramount = $row['amount'];
				$this->strnotes = $row['notes'];
				$this->struser = $row['user'];	
				$this->strlocation = $row['location'];
				$this->strphoto = $row['photo'];
				$this->intstatus = $row['status'];
                
                $this->strcruser = $row['cruser'];
                $this->strcrdat = $row['crdat'];
                $this->strchuser = $row['chuser'];
                $this->strchdat = $row['chdat'];
            }
        }		
		
		$data = [
            'assetid' => $this->intassetid,
			'astypeid' => $this->intastypeid,
			'brandid' => $this->intastbrandid,
			'assetname' => $this->strassetname,
             'seri' =>   $this->strseries,
             'spec' =>   $this->strspec,
             'serialnumber' =>  $this->strserialnumber,
			 'color' => $this->strcolor,
			 'condition' => $this->strassetcondition,
			 'price' =>	strrev(implode('.',str_split(strrev(strval($this->strprice)),3))),
			 'assetdate' => $this->strassetdate,			 
			 'purchasedate' => $this->strpurchasedate,			 
			 'warranty' => $this->strwarranty,			 
			 'amount' => $this->stramount,			 
			 'notes' => $this->strnotes,			 
			 'client' => $this->struser,			 
			 'location' => $this->strlocation,			 
			 'assetphoto' => $this->strphoto,			 
			'status' =>	$this->intstatus,
             'buat' =>   $this->strcruser, 
              'tglbuat' =>  $this->strcrdat,
              'edit' =>  $this->strchuser,
              'tgledit' =>  $this->strchdat,
			'type' => $this->drdmd->getalltype(),
			'brandname' => $this->drdmd->getallbrand(),
            'title' => 'Ubah Aktiva',
			'brand' => 'Perusahaan',
			'tnk' => $this->repmd->countnopeskomet(),
			'tpk' => $this->repmd->countprpokomet(),
			'tsk' => $this->repmd->countspbkomet(),
			'tnm' => $this->repmd->countnopesmesra(),
			'tpm' => $this->repmd->countprpomesra(),
			'tsm' => $this->repmd->countspbmesra(),
			'userid' => $this->session->userdata('userid'),
			'role' => $this->session->userdata('role'),
			'group' => $this->session->userdata('group'),
			'fullname' => $this->session->userdata('userfullname'),
			'photo' => $this->session->userdata('photo'),
			'position' => $this->session->userdata('position'),
			'joindate' => $this->session->userdata('joindate')
        ];
		$data['content'] = $this->load->view('modules/assets/edit_view', $data, TRUE);
        $this->load->view('templates/base', $data, FALSE);
	}
	
	function delete(){
		
        if ($this->input->post()) {
			$drd = $this->astmd->getsingleassets($_POST['assetid']);
			if (count($drd) > 0) {
				foreach ($drd as $row) {
					$this->strphoto = $row['photo'];
				}
			}
		$folder = $this->router->fetch_class();
		$filename = $this->config->item('uploads_dir') . $folder . '/' . $this->strphoto;
		if (file_exists($filename)) {
			unlink($filename);
		}
            $this->astmd->deleteassets($_POST['assetid']);
            echo "success";
        }
    }
	
	public function doupload()
    {
        $folder = $this->router->fetch_class();
        $path = $this->config->item('uploads_dir') . $folder;
		
		
		$search = ['@<script[^>]*?>.*?</script>@si', '@<[\/\!]*?[^<>]*?>@si', '@<style[^>]*?>.*?</style>@siU', '@<![\s\S]*?--[ \t\n\r]*>@' ];
		
		$normal = preg_replace($search,'',$_FILES ['txtPhoto'] ['name']);
        $filename = strtolower( str_replace(" ","-",$normal) );
		
		
        if (! file_exists($path)) {
            if (! mkdir($path, 0777, true)) {
                print_r(error_get_last());
            }
        }

        $config = [
            'upload_path' => $path.'/',
            'allowed_types' => 'jpg|png',
            'max_size' => '2000',
			'file_ext_tolower' => TRUE,
			'remove_spaces' => TRUE,
			'detect_mime' => TRUE,
			'mod_mime_fix' => TRUE,
			'file_name' => $filename
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $txtupload = 'txtPhoto';
        if ($this->upload->do_upload($txtupload)) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error_doupload',$this->upload->display_errors('<div style="color:red;">','</div>'));
            redirect('assets/add');
        }
    }
	
	
	
	

}	