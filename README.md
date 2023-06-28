<a name="br1"></a> 

**Abstract:**

Most of the people buy medicines from the local Pharmacies and people need to go to medicine stores

to buy the specific medicine prescribed by the specialized doctors. Sometimes all prescribed medicines

are not available in local Pharmacies therefore people need to go to other areas to buy the medicines. It

is very time consuming and people need to spend their money as well. In India most of the pharmacies

are closed at night time and sometimes medicines are very essential in an emergency situation. In

addition, currently the whole world is suffering due to COVID-19 pandemic. In this pandemic time it is

not risk free to go out to buy medicine from the pharmacies. Due to COVID-19, medicine scarcity is also

an important issue. In this situation, an online medicine delivery system can play an important role. So

we developed a website of medicines for various uses and types for the user to order easily**.**

**Introduction:**

Increasing advancement in technology can turn up for the good of society and here we are planning to

bring a change in health care and services. The ultimate objective of our project is to design an online

medicine delivery web app through which people can order and get their medicines to their doorstep

from their nearest pharmacies. Our users can simply log on to our website with their registered

credentials and can choose their desired medicine as per their prescription and can order them with a

secured and hassle-free experience. These days shopping for medicines and other medical products

online websites are a good deal because it saves time, money, fuel, etc. Also, one pharmacy may not

provide all the medicines, so the users need not move around all the pharmacies in search of medicines.

Nowadays, almost every literate person mainly youngsters wants to shop online as they don’t have time

to go to market and shop.

**Methods and Techniques:**

We divided our project into the parts and each of us worked o those, the following are the modules we

have in our project on the header file (Mostly we used PHP only and if we want to add or delete

anything from the database we used SQL statements):

      Types
      
      Uses
      
      Medicines
      
      My cart
      
      Checkout
      
      Sign in
      
      Sign out
      
      Contact Us

And we have manager login and expert login, can login and add or delete medicines and other can edit

the information which has been given by the manager respectively. He can modify all the details like it

belongs to which type, which use, description, image of the medicine and price of the medicine.


<a name="br2"></a> 

**Admin pages, expert pages, index page and header part was done by Parasu Sai Nikhil.**

Admin login:

(We can also see the header file in all the images with the above mentioned options we can access those

where ever we are.)
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/fa891ac5-66f0-44ce-b278-6eb118be843c)


Here he can delete the medicines which are already added.

Here he can add any new medicines and the details will also be given by him, if they want to change any

details after the medicine got added they can login through expert login who can edit the details of the

medicines, types and uses as follows.



<a name="br3"></a> 

Here we can add or delete any type, the same way he can also do it for the uses.

In the same way expert can login and can change the type, use or any of the medicine details. If the new

use which they are going to add is already there, it will show the error that it already exists.

The page will be similar (the style and the button position and the order in which the medicines, types

and the uses are displaying) for the manager and the expert but the option is different, manager can add

the stuff and expert can edit the stuff.

And the following is the index page (home page of our website)

We can scroll down to see the recently added medicines.



<a name="br4"></a> 

**Displaying the medicines, medicine details, uses, types and purchase page was done**

**by Ladi Jeevan Sai:**

Like this if we click medicines module we can see all the medicines at a time, if we click on it we can see

the details of the medicines like price, use, type etc.

If we click on the type’s module we can see all the types at a time and number of medicines available in

each type, same for the use case.



<a name="br5"></a> 

There is a button below these details to purchase the item, if we click it the purchase will be conformed

and the user will be redirected to the index page in 5 seconds.

**SQL part and the user sign up and sign in part was done by Vigash Kumar:**

He created the following tables to store the values:

I had pasted the screenshot from the PHPMYADMIN to show all the tables. (It is below)



<a name="br6"></a> 

And each table has one common attribute, because when we are calling the value from two tables by

joining them, we need that attribute in two tables. (Like type ID in type table and also in medicines

table.)

And the following sign in and sign up page and checking whether the credentials are correct or not while

signing in to the website. First during the sign up the details will be stored into the customers table, and

when we are signing in we will check the email id and password entered are correct or not, if yes he will

get logged in to the website and will be redirected to the index page, if not it will show invalid login

credentials. Also after logging in the user can edit his profile details, the page will be similar to the sign

up part, after he clicks finish the new details will get stored.

Here user can create the account by giving all the required details, after that he can sign in using the

