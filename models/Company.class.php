<?php

class Company extends DB
{
    
    function getCompany()
    {
        $query = "SELECT * FROM company";
        return $this->execute($query);
    }
    
    
    function getCompanyById($id)
    {
        $query = "SELECT * FROM company where id_company=$id";
        return $this->execute($query);
    }

    function addCompany($data)
    {
        $name_company = $data['name_company'];
        $query = "INSERT INTO company VALUES('', '$name_company')";
        return $this->execute($query);
    }

    function deleteCompany($id)
    {
        $query = "DELETE FROM company WHERE id_company = '$id'";
        return $this->execute($query);
    }

    function editCompany($id)
    {
        $name_company = $_POST['name_company'];
        $query = "UPDATE company SET name_company = '$name_company' where id_company = '$id'";
        return $this->execute($query);
    }

}