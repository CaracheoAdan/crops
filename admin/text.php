<?php
 require_once('../sistema.class.php');

 $app=new Sistema;
 $roles=$app->getRol('luislao@itcelaya.edu.mz');
 print_r($roles);
 $privelegios=$app->getPrivilegios('luislao@itcelaya.edu.mz');
 print_r($privelegios);
?>