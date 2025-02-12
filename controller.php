<?php 
//require the Db ClassLoader
require_once 'db.php';

$db = new Database();
    if(isset($_POST['action']) && $_POST['action'] == 'view'){
        $output = '';
        // read the data from the database
        $data = $db->read();
        if($db->getTotalUsers() > 0){
        $output .= '<table id="usersTable" class="table text-center table-striped table-bordered" style="width:100%">       
        <thead>
          <tr>
            <th>ID</th>
            <th>FullName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
        // loop through the data and display it in the table
         foreach ($data as $row) {
            $output .= '<tr>
              <td>'.$row['id'].'</td>
              <td>'.$row['fullname'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['phone'].'</td>
              <td>
              <a href="#" class="btn btn-success infoBtn" id="'.$row['id'].'"> <i class="fa fa-user text-white"></i> View</a>
                <a href="#"  class="btn btn-info editBtn" data-toggle="modal" data-target="#editUserModal" id="'.$row['id'].'">Edit</a>
                <a href="#"   class="btn btn-danger deleteBtn" id="'.$row['id'].'">Delete</a>
              </td>
              
            </tr>';
        }
            $output .='</tbody><t/table>';
            echo $output;
        }else{
        $output = '<h3 class="text-center">No data found in the database</h3>';
        echo $output;
    }
    '</tbody>
    </table>';   
}

// insert a new user into the database

if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $db->addUser($_POST['fullname'], $_POST['Email'], $_POST['Phone']);
}

// edit a user
// find user details by  id and display the results in edit user modal form
if(isset($_POST['edit_id'])){
    $id=$_POST['edit_id'];
    $row = $db->getUserById($id);
    echo json_encode($row);
    
}


// Update selected user details

if(isset($_POST['action']) && $_POST['action'] == 'updateUser'){
    $id = $_POST['id'];
    $fullname = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    echo $db->update($id, $fullname, $email, $phone);
}
// delete a user method

if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    $id = $_POST['del_id'];
    $db->delete($id);
}

// view a user method

if(isset($_POST['action']) && $_POST['action'] == 'viewUser'){
    $view_id = $_POST['view_id'];
    $data = $db->getUserById($view_id);
    echo json_encode($data);
}


// export data to csv file

if(!empty($_GET['export']) && $_GET['export'] == 'excel'){
    $data = $db->read();
    $filename = 'users_data.xls';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$filename");
    header("pragma: no-cache");
    header("Expires: 0");
    
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>FullName</th>';
    echo '<th>Email</th>';
    echo '<th>Phone</th>';
    echo '</tr>';
    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['fullname'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['phone'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    exit;
}


// export data to pdf file

if(!empty($_GET['export']) && $_GET['export'] == 'pdf'){
    $data = $db->read();
    require_once('dir/tcpdf/tcpdf.php');
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('My Team');
    $pdf->SetTitle('Users Data');
    $pdf->SetSubject('Users Data Export');
    $pdf->SetKeywords('TCPDF, PDF, Users Data');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->AddPage();
    $pdf->writeHTML('<h1>Users Data</h1>');
    $pdf->writeHTML('<table border="1">');
    $pdf->writeHTML('<tr>');
    $pdf->writeHTML('<th>ID</th>');
    $pdf->writeHTML('<th>FullName</th>');
    $pdf->writeHTML('<th>Email</th>');
    $pdf->writeHTML('<th>Phone</th>');
    $pdf->writeHTML('</tr>');
    foreach ($data as $row) {
        $pdf->writeHTML('<tr>');
        $pdf->writeHTML('<td>'.$row['id'].'</td>');
        $pdf->writeHTML('<td>'.$row['fullname'].'</td>');
        $pdf->writeHTML('<td>'.$row['email'].'</td>');
        $pdf->writeHTML('<td>'.$row['phone'].'</td>');
        $pdf->writeHTML('</tr>');
    }
    $pdf->writeHTML('</table>');
    $pdf->Output('users_data.pdf', 'I');
    exit;
}
// close the database connection
// close the connection object after the request is complete
$obj = null;
?>