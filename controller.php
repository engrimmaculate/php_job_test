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
         foreach ($data[0] as $row) {
            $output .= '<tr>
              <td>'.$row['id'].'</td>
              <td>'.$row['fullname'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['phone'].'</td>
              <td>
              <a href="#" class="btn btn-success infoBtn" id="'.$row['id'].'"> <i class="fa fa-file text-white"></i> View</a>
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
    $data = $db->getUser($_POST['id']);
    echo json_encode($data);
}

// close the database connection
// close the connection object after the request is complete
$obj = null;
?>