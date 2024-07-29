## Integrated Asset Management System - MAO TUBURAN

The Integrated Asset Management System (IAMS) for MAO Tuburan is a comprehensive platform designed to efficiently manage various aspects of agricultural development, including farmer profiling, insurance application for six banner programs, and administrative functionalities. This system offers a user-friendly interface and robust features to streamline processes and enhance decision-making.

## Installation

> Open a terminal, and navigate to your project directory. 

> Execute below commands:

```bash
npm install
composer install
cp .env.example .env
php artisan key:generate
```

> Create your database name, user, password from your local database server.

> Connect your application to your database: Open `.env` file and configure below to work with your local database connection.
```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

> Execute below command. This will migrate all tables and seeds user account.
```bash
php artisan migrate:fresh --seed
```

## Usage - Default login account

> Default administrator login account: 
- Url: http://mao-tuburan.test
- Username: `test@test.com`
- Password: `12345678`


## Author

> [Jan Patrick T. Maureal](https://patrickmaureal.github.io/)
