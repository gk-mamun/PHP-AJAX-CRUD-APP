<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Ajax CRUD App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    
</head>
<body>
    <div class="app-header">
        <h1 class="text-primary text-center">PHP Ajax CRUD Application</h1>
    </div>
    <div class="container">
        <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRecord">
        <i class="fas fa-plus"></i>
        Add New Record</a>
        <div id="records-content">
        
        </div>
        
    </div>



    <!-- Modal: Add Record -->
    <div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form" method="POST" action="handlers/add.php"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="lname" type="text" name="lname" placeholder="Last Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addRecord()">Add Record</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Record -->
    <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form" method="POST" action="handlers/add.php"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="update_fname" type="text" name="fname" placeholder="First Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="update_lname" type="text" name="lname" placeholder="Last Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="update_email" type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateUserDetails()">Update Record</button>
                        <input type="hidden" name="" id="hidden_user_id">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Delete Record -->
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form" method="POST" action="handlers/add.php"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteUser()">Delete</button>
                        <input type="hidden" id="hidden_delete_user_id">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>