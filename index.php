<?php
    include 'user_class.php';
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#btnSubmit").on("click", function(e) {
                    e.preventDefault();
                    $.ajax({
                        url : "user_class.php",
                        type : "POST",
                        data : { func: 'add', name: $('#txtName').val(), email : $('#txtEmail').val(), address: $('#txtAddress').val() },
                        dataType: "text",
                        success : function (response) {
                            $("#userTable").append('<tr><td>'+ $('#txtName').val() + '</td><td>' + $('#txtAddress').val() + '</td><td>' + $('#txtEmail').val() + '</td></tr>');
                        },
                        error : function(response){

                            alert('There were some issues saving the data. Please try again.');
                        } 
                    });
                });
            });
        </script>
    </head>
    
    <body>
        <!-- Make inputs for name, address, email -->
        
        Name: <input type="text" name="Name" id='txtName'><br>
        Address: <input type="text" name="Address" id='txtAddress'><br>
        Email: <input type="text" name="Email" id='txtEmail'><br>  
        <button type="button" id='btnSubmit'>Submit</button>
        <table id="userTable">
            <tr>
            <!-- Make a table header - Include Name, Address, email -->
                <td>Name</td>
                <td>Address</td>
                <td>Email</td>
            </tr>
        
            <!-- Make a php code block here that fetchs from db and adds a row for each db result, only select the first 100 results -->
            <?php
                fill_user_list_variables();
            ?>
        
        </table>

        <!-- Make a php array, loop to output as a ul html list -->
        <?php

        ?>
        <script>
            // How do you make a javascipt closure?  What are the benifits.

            // Use JQuery to send the data to the database with an AJAX call.  Add the row to the table dynamically.

            // How do you wait for the page to load before running a function

            // Attach an event handler function to the button click.

            // Make the handler add a new row to the db by AJAX request.

            // Use JQuery to add the row without a page reload.
        </script>
    </body>
</html>