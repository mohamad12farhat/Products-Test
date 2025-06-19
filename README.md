This is a simple Laravel REST API built as part of an internship test. The application manages a list of products using Laravel 10+ and follows the given requirements strictly, without any external packages.
✅ Features
CRUD operations for Products
Validation on product creation and update
Eloquent ORM used for all database interactions
MySQL support
Timestamps support (created_at, updated_at)

🚀 Bonus Features
Pagination support for listing products

Filter products by minimum stock using query parameter (min_stock)

📦 API Endpoints
Method	Endpoint	        Description
GET	    /api/products	    List all products (supports ?min_stock=5 filter and pagination)
POST	/api/products	    Create a new product
GET   	/api/products/{id}	Get a single product
PUT	    /api/products/{id}	Update a product
DELETE	/api/products/{id}	Delete a product

📋 Validation Rules
POST & PUT
name: required, string, min: 3 characters
price: required, numeric, min: 0.1
stock: optional, integer, min: 0

🛠 Tech Stack
Laravel 10+
PHP 8+
MySQL (configurable in .env)
