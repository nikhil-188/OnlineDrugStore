<a name="br1"></a> 

**Abstract:**

Most of the people buy medicines from the local Pharmacies and people need to go to medicine stores to buy the specific medicine prescribed by the specialized doctors. Sometimes all prescribed medicines are not available in local Pharmacies therefore people need to go to other areas to buy the medicines. It is very time consuming and people need to spend their money as well. In India most of the pharmacies are closed at night time and sometimes medicines are very essential in an emergency situation. In addition, currently the whole world is suffering due to COVID-19 pandemic. In this pandemic time it is not risk free to go out to buy medicine from the pharmacies. Due to COVID-19, medicine scarcity is also an important issue. In this situation, an online medicine delivery system can play an important role. So we developed a website of medicines for various uses and types for the user to order easily**.**

**Introduction:**

Increasing advancement in technology can turn up for the good of society and here we are planning to bring a change in health care and services. The ultimate objective of our project is to design an online medicine delivery web app through which people can order and get their medicines to their doorstep from their nearest pharmacies. Our users can simply log on to our website with their registered credentials and can choose their desired medicine as per their prescription and can order them with a secured and hassle-free experience. These days shopping for medicines and other medical products online websites are a good deal because it saves time, money, fuel, etc. Also, one pharmacy may not provide all the medicines, so the users need not move around all the pharmacies in search of medicines. Nowadays, almost every literate person mainly youngsters wants to shop online as they don’t have time to go to market and shop.

**Methods and Techniques:**

We divided our project into the parts and each of us worked o those, the following are the modules we have in our project on the header file (Mostly we used PHP only and if we want to add or delete anything from the database we used SQL statements):

      Types
      
      Uses
      
      Medicines
      
      My cart
      
      Checkout
      
      Sign in
      
      Sign out
      
      Contact Us

And we have manager login and expert login, can login and add or delete medicines and other can edit the information which has been given by the manager respectively. He can modify all the details like it belongs to which type, which use, description, image of the medicine and price of the medicine.

<a name="br2"></a> 

**Admin pages, expert pages, index page and header**

Admin login:

(We can also see the header file in all the images with the above mentioned options we can access those

where ever we are.)
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/fa891ac5-66f0-44ce-b278-6eb118be843c)


Here he can delete the medicines which are already added.
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/be0a7a61-66f0-4a87-a758-33944a50e33b)

Here he can add any new medicines and the details will also be given by him, if they want to change any details after the medicine got added they can login through expert login who can edit the details of the medicines, types and uses as follows.
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/8276257f-84a6-4a3e-99a8-dc038f82ddde)

<a name="br3"></a> 

Here we can add or delete any type, the same way he can also do it for the uses. In the same way expert can login and can change the type, use or any of the medicine details. If the new use which they are going to add is already there, it will show the error that it already exists. 
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/0c8d083b-dd80-46d9-ab6a-9ccc96680991)

The page will be similar (the style and the button position and the order in which the medicines, types and the uses are displaying) for the manager and the expert but the option is different, manager can add the stuff and expert can edit the stuff. And the following is the index page (home page of our website)
We can scroll down to see the recently added medicines.
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/83602f01-cf7f-450b-8972-732706a6685c)

<a name="br4"></a> 

**Displaying the medicines, medicine details, uses, types and purchase page**
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/accde29a-000f-425a-891a-fe3564034442)


Like this if we click medicines module we can see all the medicines at a time, if we click on it we can see the details of the medicines like price, use, type etc. If we click on the type’s module we can see all the types at a time and number of medicines available in each type, same for the use case.
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/ca631a9e-fb52-49ba-903c-7bb105bab924)

![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/539e7a98-138d-4bdc-b496-7042125e56a7)


<a name="br5"></a> 

There is a button below these details to purchase the item, if we click it the purchase will be conformed and the user will be redirected to the index page in 5 seconds.
**SQL part and the user sign up and sign in**

We created the following tables to store the values: 
I had pasted the screenshot from the PHPMYADMIN to show all the tables. (It is below)
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/f5b2b2fc-ca51-4612-98b9-af5b991308d1)

<a name="br6"></a> 

And each table has one common attribute, because when we are calling the value from two tables by joining them, we need that attribute in two tables. (Like type ID in type table and also in medicines table.)

And the following sign in and sign up page and checking whether the credentials are correct or not while signing in to the website. First during the sign up the details will be stored into the customers table, and when we are signing in we will check the email id and password entered are correct or not, if yes he will get logged in to the website and will be redirected to the index page, if not it will show invalid login credentials. Also after logging in the user can edit his profile details, the page will be similar to the sign up part, after he clicks finish the new details will get stored. 
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/64035d65-02b6-4927-9f52-1a5fa691e217)

Here user can create the account by giving all the required details, after that he can sign in using the given email id and the password.
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/0bda0a74-c8f7-451a-933b-5341c338498a)

<a name="br7"></a> 

**Database Functions, cart functions, cart page and checkout pages**

Some of the functions are:

	select4Latestmed: to display the last 4 medicines which are added in the index page
	getmedBySerial: to get the medicine details, by medicine serial number, basically the it is acting as the primary key.
	getCartId: if one user is using his cart, through his cart id we can get all the details of his cart.
	Getmedprice: to get the medicine price, by medicine serial number, basically the it is acting as the primary key.


And there also remaining functions which we created. And the following is the cart page:
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/618f7cdf-048b-4007-814a-451f279a52df)

<a name="br8"></a> 

This is the checkout page:
![image](https://github.com/nikhil-188/OnlineDrugStore/assets/84719583/be90b252-6db8-491a-a55f-9570c6e49ae2)
