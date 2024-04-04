#!/bin/bash

read -s -p "Enter PostgreSQL password: " pg_password

export PGPASSWORD="$pg_password"

psql -U postgres -h localhost -p 5432 -c "DROP DATABASE IF EXISTS hangman;"
psql -U postgres -h localhost -p 5432 -c "CREATE DATABASE hangman;"
psql -U postgres -h localhost -p 5432 -d hangman -f schema.sql
psql -U postgres -h localhost -p 5432 -d hangman -f seed.sql

unset PGPASSWORD

(php -S localhost:4000)

