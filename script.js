$('.send').click((e) => {
    e.preventDefault();

    const nm = $('.name').val();
    const cn = $('.consign').val();
    const pr = $('.price').val();
    
    console.log("Launching ajax..");

    $.ajax({
        url: "ajax_handler.php",
        type: "POST",
        data: {
            name: nm,
            consignment: cn,
            price: pr
        },
        success: function(data){
            console.log(data);
        }
    });
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

