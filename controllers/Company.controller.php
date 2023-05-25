<?php
include_once("connection.php");
include_once("models/Company.class.php");
include_once("views/Company.view.php");

class CompanyController {
    private $company;

    function __construct(){
        $this->company = new Company(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->company->open();
        $this->company->getCompany();
        $data = array();
        while($row = $this->company->getResult()){
            array_push($data, $row);
        }

        $this->company->close();

        $view = new CompanyView();
        $view->render($data);
    }
    public function show($id) {
        $this->company->open();
        $this->company->getCompanyById($id);
        $data = array();
        while($row = $this->company->getResult()){
            array_push($data, $row);
        }
        $this->company->close();
        $view = new CompanyView();
        $view->renderUpdate($data);
    }

    // add
    function add($data){
        $this->company->open();
        $this->company->addCompany($data);
        $this->company->close();
        
        header("location:company.php");
    }

    // proses edit
    function edit($id){
        $this->company->open();
        $this->company->editCompany($id);
        $this->company->close();
        
        header("location:company.php");
    }

    // delete
    function delete($id){
        $this->company->open();
        $this->company->deleteCompany($id);
        $this->company->close();
        
        header("location:company.php");
    }


}