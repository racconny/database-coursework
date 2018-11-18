$('.send').click((e) => {
    e.preventDefault();
    const data = $('#formdata').serialize();
    
    console.log("Launching ajax..");
    console.log(data);

    $.ajax({
        url: "./insert.php",
        type: "POST",
        data: data,
        success: function(data){
            alert(data);
        }
    });
})