$(function () {
    var canvas, context, tool;

    function init () {

        canvas = document.getElementById('conv');

        if (!canvas) {
            alert('Ошибка! Canvas элемент не найден!');
            return;
        }

        if (!canvas.getContext) {
            alert('Ошибка: canvas.getContext не существует!');
            return;
        }


        context = canvas.getContext('2d');
        if (!context) {
            alert('Ошибка: getContext! не существует');
            return;
        }

        tool = new Tool_pencil();
        canvas.addEventListener('mousedown', ev_canvas, false);
        canvas.addEventListener('mousemove', ev_canvas, false);
        canvas.addEventListener('mouseup',   ev_canvas, false);
        canvas.addEventListener('mouseover',   ev_canvas, false);
        canvas.addEventListener('click',   ev_canvas, false);
    }

    function Tool_pencil () {
        var tool = this;
        this.started = false;

        this.click = function (ev) {
            send_message_socet_set();
        };

        this.mousedown = function (ev) {
            context.beginPath();
            context.moveTo(ev._x, ev._y);
            tool.started = true;
        };

        this.mousemove = function (ev) {
            if (tool.started) {
                send_message_socet_set();
                context.lineTo(ev._x, ev._y);
                context.lineWidth = 20;
                context.stroke();
            }
        };
        this.mouseup = function (ev) {
            if (tool.started) {
                tool.mousemove(ev);
                tool.started = false;
            }
        };

        this.mouseover = function (ev) {
            if (tool.started) {
                send_message_socet_set();
                tool.started = false;
            }
        };
    }

    function ev_canvas (ev) {
        if (ev.layerX || ev.layerX === 0) {
            ev._x = ev.layerX;
            ev._y = ev.layerY;
        } else if (ev.offsetX || ev.offsetX === 0) {
            ev._x = ev.offsetX;
            ev._y = ev.offsetY;
        }

        var func = tool[ev.type];
        if (func) {
            func(ev);
        }
    }

    function send_message_socet_set() {
        var d = canvas.toDataURL("image/png");
        var message = '{"action": "set", "img": "' + d + '"}';
        ws.send(message);
    }

    ws = new WebSocket("ws://127.0.0.1:2346");

    ws.onopen= function (event) {
        var link = '../image_room/'+document.title+'.txt';
        var message = '{"action": "get", "img": "' + link + '"}';

        ws.send(message);
    };

    ws.onmessage = function(e) {
        var image = new Image();
        image.onload = function () {
            context.drawImage(image, 0, 0);
        };
        image.src = e.data;
    };

    init();
});