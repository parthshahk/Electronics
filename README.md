<h1 align="center"><b>Malgadi Electronics Documentation</b></h1>

<p align="center">
    <img src="./documentation/images/malgadi_electronics_logo.ico" alt="Malgadi Electronics Logo">
</p>

## **About Malgadi**
Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate. Along with this, we also organize workshops and seminars in colleges to impart technical knowledge to students.

We intend to develop this platform and extend its reach to as many students as possible, hence making technical education a bit more interesting. This is the platform which made us technically potent along with an experience of entrepreneurship.

<p align="center">
    <img src="./documentation/images/heaven_solar_logo.png" alt="Heaven Solar Logo">
    <br>
    Malgadi is a subsidiary company of <a href="http://heavensolarenergy.com" target="_BLANK">Heaven Solar</a>.
</p>

---

## **The Website**
The **Malgadi Electronics** website for the user, works similar to any other online shopping website:-

1. Add items to cart
2. Checkout
3. Provide delivery information
4. Place order

Apart from this, other functionalities on the website are:-

- Search for a product
- Send a message
- Track Order
- Write a Review
- Subscribe to an _Out of Stock_ product

---

## **The Member Section**

The **Member Section** is located at `/manage` of the root directory. It is intended to be used by the members to control and manage the website. The following pages are available in the member section:-

- Pending Orders (Home)
- All Orders
- Products
- Reviews
- Messages
- Statistics
- Configurations

These pages gives full control of the website to the manager. All these functionalities are described later in the documentation.

---

## **Technologies Used**

Following are the technologies used in the production of this application.

#### HTML
HTML5 is used for basic markup in web pages.

#### CSS ([MaterializeCSS](https://materializecss.com/))
Materialize CSS is used for the front-end components. Materialize CSS is a modern responsive front-end framework based on Material Design.

#### JavaScript
JavaScript is used for the interactivity on the client side.

#### AJAX
AJAX is used to make calls to the API which manages the cart.

#### JSON
JSON is used to store configuration data for some webpages.

#### PHP
Core PHP is used to create the API and which handles almost everything from user messages to product information.

#### MySQL
MySQL database is used to store data on server.

---

## **Using the Member Section**

The **Member Section** requires a password to be accessed, for obvious reasons. There are 2 different level of privileges for **Member Section**.

1. Master Login
2. Normal Login

Both of these passwords are hard-coded in the PHP script in the form of _SHA-1_ Hash.

#### Master Login
This privilege level offers all the functionalities required to handle the website. It consists of all the following pages:-

- Pending Orders (Home)
- All Orders
- Products
- Reviews
- Messages
- Statistics
- Configurations

#### Normal Login
This privilege level offers only sufficient information to non-technical members. It consists of the following pages:-

- Pending Orders (Home)
- All Orders
- Statistics

---

## **Member Section Components**

### Pending Orders

<p align="center">
    <img src="./documentation/images/pending_orders.PNG">
</p>

Pending orders are listed in the form of _drawers_ for each order. Clikcing on these drawers will pull all the information of that order as shown below. The number on the _drawer handle_ indicates the Order ID.

<p align="center">
    <img src="./documentation/images/pending_order_expand.PNG">
</p>

Clicking on the Email ID or the phone number will directly open the email app and the caller app respectively, so there is no need to copy it when needed.

To mark the order as delivered hit the deliver button in the drawer and to cancel the order, hit the cancel button. To perform this action the member must select their name from the top dropdown, so that there is always a record of who handled which order. Once these actions are performed, there is no going back because emails of confirmations have been sent by this time.

<p align="center">
    <img src="./documentation/images/stock_requirement.PNG">
</p>

The Stock Requirement function will list out all the products along with quantities required to complete the pending orders. Moreover it will also show the order ID of that product requirement. Same information, different view.

### Orders

<p align="center">
    <img src="./documentation/images/orders.PNG">
</p>

This page will display all the orders from the database. The drawers are marked with the order status of `pending`, `canceled` and `delivered`. Opening the drawer will show the same information as in the Pending Order section and will also show who `delivered` or `canceled` the order. An order can also be searched by the order ID using the search form available at the top of the page.

### Products

This page displays and controls all the products available on the website.

<p align="center">
    <img src="./documentation/images/products_top.PNG">
</p>

The top part of this page contains the following components:

- Search<br>
Used to search a product by the product ID. The product ID can be known by looking at the URL of the _item page_ on the website. The number after `q` in the URL is the product ID.

- Waiting List<br>
This will display the number of people "waiting" for an out of stock product. When a user uses the `Notify Me` feature for the out of stock products, that information is shown here. When the product is made _in stock_, these users are automatically notified via email.

- Add Product<br>
This function can be used to add new products to the website. It is very important to follow the _Add Product Guidelines_ in order for the website to function correctly. These instructions are avilable at the top of the _Add Product_ page.

The rest of the page contains the listing of the individual items. Each item has it's own card. Each card looks like the one showed below.

<p align="center">
    <img src="./documentation/images/product_listing.PNG">
</p>

The number in the heading is the item ID followed by the _Full Name_ of the item. The `waiting` shows the number of people who are _Waitng_ for the product to be in stock, i.e. the number of people who used the `Notify Me` feature for an out of stock item. Once the item is in stock, these people are automatically notified via email.

Further, there are 3 switches, `Stock Status`, `Homepage` and `Featured`. The use of each switch is described below.

- Stock Status<br>
If the item is in stock, leave the switch _on_. And to make the item out of stock, simply turn off the switch. Easy!

- Homepage<br>
If this switch is turned on, the item will show up on the homepage of the website. Use this feature to display most common items on the homepage. The _homepage_ items will be shown **after** the _connect with us_ section on the homepage.

- Featured<br>
If this switch is turned on, the item will show up in the top part of the homepage. This function is reserved for top selling products of the website. The _featured_ items will be shown **before** the _connect with us_ section on the homepage.

> **Please Note**<br>
> - Do not turn on both _homepage_ and _featured_ switches. Doing so will display the product twice on the homepage.
> - Try to keep the number of _featured_ items around 4 and the number of _homepage_ items no more than 20. This will ensure a nice view of the page and fast loading.