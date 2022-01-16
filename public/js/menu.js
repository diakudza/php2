let menuVertical = document.getElementById('menu__vertical');
function menuVerticalShow(){
	menuVertical.classList.toggle('display-block');
}

let ctlMenu = document.getElementById('ctlMenu');
function ctlMenuClose(){
	ctlMenu.classList.toggle('display-block');
}
//
// let count = document.getElementById('count');
// let itCount = parseInt(count.innerText);
// let productButtons = document.querySelectorAll('.productAddBtn');
// productButtons.forEach(button => button.addEventListener('click', () => {count.innerText = ++itCount;}));

function save(id){

    $.ajax({
        url: '/cart/add/'+id, // путь к php-обработчику
        type: 'POST', // метод передачи данных
        dataType: 'json', // тип ожидаемых данных в ответе
        data: id, // данные, которые передаем на сервер
        success: function () {
            }
        });
  };

function removeFromCart(id,idEl){
    let price = document.getElementById("imgClose"+idEl).parentNode.childNodes[1].childNodes[1].innerText;
    console.log('Удаляю '+price)
    $.ajax({
        url: '/cart/remove/'+id, // путь к php-обработчику
        type: 'POST',
        dataType: 'json', // тип ожидаемых данных в ответе
        data: id,idEl, // данные, которые передаем на сервер
        success: function (data) {
            alert('ok');
            location.href= "/cart"
        }
    });

};


let countCart = 3;
let startPos = 3;
function moreGoods() {
    $.ajax({
        type: 'POST',
        url: '/catalog/more/'+countCart+'.'+startPos,
        dataType: 'text',
        data: countCart,startPos,
        success: function(data){
           $(".product__list").append(data);
        }
    });
    startPos+=3;
}

function clearCart(userId) {
       $.ajax({
        type: 'POST',
        url: '/cart/clearCart/'+userId,
        dataType: 'json',
        data: userId,
        success: function(data){
            location.href= "/cart"
        }
    });
}

function makeOrder(id) {
    $.ajax({
        type: 'POST',
        url: '/order/makeOrder/'+id,
        dataType: 'json',
        data: id,
        success: function(data){
        }
    });
}