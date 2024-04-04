# Nicolas Lefebvre, 300251367

## Hangman Game Instructions 

To start the Hangman game, follow these simple steps:

1. Open the `setup.sh` file.
   - This script handles the setup of the game's database and starts a server.
   - You'll be prompted to enter your personal PostgresSQL password.
   - Once done, navigate to `http://localhost:4000/` on your web browser.

If, for any reason, the `setup.sh` file doesn't work, you can manually set up the game:

1. Open a Git bash in the project directory.
2. Run the command `./setup.sh`.
   - You'll be prompted to enter your personal PostgresSQL password.
   - This command will set up everything required for the database.
3. Once completed, the server will start automatically.
4. Navigate to `http://localhost:4000/` on your web browser.

## Home Page

On the Home Page:

- Each incorrect letter guessed counts as a guess, while correct guesses won't count.
- You can click "Play again" to refresh the page and start a new game with a new word.
- Click "Login" to access your account or log out if you're already logged in.

## Login Page

When accessing the game, you have the option to:

- Play without logging in (your wins won't be counted).
- Log in to track your score.

If you're an Administrator, use the following credentials:
- Username: `admin`
- Password: `admin`

Once logged in as an admin:

- You'll have access to view all users' scores.
- The admin account will be automatically logged out upon returning to the Home Page.

## After Logging In

Once logged in:

- You can log out of your account by clicking the "Login" button, which will provide options to logout or return to the Home Page.

## Visual Aspect 

![image](https://github.com/NTP09/Hangman/assets/114021910/165e8914-e0b2-43fa-b228-a2312866a7e8)
![image](https://github.com/NTP09/Hangman/assets/114021910/3932da1d-68c2-41f6-8a8c-4f8ee40d8425)
![image](https://github.com/NTP09/Hangman/assets/114021910/a8aeb1df-3a19-4c4f-b15e-34459319de1f)
![image](https://github.com/NTP09/Hangman/assets/114021910/ce6423b6-a06e-4b5a-87ac-3e60065b718c)
