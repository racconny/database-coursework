const products = document.querySelector(".products_table");
const apply_btn = document.querySelector(".btn-apply");
const add_btn = document.querySelector(".chequeAdd");
const btn = document.querySelector(".search-btn");
const search = document.querySelector(".bc");
const update_btn = document.querySelector(".update-btn");

let total = 0;
let items = [];
let chequeID = 0;
let product;

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
            data = JSON.parse(data);
            console.log(data);
            chequeID = parseInt(data.chequeID);
            printCheque(data);
            location.reload();
        }
    });
}

if (apply_btn){
    apply_btn.addEventListener('click', () => {
        applyPurchase();
    })    
}

if (add_btn){
    add_btn.addEventListener('click', () => {
        let bcode = document.querySelector(".barcode").value;
        requestData(bcode);
    })
}


const searchBybarcode = () => {
    console.log("called");
    const title = document.querySelector(".newtitle");
    const price = document.querySelector(".newprice");
    const manufacturer = document.querySelector(".newmanufacturer");
    const category = document.querySelector(".newcategory");
    const query = document.querySelector(".barcode-query").value;
    $.ajax({
        url: "product_update.php",
        type: "POST",
        data: {
            action: "search",
            q: query
        },
        success: function(data){
            console.log(data);
            data = JSON.parse(data);
            if (data.status === "ok"){
                title.value = data.title;
                price.value = data.price;
                manufacturer.value = data.manufacturer;
                category.value = data.category;
                product = data;
            }
        }
    });
}

const updateProduct = () => {
    if (!product) alert("Nothing to update");
}

update_btn.addEventListener('click', updateProduct);
search.addEventListener('click', searchBybarcode);
