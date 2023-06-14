const element = document.querySelectorAll('.fv_img');

let count = 0;
const interval = setInterval(() => {
    if (count === element.length) {
        clearInterval(interval);
        return;
    }
    element[count].classList.add('animate');
    count++;
}, 700);