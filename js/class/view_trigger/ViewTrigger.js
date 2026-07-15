/*----------------------------- view_trigger -----------------------------*/

class ViewTrigger {
	static defaults = {
		positionExecute: 0, 
		countExecute: false, 
		funcCallbackShow: (
			el, 
			count 
		) => {}, 
		funcCallbackHide: (
			el, 
			count 
		) => {} 
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
		this.countExecute = 0;
		const 
		observerOptions = {
			root: null, 
			rootMargin: `${this.configs.positionExecute}px 0px ${this.configs.positionExecute}px 0px`, 
			threshold: 0 
		};
		this.observer = new IntersectionObserver(
			this.funcHandleIntersect.bind(this), 
			observerOptions 
		);
		this.funcInit();
	}
	
	funcInit() {
		this.observer.observe(this.el);
	}
	
	funcHandleIntersect(entries) {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				this.countExecute++;
				this.configs.funcCallbackShow(
					this.el, 
					this.countExecute 
				);
			} else 
			if(this.countExecute > 0){
				this.configs.funcCallbackHide(
					this.el, 
					this.countExecute 
				);
				if (
					this.configs.countExecute !== false && 
					this.countExecute >= this.configs.countExecute 
				)
				this.funcDestroyIntersect();
			}
		});
	}
	
	funcDestroyIntersect() {
		this.observer.unobserve(this.el);
		this.observer.disconnect();
	}
}
/*----------------------------- /view_trigger -----------------------------*/