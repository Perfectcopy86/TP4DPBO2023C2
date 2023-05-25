<?php
  class CompanyView{
    public function render($data){
      $no = 1;
      $dataCompany = null;
      foreach($data as $val){
        list($id,$name_company) = $val;
          $dataCompany .= "<tr>
                  <td>" . $id . "</td>
                  <td>" . $name_company . "</td>
                  <td>
                    <a href='company.php?id_edit=" . $id . "' class='btn btn-success''>Edit</a>
                    <a href='company.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                  </td>
                  </tr>";
      }

      $tpl = new Template("templates/Company.html");
      $tpl->replace("DATA_TABLE", $dataCompany);
      $tpl->write();
    }
    
    public function renderUpdate($data){
      $no = 1;
      $dataCompany = null;
      $dataCompany2 = null;
      foreach($data as $val){
        list($id,$nama_company) = $val;
          $dataCompany .= "


        <form method='POST' id='data' action='company.php'>
                    <div class='mb-3 row'>
                        <input type='hidden' name='id' value='$id'>
                        <label for='name' class='col-sm-4 col-form-label'>Company Name</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control' name='name_company' value='$nama_company'>
                        </div>
                    </div>
              

          <div class='card-footer text-end'>
                        <button type='submit' name='update' class='btn btn-success' name='update' form='data'>Edit</button>
                        <button type='reset' class='btn btn-danger' form='data'>Cancel</button>
                        <a href='company.php'><button class='btn btn-secondary' form='data'>Back to Company</button></a>
                    </div>
        </form>
          ";
          list($id,$nama_company) = $val;
          $dataCompany2 .= "<tr>
          <td>" . $id . "</td>
          <td>" . $nama_company . "</td>
          <td>
            <a href='company.php?id_edit=" . $id . "' class='btn btn-success''>Edit</a>
            <a href='company.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
          </td>
          </tr>";
      }

      $tpl = new Template("templates/editCompany.html");
      $tpl->replace("FORM_UPDATE", $dataCompany);
      $tpl->replace("DATA_TABLE", $dataCompany2);
      $tpl->write();
    }
  }