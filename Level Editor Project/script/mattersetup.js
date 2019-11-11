// module aliases
var Engine = Matter.Engine,
    Render = Matter.Render,
    World = Matter.World,
	Body = Matter.Body,
    Bodies = Matter.Bodies;


// create an engine
var engine = Engine.create();

var render;
function setUpMatter() {
// create a renderer
    render = Render.create({
    element: document.getElementById("grid_wrapper"),
    engine: engine,
	options: {
		background : "#c95122",
		wireframes : false

    }
});

// Set Render Borders
render.canvas.width = 47*vw;
render.canvas.height = 47*vw;

var left = Bodies.rectangle(0, render.canvas.height/2, 4, render.canvas.height, {id : "wall", isStatic: true});
var right = Bodies.rectangle(arr.length * 200, render.canvas.height/2, 4, render.canvas.height, {id : "wall", isStatic: true});
World.add(engine.world, [left, right] );

// run the engine
Engine.run(engine);

// run the renderer
Render.run(render);
}