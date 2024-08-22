# Product Feeder System

This project provides a product feeder system that exports e-commerce product data in various formats (JSON, XML, CSV). The system is designed to allow easy extension and integration with various platforms.

## Project Overview

- **Objective**: To export product data from e-commerce systems in JSON, XML, and CSV formats.
- **Supported Formats**:
    - JSON
    - XML
    - CSV


## Installation and Usage

### Requirements

- PHP (>= 7.2)
- Composer (for dependency management)

### Installation

**Install Project Dependencies**:
   Run the following command in the root directory of the project to install required dependencies:

    ```bash
    composer install
    ```


### Running the Application

1. **Start the API**:
   The API is available via the `index.php` file. You can access it by making GET requests with the `format` parameter to specify the desired output format:

    ```http
    GET /index.php?format=json
    GET /index.php?format=xml
    GET /index.php?format=csv
    ```

2. **Supported Formats**:
    - `format=json` : Returns product data in JSON format.
    - `format=xml` : Returns product data in XML format.
    - `format=csv` : Returns product data in CSV format.
