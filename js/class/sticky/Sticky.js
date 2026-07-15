/*----------------------------- sticky -----------------------------*/

class Sticky {
	static defaults = {
		timeResize: 100, 
		funcCallbackActive: () => {}, 
		funcCallbackInactive: () => {} 
	};
	
	constructor(
		element, 
		options = {} 
	){
		this.el = typeof element === 'string' ? document.querySelector(element) : element;
		if (!this.el)
		return;
		this.configs = Object.assign(
			{}, 
			this.constructor.defaults, 
			options 
		);
		this.posEl = 0;
		this.condition = 'inactive';
		this.timerResize = null;
		this.eleParent = null;
		this.funcInit();
	}
	
	funcInit(){
		this.eleParent = document.createElement('div');
		this.eleParent.className = 'sticky_outer';		
		this.el.parentNode.insertBefore(
			this.eleParent, 
			this.el 
		);
		this.eleParent.appendChild(this.el);
		this.el.classList.add('sticky_inner');
		this.condition = 'inactive';
		this.funcAddEventListener();
		this.funcPutPosExecute();
		this.funcAddResizeObserver();
	}
	
	funcGetAbsoluteTop(){
		const 
		rect = this.eleParent.getBoundingClientRect(), 
		scrollTop = window.scrollY || document.documentElement.scrollTop;
		return rect.top + scrollTop;
	}
	
	funcPutPosExecute(){
		this.posEl = this.funcGetAbsoluteTop();
		this.funcExecute();
	}
	
	funcExecute(){
		const 
		scrollTop = window.scrollY || document.documentElement.scrollTop;
		if(
			this.condition === 'inactive' && 
			scrollTop > this.posEl 
		){
			const 
			computedStyle = window.getComputedStyle(this.eleParent), 
			marginTop = parseFloat(computedStyle.marginTop) || 0, 
			marginBottom = parseFloat(computedStyle.marginBottom) || 0, 
			outerHeightWithMargin = this.eleParent.offsetHeight + marginTop + marginBottom;
			
			this.eleParent.style.height = `${outerHeightWithMargin}px`;
			this.el.classList.add('sticky_active');
			this.configs.funcCallbackActive();
			this.condition = 'active';
			
		}else if(
			this.condition === 'active' && 
			scrollTop <= this.posEl 
		){
			this.eleParent.style.height = 'auto';
			this.el.classList.remove('sticky_active');
			this.configs.funcCallbackInactive();
			this.condition = 'inactive';
		}
	}
	
	funcAddEventListener(){
		window.addEventListener(
			'scroll', 
			() => {
				if (this._raf) return;
				this._raf = requestAnimationFrame(() => {
					this._raf = null;
					this.funcExecute();
				});
			} 
		);
	}
	
	funcAddResizeObserver(){
		this.resizeObserver = new ResizeObserver(() => {
			clearTimeout(this.timerResize);
			this.timerResize = setTimeout(() => {
				requestAnimationFrame(() => {
					this.funcPutPosExecute();
				});
			}, this.configs.timeResize);
		});
		this.resizeObserver.observe(this.el);
	}
}
/*----------------------------- /sticky -----------------------------*/