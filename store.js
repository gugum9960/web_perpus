function nothing(){
	window.alert("Belum Tersedia!");
}

function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
    var waktu = new Date();            //membuat object date berdasarkan waktu saat 
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
}

document.createElement("article");
document.createElement("footer");
document.createElement("header");
document.createElement("hgroup");
document.createElement("nav");

function click_ok(){
	alert("Silahkan Masuk");
}
/*function store(){
	var isi = document.orderBarang
	var hargaHP
	var hargaAC = 0
	var jenisHP = isi.handphone.value
	
	
	if (jenisHP == "NOKIA"){
		hargaHP = 1500000;
	}
	if (jenisHP == "XIAOMI"){
		hargaHP = 1200000;
	}
	if (jenisHP == "SAMSUNG"){
		hargaHP = 2000000;
	}
	if (jenisHP == "IPHONE"){
		hargaHP = 3500000;
	}
	
	//ACC
	
	if (isi.tg.checked){
		hargaAC += 50000;
	}
	if (isi.gur.checked){
		hargaAC += 10000;
	}
	if (isi.sc.checked){
		hargaAC += 25000;
	}
	
	var str
	str = hargaHP + hargaAC
	
	document.getElementById("harga").innerHTML = str
	document.getElementById("jumlah").value = str
	alert("CEK HARGA BERHASIL");
}

function update(){
	var isi = document.updateOrder
	var hargaHP
	var hargaAC = 0
	var jenisHP = isi.handphone.value
	
	
	if (jenisHP == "NOKIA"){
		hargaHP = 1500000;
	}
	if (jenisHP == "XIAOMI"){
		hargaHP = 1200000;
	}
	if (jenisHP == "SAMSUNG"){
		hargaHP = 2000000;
	}
	if (jenisHP == "IPHONE"){
		hargaHP = 3500000;
	}
	
	//ACC
	
	if (isi.tg.checked){
		hargaAC += 50000;
	}
	if (isi.gur.checked){
		hargaAC += 10000;
	}
	if (isi.sc.checked){
		hargaAC += 25000;
	}
	
	var str
	str = hargaHP + hargaAC
	
	document.getElementById("harga").innerHTML = str
	document.getElementById("jumlah").value = str
	alert("CEK HARGA BERHASIL");
}*/