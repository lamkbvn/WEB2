function increaseValue() {
  var value = parseInt(document.getElementById('counterValue').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('counterValue').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('counterValue').value, 10);
  value = isNaN(value) ? 0 : value;
  if (value > 1) {
    value--;
    document.getElementById('counterValue').value = value;
  }
}
