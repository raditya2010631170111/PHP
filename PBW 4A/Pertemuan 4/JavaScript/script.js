let name; // variabel - string
name = "Raditya Aji Sasmoyo";
console.log(name);

const umur = 20; //nilai const tdk bisa diubah=can't loop
let ipk = 3.20; //number
const sarjana = [
	"Information Technology", 
	"SInformation Systems ",
	"Computer Engineering",
	"Data Science"]; //array

// let coordinate = [[0,3],[6,2]];
// console.log(coordinate[0][0]); //array dua dimensi

console.log("Umur: "+ umur);
console.log(sarjana[0]);

for (let i = 0; i <sarjana.length; i++) {
	document.write(sarjana[i] + "<br>")
}

//function
function greet(){
 return "Good Morning";
}
let regard = greet();
console.log(regard);
console.log(greet());

// html selection
// class btn = document.querySelector("button-saya")
// console.log(btn)

document.getElementById("myButton").addEventListener("click", function(){ 
    // console.log("Tombol dipencet");
    document.body.style.backgroundColor = "black";
});
