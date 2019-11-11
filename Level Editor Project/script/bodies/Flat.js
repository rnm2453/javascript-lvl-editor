
function Flat(x, y, w, h, color) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	
	var options = {
		id : "flat",
		isStatic : true,
		friction : 0,
		Inertia : Infinity,
		collisonFilter : {category : 2},
		render : { fillStyle : "#ffffff", strokeStyle : "#000000"}
	};

	var wrapper = {
		isSleeping : true,
		collisonFilter : {category : 2},
		render : { fillStyle : "#ffffff", strokeStyle : "#000000"}
	};
	
	this.body = Bodies.rectangle(x, y, w, h, options);
	this.wrap = Bodies.rectangle(x, y, w + 1, h - 1, wrapper);
	
	World.add(engine.world, [this.body, this.wrap]);
	
}


