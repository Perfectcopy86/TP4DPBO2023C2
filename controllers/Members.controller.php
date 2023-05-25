<?php
include_once("connection.php");
include_once("models/Members.class.php");
include_once("models/Company.class.php");
include_once("views/Members.view.php");

class MembersController {
    private $members;
    private $company;

    function __construct(){
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->company = new Company(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->members->open();
        $this->members->getMembers();
        $data = array();
        while($row = $this->members->getResult()){
            array_push($data, $row);
        }
        $this->members->close();
        
        $view = new MembersView();
        $view->render($data);
    }
    
    
    public function showJabatan() {
        $this->company->open();
        $this->company->getCompany();
        $data = array();
        while($row = $this->company->getResult()){
            array_push($data, $row);
        }
        $this->company->close();

        $view = new MembersView();
        $view->optionForm($data);
    }
    
    
    public function show($id) {
        $this->members->open();
        $this->company->open();
        $this->members->getMembersById($id);
        $this->company->getCompany();
        $data = array(
            'members' => array(),
            'company' => array(),
        );
        while($row = $this->members->getResult()){
            array_push($data['members'], $row);
        }
        while($row = $this->company->getResult()){
            array_push($data['company'], $row);
        }
        $this->members->close();
        $this->company->close();
        $view = new MembersView();
        $view->renderUpdate($data);
    }

    // add
    function add($data){
        $this->members->open();
        $this->members->addMembers($data);
        $this->members->close();
        
        header("location:index.php");
    }

    // edt
    function edit($id){
        $this->members->open();
        $this->members->editMembers($id);
        $this->members->close();
        
        header("location:index.php");
    }

    // delete
    function delete($id){
        $this->members->open();
        $this->members->deleteMembers($id);
        $this->members->close();
        
        header("location:index.php");
    }


}