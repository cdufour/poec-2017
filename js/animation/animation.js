var i = 0;
var j = 1;
var box = $('#box');

function test() {
  i = i + 10;
  j = j - 0.2;
  box.css('left', i);
  box.css('top', i);
  box.css('opacity', j);
}

setInterval(test, 1000);