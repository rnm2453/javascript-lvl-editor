function createDiv(c, r) {
	var div;
	div = document.createElement('div');
	div.style.width = 47*vw/rows;
	div.style.height = 47*vw/rows;
	div.style.float = 'left';
	div.style.borderStyle = 'solid';
	div.style.borderWidth = 0.02;
	div.style.borderColor = 'black';
	div.style.borderRadius = 0;
	div.className = "grid_item";
	
	
	div.ondragover = function(e){
		e.preventDefault();
	}
	
	div.ondrop = function(e){
		e.preventDefault();
		var data = e.dataTransfer.getData('data');
		e.target.id	= data;
		var color = e.dataTransfer.getData('color');
		e.target.style.backgroundColor = color;
		var innerText = e.dataTransfer.getData('innerText');
		e.target.innerHTML = innerText;
	}
	
	if ((c % 2 == 0 && r % 2 == 0) || (c % 2 != 0 && r % 2 != 0)) {
		div.style.backgroundColor = '#E2EDF4';
	} else {
		div.style.backgroundColor = 'white';
	}
	
	
	grid = document.getElementById('grid_wrapper').appendChild(div);
}
