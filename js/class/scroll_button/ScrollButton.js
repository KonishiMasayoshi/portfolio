/*----------------------------- scroll_button -----------------------------*/

class ScrollButton {
	static instances = new Set();
	static defaults = {
		speedDisplaySwitch: 300, 
		displayPosition: 10, 
		speedScroll: 600, 
		timeScroll: 100, 
		limitAdjustment: 5, 
		scrollTolerance: 5, 
		funcCallbackExecuteStart: (
			el, 
			callback 
		) => {
			callback();
		}, 
		funcCallbackExecuteEnd: (el) => {} 
	};
	
	static patternUnsignedInt = /^\d+$/;
	
	constructor(
		element, 
		options = {} 
	){
		this.el = typeof element === 'string' ? document.querySelector(element) : element;
		if (!this.el) return;
		this.configs = Object.assign(
			{}, 
			this.constructor.defaults, 
			options 
		);
		this.flagShow = false;
		this.timerScroll = null;
		this.activeFxTimer = null;    
		this.activeRetryTimer = null; 
		ScrollButton.instances.add(this);
		this.funcInit();
	}
	
	funcInit(){
		this.funcInitScroll();
		this.funcAddEventListener();
	}
	
	funcConfirmShow = () => {
		const 
		scrollTop = window.scrollY || document.documentElement.scrollTop, 
		winHeight = window.innerHeight, 
		docHeight = document.documentElement.scrollHeight, 
		attrPosition = this.el.getAttribute('data-scroll-button-scroll-position');
		if (typeof attrPosition !== 'string')
		return false;
		switch (true) {
			case attrPosition === 'top':
				return scrollTop >= this.configs.displayPosition;
			case attrPosition === 'bottom':
				return scrollTop + winHeight <= docHeight - this.configs.displayPosition;
			case !!attrPosition.match(this.constructor.patternUnsignedInt):
				const scrollPosition = parseInt(attrPosition, 10);
				return (
					(scrollTop + winHeight <= scrollPosition - this.configs.displayPosition) || 
					(scrollTop >= scrollPosition + this.configs.displayPosition)
				);
			default:
				const 
				targetEl = document.querySelector(attrPosition);
				if(!targetEl)
				return false;
				const 
				rect = targetEl.getBoundingClientRect(), 
				posStart = rect.top + scrollTop, 
				posEnd = posStart + targetEl.offsetHeight;
				return (
					(scrollTop + winHeight <= posStart - this.configs.displayPosition) || 
					(scrollTop >= posEnd + this.configs.displayPosition)
				);
		}
	}
	
	funcShowEl = () => {
		this.el.style.display = 'flex';
		this.el.style.transition = `opacity ${this.configs.speedDisplaySwitch}ms ease-in-out`;
		requestAnimationFrame(() => {
			this.el.style.opacity = '1';
		});
	}
	
	funcHideEl = () => {
		this.el.style.transition = `opacity ${this.configs.speedDisplaySwitch}ms ease-in-out`;
		this.el.style.opacity = '0';
		
		setTimeout(() => {
			if (this.el.style.opacity === '0') {
				this.el.style.display = 'none';
			}
		}, this.configs.speedDisplaySwitch);
	}
	
	funcInitScroll = () => {
		const 
		dataToggle = this.el.getAttribute('data-scroll-button-display-toggle'), 
		isDisplayToggle = (
			dataToggle === 'true' || 
			dataToggle === '' 
		);
		if (!isDisplayToggle)
		return false;
		if (this.funcConfirmShow()) {
			this.flagShow = true;
			this.funcShowEl();
		} else {
			this.flagShow = false;
			this.funcHideEl();
		}
	}
	
