<?php
define("_SOFTNAME","爱情银行");
define("_VERSION","1.0.0");

$SQLIP="localhost";
$SQLID="loveBank";
$SQLPA="loveBank+ht";
$DATA_DB="loveBank";

$_ANNOUNCEMENT = array("本系统正在测试","已升级成为1.0.0版本","空","空","空","空","空");//预留7个空
/*
 权限：
销售     进货     库存管理     应收款     应付款     员工管理   财务  账号 
0     1    2     3    4      5    6  7
*/
$_POWERCHINESE = array("销售","进货","库存","应收款","应付款","员工管理","财务","账号");
?>