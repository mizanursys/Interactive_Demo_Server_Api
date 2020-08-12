<?php

//test_api.php

include('Api2.php');

$api_object = new API();

if($_GET["action"] == 'fetch_horoscope_list')
{
	$data = $api_object->fetch_horoscope_list();
}
if($_GET["action"] == 'fetch_horoscope')
{
	$data = $api_object->fetch_horoscope();
}



if($_GET["action"] == 'fetch_password')
{
	$data = $api_object->fetch_password();
}

if($_GET["action"] == 'user_login')
{
	$data = $api_object->user_login();
}

if($_GET["action"] == 'fetch_compony')
{
	$data = $api_object->fetch_compony();
}
if($_GET["action"] == 'fetch_alla')
{
	$data = $api_object->fetch_alla();
}
if($_GET["action"] == 'insert')
{
	$data = $api_object->insert();
}
if($_GET["action"] == 'reg')
{
	$data = $api_object->reg();
}
if($_GET["action"] == 'post')
{
	$data = $api_object->post();
}
if($_GET["action"] =='insert_company')
{
	$data = $api_object->insert_company();
}

if($_GET["action"] == 'fetch_single')
{
	$data = $api_object->fetch_single($_GET["api_token"]);
}

if($_GET["action"] == 'fetch_single_user')
{
	$data = $api_object->fetch_single_user($_GET["id"]);
}

if($_GET["action"] == 'fetch_single_post')
{
	$data = $api_object->fetch_single_post($_GET["u_api_token"]);
}

if($_GET["action"] == 'fetch_by_cat')
{
	$data = $api_object->fetch_by_cat($_GET["c_name"]);
}


if($_GET["action"] == 'update')
{
	$data = $api_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $api_object->delete($_GET["u_id"]);
}

echo json_encode($data);

?>