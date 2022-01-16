let menuVertical = document.getElementById('menu__vertical');
function menuVerticalShow(){
	menuVertical.classList.toggle('display-block');
}

let ctlMenu = document.getElementById('ctlMenu');
function ctlMenuClose(){
	ctlMenu.classList.toggle('display-block');
}

let count = document.getElementById('count');
let itCount = parseInt(count.innerText);
let productButtons = document.querySelectorAll('.productAddBtn');
productButtons.forEach(button => button.addEventListener('click', () => {count.innerText = ++itCount;}));

// let clearCartBtn = document.getElementById('clearCartBtn');
// let cardColumn  = document.getElementById('cardColumn');
// clearCartBtn.addEventListener('click', function () {
//   cardColumn.innerText="Корзина пуста";
//   count.innerText = '0';
// });
// let close = document.querySelector('#imgClose');
// let closeSecond = document.querySelector('#imgClose2');
// let div = document.getElementById('cardFirst');
// let divSecond = document.getElementById('cardSecond');
//
// close.addEventListener('click', function () {
//   div.remove();
//   count.innerText = --itCount;
// });
// closeSecond.addEventListener('click', function () {
//   divSecond.remove();
//   count.innerText = --itCount;
// });

function save(id){
    let price = document.getElementById("product"+id).id;
    $.ajax({
        url: '?action=addToCart&idForAction='+id, // путь к php-обработчику
        type: 'GET', // метод передачи данных
        dataType: 'json', // тип ожидаемых данных в ответе
        data: price, // данные, которые передаем на сервер
        success: function () {
            alert("ОКей");
            }
        });
   //location.href = "index.php?action=addToCart&idForAction="+id;
};

function remove(id,idEl){
    let price = document.getElementById("imgClose"+idEl).parentNode.childNodes[1].childNodes[1].innerText;
    console.log('Удаляю '+price)
    $.ajax({
        url: 'index.php?action=removeFromBAsket&idForAction='+id, // путь к php-обработчику
        type: 'GET', // метод передачи данных
        dataType: 'text', // тип ожидаемых данных в ответе
        data: id, // данные, которые передаем на сервер
        error: function (req, text, error) { // отслеживание ошибок во время выполнения ajax-запроса
            alert('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
        },
        success: function () {
            location.href= "index.php?page=cart"
        }
    });
    //location.href = "index.php?action=removeFromBAsket&idForAction="+id;
};

function addToBasket(idGood) {
    var str = "addBasketid=" + idGood;
    $.ajax({
        url: '../controllers/Basket.php', // путь к php-обработчику
        type: 'POST', // метод передачи данных
        dataType: 'json', // тип ожидаемых данных в ответе
        data: str, // данные, которые передаем на сервер
        error: function (req, text, error) { // отслеживание ошибок во время выполнения ajax-запроса
            alert('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
        },
        success: function (dateAnswer) {
            if (dateAnswer) {
                $('.basketInfoOut').html('<strong>Корзина</strong>' + '<br>' + '<strong>' + dateAnswer[0] + '</strong>');
                $('.basketOneCount' + idGood).html(dateAnswer[2]);
                $('.basketOneSum' + idGood).html(dateAnswer[3]);
                $('.bascketTotalSum').html(dateAnswer[4]);
            }
        }
    });
};

let countCart = 6;

function moreGoods() {
    $.ajax({
        type: 'POST',
        url: '../catalog/action/moreGoods',
        data: 'count='+countCart,
        success: function(data){
             $("#product__table").html(data);
        }
    });
    countCart+=3;
}