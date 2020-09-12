let X = document.getElementById('x-value');
let r_values = document.getElementById('r-value');
let y_values = document.getElementsByName('y-value');
let Y = null;
let R;

function checkX() {
    if (X.value.trim() === "") {
        return false
    } else {
        if (isFinite(X.value)) {
            if (X.value.trim() >= -5 && X.value <= 5) {
                return true
            } else {
                X.setCustomValidity("Must be (-5;5)");
                return false
            }
        } else {
            X.setCustomValidity("Must be number");
            return false
        }
    }
}

function checkY() {
    for (let i = 0; i < y_values.length; i++) {
        if (y_values[i].checked) {
            Y = y_values[i].value;
            break;
        }

    }
    if (Y == null) {

        alert("Choose one Y value");
        return false

    } else {
        return true
    }
}


const submit = function (ev) {
    if (!(checkY())) return
    if (!(checkX())) return
    ev.preventDefault();
    R = r_values.options[r_values.selectedIndex].value

    const data = new FormData();

    data.append('x_val', X.value);
    data.append("y_val", Y);
    data.append('r_val', R);


    fetch('Php/function.php?' + new URLSearchParams({
        x_val: X.value,
        y_val: Y,
        r_val: R
    }))

        .then(res => res.text())
        .then(table => document.querySelector('#res').innerHTML = table);
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sendButton').addEventListener('click', submit);
});

const clear = function (ev) {
    ev.preventDefault();

    fetch('Php/clear.php', {
        method: 'GET',
    })
        .then(res => res.text())
        .then(table => document.querySelector('#res').innerHTML = table);
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('clearButton').addEventListener('click', clear);
});