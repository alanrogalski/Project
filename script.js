const playerPointsSpan = document.querySelector('.playerPoints');
const computerPointsSpan = document.querySelector('.computerPoints');

let board = ["", "", "", "", "", "", "", "", ""];
let currentPlayer = "X";
let cells = document.querySelectorAll(".cell");

let computerTurn = false;

let playerPoints = 0;
let computerPoints = 0;

function playerMove(cellIndex) {
  if (computerTurn) return;

  if (board[cellIndex] === "" && !checkGameOver()) {
    board[cellIndex] = currentPlayer;
    cells[cellIndex].innerText = currentPlayer;
    if (checkWinner(currentPlayer)) {
      setTimeout(() => {
        resetBoard();
        alert("You have won!");
        playerPoints += 1;
        playerPointsSpan.textContent = playerPoints;
      }, 100);
      return;
    }
    if (!checkGameOver()) {
      computerTurn = true;
      setTimeout(computerMove, 700);
    }
    setTimeout(() => {
      computerTurn = false;
    }, 700);
  }
}

function computerMove() {
  let emptyCells = board.reduce((acc, cell, index) => {
    if (cell === "") {
      acc.push(index);
    }
    return acc;
  }, []);

  //random
  let randomIndex = Math.floor(Math.random() * emptyCells.length);
  let computerIndex = emptyCells[randomIndex];

  board[computerIndex] = "O";
  cells[computerIndex].innerText = "O";

  if (checkWinner("O")) {
    alert("You have lost!");
    computerPoints += 1;
    computerPointsSpan.textContent = computerPoints;
    resetBoard();
    return;
  }
  if (!checkGameOver()) {
    currentPlayer = "X";
  }
}

function checkWinner(player) {
  const winningCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];

  return winningCombinations.some((combination) => {
    return combination.every((index) => board[index] === player);
  });
}

function checkGameOver() {
  if (board.every((cell) => cell !== "")) {
    alert("Draw!");
    resetBoard();
    return true;
  }
  return false;
}

function resetBoard() {
  board = ["", "", "", "", "", "", "", "", ""];
  cells.forEach((cell) => {
    cell.innerText = "";
  });
  currentPlayer = "X";
}