var rp = ['100000','50000','75000'];

function harganya(){
 var studio2 = document.getElementById('studio').value;
 if (studio2 == 'Dolby'){
    harga.value="Rp. "+rp[0];
 }
 else if (studio2 == 'Reguler 2D'){
    harga.value="Rp. "+rp[1];
 } else {
    harga.value="Rp. "+rp[2];
}
}
function total() {
    var studio2 = document.getElementById('studio').value;
    var jumlah=parseInt(document.getElementById('jml_ticket').value);
    if (studio2 == 'Dolby'){
       total= jumlah*rp[0];
       total2.value="Rp. "+total;
    }
    else if (studio2 == 'Reguler 2D'){
        total= jumlah*rp[1];
        total2.value="Rp. "+total;
    } else {
        total= jumlah*rp[2];
        total2.value="Rp. "+total;
    }

   }


