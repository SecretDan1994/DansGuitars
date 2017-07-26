###################
What is DansGuitars
###################

DansGuitars is a model project for a dynamic website powered by CodeIgniter. It is not a real website but is designed specifically
to be as close to a real website as possible. It follows the convention of MVC that is well-represented in Codeigniter.

The basic idea of this web application is that visitors of the site can register and create an account to add guitars to the website that they would like to put up for sale. This website uses form validation to get as much information about the guitar that the person is trying to sell. Once a guitar is posted, it is recorded in the database and other registered users can locate a guitar of their choice and place a bid on it with an attached comment to let the guitar owner know their thought process for the amount they chose to bid and the quantity of guitars they want to purchase.

If this were a real organization this website would be used as a marketplace for transactions of many musical instruments, accessories and other musical items. If the owner of the item agreed with a bid then they would click to accept the offer and from there a transaction would be organized. There would be a shopping cart option for people to add items to their cart and proceed to check out and have the item shipped to their address. Transactions would be done by credit card.

****************************
What has been created so far
****************************
- Full installation and integration of Codeigniter with the domain and the .htaccess file is properly created.
- User registration and login and registration email.
- Pagination for seperating the displayed amount of guitars by pages.
- All the controllers for existing pages have been properly routed in the routes.php in.
- All models that are used to represent the database so far are autoloaded and work properly.
- Full CRUD functionality for guitar instances. To explain this further, a user of this website can create a guitar, and decide the category the guitar belongs to (Acoustic, Electric, Classical/Nylon) and after creating the instance, the user can edit or delete the guitar.
- There is a categories page that allows anybody to find guitars based on the categories: "Acoustic, Electric or Classical/Nylon". Users can also create new categories that future guitars can be a part of.
- Functionality for bidding on guitars is included, which allows users to bid on guitars they didn't upload themselves for any quantity or amount, accompanied with a comment they write.
- The detail page for a guitar is decided by a combination of username and slug, where a slug is the title of the guitar seperated by dashes. Example: in the url: "danllerena.com/home/guitars/dan9167/Fender-Standard-Stratocaster", 'dan9167' is the username and Fender-Standard-Stratocaster is the slug version of the title: "Fender Standard Stratocaster". This unique combination allows users to upload guitars of the same title and keeps an individual user from uploading two guitars of the same title.
- Search functionality is provided so users can search for a guitar with a specific wording. There is a model and controller for the search index page and uses the model to cross-reference titles of guitars in the database that can match the keyword written in side of the search bar.

***********************************
Immediate Goals that have yet to be fulfilled
***********************************
- Adding shopping cart functionality with checkout.
- Adding an admin dashboard.
- Subcategories for categories.
- Sorting guitars by price, date posted, or title.
- Ajax notifications
- User profiles that keep a history of bids and transactions.
- The ability to accept a bid and have it proceed to shipping.

***************
Acknowledgement
***************

I would like to take the time to thank you for viewing the GitHub for this project. If you would like to visit the website
feel free to visit, danllerena.com.
