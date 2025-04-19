# Construction Project Bidding Application

This project is a web application for managing construction project bidding. It allows users to create accounts, manage projects, submit bids, and handle file uploads related to projects. The application uses Bootstrap for styling and Supabase as the backend database.

## Features

- User authentication (registration, login, logout)
- Company management and prequalification forms
- Project creation and management
- Bid package creation and management
- File upload and download functionality
- Responsive design using Bootstrap

## Project Structure

```
construction-bidding
├── api
│   ├── auth
│   │   ├── login.php
│   │   ├── register.php
│   │   └── logout.php
│   ├── projects
│   │   ├── create.php
│   │   ├── read.php
│   │   ├── update.php
│   │   └── delete.php
│   ├── bids
│   │   ├── create.php
│   │   ├── read.php
│   │   └── update.php
│   ├── companies
│   │   ├── create.php
│   │   └── prequalification.php
│   ├── files
│   │   ├── upload.php
│   │   └── download.php
│   └── config.php
├── assets
│   ├── css
│   │   ├── bootstrap.min.css
│   │   └── styles.css
│   └── js
│       ├── bootstrap.bundle.min.js
│       └── main.js
├── includes
│   ├── header.php
│   ├── footer.php
│   └── navbar.php
├── templates
│   ├── auth
│   │   ├── login.php
│   │   └── register.php
│   ├── projects
│   │   ├── list.php
│   │   ├── create.php
│   │   └── detail.php
│   ├── bids
│   │   ├── form.php
│   │   └── list.php
│   └── company
│       └── prequalification.php
├── uploads
├── config
│   ├── database.php
│   └── supabase.php
├── index.php
├── composer.json
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/construction-bidding.git
   ```

2. Navigate to the project directory:
   ```
   cd construction-bidding
   ```

3. Install dependencies using Composer:
   ```
   composer install
   ```

4. Configure your database settings in `config/database.php` and Supabase settings in `config/supabase.php`.

5. Set up your web server to serve the `index.php` file.

## Usage

- Visit the application in your web browser.
- Register for an account or log in if you already have one.
- Create and manage projects and bid packages.
- Upload and download files related to projects.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.