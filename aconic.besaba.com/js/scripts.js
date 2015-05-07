function copyF() {
    res.value = t1.value;
}
function calSum() {
    var a = document.getElementById("x").value;
    a = parseFloat(a);
    var b = document.getElementById("y").value;
    b = parseFloat(b);
    var action = document.getElementById("act").value;
    switch (action) {
        case "+":
            res = a + b;
            break;
        case "-":
            res = a - b;
            break;
        case "*":
            res = a * b;
            break;
        case "/":
            if (b == 0) {
                alert("На ноль делить нельзя!");
                break;
            }
            res = a / b;
            break;
    }
    document.getElementById("res").value = res;
}


function canvasR() {
    var elem = document.getElementById('myCanvas');


    if (elem && elem.getContext) {

        var context = elem.getContext('2d');

        if (context) {

            context.fillRect(0, 0, 150, 100);

        }
    }

}