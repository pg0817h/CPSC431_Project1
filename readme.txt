1)Team Members:
Geonhyeong Park, CWID:893223610
Hector Camacho, CWID:890508559

2)Introduction:
The project is about ordering from an online menu system from a resturant. The user will be asked to enter their information
to sign in or if they haven't used the service before, then they must sign up for an account. Upon entering the user will 
be shown a greeting for the resturant in which they can go to the menu option. From the menu page, the user can either sign out or 
proceed to add items to their cart based off of whichever category of food they would like to add. Once all the items have been
added, the user can go to the cart where they will see the items listed as well as their individual prices and price total.
The user can choose to continue to add more items or choose to go to the checkout. Once in checkout, the user will put in their 
information to proceed to pay then submit. The user will be presented a confirmation screen where they will have a time in which
the food will be ready. the user can choose to then go back to the menu or simply close out the tab.

3)Feature lists:

Main page:
http://ecs.fullerton.edu/~cs431s15/project/home/home.php
-Database access
-Access Control (Log in/log out functionality)
-Session handling
-Using content from other websites/FTP
-Input validation


home
	check.php
		Check user authentication. If it is confirmed, $_SESSION['loggedin'] is set up.If user is not identified, $_SESSION['error'] is set up. 

	home.php
		Pop up signIn window if user is not logged in yet.Navigation bar has home,Menu, and sign out link so that user can go to other pages.

	logout.php	
		user can logout. 
		unset session(user id, login status)
		
menu
	cart.php
		The user will be presented with their items that they chose to add to the cart and will show the item names along with their listed prices.
		The total amount that is needed to be paid will be calulated based off of the number of items and their prices.
		The user can then either choose to go back and do more shopping from the menu options and continue adding food items or go to the checkout screen.
	addingCart.php
		when user click on add to cart button, it connects with database, and inserts user id, item title, price,img, description into cart table.
	checkout.php
		The user will put in their information into the given boxes in order to process the checkout order. (NOTE: Real Information is not needed.)
	menu.php
		Select menu tab, and display Menu items. If user click on submit button, pop up menu details, and User can add items to cart. 
	menuWeb.php
		Getting contents from https://www.chilis.com/menu/ using php cURL.
	orderConfirmation.php
		After the checkout screen is done, the user will be shown an order confirmation screen that will tell the user the time it will take for the food to be ready.
		Upon entering the screen, the cart for the current user will be emptied.
		The user can then go back to the menu screen if they desire to order more food.
nav
	nav.js
		Navigation bar
signup
	register.php
		Signup page User can create new account. 
	signup.php
		It connects with database, check if there is duplicated account, and  make sure input is not empty.It also validates password strength as well. 

4)Use Cases


-Restaurant menu pops up in the website (user can see menu)
:menu.php in menu directory
-User can order directly(Add to the cart).
:menu.php, addingCart.php, and cart.php in menu directory
-Customers can create account.  
:register.php and signup.php in signup directory
-Customers can sign in and sign out 
:logout.php/home