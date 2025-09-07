<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alert{

    function alertMsg($code, $msg=""){
        if($code == 'success'){
            $type_alert = 'Informasi - ';
            $alert = 'alert alert-secondary alert-dismissible bg-secondary text-white border-0 animated zoomIn show';
        }elseif($code == 'info'){
            $type_alert = 'Informasi - ';
            $alert = 'alert alert-info alert-dismissible border-0 animated zoomIn show';
        }elseif($code == 'failed'){
            $type_alert = 'Failed - ';
            $alert = 'alert alert-danger alert-dismissible bg-danger text-white border-0 animated shake';
        }elseif($code == 'warning'){
            $type_alert = 'Failed - ';
            $alert = 'alert alert-warning alert-dismissible bg-warning border-0 animated fade shake';
        }else{
            $type_alert = '';
            $alert = 'alert bg-light-subtle alert-dismissible animated fade show';
        }

        $data = '
                <div class="'. $alert .'" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>'. $type_alert .'</strong> '. $msg .'
                </div>';

        return $data;
    }

}