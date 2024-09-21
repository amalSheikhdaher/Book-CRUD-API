

# Book CRUD API

This project is a **Book CRUD API** built using **Laravel 10**. It provides a RESTful API for creating, reading, updating, and deleting books. The API also includes basic validation and standardized response handling for improved clarity and user experience.

## Features

- **CRUD Operations**: Create, Read, Update, Delete books.
- **Pagination**: Lists books in a paginated format.
- **Validation**: Validates incoming data for book creation and updates.
- **Custom Validation Service**: Uses a service layer (`BookRequestService`) for handling validation logic, custom error messages, and attribute naming.
- **Standardized API Responses**: Uses a trait (`ApiResponseTrait`) to standardize responses across all API endpoints.

## Requirements

- **PHP >= 8.1**
- **Composer**
- **Laravel >= 10.x**
- **MySQL / MariaDB or other supported databases**
- **Node.js & NPM** (for frontend-related tasks if applicable)

## Getting Started

Follow these instructions to set up the project locally.

### Installation

1. **Clone the Repository:**

   ```
   git clone https://github.com/amalSheikhdaher/Book_CRUD_API.git
   cd book-crud-api
   ```

2. **Install Dependencies:**

    Install PHP dependencies via Composer:

    ```
    composer install
    ```

3. **Environment Setup:**

    Copy the `.env.example` file to `.env`:

    ```
    cp .env.example .env
    ```

    Then, generate the Laravel application key:

    ```
    php artisan key:generate
    ```

4. **Configure the Database:**

    In the `.env` file, update the following database-related settings to match your local setup:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=book_crud_api
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Run Database Migrations:**

    After configuring the database, run the migrations to set up the required tables:

    ```
    php artisan migrate
    ```

6. **Run the Server:**

    Finally, run the development server:

    ```
    php artisan serve
    ```

    Your API should now be available at `http://127.0.0.1:8000`.

### API Endpoints

| Method | URI                     | Description                  | Example Request Body        |
|--------|--------------------------|------------------------------|-----------------------------|
| GET    | `/api/books`             | Get all books (paginated)     | N/A                         |
| POST   | `/api/books`             | Create a new book             | `{ "title": "Book Title", "author": "Author Name", "published_at": "2023-09-01", "is_active": true }` |
| GET    | `/api/books/{book}`      | Get a single book by ID       | N/A                         |
| PUT    | `/api/books/{book}`      | Update an existing book       | `{ "title": "Updated Title", "author": "Updated Author", "is_active": false }` |
| DELETE | `/api/books/{book}`      | Delete a book                 | N/A                         |

## Validation Rules

The API performs input validation for creating and updating books. Here are the validation rules:

- `title`: Required, string, maximum 255 characters.
- `author`: Required, string, maximum 255 characters.
- `published_at`: Required, date in `Y-m-d` format.
- `is_active`: Required, boolean (`true` or `false`).

### Example Requests

Create a Book

```
POST /api/books
```

Request Body:

```
{
    "title": "Title Book",
    "author": "NARAYAN CHANGDER",
    "published_at": "2023-08-30",
    "is_active": true
}
```

Update a Book

```
PUT /api/books/{id}
```

Request Body:

```
{
    "title": "Updated Book Title",
    "author": "NARAYAN CHANGDER",
    "published_at": "2022-07-15",
    "is_active": false
}
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
