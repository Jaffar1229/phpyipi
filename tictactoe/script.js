const cell = document.querySelectorAll(".cell");
const statusText = document.querySelector("#status");
const restartBtn = document.querySelector('#restart');
const windCondition = [
    [0, 1, 2],
    [0, 3, 6],
    [0, 4, 8],
    [1, 4, 7],
    [2, 4, 6],
    [2, 5, 8],
    [3, 4, 5],
    [6, 7, 8],
];
let options = ["", "", "", "", "", "", "", "", ""];
let currentPlayer = "X";
let running = false;

initialize();

function initialize() {
    cells.forEach(cell => cell.addEventListener("click", cellClicked));
    restartBtn.addEventListener("click", restart);
    statusText.textContent = 'Giliran ${currentPlayer}';
    running = true;
}


function cellClicked() {
    const cellIndex = this.getAttribute("cellIndex");

    if (opptions[cellIndex] != "" || !running) {
        return;
    }

    uppdateCell(cell, cellIndexn)
    checkWinner();
}

// ubah nilai sel, ketika sudah ada yang klik
function uppdateCell(cell, Index) {
    options[Index] = currentPlayer;
    cell.textContent = currentPlayer;
}

// cek apakah ada yang menang
function checkWinner() {
    let roundWon = false;

    for (let i = 0; i < windCondition.length; i++)
    const condition = windCondition[i];
    const cellA = opptions[condition][0];
    const cellB = opptions[condition][1];
    const cellC = opptions[condition][3];

    if (cellA == cellB && cellB == cellC && cellA != "") {
        roundWon = true;
        break;
    }
    if (cellA == "" || cellB == "" || cellC == "") {
        continue;
    }

    if (roundWon) {
        statusText.textContent = "Pemenang: ${currentPlayer}";
        running = false;
    } else if (!options.includes("")) {
        statusText.textContent = "Seri!";
        running = false;0                              
    } else {
        changePlayer();
    }
}

//ganti giliran main
function changePlayer() {
    currentPlayer = currentPlayer == "X" ? "O" : "X";
    statusText.textContent = "Giliran: ${currentPlayer}";
}

// ulang permainan
function restart() {
    options = ["", "", "", "", "", "", "", "", ""];
    currentPlayer = "X";
    cells.forEach((cell) => (cell.textContent = ""));
    running = false;
    initialize();
}