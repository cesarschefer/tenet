# Laravel Invoice Generation

This Laravel project demonstrates the generation of an invoice detailing consumption of services over the last 15 days.

## Getting Started

### Prerequisites

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) >= 7.4
- [MySQL](https://www.mysql.com/) or [SQLite](https://www.sqlite.org/) database

### Installation

1. Clone the project:

    ```bash
    git clone https://github.com/cesarschefer/tenet.git
    git checkout devel
    cd tenet
    ```

2. Create a new database in your `.env` file. For example:

    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

3. Run migrations:

    ```bash
    php artisan migrate
    ```

4. Run seeders to populate the database:

    ```bash
    php artisan db:seed
    ```

### Usage

- The main endpoint for generating an invoice is a GET request to `/api/invoice`. Make sure your server is running.

    ```bash
    php artisan serve
    ```

    Visit [http://127.0.0.1:8000/api/invoice](http://127.0.0.1:8000/api/invoice) in your browser or use a tool like [Postman](https://www.postman.com/) to test the API.

### Running Tests

To run tests, use the following command:

```bash
php artisan test
```

### Key Features and Practices

Applied the Single Responsibility Principle (S in SOLID) by introducing a dedicated InvoiceService to encapsulate the logic for calculating invoices. This service appears to have the responsibility of handling the calculation of costs for different services.

### Design Patterns: 
The ServiceFactory and ConsumptionFactory are factory classes responsible for creating instances of the Service and Consumption models, respectively. (Factory)
The Service and Consumption classes extend the Model class provided by Eloquent. (Active Record)


