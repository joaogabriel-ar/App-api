# WALLET-API

An API to manage a client asset wallet and showcase a complete 
CRUD (Create, Read, Update, Delete) functionality using Laravel.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)

---

## Overview

This project was meant to practice Php and how to use Laravel properly.

## Features

- Get wallet assets

## Installation

Make sure you have docker installed.

1. Clone the repository:
    ```bash
    git clone https://github.com/joaogabriel-ar/App-api.git
    ```
2. Navigate to the project directory:
    ```bash
    cd app-api
    ```
3. Build image:
    ```bash
    docker build -t app .
    ```
4. Start container
    ```bash
    docker compose up -d
    ```

## Usage

### Access the container

    docker exec -it app bash

### Run Seeders
    
    php artisan migrate:fresh --seed

### Run server
    php artisan serve --host 0.0.0

### Access database
    localhost:8080
    
Now you can access the route localhost:8000/wallet/assets/info to get some paginated information about the wallet, and see how the database looks like.


