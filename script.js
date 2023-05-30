function appendCharacter(character) {
  document.getElementById('screen').value += character;
}

function evaluateExpression() {
  var expression = document.getElementById('screen').value;
  var result = eval(expression);
  document.getElementById('screen').value = result;
}

function clearScreen() {
  document.getElementById('screen').value = '';
}
