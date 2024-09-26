<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link href="https://cdn.datatables.net/v/bs4/dt-2.1.7/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">E-Solution Technology</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">User Area</a>
      </li>
    </ul>
  </div>
</nav> 
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="text-center mt-5 mb-5 text-danger font-weight-bold my-3 " >Php Mysql Ajax Crud Application</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 mt-2">
      <h4 class="mt-2 mb-2 ml-1 text-success font-weight-bold">All users in the Table</h4>
    </div>
    <div class="col-lg-6">
      <button class="btn btn-success float-right m-1" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-user-plus fa-lg"></i> Add User</button>
      <a href="controller.php?export=excel" class="btn btn-primary float-right m-1"><i class="fa fa-file-excel-o fa-lg"></i> Export to CSV</a>
    </div>
  </div>
  <hr class="m-1">
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive" id="showUser">
      
      </div>
    </div>
  </div>
</div>
<!-- Add New User Modal -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" id="addUserForm">
            <div class="form-group">
              <label for="fullName">Full Name:</label>
              <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="Email" id="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="Phone" id="phone" placeholder="Enter Phone">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-danger" name="insert"  id="addUserBtn">Create New User</button>
            </div>
          </form>
        </div>
        
        </div>
    </div>
</div>

<!-- Edit  User Modal -->
<div class="modal fade" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit  User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" id="editUserForm">
            <div class="form-group">
            <input type="hidden" class="form-control" id="id"  name="id" placeholder="Enter Full Name">
              <label for="fullName">Full Name:</label>
              <input type="text" class="form-control" name="fullName" id="fullname" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" id="Email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone" id="Phone" placeholder="Enter Phone">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-success" name="update"  id="update">Edit User</button>
            </div>
          </form>
        </div>
        
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-2.1.7/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    
    // make request to the user api to get the list of  all registered users
    showAllUsers()
    function showAllUsers(){
      $.ajax({
      url: 'controller.php',
      type: 'POST',
      data:{action:"view"},

      success: function(response) {
        // console.log(response.data);
        $('#showUser').html(response);
        
        $('#usersTable').DataTable({
          order:[0,'dsc'],
          columnDefs: [
            { targets: [0], visible: true }
          ],
        });
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
    }
    
    // insert a new user into the database
    $('#addUserBtn').click(function(e){
      if($('#addUserForm')[0].checkValidity()){
        e.preventDefault();
        $.ajax({
          url: 'controller.php',
          type: 'POST',
          data: $('#addUserForm').serialize()+"&action=insert",
          success: function(response) {
            // console.log(response);
            Swal.fire({
              position: 'top-end',
              icon:'success',
              title: 'User added successfully!',
              showConfirmButton: false,
              timer: 1500
            });
            $('#addUserForm')[0].reset();
            $('#addUserModal').modal('hide');
            showAllUsers();
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
  
    }
    });
  

    // edit user details
    $("body").on('click', '.editBtn', function(e){
      e.preventDefault();
      var edit_id = $(this).attr('id');
      
      $('#editUserModal').modal('show');
      $('#id').val(id);
      $('#fullName').val(fullName);
      $('#email').val(email);
      $('#phone').val(phone);

      $.ajax({
        url: 'controller.php',
        type: 'POST',
        data: {edit_id:edit_id},
        success: function(response) {
          data = JSON.parse(response);
          
        $('#id').val(data.id);
        $('#fullname').val(data.fullname);
        $('#Email').val(data.email);
        $('#Phone').val(data.phone);
        },
        error: function(xhr, status, error) {
          console.log(error);
        }

      });
    });

    // update User details
    $('#update').click(function(e){
      if($('#editUserForm')[0].checkValidity()) { 
      e.preventDefault();
      console.log($('#editUserForm').serialize());
      $.ajax({
        url: 'controller.php',
        type: 'POST',
        data: $('#editUserForm').serialize()+"&action=updateUser",
        success: function(response) {
          console.log(response);
          Swal.fire({
            title: 'Success',
            text: 'User updated successfully',
            icon:'success',
            confirmButtonText: 'Ok',
            timer: 1500
          });
          $('#editUserModal').modal('hide');
          $('#editUserForm')[0].reset();
            showAllUsers();
        },
        error: function(xhr, status, error) {
          console.log(error);
          Swal.fire({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        }
      });
    }
  });
        
    
   
  
  // delete user
  $(document).on('click', '.deleteBtn', function(e){
    e.preventDefault();
    var tr = $(this).closest('tr');
    var del_id = $(this).attr('id');
    console.log(del_id);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'controller.php',
          type: 'POST',
          data: {del_id:del_id, action:"delete"},
          success: function(response) {
            // console.log(response);
            
            Swal.fire(
              'Deleted!',
              'User has been deleted Successfully.',
             'success',
             15000
            );
            tr.css('background-color', '#ff6666');
            setTimeout(function(){
              
              tr.remove();
            }, 15000);

            showAllUsers();
          },
          error: function(xhr, status, error) {
            console.log(error);
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Something went wrong',
              showConfirmButton: false,
              timer: 1500
            });
          }
        });
}
  });
  
  });

  // View User Details
  $(document).on('click', '.infoBtn', function(e){
    e.preventDefault();
    view_id = $(this).attr('id');
    $.ajax({
      url: 'controller.php',
      type: 'POST',
      data: {view_id:view_id, action:"viewUser"},
      success: function(response) {
        var data = JSON.parse(response);
        Swal.fire({
          title: 'User Details !',
          type: 'info',
          html: '<div class="row">'+
                    '<div class="col-md-12">'+
                    '<label for="fullName"><strong>User ID:</strong> </label>'+
                    '<span id="viewFullName">'+data.id+'</span>'+
                    '</div>'+
                  '</div>'+
                    '<div class="row">'+
                      '<div class="col-md-12">'+
                      '<label for="fullName"><strong>Full Name:</strong> </label>'+
                      '<span id="viewFullName">'+data.fullname+'</span>'+
                      '</div>'+
                      '</div>'+
                    '<div class="row">'+
                    '<div class="col-md-12">'+
                    '<label for="email"><strong>Email:</strong> </label>'+
                    '<span id="viewEmail">'+data.email+'</span>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-md-12">'+
                    '<label for="phone"><strong>Phone:</strong> </label>'+
                    '<span id="viewPhone">'+data.phone+'</span>'+
                    '</div>'+
                  '</div>',
          showCancelButton: true,
          confirmButtonText: 'Close'
        });
        
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
  // end jquery ajax dom ready function
});
</script>
</body>
</html>