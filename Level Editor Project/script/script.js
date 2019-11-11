var map = [];
var keys = [];	
var jump = false;

document.onkeydown = function(e){
	e.preventDefault();
	key = e.keyCode;
	if (key != 32) {
		keys[key] = true;
	} else {
		character.jump();
		console.log("keypressed");
	}
}

//defines the array value of keyCode(The key pressed on) to false
 document.onkeyup = function(e){
	key = e.keyCode;
	keys[key] = false;
}

var character;

function createMap() {	
	for (var y = 0; y < arr.length; y++) {
		for (var x = 0; x < arr.length; x++){
			if (arr[y][x] == "start") {
				character = (new Character(x*50 + 25, y*50 + 20 , 5, "white"));
				map.push(character);
				map.push(new Flat(x*50 + 25, y*50 + 25, 50, 50, "white"));
			}
			if (arr[y][x] == "flat") {
				map.push(new Flat(x*50 + 25, y*50 + 25, 50, 50,  "white"));
			}
			if (arr[y][x] == "ice") {
				map.push(new Ice(x*200 + 100, y*100 + 50, 200, 100,  "blue"));
			}
			if (arr[y][x] == "mud") {
				map.push(new Mud(x*200 + 100, y*100 + 50, 200, 100,  "blue"));
			}
			if (arr[y][x] == "lava") {
				map.push(new Lava(x*200 + 100, y*100 + 50, 200, 100,  "blue"));
			}
			if (arr[y][x] == "bouncy") {
				map.push(new BouncePad(x*200 + 100, y*100 + 50, 200, 100,  "blue"));
			}
		}
	}		
			
	
	
	setInterval(update, 10);
}


function update() {
	 for (var i = 0; i < engine.world.bodies.length; i++) {
		 

		if (engine.world.bodies[i].id != "character") {
			if (character.body.position.x >= render.canvas.width - 120) {
				Body.setPosition(engine.world.bodies[i], {x : engine.world.bodies[i].position.x - character.body.velocity.x, y : engine.world.bodies[i].position.y});
				Body.setPosition(character.body, {x : render.canvas.width - 120, y : character.body.position.y});
			}	
			
			if (character.body.position.x <= 120) {
				Body.setPosition(engine.world.bodies[i], {x : engine.world.bodies[i].position.x - character.body.velocity.x, y : engine.world.bodies[i].position.y});
				Body.setPosition(character.body, {x : 120, y : character.body.position.y});
			}
			
			if (character.body.position.y >= render.canvas.height - 250) {
				Body.setPosition(engine.world.bodies[i], {x : engine.world.bodies[i].position.x, y: engine.world.bodies[i].position.y - character.body.velocity.y});
				Body.setPosition(character.body, {x : character.body.position.x, y : render.canvas.height - 250});
			}
		}
	 }

	character.move();
	character.hits();	
}



	
	