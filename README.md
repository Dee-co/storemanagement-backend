# Project Name

This project demonstrates how to set up token-based authentication using Laravel sactumns, create APIs for storing and listing stock entries, implement Tabulator server-side pagination and column sorting, and write a scheduler command for updating stock entry statuses.

## Table of Contents

-   [Installation](#installation)
-   [Token-Based Authentication](#token-based-authentication)
-   [Stock Entry APIs](#stock-entry-apis)
-   [Tabulator Server-Side Pagination and Column Sorting](#tabulator-server-side-pagination-and-column-sorting)
-   [Scheduler Command for Updating Stock Entries](#scheduler-command-for-updating-stock-entries)

## Installation

1. Clone the repository:

    ```bash
    https://github.com/Dee-co/storemanagement-backend.git
    ```

composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
protected function schedule(Schedule $schedule)
{
$schedule->command('stock:update-status')->dailyAt('00:00');
}
