<?php
    class MembersView{
        public function render($data){
        $no = 1;
        $dataMember = null;
        foreach($data as $val){
            list($id,$name,$email, $phone, $join_date,$id_company ,$company) = $val;
            $dataMember .= "<tr>
                    <td>" . $id . "</td>
                    <td>" . $name . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $company . "</td>
                    <td>
                        <a href='index.php?id_edit=" . $id . "' class='btn btn-success''>Edit</a>
                        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABLE", $dataMember);
        $tpl->write();
    }
    
    public function renderUpdate($data){
        $no = 1;
        $dataMember = null;
        $dataCompany = null;
        $simpanCompany = 0;
        foreach($data['members'] as $val){
            list($id,$name,$email, $phone, $date, $id_company) = $val;
            $dataMember .= "
            
            <input type='hidden' name='id' value='$id' class='form-control' required> <br>
            <label> NAME: </label>
            <input type='text' name='name' value='$name' class='form-control' required> <br>
            <label> EMAIL: </label>
            <input type='text' name='email' value='$email' class='form-control' required> <br>
            <label> PHONE: </label>
            <input type='text' name='phone' value='$phone' class='form-control' required> <br>
            <label> JOIN DATE: </label>
            <input type='date' name='join_date' value='$date' class='form-control' required> <br>
            ";
            $simpanCompany = $id_company;
        }

        
        foreach($data['company'] as $val){
            list($id, $name_company) = $val;
            if($id == $simpanCompany){
                $dataCompany .= "<option selected value='".$id."'>".$name_company."</option>";
            }else{
                $dataCompany .= "<option value='".$id."'>".$name_company."</option>";
            }
        }

        $tpl = new Template("templates/editMembers.html");
        $tpl->replace("FORM_UPDATE", $dataMember);
        $tpl->replace("OPTION", $dataCompany);
        $tpl->write();
    }
    
    public function optionForm($data){
        $dataCompany = null;
        foreach($data as $val){
            list($id, $name_company) = $val;
            $dataCompany .= "<option value='".$id."'>".$name_company."</option>";
        }

        $tpl = new Template("templates/addMembers.html");
        $tpl->replace("OPTION", $dataCompany);
        $tpl->write();
    }

    
}