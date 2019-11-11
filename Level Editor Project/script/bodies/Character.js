
function Character(x, y, r) {
	this.x = x;
	this.y = y;
	this.r = r;
	
	var options = {
		id : "character",
		mass : 30,
		airFriction : 0.8,
	//	inertia: Infinity,
		collisonFilter : {category : 1},
		render : { fillStyle : "#2eba8b", strokeStyle : "#000000"}
	};
	
	this.body = Bodies.circle(x, y, r, options);
	
	World.add(engine.world, this.body);
	
	this.move = function() { {
			if (keys[39] && this.body.speed < 2) {
				Body.applyForce(this.body, this.body.position, {x: 0.015, y: 0});
				//Body.setAngularVelocity(this.body, 0.005);
				//console.log(character.speed);
			}
			if (keys[37] && this.body.speed < 2) {
				Body.applyForce(this.body, this.body.position, {x: -0.015, y: 0});
				//Body.setAngularVelocity(this.body, -0.005);
				//console.log(character.speed);
			}
		}
	}
	
	this.jump = function() {
		if (jump) {
			Body.applyForce(this.body, this.body.position, {x: 0, y: -0.88});
			console.log("jump");
			jump = false;
		}
	}
	
	this.hits = function() {
		for (var i = 0; i < map.length; i++) {
			if (map[i].body.id != "character" && Matter.SAT.collides(this.body, map[i].body).collided) {
				jump = true;
				if (map[i].body.id == "ice") { 
					this.body.friction = 0.0;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "flat") { 
					this.body.friction = 0.25;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "mud") { 
					this.body.friction = 0.65;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "bouncy") { 
					this.body.friction = 0.25;
					this.body.restitution = 0.8;
				}
				if (map[i].body.id == "lava") { 
					this.body.friction = 0.25;
					this.body.restitution = 0;
					console.log("dead");
				}
			}
		}
	}
}




/*function Character(x, y, w, h, color) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	
	var options = {
		id : "character",
		mass : 30,
		airFriction : 0.8,
	//	inertia: Infinity,
		collisonFilter : {category : 1},
		render : { fillStyle : "#2eba8b", strokeStyle : "#000000"}
	};
	
	this.body = Bodies.rectangle(x, y, w, h, options);
	
	World.add(engine.world, this.body);
	
	this.move = function() { {
			if (keys[39] && this.body.speed < 1) {
				Body.applyForce(this.body, this.body.position, {x: 0.015, y: 0});
				Body.setAngularVelocity(this.body, 0.005);
				//console.log(character.speed);
			}
			if (keys[37] && this.body.speed < 1) {
				Body.applyForce(this.body, this.body.position, {x: -0.015, y: 0});
				Body.setAngularVelocity(this.body, -0.005);
				//console.log(character.speed);
			}
		}
	}
	
	this.jump = function() {
		if (jump) {
			Body.applyForce(this.body, this.body.position, {x: 0, y: -0.88});
			console.log("jump");
			jump = false;
		}
	}
	
	this.hits = function() {
		for (var i = 0; i < map.length; i++) {
			if (map[i].body.id != "character" && Matter.SAT.collides(this.body, map[i].body).collided) {
				jump = true;
				if (map[i].body.id == "ice") { 
					this.body.friction = 0.0;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "flat") { 
					this.body.friction = 0.25;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "mud") { 
					this.body.friction = 0.65;
					this.body.restitution = 0;
				}
				if (map[i].body.id == "bouncy") { 
					this.body.friction = 0.25;
					this.body.restitution = 0.8;
				}
				if (map[i].body.id == "lava") { 
					this.body.friction = 0.25;
					this.body.restitution = 0;
					console.log("dead");
				}
			}
		}
	}
}
*/