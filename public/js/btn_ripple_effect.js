let buttons = document.getElementsByTagName('button');

Array.prototype.forEach.call(buttons, function (b) {
    b.addEventListener('click', createRipple)
});

function createRipple(e) {
    let circle = document.createElement('div');
    this.appendChild(circle);

    let d = Math.max(this.clientWidth, this.clientHeight);

    circle.style.width = circle.style.height = d + 'px';

    circle.style.left = e.clientX - this.offsetLeft - d / 2 + 'px';
    circle.style.top = e.clientY - this.offsetTop - d / 2 + 'px';

    let date = new Date();
    date = String(date.getTime());
    circle.setAttribute('id', date);

    setTimeout(function () {
        let element = document.getElementById(date);
        element.parentNode.removeChild(element);
    }, 1000);

    circle.classList.add('ripple');
}