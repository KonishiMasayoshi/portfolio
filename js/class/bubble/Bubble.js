/*----------------------------- bubble -----------------------------*/

class Bubble {
	static defaults = {
		createInterval: 1000, 
		limitBubble: 20, 
		className: {
			parent: 'bubble', 
			child: 'bubble_child' 
		}, 
		size: {
			min: 30, 
			max: 100 
		}, 
		duration: {
			y: {
				min: 15, 
				max: 25 
			}, 
			x: {
				min: 10, 
				max: 15 
			} 
		}, 
		animationName: 'bubble-fade' 
	};
	
	constructor(
		element, 
		options = {} 
	) {
		this.el = typeof element === 'string' ? document.querySelector(element) : element;
		if (!this.el) return;
		this.configs = Object.assign(
			{}, 
			this.constructor.defaults, 
			options 
		);
		this.funcInit();
	}
	
	funcInit() {
		setInterval(
			() => this.funcCreateBubble(), 
			this.configs.createInterval 
		);
	}
	
	funcRandomInt(
		min = 0, 
		max = 100 
	) {
		return Math.floor(Math.random() * (max + 1 - min)) + min;
	}
	
	funcCreateBubble() {
		if(document.querySelectorAll(`.${this.configs.className.parent}`).length >= this.configs.limitBubble)
		return;
		const 
		parent = document.createElement('div'), 
		child = document.createElement('div'), 
		size = this.funcRandomInt(
			this.configs.size.min, 
			this.configs.size.max 
		), 
		xPos = this.funcRandomInt(), 
		durationY = this.funcRandomInt(
			this.configs.duration.y.min, 
			this.configs.duration.y.max 
		), 
		durationX = this.funcRandomInt(
			this.configs.duration.x.min, 
			this.configs.duration.x.max 
		);
		
		parent.classList.add(this.configs.className.parent);
		parent.style.width = `${size}px`;
		parent.style.left = `${xPos}vw`;
		parent.style.animationDuration = `${durationY}s, ${durationY}s`;
		child.classList.add(this.configs.className.child);
		child.style.animationDuration = `${durationX}s`;
		
		parent.appendChild(child);
		this.el.appendChild(parent);
		parent.addEventListener(
			'animationend', 
			(event) => {
				if(
					event.animationName === this.configs.animationName && 
					parent.parentNode 
				)
				parent.remove();
			} 
		);
	}
}
/*----------------------------- /bubble -----------------------------*/