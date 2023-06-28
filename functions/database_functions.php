<?php
	if (!function_exists("db_connect"))
    {
		function db_connect()
        {
			$conn = mysqli_connect("localhost", "root", "", "med");
			if(!$conn){
				echo "Can't connect database " . mysqli_connect_error($conn);
				exit;
			}
			return $conn;
		}
	}
    if (!function_exists("select4Latestmed"))
    {
        function select4Latestmed($conn)
        {
            $row = array();
            $query = "SELECT med_serial, med_image FROM medicines ORDER BY med_serial DESC";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            for($i = 0; $i < 4; $i++)
            {
                array_push($row, mysqli_fetch_assoc($result));
            }
            return $row;
        }
    }
    if (!function_exists("getmedBySerial"))
    {
        function getmedBySerial($conn, $serial)
        {
            $query = "SELECT med_name, med_manufacturer, med_price FROM medicines WHERE med_serial = '$serial'";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            return $result;
        }
    }
    if (!function_exists("getCartId"))
    {
        function getCartId($conn, $customerid){
            $query = "SELECT id FROM cart WHERE customerid = '$customerid'";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "retrieve data failed!" . mysqli_error($conn);
                exit;
            }
            $row = mysqli_fetch_assoc($result);
            return $row['id'];
        }
    }
    if (!function_exists("insertIntoCart"))
    {
        function insertIntoCart($conn, $customerid,$date)
        {
            $query = "INSERT INTO cart(customerid,date) VALUES('$customerid','$date') ";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Insert Cart failed " . mysqli_error($conn);
                exit;
            }
        }
    }
    if (!function_exists("getmedprice"))
    {
        function getmedprice($serial){
            $conn = db_connect();
            $query = "SELECT med_price FROM medicines WHERE med_serial = '$serial'";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "get medicine price failed! " . mysqli_error($conn);
                exit;
            }
            $row = mysqli_fetch_assoc($result);
            return $row['med_price'];
        }
    }
    if (!function_exists("getCustomerId"))
    {
        function getCustomerId($name, $address, $city, $zip_code, $country)
        {
            $conn = db_connect();
            $query = "SELECT customerid from customers WHERE 
            name = '$name' AND 
            address= '$address' AND 
            city = '$city' AND 
            zip_code = '$zip_code' AND 
            country = '$country'";
            $result = mysqli_query($conn, $query);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                return $row['customerid'];
            } 
            else 
            {
                return null;
            }
        }
    }
    if (!function_exists("getCustomerIdbyEmail"))
    {
        function getCustomerIdbyEmail($email)
        {
            $conn = db_connect();
            $query = "SELECT * from customers WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                return $row;
            } 
            else 
            {
                return null;
            }
        }
    }
    if (!function_exists("getuseName"))
    {
        function getuseName($conn, $useforid)
        {
            $query = "SELECT used_for_name FROM used_for WHERE used_for_id = '$useforid'";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            if(mysqli_num_rows($result) == 0)
            {
                echo "Not Set";
            }
    
            $row = mysqli_fetch_assoc($result);
            return $row['used_for_name'];
        }
    }
    if (!function_exists("gettypename"))
    {
        function gettypename($conn, $typeid)
        {
            $query = "SELECT type_name FROM type WHERE type_id = '$typeid'";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            if(mysqli_num_rows($result) == 0){
                echo "Not Set";
            }
    
            $row = mysqli_fetch_assoc($result);
            return $row['type_name'];
        }
    }
    if (!function_exists("getAll"))
    {
        function getAll($conn){
            $query = "SELECT * from medicines ORDER BY med_serial DESC";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            return $result;
        }
    }
    if (!function_exists("getalluse"))
    {
        function getalluse($conn)
        {
            $query = "SELECT * from used_for ORDER BY used_for_name ASC";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            return $result;
        }
    }
    if (!function_exists("getAlltypes"))
    {
        function getAlltypes($conn)
        {
            $query = "SELECT * from type ORDER BY type_name ASC";
            $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "Can't retrieve data " . mysqli_error($conn);
                exit;
            }
            return $result;
        }
    }
    
?>