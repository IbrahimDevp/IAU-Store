function increaseValue() {
var value = parseInt(document.getElementById('numberofitem').value, 10);
value = isNaN(value) ? 0 : value;
value++;
if(value>10){return}
document.getElementById('numberofitem').value = value;
}

function decreaseValue() {
var value = parseInt(document.getElementById('numberofitem').value, 10);
value = isNaN(value) ? 0 : value;
value < 1 ? value = 1 : '';
value--;
if(value<1){return}
document.getElementById('numberofitem').value = value;
}