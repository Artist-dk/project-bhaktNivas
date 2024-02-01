window.onload = function () {
    fetchData();
};
const sheet = document.querySelector('.sheet');
let sheetData = sheet.innerHTML;
setInterval(() => {
    fetchData();
}, 5000);

function fetchData() {
    var x = new XMLHttpRequest();
    x.open('post', 'register.php', true);
    x.onload = function () {
        if (sheet.innerHTML != this.responseText) {
            console.log("updataed")
            console.log(this.responseText);
            sheet.innerHTML = this.responseText;
            setEvent();
        }
        console.log(this.responseText)
    }
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    x.send();
}

function setEvent() {
    var arra = Array.prototype.slice.call(document.getElementsByClassName('btn-stat'))
    console.log(arra)
    arra.forEach(element => {
        console.log(element);
        element.addEventListener('click', stat);
    });
}

function stat(e) {
    e.currentTarget.removeEventListener('click', stat);
    var xhr = new XMLHttpRequest();
    xhr.open('post', 'stat.php', true);
    xhr.onload = function () {
        console.log(this.responseText);
        fetchData();
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = 'data=' + JSON.stringify(e.currentTarget.dataset);
    // console.log(e.currentTarget.dataset);
    // console.log(data);
    // console.log(JSON.stringify(e.currentTarget.dataset))
    xhr.send(data);
}

var array = document.getElementsByClassName('btn-edit');
// console.log(array);

let yz = function(e){
    var xhr = new XMLHttpRequest();
    xhr.open('post', 'edit.php', true);
    xhr.onload = function () {
        // console.log(this.responseText);
        sheet.innerHTML = this.responseText;
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = 'data=' + JSON.stringify(e.currentTarget.dataset);
    // console.log(e.currentTarget.dataset);
    // console.log(data);
    // console.log(JSON.stringify(e.currentTarget.dataset))
    xhr.send(data);
}
for (let index = 0; index < array.length; index++) {
    array[index].addEventListener('click',yz);
}