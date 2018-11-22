const products = document.querySelector(".products_table");
const total_label = document.querySelector(".total");
let total = 0;

$('.chequeAdd').click((e) => {
    
    const bc = $('.barcode').val();
    const qt = $('.quantity').val();
    
    if (bc && qt){

    console.log("Launching ajax..");

    $.ajax({
        url: "ajax_handler.php",
        type: "POST",
        data: {
            action: "getProduct",
            barcode: bc,
            quantity: qt
        },
        success: function(data){
            data = JSON.parse(data);
            addTableRow(data);
            total += parseFloat(data.price);
            total_label.innerHTML = total;
            console.log(data);
            
            let a = new Audio('res/beep.mp3');
            a.play();
        }
    });
    }
})

$('.start_tr, .cancel_tr, .apply_tr').click((e) => {
    e.preventDefault();

    let query = e.currentTarget.getAttribute("id");
    console.log(`Launching ajax ${query}`);

    $.ajax({
        url: "ajax_handler.php",
        type: "POST",
        data: {transaction: query},
        success: function(data){
            console.log(data);
        }
    });
})

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

