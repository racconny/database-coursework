const products = document.querySelector(".products_table");
const apply_btn = document.querySelector(".btn-apply");
const add_btn = document.querySelector(".chequeAdd");

let total = 0;
let items = [];
let chequeID = 0;

const addTableRow = (data) => {
    let r = products.insertRow(1);
    let bcode = r.insertCell(0);
    let title = r.insertCell(1);
    let manufac = r.insertCell(2);
    let quantity = r.insertCell(3);
    let price = r.insertCell(4);
    bcode.appendChild(document.createTextNode(data.barcode));
    title.appendChild(document.createTextNode(data.title));
    manufac.appendChild(document.createTextNode(data.manufacturer));
    quantity.appendChild(document.createTextNode($('.quantity').val()));
    price.appendChild(document.createTextNode(data.price));
}

const refreshTotal = () => {
    total = items.reduce((acc, item) => {
        return parseFloat(acc) + parseFloat(item.price * item.quantity);
    }, 0);
    document.querySelector(".total").innerHTML = total;
}

const requestData = (bcode) => {
    $.ajax({
        url: "server_handler.php",
        type: "POST",
        data: {
            action: "getProduct",
            barcode: bcode
        },
        success: function(data){
            let qt = document.querySelector('.quantity').value;
            data = JSON.parse(data);
            data.quantity = qt;
            console.log(data);
            items.push(data);
            addTableRow(data);
            let a = new Audio('res/beep.mp3');
            a.play();
            refreshTotal();
        }
    });
}

const applyPurchase = () => {
    $.ajax({
        url: "server_handler.php",
        type: "POST",
        data: {
            action: "applyPurchase",
            products: items,
            sum: total 
        },
        success: function(data){
            console.log(data);
            chequeID = parseInt(data);
            printCheque();
        }
    });
}

apply_btn.addEventListener('click', () => {
    applyPurchase();
})

add_btn.addEventListener('click', () => {
    let bcode = document.querySelector(".barcode").value;
    requestData(bcode);
})

