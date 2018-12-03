const printCheque = (data) => {
    let printingWindow = window.open("", "_blank","width=200");
    printingWindow.stop();
    printingWindow.document.write("<div class='cheque_paper' style='font-family: Monospace; font-size: 15px; padding: 3px; width: 200px;'>");
    printingWindow.document.write("<div align='center'>Your market</div>");
    printingWindow.document.write("<div align='center'>Lvivska street 1, Ternopil</div>");
    printingWindow.document.write("<div align='center'>Cash register: " + data.cashRegister +"</div>");
    printingWindow.document.write("<div align='center'>Cashier: " + data.name + " " + data.surname + "</div>");
    printingWindow.document.write("<div align='center'>ChequeID: " + data.chequeID + "</div>");
    printingWindow.document.write("<div style='widht: 100%'; text-align: center; >######################</div>");
    items.forEach((item) => {
        printingWindow.document.write(`<span style="float: left; display: block; width: 100%">${item.title}</span><br><span style="float: left">${item.quantity}X </style><span style="float: right">${item.price}𐆔</span>`);
    });
    
    printingWindow.document.write("<div style='widht: 100%'; text-align: center; >######################</div>");
    printingWindow.document.write("<b float: left>TOTAL: </b>");
    printingWindow.document.write(`<span float: right>: ${total}𐆔</span>`)
    printingWindow.document.write("<div style='widht: 100%'; text-align: center; >######################</div>");
    printingWindow.document.write("<div align='center'><b>Thanks for purchase!</b></div>");
    printingWindow.document.write("</div>");

    printingWindow.print();
}

