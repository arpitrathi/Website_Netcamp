<?php
function connect()
{
  mysql_connect("localhost","root","");
  mysql_select_db(netcamp);
}
function fix($a)
{
  $a=mysql_real_escape_string(htmlentities(trim($a)));
  return $a;
}

?>