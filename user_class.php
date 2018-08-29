<?php

    // In SQL create a user table with fields for id, name, email, group_id, address_id

    // Create a group table and address tables include keys to the user table so that join select statements can be done.

    // If there are PHP keywords here that you don't understand, Google it.

    // `` are column names
    // '' are values

    //Database name is viralhog
    //Contains 3 tables
        //table: 
            //name:user
                //columns: id, name, group_id, address_id\

        //table: 
            //name:group
                //columns: group_id, group_name

        //table: 
            //name:address
                //columns: address_id, address

    if(isset($_POST['func']) && !empty($_POST['func'])) {
        $funcName = $_POST['func'];
        switch($funcName) {
            case 'add' : add_user($_POST['name'],$_POST['email'],$_POST['address']);break;
        }
    }

    function fill_user_list_variables(){//$args) {
        $servername = "localhost";
        $port = 3306;
        $username = "root";
        $password = "";
        
        $db = new PDO("mysql:host=$servername;port=$port;dbname=viralhog", $username, $password);
        $stmt = $db->query("SELECT u.name, a.address, u.email FROM user as u, address as a WHERE u.address_id = a.address_id");
        while ($row = $stmt->fetch()) {
            echo "<tr><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['email']."</td></tr>" ;
        }
        
        
        // $group, $order, $dir, $q - these are the optional variable that may be passed in.

        //select all rows and columns form a table called users.
        //$stmt = $db->prepare("SELECT * from viralhog.user")
        //$stmt->execute()
            
        // select the `name` of all the users in 'guest' `group` if a group variable to be passed to func and set to guest. Assume a $group variable passed in.
        
        // Place the selection into a variable $select_sql.  Use conditionals and add to the $where_sql variable.

        // sort the results by `number_of_files` largest to smallest, make it possible to sort smallest to largest.  Assume a $order and $dir variable - put in $sort_sql

        // Do a text search for a partial name - put in $search_sql

        // combine partial sql stmts into $sql_stmt_st
        //$sql_stmt_st =

        // make the statment - this prepares and executes the statement.
        //$sql_stmt = $db->prepare($sql_stmt_st);
        //$sql_stmt->execute($param_array);

        //$result = $sql_stmt->fetch(); // Use in a loop - this returns one result at a time until

        // return an array of associtive arrays of all users.
    }


    function add_user($name, $email,$address){
        if(!is_null($name) && !is_null($email) && !is_null($address)){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "viralhog";

            $sql_insert_address = "INSERT INTO address(address) VALUES('".$address."')";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result_address = $conn->prepare($sql_insert_address);
                $result_address->execute();
                $add_id = $conn->lastInsertId();
                $sql = "INSERT INTO user (name, email, address_id) VALUES ('".$name."','".$email."','".$add_id."')";
                $result_user = $conn->prepare($sql);
                $result_user->execute();
                echo "New record created successfully";
            } catch(PDOException $e){
                echo "Error: ". $e.getMessage();
            }
            $conn = null;
        }
    }    
 ?>