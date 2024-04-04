## Nicolas Lefebvre, 300251367

# Hangman Game Instructions 
- Open the file named `setup.sh`
  - This file will take care of the database and will open a server.
  - It will then prompt you to enter your personal PostgresSQL password. 
 
If for some reason the `setup.sh` file does not work you can:
- Open a Git bash in the project directory
- Enter the command `./setup.sh`
  - This command will prompt you for your personal PostgresSQL password.
  - It will then create everything needed from the database.
- Once this is completed the server will start automatically.
- Open a Web page and enter `http://localhost:4000/`

# Home Page
- Each letter of the alphabet will count as a guess only if you get it wrong, if you get the letter right it will not count as a guess.
- The user can click Play again to refresh the page and start a new game with a new word.
- The user/admin can click Login if he decides he wants to login or logout of his account.

# Login Page
- Once the game is opened the player will have the choice to play without loging in, this option will not count your wins, or login to count your score.
- If you have Administrator role enter username : `admin` password : `admin`
  - Once logged in as admin you will be able to view every users score.
  - The admin will always get logged out of his account when he returns to the home page.
 
# Once logged In
- Once the user is logged in he can logout of his account by clicking the Login button. This will bring him to a page where he can chose to logout or decide to return Home.

# Visual Aspect 
![image](https://github.com/NTP09/Hangman/assets/114021910/165e8914-e0b2-43fa-b228-a2312866a7e8)
![image](https://github.com/NTP09/Hangman/assets/114021910/3932da1d-68c2-41f6-8a8c-4f8ee40d8425)
![image](https://github.com/NTP09/Hangman/assets/114021910/a8aeb1df-3a19-4c4f-b15e-34459319de1f)
![image](https://github.com/NTP09/Hangman/assets/114021910/ce6423b6-a06e-4b5a-87ac-3e60065b718c)



