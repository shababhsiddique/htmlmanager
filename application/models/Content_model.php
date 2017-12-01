<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_Model extends CI_Model {

    public function dynamichtml() {
        
        
        $html = "<div data-tbl='tbl_blocks' data-pk='block_id' data-dc='block_html' data-id='1' id='block_1'>" . "THIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TESTTHIS IS A MAJOR TEST" . "</div>";

        $admin_logged_in = $this->session->userdata('admin_logged_in');

        /**
         * WYSYWYG Wrapper 
         */
        if ($admin_logged_in == true) {
            $html .= "<script type='text/javascript'>
                            //<![CDATA[
                           bkLib.onDomLoaded(function() {
                               myNicEditor.addInstance('block_1');
                           });
                           //]]>
                       </script>";
        }

        return $html;
    }

}