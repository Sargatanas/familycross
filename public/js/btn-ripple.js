"use strict";

let buttons = document.getElementsByClassName('button');
let url;

Array.prototype.forEach.call(buttons, function(b) {
    b.addEventListener('click', createRipple)
});

function createRipple(e) {
    if(!this.classList.contains('button_default')) {
        let circle = document.createElement('div');
        this.appendChild(circle);

        let d = Math.max(this.clientWidth, this.clientHeight);

        circle.style.width = circle.style.height = d + 'px';

        circle.style.left = e.clientX - this.offsetLeft - d / 2 + 'px';
        circle.style.top = e.clientY - this.offsetTop - d / 2 + 'px';

        url = this.href;
        window.setTimeout(function () {
            window.location.href = url;
        }, 300);
        this.href = 'javascript:void(0)';

        let date = new Date();
        date = String(date.getTime());
        circle.setAttribute('id', date);
        let id = String(date) + 'id';
        this.id = id;

        setTimeout(function () {
            document.getElementById(id).setAttribute('href', url);
        }, 299);

        setTimeout(function () {
            let element = document.getElementById(date);
            element.parentNode.removeChild(element);
        }, 1000);

        circle.classList.add('ripple');
    }
}