	funcGetScrollPosition = () => {
		const 
		docHeight = document.documentElement.scrollHeight, 
		attrPosition = this.el.getAttribute('data-scroll-button-scroll-position'), 
		attrPermission = this.el.getAttribute('data-scroll-button-permission');
		if (
			typeof attrPosition !== 'string' || 
			attrPermission === 'false' 
		)
		return false;
		switch (true) {
			case attrPosition === 'top':
				return 0;
			case attrPosition === 'bottom':
				return Math.max(
					0, 
					docHeight - window.innerHeight 
				);
			case !!attrPosition.match(this.constructor.patternUnsignedInt):
				return parseInt(
					attrPosition, 
					10 
				);
			default:
				const 
				targetEl = document.querySelector(attrPosition);
				if(!targetEl)
				return false;
				const 
				scrollTop = window.scrollY || document.documentElement.scrollTop;
				return targetEl.getBoundingClientRect().top + scrollTop;
		}
	}
	
	nativeStop = () => {
		ScrollButton.instances.forEach((instance) => {
			if (instance.activeFxTimer) {
				cancelAnimationFrame(instance.activeFxTimer);
				instance.activeFxTimer = null;
			}
			if (instance.activeRetryTimer) {
				clearTimeout(instance.activeRetryTimer);
				instance.activeRetryTimer = null;
			}
		});
	}
	
	funcExecuteScroll = (count) => {
		if (count >= this.configs.limitAdjustment) {
			this.configs.funcCallbackExecuteEnd(this.el);
			return false;
		}
		
		const 
		scrollPosition = this.funcGetScrollPosition();
		if (scrollPosition === false)
		return;
		this.nativeStop();
		const 
		startPosition = window.scrollY || document.documentElement.scrollTop, 
		distance = scrollPosition - startPosition, 
		duration = this.configs.speedScroll; 
		let 
		startTime = null;
		const 
		cubicBezierSwing = (t) => {
			return t * t * (3 - 2 * t);
		}, 
		animationLoop = (currentTime) => {
			if (startTime === null)
			startTime = currentTime;
			const 
			timeElapsed = currentTime - startTime, 
			progress = Math.min(timeElapsed / duration, 1), 
			currentProgressPosition = startPosition + (distance * cubicBezierSwing(progress));
			window.scrollTo(
				0, 
				currentProgressPosition 
			);
			if (progress < 1) {
				this.activeFxTimer = requestAnimationFrame(animationLoop);
			} else {
				this.activeFxTimer = null;
				this.activeRetryTimer = setTimeout(funcCallbackScrollFinish, 10);
			}
		}, 
		funcCallbackScrollFinish = () => {
			this.activeRetryTimer = null;
			const 
			currentScrollPosition = this.funcGetScrollPosition(), 
			scrollTop = window.scrollY || document.documentElement.scrollTop;
			if (
				scrollTop < currentScrollPosition - this.configs.scrollTolerance || 
				scrollTop > currentScrollPosition + this.configs.scrollTolerance
			) {
				this.funcExecuteScroll(count + 1);
				return false;
			}
			this.configs.funcCallbackExecuteEnd(this.el);
		};
		this.activeFxTimer = requestAnimationFrame(animationLoop);
	}
	
	funcAddEventListener = () => {
		const 
		dataToggle = this.el.getAttribute('data-scroll-button-display-toggle'), 
		isDisplayToggle = (
			dataToggle === 'true' || 
			dataToggle === '' 
		);
		this.el.addEventListener(
			'click', 
			(event) => {
				event.preventDefault();
				this.configs.funcCallbackExecuteStart(this.el, () => {
					this.funcExecuteScroll(0);
				});
			} 
		);
		if (
			isDisplayToggle && 
			this.configs.displayPosition.toString().match(this.constructor.patternUnsignedInt) 
		)
		window.addEventListener(
			'scroll', 
			() => {
				clearTimeout(this.timerScroll);
				const 
				funcFinishScroll = () => {
					const 
					confirmShow = this.funcConfirmShow();
					if (confirmShow && this.flagShow === false) {
						this.flagShow = true;
						this.funcShowEl();
					} else if (confirmShow === false && this.flagShow) {
						this.flagShow = false;
						this.funcHideEl();
					}
				};
				this.timerScroll = setTimeout(funcFinishScroll, this.configs.timeScroll);
			}, 
			{
				passive:true 
			} 
		);
	}
}

/*----------------------------- /scroll_button -----------------------------*/