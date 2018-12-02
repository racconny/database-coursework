select title, price, quantity from Product inner join Cheque_Items on Product.id = Cheque_Items.itemID inner join Cheque on Cheque_Items.chequeID = Cheque.id and Cheque.id = 425;