given email id and the passwoerd.



<a name="br7"></a> 

**Database Functions, cart functions, cart page and checkout pages were done by**

**Raghavendra:** Some of the functions are:

·

·

select4Latestmed: to display the last 4 medicines which are added in the index page

getmedBySerial: to get the medicine details, by medicine serial number, basically the it is acting

as the primary key.

·

·

getCartId: if one user is using his cart, through his cart id we can get all the details of his cart.

Getmedprice: to get the medicine price, by medicine serial number, basically the it is acting as

the primary key.

And there also remaining functions which we created. And the following is the cart page:



<a name="br8"></a> 

This is the checkout page:

I already pasted the screen shots of our website above.

**Sample code:**

SQL code for creating the tables:

SET SQL\_MODE = "NO\_AUTO\_VALUE\_ON\_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time\_zone = "+00:00";

-- Database: `med`

-- Table structure for table `medicines`

CREATE TABLE `medicines` (

`med\_serial` varchar(20) COLLATE latin1\_general\_ci NOT NULL,

`med\_name` varchar(60) COLLATE latin1\_general\_ci DEFAULT NULL,

`med\_manufacturer` varchar(60) COLLATE latin1\_general\_ci DEFAULT NULL,

`med\_image` varchar(40) COLLATE latin1\_general\_ci DEFAULT NULL,

`med\_descr` longtext COLLATE latin1\_general\_ci DEFAULT NULL,

`med\_price` decimal(6,2) NOT NULL,

`used\_for\_id` int(10) UNSIGNED NOT NULL,

`type\_id` int(10) DEFAULT NULL

);

-- Table structure for table `cart`

CREATE TABLE `cart` (



<a name="br9"></a> 

`id` int(10) NOT NULL,

`customerid` int(10) UNSIGNED NOT NULL,

`date` timestamp NOT NULL DEFAULT current\_timestamp()

);

-- data for table `cart`

INSERT INTO `cart` (`id`, `customerid`, `date`) VALUES

(23, 7, '2019-07-05 15:21:55');

-- Table structure for table `cartitems`

CREATE TABLE `cartitems` (

`id` int(10) NOT NULL,

`cartid` int(10) UNSIGNED NOT NULL,

`productid` varchar(20) COLLATE latin1\_general\_ci NOT NULL,

`quantity` tinyint(3) UNSIGNED NOT NULL

);

-- data for table `cartitems`

-- Table structure for table `type`

CREATE TABLE `type` (

`type\_id` int(10) NOT NULL,

`type\_name` varchar(60) COLLATE latin1\_general\_ci NOT NULL

);

-- data for table `type`

-- Table structure for table `customers`

