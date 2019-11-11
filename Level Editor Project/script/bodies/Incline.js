
function Incline(x, y, w, h, color) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.show = function() {
		ctx.fillStyle = color;
		ctx.beginPath();
		ctx.moveTo(this.x, this.y);
		ctx.lineTo(this.x + this.w, this.y);
		ctx.lineTo(this.x + this.w, this.y - this.h);
		ctx.lineTo(this.x, this.y);
		ctx.fill();
		ctx.closePath();
	}
}