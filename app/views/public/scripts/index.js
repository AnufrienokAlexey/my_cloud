//Меняем цвет покраски

document.querySelector('#color').addEventListener('change', () => {
    document.querySelector('.door_left').style.backgroundColor = document.querySelector('#color').value;
});

document.querySelector('#color').addEventListener('change', () => {
    document.querySelector('.door_right').style.backgroundColor = document.querySelector('#color').value;
});

//Меняем цвет пленки
document.querySelector('#skin_color').addEventListener('change', () => {
    document.querySelector('.door_left').style.borderColor = document.querySelector('#skin_color').value;
});
document.querySelector('#skin_color').addEventListener('change', () => {
    document.querySelector('.door_right').style.borderColor = document.querySelector('#skin_color').value;
});

//Меняем цвет ручки
document.querySelector('#handle_color').addEventListener('change', () => {
    document.querySelector('.left-handle').style.backgroundColor = document.querySelector('#handle_color').value;
});
document.querySelector('#handle_color').addEventListener('change', () => {
    document.querySelector('.right-handle').style.backgroundColor = document.querySelector('#handle_color').value;
});

//Меняем сторону открывания
document.querySelector('#opening').addEventListener('change', () => {
    document.querySelector('.door_left').classList.toggle('opening-active');
    document.querySelector('.door_right').classList.toggle('opening-active');
});
