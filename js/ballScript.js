var canvas = document.getElementById("c1");
var ctx = canvas.getContext("2d");
var dx = 10;
var dy = 20;
var x = 0;
var y = 0;
var radius = 10;
var ball;

function init(e)
{
    ball = new circle(e.x, e.y);
    setInterval(draw, 1000 / 20);
}

function draw() {
    ball.draw();
    update();
}

function circle(x, y) {
    alert("circle");
    this.x = x;
    this.y = y;
    this.draw = function(){
        ctx.fillStyle = "rgb(255,165,0)";
        ctx.beginPath();
        ctx.arc(this.x - c1.offsetLeft, this.y - c1.offsetTop, radius, 0, 2 * Math.PI);
        ctx.fill();
    }
}

function update() {
    if(ball.x >= canvas.width-radius || ball.x <= 0)
    {
        dx=-dx;
    }
    if(ball.y >= canvas.height-radius || ball.y <= 0)
    {
        dy=-dy;
    }

    ball.x += dx;
    ball.y += dy;
}


