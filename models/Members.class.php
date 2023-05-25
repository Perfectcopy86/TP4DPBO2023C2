<?php

class Members extends DB
{
    
    function getMembers()
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, members.id_company, company.id_company, company.name_company FROM members INNER JOIN company ON members.id_company = company.id_company";
        return $this->execute($query);
    }
    
    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $date = $data['join_date'];
        $id_company = $data['id_company'];
        $query = "INSERT INTO members (name, email, phone, join_date, id_company) VALUES ('$name', '$email', '$phone', '$date', '$id_company')";
        return $this->execute($query);
    }

    function deleteMembers($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";
        return $this->execute($query);
    }

    function editMembers($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['join_date'];
        $id_company = $_POST['id_company'];
        $query = "UPDATE members SET name = '$name', email = '$email', phone='$phone', join_date='$date', id_company = '$id_company' where id = '$id'";
        return $this->execute($query);
    }

}