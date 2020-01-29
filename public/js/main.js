// Load records with loding site
$(document).ready(function(){
    readRecords();
});


// Read data function
function readRecords() {
    var readrecord = "readrecord";
    $.ajax({
        url: "read.php",
        type: "post",
        data: {
            readrecord: readrecord
        },
        success: function(data, status){
            $('#records-content').html(data);
        }
    });
}

// Add new records
function addRecord(){
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();

    $.ajax({
        url: "create.php",
        type: 'post',
        data: {
            fname : fname,
            lname : lname,
            email : email
        },

        success:function(data, status){
            readRecords();
        }
    });
}


function GetDeleteUserId(deleteid){
    $('#hidden_delete_user_id').val(deleteid);

    $.post("delete.php", {
        deleteid : deleteid
    });
    $('#deleteRecord').modal("show");
}

function deleteUser() {
    var delete_user_id = $('#hidden_delete_user_id').val();

    $.post("delete.php", {
        delete_user_id : delete_user_id
    }, function(data, status){
        readRecords();
    });
    $('#deleteRecord').modal("hide");
}



// update function
function GetUserDetails(id){
    $('#hidden_user_id').val(id);

    $.post("update.php", {
        id : id
    }, function(data, status){

        var user = JSON.parse(data);
        $('#update_fname').val(user.fname);
        $('#update_lname').val(user.lname);
        $('#update_email').val(user.email);


    }
        
    );
    $('#updateRecord').modal("show");
}

function updateUserDetails() {
    var new_fname = $('#update_fname').val();
    var new_lname = $('#update_lname').val();
    var new_email = $('#update_email').val();

    var update_user_id = $('#hidden_user_id').val();

    $.post("update.php", {
        update_user_id : update_user_id,
        new_fname : new_fname,
        new_lname : new_lname,
        new_email : new_email
    }, function(data, status){
        $('#updateRecord').modal("hide");
        readRecords();
    });

}