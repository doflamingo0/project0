const b1 = {
	id: 1,
	name: 'conan',
	author: 'Aoyama',
	price: 50000,
	category: 'truyen tranh'
};

const b2 = {
	id: 2,
	name: 'doraemon',
	author: 'xyz',
	price: 10000,
	category: 'truyen tranh'
};
const b3 = {
	id: 3,
	name: 'Math',
	author: 'BGD',
	price: 20000,
	category: 'tai lieu'
};
const b4 = {
	id: 4,
	name: 'english',
	author: 'BGD',
	price: 30000,
	category: 'tai lieu'
};
const b5 = {
	id: 5,
	name: 'nha gia kim',
	author: 'Paulo',
	price: 80000,
	category: 'help-self'
};

const b6 = {
	id: 6,
	name: 'marvel',
	author: 'hihi',
	price: 100000 ,
	category: 'vien tuong'
}
const b7 = {
	id: 7,
	name: 'captain',
	author: 'hihi',
	price: 500000 ,
	category: 'vien tuong'
}

const b8 = {
	id: 8,
	name: 'iron man',
	author: 'hihi',
	price: 15000 ,
	category: 'vien tuong'
}
const b9 = {
	id: 9,
	name: 'hawkeye',
	author: 'hihi',
	price: 20000 ,
	category: 'vien tuong'
}
const b10 = {
	id: 10,
	name: 'black window',
	author: 'marvel',
	price: 500000 ,
	category: 'vien tuong'
}
const book_fake = [b1,b2,b3,b4,b5,b6,b7,b8,b9,b10];


function view(){

	const table = document.getElementById("table");
	while(table.childNodes.length > 2){
		table.removeChild(table.lastChild);
	}

	const author = document.getElementById("author").value;
	const min_price = document.getElementById("min_price").value;
	const max_price = document.getElementById("max_price").value;

	let filtered = book_fake.slice();
	if(author !== ""){
		filtered = filtered.filter(book => book.author.includes(author));
	}
	if (min_price !== ""){
		filtered = filtered.filter(book => book.price >= min_price);
	}
	if (max_price !== ""){
		filtered = filtered.filter(book => book.price <= max_price);
	}

	for(let book of filtered){
		const row = document.createElement("tr");
		for(let p in book){
			const td = document.createElement("td");
			const txt = document.createTextNode(book[p]);
			td.appendChild(txt);
			row.appendChild(td);
		}
		table.appendChild(row);
	}
}

view();
