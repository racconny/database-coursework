use Supermarket;

CREATE TABLE Cashier(
id int not null primary key,
cashRegisterNum int not null,
name varchar(20) not null,
surname varchar(20) not null
);

CREATE TABLE Cheque(
id int not null primary key auto_increment,
cashierID int not null,
totalPrice decimal not null,
timedate timestamp not null
);

CREATE TABLE Item(
id int not null primary key auto_increment,
amount int not null,
consignmentID varchar(30) not null,
name varchar(20) not null,
price decimal not null
);

CREATE TABLE Cheque_Items(
id tinyint not null auto_increment primary key,
itemID int default null,
chequeID int default null,
constraint ci_cheque_id foreign key (chequeID) REFERENCES Cheque(id),
constraint ci_item_id foreign key (itemID) REFERENCES Item(id)
);

 