CREATE TABLE `customers` (

`id` int(10) NOT NULL,

`firstname` varchar(40) NOT NULL,

`lastname` varchar(40) NOT NULL,

`email` varchar(40) NOT NULL,

`password` varchar(40) NOT NULL,

`address` varchar(120) NOT NULL,

`city` varchar(40) NOT NULL,

`zipcode` varchar(40) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- data for table `customers`



<a name="br10"></a> 

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`, `address`,

`city`, `zipcode`) VALUES

(1, 'nikhil', 'parasu', 'nikhil.parasu517@gmail.com', 'nikhil', 'Nellore', 'Nellore',

'524004');

\--

-- Table structure for table `expert`

\--

CREATE TABLE `expert` (

`name` varchar(20) COLLATE latin1\_general\_ci NOT NULL,

`pass` varchar(40) COLLATE latin1\_general\_ci NOT NULL

);

-- data for table `expert`

INSERT INTO `expert` (`name`, `pass`) VALUES

('expert', 'expert');

-- Table structure for table `manager`

CREATE TABLE `manager` (

`name` varchar(20) COLLATE latin1\_general\_ci NOT NULL,

`pass` varchar(40) COLLATE latin1\_general\_ci NOT NULL

);

-- data for table `manager`

INSERT INTO `manager` (`name`, `pass`) VALUES

('manager', 'manager');

-- Table structure for table `used\_for`

CREATE TABLE `used\_for` (

`used\_for\_id` int(10) UNSIGNED NOT NULL,

`used\_for\_name` varchar(60) COLLATE latin1\_general\_ci NOT NULL

);

-- data for table `used\_for`

ALTER TABLE `medicines`

ADD PRIMARY KEY (`med\_serial`);



<a name="br11"></a> 

ALTER TABLE `cart`

ADD PRIMARY KEY (`id`);

ALTER TABLE `cartitems`

ADD PRIMARY KEY (`id`);

ALTER TABLE `type`

ADD PRIMARY KEY (`type\_id`);

ALTER TABLE `customers`

ADD PRIMARY KEY (`id`);

ALTER TABLE `used\_for`

ADD PRIMARY KEY (`used\_for\_id`);

ALTER TABLE `cart`

MODIFY `id` int(10) NOT NULL AUTO\_INCREMENT, AUTO\_INCREMENT=27;

ALTER TABLE `cartitems`

MODIFY `id` int(10) NOT NULL AUTO\_INCREMENT, AUTO\_INCREMENT=28;

ALTER TABLE `type`

MODIFY `type\_id` int(10) NOT NULL AUTO\_INCREMENT, AUTO\_INCREMENT=12;

ALTER TABLE `customers`

MODIFY `id` int(10) NOT NULL AUTO\_INCREMENT, AUTO\_INCREMENT=8;

ALTER TABLE `used\_for`

MODIFY `used\_for\_id` int(10) UNSIGNED NOT NULL AUTO\_INCREMENT, AUTO\_INCREMENT=14;

COMMIT;

Index code:

<?php

session\_start();

$count = 0;

$title = "Index";

require\_once "./template/header.php";

require\_once "./functions/database\_functions.php";

$conn = db\_connect();

$row = select4Latestmed($conn);

?>



<a name="br12"></a> 

<br/> <br/>

<p class="lead text-center text-muted">OUR TOP SALE MEDICINES</p>

<br><br>

<div class="row">

<?php

foreach($row as $medicine)

{

?>

<div class="col-md-3">

<a href="medicine.php?medserial=<?php echo $medicine['med\_serial']; ?>">

<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo

$medicine['med\_image']; ?>">

</a>

</div>

<?php

} ?>

</div>

<?php

if(isset($conn)) {mysqli\_close($conn);}

require\_once "./template/footer.php";

?>

Admin medicine code:

<?php

session\_start();

if((!isset($\_SESSION['manager']) && !isset($\_SESSION['expert'])))

{

header("Location:index.php");

}

$title = "List of medicines";

require\_once "./template/header.php";

require\_once "./functions/database\_functions.php";

$conn = db\_connect();

$result = getAll($conn);

?>

<div>

<a href="admin\_signout.php" class="btn btn-danger"><span class="glyphicon glyphicon-

off"></span>&nbsp;Logout</a>

<a href="admin\_used\_for.php" class="btn btn-primary"><span class="glyphicon glyphicon-

paperclip"></span>&nbsp;Uses</a>

<a href="admin\_types.php" class="btn btn-primary"><span class="glyphicon glyphicon-list-

alt"></span>&nbsp;Types</a>

<?php

if (isset($\_SESSION['manager']) && $\_SESSION['manager']==true)

{

echo '<a class="btn btn-primary" href="admin\_add.php"><span class="glyphicon

glyphicon-plus"></span>&nbsp;Add New Medicine</a>';

}

?>



<a name="br13"></a> 

</div>

<table class="table" style="margin-top: 20px">

<tr>

<th>Serial number</th>

<th>Medicine name</th>

<th>Manufacturer</th>

<th>Image</th>

<th>Description</th>

<th>Price</th>

<th>Used for</th>

<th>Type</th>

<th>&nbsp;</th>

<th>&nbsp;</th>

</tr>

<?php while($row = mysqli\_fetch\_assoc($result))

{

?>

<tr>

<td><?php echo $row['med\_serial']; ?></td>

<td><?php echo $row['med\_name']; ?></td>

<td><?php echo $row['med\_manufacturer']; ?></td>

<td><?php echo $row['med\_image']; ?></td>

<td><?php echo $row['med\_descr']; ?></td>

<td><?php echo $row['med\_price']; ?></td>

<td><?php echo getuseName($conn, $row['used\_for\_id']); ?></td>

<td><?php echo gettypeName($conn, $row['type\_id']); ?></td>

<?php

if( isset($\_SESSION['expert']) && $\_SESSION['expert']==true)

{

echo '<td><a href="admin\_edit.php?medserial=';

echo $row['med\_serial'];

echo'"><span class="glyphicon glyphicon-pencil"></span>Edit</a></td>';

}

else if (isset($\_SESSION['manager']) && $\_SESSION['manager']==true)

{

//for deleting medicine

echo '<td><a href="admin\_delete.php?medserial=';

echo $row['med\_serial'];

echo '"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>';

}

?>

</tr>

<?php } ?>

</table>

<?php

if(isset($conn))

{

mysqli\_close($conn);

}



<a name="br14"></a> 

require\_once "./template/footer.php";

?>

Medicines code:

<?php

session\_start();

$count = 0;

require\_once "./functions/database\_functions.php";

$conn = db\_connect();

if(isset($\_POST['name']))

{

if(isset($\_POST['asc']))

{

$query = "SELECT \* FROM medicines order by med\_name asc";

}

else if(isset($\_POST['desc']))

{

$query = "SELECT \* FROM medicines order by med\_name desc";

}

else

{

$query = "SELECT \* FROM medicines";

}

}

else if(isset($\_POST['price']))

{

if(isset($\_POST['asc']))

{

$query = "SELECT \* FROM medicines order by med\_price asc";

}

else if(isset($\_POST['desc']))

{

$query = "SELECT \* FROM medicines order by med\_price desc";

}

else

{

$query = "SELECT \* FROM medicines";

}

}

else if(isset($\_POST['manufacturer']))

{

if(isset($\_POST['asc']))

{

$query = "SELECT \* FROM medicines order by med\_manufacturer asc";

}

else if(isset($\_POST['desc']))

{

$query = "SELECT \* FROM medicines order by med\_manufacturer desc";

}

else



<a name="br15"></a> 

{

}

$query = "SELECT \* FROM medicines";

}

else

{

$query = "SELECT \* FROM medicines";

}

$result = mysqli\_query($conn, $query);

$title = "Full Types of Medicines";

require\_once "./template/header.php";

?>

<p class="lead text-center text-muted">All available Medicines</p>

<h5 class="lead text-muted">Sort By:</h5>

<form method="post" action="medicines.php">

<div class="radio">

<label><input type="radio" name="asc" >Ascending</label>

</div>

<div class="radio">

<label><input type="radio" name="desc">Descending</label>

</div>

<button type="submit" class="btn btn-secondary" name="title">Name</button>

<button type="submit" class="btn btn-secondary" name="price">Price</button>

<button type="submit" class="btn btn-secondary" name="author">Manufacturer</button>

<button type="submit" class="btn btn-secondary" name="clear">Clear</button>

</form>

<br><br>

<?php for($i = 0; $i < mysqli\_num\_rows($result); $i++)

{ ?>

<div class="row">

<?php while($query\_row = mysqli\_fetch\_assoc($result))

{ ?>

<div class="col-md-3">

<a href="medicine.php?medserial=<?php echo $query\_row['med\_serial']; ?>">

<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo

$query\_row['med\_image']; ?>">

</a>

<table>

<tr>

<td><strong> <?php echo $query\_row['med\_name']; ?></strong></td>

</tr>

<tr>

<td> <?php echo $query\_row['med\_manufacturer']; ?></td>

</tr>

<tr>



<a name="br16"></a> 

<td><strong>Rs <?php echo $query\_row['med\_price'];?></strong> </td>

</tr>

</table>

</div>

<?php

$count++;

if($count >= 4)

{

$count = 0;

break;

}

} ?>

</div>

<br><br>

<?php

}

if(isset($conn)) { mysqli\_close($conn); }

require\_once "./template/footer.php";

?>

Database functions code:

<?php

if (!function\_exists("db\_connect"))

{

function db\_connect()

{

$conn = mysqli\_connect("localhost", "root", "", "med");

if(!$conn){

echo "Can't connect database " . mysqli\_connect\_error($conn);

exit;

}

return $conn;

}

}

if (!function\_exists("select4Latestmed"))

{

function select4Latestmed($conn)

{

$row = array();

$query = "SELECT med\_serial, med\_image FROM medicines ORDER BY med\_serial DESC";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

for($i = 0; $i < 4; $i++)

{

array\_push($row, mysqli\_fetch\_assoc($result));

}



<a name="br17"></a> 

return $row;

}

}

if (!function\_exists("getmedBySerial"))

{

function getmedBySerial($conn, $serial)

{

$query = "SELECT med\_name, med\_manufacturer, med\_price FROM medicines WHERE

med\_serial = '$serial'";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

return $result;

}

}

if (!function\_exists("getCartId"))

{

function getCartId($conn, $customerid){

$query = "SELECT id FROM cart WHERE customerid = '$customerid'";

$result = mysqli\_query($conn, $query);

if(!$result){

echo "retrieve data failed!" . mysqli\_error($conn);

exit;

}

$row = mysqli\_fetch\_assoc($result);

return $row['id'];

}

}

if (!function\_exists("insertIntoCart"))

{

function insertIntoCart($conn, $customerid,$date)

{

$query = "INSERT INTO cart(customerid,date) VALUES('$customerid','$date') ";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Insert Cart failed " . mysqli\_error($conn);

exit;

}

}

}

if (!function\_exists("getmedprice"))

{

function getmedprice($serial){

$conn = db\_connect();

$query = "SELECT med\_price FROM medicines WHERE med\_serial = '$serial'";

$result = mysqli\_query($conn, $query);

if(!$result)

{



<a name="br18"></a> 

echo "get medicine price failed! " . mysqli\_error($conn);

exit;

}

$row = mysqli\_fetch\_assoc($result);

return $row['med\_price'];

}

}

if (!function\_exists("getCustomerId"))

{

function getCustomerId($name, $address, $city, $zip\_code, $country)

{

$conn = db\_connect();

$query = "SELECT customerid from customers WHERE

name = '$name' AND

address= '$address' AND

city = '$city' AND

zip\_code = '$zip\_code' AND

country = '$country'";

$result = mysqli\_query($conn, $query);

if($result)

{

$row = mysqli\_fetch\_assoc($result);

return $row['customerid'];

}

else

{

return null;

}

}

}

if (!function\_exists("getCustomerIdbyEmail"))

{

function getCustomerIdbyEmail($email)

{

$conn = db\_connect();

$query = "SELECT \* from customers WHERE email = '$email'";

$result = mysqli\_query($conn, $query);

if($result)

{

$row = mysqli\_fetch\_assoc($result);

return $row;

}

else

{

return null;

}

}

}

if (!function\_exists("getuseName"))

{

function getuseName($conn, $useforid)

{



<a name="br19"></a> 

$query = "SELECT used\_for\_name FROM used\_for WHERE used\_for\_id = '$useforid'";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

if(mysqli\_num\_rows($result) == 0)

{

echo "Not Set";

}

$row = mysqli\_fetch\_assoc($result);

return $row['used\_for\_name'];

}

}

if (!function\_exists("gettypename"))

{

function gettypename($conn, $typeid)

{

$query = "SELECT type\_name FROM type WHERE type\_id = '$typeid'";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

if(mysqli\_num\_rows($result) == 0){

echo "Not Set";

}

$row = mysqli\_fetch\_assoc($result);

return $row['type\_name'];

}

}

if (!function\_exists("getAll"))

{

function getAll($conn){

$query = "SELECT \* from medicines ORDER BY med\_serial DESC";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

return $result;

}

}

if (!function\_exists("getalluse"))

{

function getalluse($conn)

{



<a name="br20"></a> 

$query = "SELECT \* from used\_for ORDER BY used\_for\_name ASC";

$result = mysqli\_query($conn, $query);

if(!$result){

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

return $result;

}

}

if (!function\_exists("getAlltypes"))

{

function getAlltypes($conn)

{

$query = "SELECT \* from type ORDER BY type\_name ASC";

$result = mysqli\_query($conn, $query);

if(!$result)

{

echo "Can't retrieve data " . mysqli\_error($conn);

exit;

}

return $result;

}

}

?>

**Conclusion:**

In this project we mostly used PHP and html only, and some parts where the database is required, we

used SQL. We got succeeded in making a online drug store where user can login and order medicines

online. Many types of medicines are available here. Also without logging in user can view all the

medicines in the website, just like other famous websites like Amazon. But when they want to access

the cart they need to log in. Manager and expert login ids are available, who will control the content in

the website.

**References:**

https://www.w3schools.com/php/php\_mysql\_create.asp

<https://www.w3schools.com/php/php_arrays_associative.asp>

<https://www.w3schools.com/w3css/w3css_icons.asp>

<https://getbootstrap.com/docs/4.3/getting-started/download/>

https://www.php.net/manual/en/security.database.sql-injection.php

