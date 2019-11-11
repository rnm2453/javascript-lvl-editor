var rows;
var vw = window.innerWidth/100;
var vh = window.innerHeight/100;
var gridWrapper = document.getElementById('grid_wrapper');
console.log(gridWrapper.offsetWidth);
var logo = document.getElementsByClassName('logo');
var arr = [];

function setup() {
	requestRows();
}

window.onresize = function() {	
	var w = window.innerWidth;
	var h = window.innerHeight;
	var dif = w/h;
	vw = w/100;
	vh = h/100*dif;

	for(var div of document.getElementsByClassName('grid_item')){
		div.style.width = 47*vw/rows;
		div.style.height = 47*vw/rows;
	}
}

function requestRows() {
	rows = document.getElementById('request_rows').value;
	createArr();
}

function createArr() {
	arr = [];
	while (gridWrapper.firstChild) {
		gridWrapper.removeChild(gridWrapper.firstChild);
	}
	for (var i = 0; i < rows; i++) {
		arr[i] = [];
		for (var j = 0; j < rows; j++) {
			arr[i][j] = "";
			createDiv(i, j);
		}
	}
}

for(var i = 0; i < logo.length; i++){
	logo[i].ondragstart = function(e){
		e.dataTransfer.setData('data', this.id);
		e.dataTransfer.setData('color', getComputedStyle(this, null).getPropertyValue("background-color"));
		e.dataTransfer.setData('innerText', this.innerHTML);
		
	}
}

function alert() {
	if (confirm("Is This Your Final Game Map?")) {
		setGameMap();
	}
}

function setGameMap() {
	var l = arr.length;
	var items = document.getElementsByClassName('grid_item');
	for (var i = 0; i < l; i++) {
		for (var j = 0; j < l; j++){
			if (items[i * l + j].id != "" ) {
				arr[i][j] = items[i * l +j].id ;
			}
		}
	}
	
	while (gridWrapper.firstChild) { // Remove table
		gridWrapper.removeChild(gridWrapper.firstChild);
	}
	
	setUpMatter();
	createMap();
	
}


