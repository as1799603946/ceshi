<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
   class user extends admin{
       function __construct() {
           parent::__construct();
           $this->M = new_html_special_chars(getcache('user', 'commons'));
           $this->db = pc_base::load_model('user_model');
           $this->db2 = pc_base::load_model('type_model');
       }
       public function init()
       {
           //查询v9_user表的数据
           $row = $this->db->select();
           //var_dump($row);
           include $this->admin_tpl('user_list');
       }
   }
?>