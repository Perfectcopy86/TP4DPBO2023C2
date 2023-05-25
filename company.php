<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Company.controller.php");

$company = new CompanyController();

if (isset($_POST['add'])) {
    $company->add($_POST);
}

else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $company->delete($id);
}

else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $company->show($id);
}

else if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $company->edit($id, $_POST);
}

else{
    $company->index();
}