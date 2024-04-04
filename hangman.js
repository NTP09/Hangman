window.onload = function () {

  function database(password) {
    const xhr = new XMLHttpRequest();

    const url = "database.php";

    const data = JSON.stringify({
      item: password,
    });

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.response);
        if (xhr.response) {
          let password = prompt("Enter your PostgreSQL password:");
          database(password);
        } else {
          getWord();
        }
      } else {
        console.error('Error sending unit to PHP.');
      }
    };
  }

  let alphabet = [
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z"
  ];

  let word;
  let guess;
  let geusses = [];
  let lives;
  let counter;
  let space;

  let showLives = document.getElementById("mylives");

  let buttons = function () {
    myButtons = document.getElementById("buttons");
    letters = document.createElement("ul");

    for (let i = 0; i < alphabet.length; i++) {
      letters.id = "alphabet";
      list = document.createElement("li");
      list.id = "letter";
      list.innerHTML = alphabet[i];
      check();
      myButtons.appendChild(letters);
      letters.appendChild(list);
    }
  };

  function result() {
    wordHolder = document.getElementById("hold");
    correct = document.createElement("ul");

    for (let i = 0; i < word.length; i++) {
      correct.setAttribute("id", "my-word");
      guess = document.createElement("li");
      guess.setAttribute("class", "guess");
      if (word[i] === "-") {
        guess.innerHTML = "-";
        space = 1;
      } else {
        guess.innerHTML = "_";
      }
      geusses.push(guess);
      wordHolder.appendChild(correct);
      correct.appendChild(guess);
    }
  };

  function comments() {
    showLives.innerHTML = "You have " + lives + " guesses left";
    if (lives < 1) {
      showLives.innerHTML = "Game Over! The correct word was: " + word;
      setTimeout(() => {
        window.location.reload();
      }, 3000)
    }
    for (let i = 0; i < geusses.length; i++) {
      if (counter + space === geusses.length) {
        showLives.innerHTML = "You Win!";
        incWins();
      }
    }
  };

  function incWins() {
    const xhr = new XMLHttpRequest();

    const url = "wins.php";

    const data = JSON.stringify({});

    xhr.open('GET', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.response);
      } else {
        console.error('Error sending unit to PHP.');
      }
    };
  }

  function check() {
    list.onclick = function () {
      let geuss = this.innerHTML;
      this.setAttribute("class", "active");
      this.onclick = null;
      for (let i = 0; i < word.length; i++) {
        if (word[i] === geuss) {
          geusses[i].innerHTML = geuss;
          counter += 1;
        }
      }
      let j = word.indexOf(geuss);
      if (j === -1) {
        lives -= 1;
        comments();
      } else {
        comments();
      }
    };
  };

  function getWord() {
    const xhr = new XMLHttpRequest();

    const url = "game.php";

    const data = JSON.stringify({});

    xhr.open('GET', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status === 200) {
        play(xhr.responseText);
      } else {
        console.error('Error sending unit to PHP.');
      }
    };
  }

  function play(myWord) {
    word = myWord.replace(/\s/g, "-");
    console.log(word);
    buttons();
    geusses = [];
    lives = 10;
    counter = 0;
    space = 0;
    result();
    comments();
  };

  database();

};
