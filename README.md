# Customer Feedback Module

#### To get started
- Run `composer install` to install dependencies
- Run `php artisan migrate` to run migrations
- Run `php artisan db:seed` to seed some dat into the database.
- And `php artisan serve` to serve the app on localhost

## Assumptions

- ### Database Migrations
  - SQLite database for easy database setup. File also included in the database directory
  - Migrations have been run already
  - Data seeded using `php artisan db:seed`

- ### CORS configuration
  - assumes stateful domains will be localhost:5173, localhost:5174 or localhost:5175.
  - Hardcoded stateful domains on the backend are placed in the env file
  - Those ports are typically used my vite to launch apps.

- ### Backend validation is sufficient
  - Assumes users will not bypass validation even if frontend form is tampered with.
  - While the backend has proper validation in place, the frontend relies on this validation and it's own validation was not implemented
  - We can save server roundtrip time & resources by implementing client-side validation

- ### Network timeouts
  - Assumes request/responses will always complete without network timeouts

- ### Multiple/Duplicate Feedback is OK
  - Assumes users can submit multiple and duplicate feedback

- ### User authentication/authorization
  - Assumes  there's no real need for authentication.

- ### Data Handling
  - Assumes only 10 entries will be fetch

- ### Correct Data Types and Format (frontend)
  - Assumes not all data needs strict types

- ### API routes & documentation
  - Assumes there's no need for API documentation
  - Exposed routes instead of using Laravel's Controller API resource routes

- ### .env inclusion
  - Assumes .env is added for simplicity
  - This is a bad practice in real world and should not happen (.env.example should be used to add required variables)

## Edge Cases

- ### Network connectivity
    - Slow connections leading to frontend timeout

- ### User behavior
    - Disabling JavaScript to bypass validation
    - Using the developer console to manipulate data on the frontend

- ### Security
    - CSRF attacks via the form
    - Bot attacks/spamming on form


## Improvements

- ##### User Authentication and Authorization

- ##### Frontend and Backend validation

- ##### API Idempotency

- ##### Graceful error handling on both frontend and backend

- ##### API versioning

- ##### API rate limiting

- ##### Pagination of large amount of data

- ##### .env files on the frontend

- ##### CAPTCHA & CSRF protection to form

- ##### Content Security Policy (CSP) to mitigate XSS
