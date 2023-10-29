# Location App

A dynamic web application that provides hierarchical selection of locations. Users can navigate through various levels, such as countries, regions, cities, districts, etc., with auto-suggestion capabilities.

## Table of Contents

- [Features](#features)
- [Setup & Installation](#setup--installation)
- [File Structure](#file-structure)
- [Testing](#testing)
- [Extending the Hierarchy](#extending-the-hierarchy)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Nth-level Hierarchical Selection**: Supports multiple levels of location hierarchy.
- **Auto-suggestion**: Provides location suggestions as users type.
- **Dynamic Data Loading**: Fetches data on-the-fly based on user selections.
- **Full-text Search**: Employs MySQL's full-text search capabilities for efficient data retrieval.

## Setup & Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/location-app.git
    cd location-app
    ```

2. **Setup Database**:
    - Import the provided SQL files to set up the database structure and initial data.
    - Update `/php/db.php` with the correct database credentials.

3. **Install PHPUnit (For Testing)**:
    ```bash
    composer require --dev phpunit/phpunit
    ```

4. **Run the App**:
    - Deploy to your preferred web server.
    - Open `index.html` in your browser.

## File Structure
```
/location-app/
|-- /css/
| |-- styles.css
|-- /js/
| |-- script.js
|-- /php/
| |-- /tests/
| | |-- LoadTest.php
| | |-- SearchTest.php
| |-- db.php
| |-- load.php
| |-- search.php
|-- index.html
|-- README.md
|-- LICENSE
```

## Testing

1. Navigate to the project's root directory.
2. Run the following command:

```bash
./vendor/bin/phpunit
```
Note: Ensure you have a separate testing database or use database mocking to prevent tests from modifying the actual database.

## Extending the Hierarchy

If you wish to introduce a new hierarchical level in the system, follow these steps:

### 1. Database:

#### DDL (in `db.php`): 
No changes are required. The `locations` table is already designed to accommodate any number of hierarchical levels using the `type` and `parent_id` columns.

#### DML (in `db.php`):
To add data entries for the new level, utilize INSERT statements. As an example, if you're adding 'neighborhoods' under 'cities':
```sql
INSERT INTO locations(name, type, parent_id) VALUES ('NeighborhoodA1', 'neighborhood', [CityA's ID]);
```
### 2. JavaScript:

In `/js/script.js`, simply extend the hierarchy array by adding the new level:

```javascript
const hierarchy = ['country', 'region', 'city', 'district', 'neighborhood'];
```
### 3. CSS (if necessary):

For specific styles you wish to apply to the new level's dropdown or any other associated elements, add them to `/css/styles.css`.

### 4. PHP:

There's no need for changes in the PHP files (`load.php` and `search.php`). They're built to dynamically handle the hierarchy based on the `type` and `parent_id` sent via AJAX.

### 5. HTML:

No modifications are necessary in `index.html` since the dropdowns are dynamically generated using JavaScript, based on the hierarchy array.

### Summary:

The structure is modular by design. To incorporate a new hierarchical level:

1. Adjust the `hierarchy` array in `script.js`.
2. Insert data for the new level into the `locations` table.

Post these modifications, the system will automatically account for the new level in the selection process. Always ensure a thorough test post any changes to confirm all functionalities are intact.

## Contributing

1. Fork the project.
2. Create your feature branch: `git checkout -b feature/YourFeatureName`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin feature/YourFeatureName`
5. Submit a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

