# Location App

A dynamic web application that provides hierarchical selection of locations. Users can navigate through various levels, such as countries, regions, cities, districts, etc., with auto-suggestion capabilities.

## Table of Contents

- [Features](#features)
- [Setup & Installation](#setup--installation)
- [File Structure](#file-structure)
- [Testing](#testing)
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
```

## Testing

1. Navigate to the project's root directory.
2. Run the following command:

```bash
./vendor/bin/phpunit
```
Note: Ensure you have a separate testing database or use database mocking to prevent tests from modifying the actual database.

## Contributing

1. Fork the project.
2. Create your feature branch: `git checkout -b feature/YourFeatureName`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin feature/YourFeatureName`
5. Submit a pull request.

## License

This project is licensed under the MIT License.

