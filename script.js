const bar = document.getElementById('bar');
const closeme = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
  })
}


if (closeme) {
    closeme.addEventListener('click', () => {
      nav.classList.remove('active');
    })
}