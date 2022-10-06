
## Project Setup guide

Kindly note the following tips to setup the prooject thank you.:

- The database created locally is called kominiti_data
- Run migrations to have the tables
- the API routes are located in the api.php file
- the BookController handles the logic for the endpoints the model is called Book.


## BookController method overview::

### Task One

- The fetchData() method basically fetch books data from the ICE and fire API

### Task Two

- The index() method fetches all the book records in the local database::(READ)

- The store() method saves the book data in the database (CREATE)

- The show() method retrieves a single record based on the ID provided

- The update() method creates a path request accepting _METHOD = PATCH as a param

- The destroy() method delete a record from the data

- The searchBooks() methods filters data based on the name, publisher, release_date, country.


### Tools

- PHP 

- Laravel 8.75


Thanks for reading through the guide



