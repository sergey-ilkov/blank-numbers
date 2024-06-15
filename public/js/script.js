function correctionWrapperMargin(margin = 0) {
    wrapper.style.marginRight = margin + 'px';
}

function scrollToElement(el) {
    let offsetPositon = el.getBoundingClientRect().top;
    window.scrollBy({
        top: offsetPositon,
        behavior: 'smooth',
    });
}

const wrapper = document.querySelector('.wrapper');
const burgerMenu = document.querySelector('#burger-menu');
const navMenu = document.querySelector('#nav-menu');
const divBody = document.querySelector('body');

if (burgerMenu) {
    burgerMenu.addEventListener('click', () => {
        let width1 = wrapper.offsetWidth;

        burgerMenu.classList.toggle('open');
        navMenu.classList.toggle('open');
        divBody.classList.toggle('fixed');

        let width2 = wrapper.offsetWidth;
        let margin = width2 - width1;
        if (burgerMenu.classList.contains('open')) {
            correctionWrapperMargin(margin);
        } else {
            correctionWrapperMargin();
        }

    })

}


if (navMenu) {

    const linksAnchor = navMenu.querySelectorAll('.link-anchor');

    linksAnchor.forEach(link => {
        link.addEventListener('click', (e) => {

            if (navMenu.classList.contains('open')) {
                let width1 = wrapper.offsetWidth;

                burgerMenu.classList.remove('open');
                navMenu.classList.remove('open');
                divBody.classList.remove('fixed');

                let width2 = wrapper.offsetWidth;
                let margin = width2 - width1;
                if (burgerMenu.classList.contains('open')) {
                    correctionWrapperMargin(margin);
                } else {
                    correctionWrapperMargin();
                }

            }

        })
    })
}



// ? scroller
class ScrollerInfinite {
    constructor(divScroller, settings = {}) {

        this.divScroller = divScroller;

        this.options = {
            scrollerList: '.top-question__list',
            gap: 20,
            speed: 10, // s
            direction: 'left'
        }

        Object.assign(this.options, settings);

        this.scrollerList = this.divScroller.querySelector(this.options.scrollerList);
        this.currentHtml = this.scrollerList.innerHTML;

        this.init();
    }

    init() {

        this.enableScroller();

        this.setStyle();

    }

    enableScroller() {
        this.divScroller.setAttribute('data-animated', true);

        let html = '';

        for (let i = 0; i < 6; i++) {
            html += this.currentHtml;
        }

        this.scrollerList.innerHTML = html;

    }

    setStyle() {
        this.divScroller.style.overflow = 'hidden';
        this.scrollerList.style.width = 'max-content';

        this.scrollerList.style.display = 'flex';
        this.scrollerList.style.gap = `${this.options.gap}px`;

        this.scrollerList.style.setProperty('--translate', `calc(-50% - ${this.options.gap / 2}px)`);
        this.scrollerList.style.setProperty('--scroll-duration', `${this.options.speed}s`);

        if (this.options.direction == 'left') {
            this.scrollerList.style.setProperty('--scroll-direction', 'forwards');
        }
        if (this.options.direction == 'right') {
            this.scrollerList.style.setProperty('--scroll-direction', 'reverse');
        }
    }

}

const divScroller1 = document.querySelector('#scroller-1');
const divScroller2 = document.querySelector('#scroller-2');
const divScroller3 = document.querySelector('#scroller-3');

if (divScroller1) {
    const scroller1 = new ScrollerInfinite(divScroller1, {
        scrollerList: '.top-question__list',
        gap: 40,
        speed: 100,
        direction: 'left'
    });
}
if (divScroller2) {
    const scroller2 = new ScrollerInfinite(divScroller2, {
        scrollerList: '.top-question__list',
        gap: 40,
        speed: 100,
        direction: 'right'
    });
}
if (divScroller3) {
    const scroller3 = new ScrollerInfinite(divScroller3, {
        scrollerList: '.top-question__list',
        gap: 40,
        speed: 100,
        direction: 'left'
    });
}



class ModalGalleryImages {
    constructor(divGallery, divModal, settings = {}) {
        this.divGallery = divGallery;
        this.divModal = divModal;

        this.options = {
            modalClassOpen: 'open',
            modalBody: '.modal-gallery-body',
            modalImage: '.modal-gallery__image',
            bodyClassFixed: 'fixed',
            item: '.gallery-item',
            src: 'data-src',
            speed: 400, // ms       
            buttons: '.modal-gallery-btn',
            action: 'data-action',
            breackpoins: 800,
        }

        Object.assign(this.options, settings);

        this.divBody = document.querySelector('body');
        this.divWrapper = document.querySelector('.wrapper');

        this.divModalBody = this.divModal.querySelector(this.options.modalBody);
        this.divModalImage = this.divModal.querySelector(this.options.modalImage);
        this.preloader = this.divModal.querySelector('.modal-preloader');

        this.items = this.divGallery.querySelectorAll(this.options.item);
        this.buttons = this.divModal.querySelectorAll(this.options.buttons);

        this.pathImagesArray = [];

        this.currentIndex = 0;

        this.timerId = null;

        this.loaded = false;


        this.init();
    }

    init() {

        this.getPathImages();

        this.setStyle();

        this.events();
    }

    getPathImages() {
        this.items.forEach(item => {

            const src = item.getAttribute(this.options.src);
            this.pathImagesArray.push(src);
        })
    }

    showImage() {
        this.divModalImage.src = this.pathImagesArray[this.currentIndex];
        this.divModalImage.classList.add('show');

    }

    hiddenImage() {
        this.divModalImage.classList.remove('show');
    }

    setStyle() {
        this.divModalImage.style.transition = `opacity ${this.options.speed}ms ease`;
    }


    loadImages() {

        for (let i = 0; i < this.pathImagesArray.length; i++) {
            const img = document.createElement('img');
            img.src = this.pathImagesArray[i];

            img.onload = () => {
                if (this.pathImagesArray.length - 1 == i) {

                    if (this.preloader) {
                        this.preloader.classList.add('hidden');
                    }
                    this.divModalBody.classList.add('loaded');
                    this.loaded = true;
                    this.showImage();
                }
            }
        }
    }

    prev() {

        this.currentIndex -= 1;
        if (this.currentIndex < 0) {
            this.currentIndex = this.pathImagesArray.length - 1;
        }
        this.hiddenImage();

        this.timerId = setTimeout(() => {
            clearTimeout(this.timerId);
            this.showImage();

        }, this.options.speed);

    }
    next() {

        this.currentIndex += 1;
        if (this.currentIndex > this.pathImagesArray.length - 1) {
            this.currentIndex = 0;
        }

        this.hiddenImage();

        this.timerId = setTimeout(() => {
            clearTimeout(this.timerId);
            this.showImage();

        }, this.options.speed);
    }

    events() {

        this.items.forEach((item, index) => {
            item.addEventListener('click', () => {

                if (window.innerWidth >= this.options.breackpoins) {
                    this.currentIndex = index;
                    this.open();

                    if (this.loaded) {
                        this.showImage();
                    } else {
                        this.loadImages();
                    }
                }
            })
        })

        this.buttons.forEach(btn => {
            btn.addEventListener('click', () => {

                const action = btn.getAttribute(this.options.action);

                if (action === 'close') {
                    this.close();
                }
                if (action === 'prev') {
                    this.prev();
                }
                if (action === 'next') {
                    this.next();
                }

            })
        })

        this.divModal.addEventListener('click', (e) => {
            if (!e.target.closest(this.options.modalBody)) {
                this.close();
            }
        })

        document.addEventListener('keydown', (e) => {

            if (this.divModal.classList.contains(this.options.modalClassOpen)) {

                if (e.key === 'Escape' || e.keyCode === 27) {
                    this.close();
                }

                if (e.key === 'ArrowLeft' || e.keyCode === 37 || e.key === 'ArrowUp' || e.keyCode === 38) {
                    this.prev();
                }
                if (e.key === 'ArrowRight' || e.keyCode === 39 || e.key === 'ArrowDown' || e.keyCode === 40) {
                    this.next();
                }
            }
        })
    }

    open() {

        let width1 = wrapper.offsetWidth;

        this.divModal.classList.add(this.options.modalClassOpen);
        this.divBody.classList.add(this.options.bodyClassFixed);

        let width2 = wrapper.offsetWidth;
        let margin = width2 - width1;

        this.correctionMargin(margin);
    }

    close() {

        this.divModal.classList.remove(this.options.modalClassOpen);
        this.divBody.classList.remove(this.options.bodyClassFixed);
        this.correctionMargin(0);

        this.divModalImage.src = '';
        this.divModalImage.classList.remove('show');
    }

    correctionMargin(margin) {
        this.divWrapper.style.marginRight = margin + 'px';
    }
}


const divEducationGallery = document.querySelector('#education-gallery');
const divModalGallery = document.querySelector('#modal-gallery-1');

if (divEducationGallery && divModalGallery) {

    const gallery1 = new ModalGalleryImages(divEducationGallery, divModalGallery, {
        modalClassOpen: 'open',
        modalBody: '.modal-gallery-body',
        modalImage: '.modal-gallery__image',
        bodyClassFixed: 'fixed',
        item: '.gallery-item',
        src: 'data-src',
        speed: 400, // ms
        buttons: '.modal-gallery-btn',
        action: 'data-action',
        breackpoins: 800
    })
}


// ? Modal Test
class TestAboutLife {
    constructor(divModal, btnModalOpen, settings = {}) {
        this.divModal = divModal;

        this.btnModalOpen = btnModalOpen;

        this.options = {
            speed: 400, // ms     
        }

        Object.assign(this.options, settings);

        this.modalBody = this.divModal.querySelector('.modal-body');

        this.buttons = this.divModal.querySelectorAll('.modal-btn');
        this.steps = this.divModal.querySelectorAll('.modal-test-step');

        this.currentIndex = 0;
        this.nextStep = 1;
        this.timerId = null;
        this.delay = this.options.speed / 2;

        this.init();

    }
    init() {

        this.setStyle();

        this.events();
    }

    events() {
        this.btnModalOpen.addEventListener('click', () => {
            this.open();
        })

        this.buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const action = btn.getAttribute('data-action');
                if (action === 'close') {
                    this.close();
                }
                if (action === 'next-step') {
                    this.next();
                }
                if (action === 'link-anchor') {

                    this.close();
                    const id = btn.getAttribute('data-target');
                    const el = document.querySelector(`#${id}`);
                    if (el) {
                        scrollToElement(el);
                    }
                }
            })
        })
        this.divModal.addEventListener('click', (e) => {
            if (!e.target.closest('.modal-body')) {
                this.close();
            }
        })

        document.addEventListener('keydown', (e) => {

            if (this.divModal.classList.contains('open')) {

                if (e.key === 'Escape' || e.keyCode === 27) {
                    this.close();
                }
            }
        })

    }

    show() {

        this.steps[this.currentIndex].classList.add('show');
    }

    hidden() {
        this.steps[this.currentIndex].classList.add('hidden');
        this.steps[this.currentIndex].classList.remove('show');
    }

    next() {
        console.log('next');

        if (this.nextStep > this.steps.length - 1) {
            return;
        }

        this.nextStep += 1;

        this.hidden();

        this.timerId = setTimeout(() => {

            this.steps[this.currentIndex].classList.remove('hidden');
            this.steps[this.currentIndex].classList.remove('show');

            this.currentIndex += 1;
            this.show();

        }, this.delay);
    }

    setStyle() {
        this.modalBody.style.setProperty('--duration-show', this.options.speed + 'ms');
        this.modalBody.style.setProperty('--duration-hidden', (this.delay) + 'ms');

    }

    open() {

        let width1 = wrapper.offsetWidth;

        divBody.classList.add('fixed');
        this.divModal.classList.add('open');

        this.show();

        let width2 = wrapper.offsetWidth;
        let margin = width2 - width1;
        correctionWrapperMargin(margin);
    }

    close() {

        this.default();

        this.divModal.classList.remove('open');

        this.steps.forEach(step => {
            step.classList.remove('show');
            step.classList.remove('hidden');
        })

        divBody.classList.remove('fixed');
        correctionWrapperMargin(0);
    }

    default() {
        this.currentIndex = 0;
        this.nextStep = 1;
    }
}

const btnTestModal = document.querySelector('#btn-test-modal');
const divModalTest = document.querySelector('#modal-test');

if (btnTestModal && divModalTest) {

    const testAboutLife = new TestAboutLife(divModalTest, btnTestModal, {
        speed: 1000 // ms
    });
}


// ? Crazy Slider
class CrazySlider {
    constructor(divCrazySlider, sliderBig, settings) {
        this.divCrazySlider = divCrazySlider;
        this.sliderBig = sliderBig;

        this.options = {
            bgColors: ['#ff7a85', '#9cc7a9'],
            duration: 500, // ms
        }

        Object.assign(this.options, settings);


        this.buttons = divCrazySlider.querySelectorAll('.crazy-slider-btn');

        this.sliderMin = null;
        this.timerId = null;
        this.timeAutoRun = 8000;
        this.timeAutoNext = 4000;
        this.timerAutoRunId = null;
        this.flagAutoRun = true;
        this.observer = null;
        this.observerOptions = {
            root: null,
            rootMargin: "500px",
            threshold: 1.0,
        }

        this.init();
    }

    init() {

        this.createMinSlider();

        this.setStyles();

        this.events();

    }

    createMinSlider() {

        this.sliderMin = document.createElement('div');
        this.sliderMin.className = 'crazy-slider-min';
        this.sliderMin.setAttribute('id', 'crazy-slider-min');

        const itemsSliderBig = this.sliderBig.querySelectorAll('.crazy-slide');

        itemsSliderBig.forEach((item, index) => {
            if (index > 0) {
                const duplicateItem = item.cloneNode(true);
                this.sliderMin.appendChild(duplicateItem);
            }
        })

        const duplicateFirstItem = itemsSliderBig[0].cloneNode(true);

        this.sliderMin.appendChild(duplicateFirstItem);

        this.divCrazySlider.appendChild(this.sliderMin);
    }

    setStyles() {

        this.divCrazySlider.style.setProperty('--crazy-duration', this.options.duration + 'ms');

        const itemsSliderBig = this.sliderBig.querySelectorAll('.crazy-slide');
        const itemsSliderMin = this.sliderMin.querySelectorAll('.crazy-slide');

        let counter = 0;

        itemsSliderBig.forEach(item => {
            item.style.setProperty('--bg-slide', this.options.bgColors[counter]);
            counter++;
            if (counter > this.options.bgColors.length - 1) {
                counter = 0;
            }
        })
        counter = 1;

        itemsSliderMin.forEach(item => {
            item.style.setProperty('--bg-slide', this.options.bgColors[counter]);
            counter++;
            if (counter > this.options.bgColors.length - 1) {
                counter = 0;
            }
        })

        itemsSliderMin[itemsSliderMin.length - 1].style.setProperty('--bg-slide', this.options.bgColors[0]);

    }

    events() {

        this.buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const action = btn.getAttribute('data-action');
                this.showSlider(action);
            })
        })

        // ? this.observer
        this.observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {
                    this.flagAutoRun = true;
                    this.showSlider('next');
                    this.observer.unobserve(divCrazySlider);
                }
            })

        }, this.observerOptions);

        this.observer.observe(divCrazySlider);

    }

    stopAutoRun() {
        this.flagAutoRun = false;
        clearTimeout(this.timerAutoRunId);
    }

    pauseAutoRun() {

        clearTimeout(this.timerAutoRunId);

        this.timerAutoRunId = setTimeout(() => {
            clearTimeout(this.timerAutoRunId);

            this.showSlider('next');
            this.autoRun();

        }, this.timeAutoRun);

    }

    autoRun() {
        clearTimeout(this.timerAutoRunId);

        if (this.flagAutoRun) {
            this.timerAutoRunId = setTimeout(() => {

                this.showSlider('next');
                this.autoRun();

            }, this.timeAutoNext);
        }
    }


    showSlider(action) {

        let itemsSliderBig = this.divCrazySlider.querySelectorAll('#crazy-slider-big .crazy-slide');
        let itemsSliderMin = this.divCrazySlider.querySelectorAll('#crazy-slider-min .crazy-slide');

        if (action === 'next') {
            this.divCrazySlider.classList.remove('prev');
            this.sliderBig.appendChild(itemsSliderBig[0]);
            this.sliderMin.appendChild(itemsSliderMin[0]);
            this.divCrazySlider.classList.add('next');
        } else {

            this.divCrazySlider.classList.remove('next');
            let positionLastItem = itemsSliderBig.length - 1;
            this.sliderBig.prepend(itemsSliderBig[positionLastItem]);
            this.sliderMin.prepend(itemsSliderMin[positionLastItem]);
            this.divCrazySlider.classList.add('prev');
        }

        clearTimeout(this.timerId);
        this.timerId = setTimeout(() => {
            this.divCrazySlider.classList.remove('prev');
            this.divCrazySlider.classList.remove('next');
        }, this.options.duration);

    }
}


const divCrazySlider = document.querySelector('#crazy-slider');
const divCrazySliderBig = document.querySelector('#crazy-slider-big');
if (divCrazySlider && divCrazySliderBig) {
    const crazySlider = new CrazySlider(divCrazySlider, divCrazySliderBig,
        {
            bgColors: ['#e63946', '#77917f'],
            duration: 500, // ms
        }
    );
}



// ? Modal Order
class OrderModal {
    constructor(divModal, divButtonsOpenModal, settings = {}) {
        this.divModal = divModal;
        this.divButtonsOpenModal = divButtonsOpenModal;

        this.options = {
            speed: 400, // ms     
        }

        Object.assign(this.options, settings);

        this.modalBody = this.divModal.querySelector('.modal-body');

        this.formOrder = this.divModal.querySelector('#modal-order-form');

        this.buttons = this.divModal.querySelectorAll('.modal-btn');
        this.steps = this.divModal.querySelectorAll('.modal-order__step');

        this.divOrderSelectName = this.divModal.querySelector('#modal-order-select-name');
        this.divOrderSelectPrice = this.divModal.querySelector('#modal-order-select-price');

        this.divPartnerBox = this.divModal.querySelector('.modal-order-form__box-partner');

        this.inputs = this.divModal.querySelectorAll('input');
        this.textarea = this.divModal.querySelector('textarea');

        this.currentIndex = 0;
        this.nextStep = 1;
        this.timerId = null;
        this.delay = this.options.speed / 2;
        this.orderPartners = false;
        this.flagSend = true;

        this.btnSendorder = this.divModal.querySelector('#btn-send-order');
        this.modalAlert = this.divModal.querySelector('.modal-order-alert');

        // ? this.objDate
        this.objData = {
            'order': '',
            'price': 0,
            'name': '',
            'email': '',
            'phone': '',
            'telegram': '',
            'message': '',
            'birthday': '',
            'city-time': '',
            'birthday-partner': '',
            'city-time-partner': '',
            'agree': false,
        };

        this.stepSend = this.divModal.querySelector('.modal-order__step-send');

        this.init();

    }

    init() {

        this.setStyle();

        this.events();
    }

    setOrder(btn) {

        const divOrder = btn.closest('.order');

        const orderName = divOrder.getAttribute('data-order-name');

        const divOrderTitle = divOrder.querySelector('.order-title');
        const divOrderPrice = divOrder.querySelector('.order-price');

        const orderPrice = divOrderPrice.getAttribute('data-order-price');


        if (orderName === 'partners') {
            this.divPartnerBox.classList.add('show');
            this.orderPartners = true;
        } else {
            this.orderPartners = false;
        }


        this.divOrderSelectName.innerHTML = divOrderTitle.innerHTML;
        this.divOrderSelectPrice.innerHTML = divOrderPrice.innerHTML;

        this.objData.order = divOrderTitle.innerHTML;
        this.objData.price = orderPrice;
    }

    clearData(data) {

        data = data.replace("<script>", '');
        data = data.replace("</script>", '');

        data = data.trim();

        return data;
    }

    validationData() {

        let res = true;

        if (this.textarea.value.length < 10) {
            res = false;
            this.addClassError(this.textarea);
        }

        let countEmptyField = 0;
        const emptyfieldArray = [];

        this.inputs.forEach(input => {

            const name = input.getAttribute('name');
            const value = input.value;
            if (name === 'agree' && !input.checked) {
                res = false;
                this.addClassError(input);
            }

            if (name === 'phone' && value === '' || name === 'telegram' && value === '') {
                emptyfieldArray.push(input);
                countEmptyField++;

            } else if (this.orderPartners && value === '') {
                res = false;
                this.addClassError(input);

            } else if (!this.orderPartners && value === '' && name !== 'birthday-partner' && name !== 'city-time-partner') {
                res = false;
                this.addClassError(input);
            }

        })

        if (countEmptyField === 2) {
            res = false;
            emptyfieldArray.forEach(input => {
                this.addClassError(input);
            })
        }

        // ? add objData      
        if (res) {

            this.inputs.forEach(input => {

                const name = input.getAttribute('name');
                const value = this.clearData(input.value);

                this.objData[name] = value;

                if (name == 'birthday' || name == 'birthday-partner') {
                    const arrayDate = value.split('-');
                    this.objData[name] = `${arrayDate[2]}-${arrayDate[1]}-${arrayDate[0]}`;
                }
            })

            this.objData.message = this.clearData(this.textarea.value);

            this.objData.agree = true;
        }

        return res;

    }

    sendData() {

        this.flagSend = false;
        this.btnSendorder.classList.add('disabled');

        // ? locale
        const url = window.location.href;

        const options = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(this.objData)

        };

        fetch(url, options)
            .then(response => {

                if (!response.ok) {
                    throw new Error('Network response was not ok');

                }

                return response.json();
            })

            .then(result => {

                this.stepSend.classList.add('result');

                if (result.status == 'ok') {
                    this.flagSend = true;
                    this.btnSendorder.classList.remove('disabled');
                    this.formOrder.reset();

                } else {

                    this.flagSend = true;
                    this.btnSendorder.classList.remove('disabled');
                    this.stepSend.classList.add('error');

                }

            })
            .catch(error => {
                this.flagSend = true;
                this.btnSendorder.classList.remove('disabled');
                this.stepSend.classList.add('result');
                this.stepSend.classList.add('error');
            });
    }

    events() {
        this.divButtonsOpenModal.forEach(btn => {
            btn.addEventListener('click', () => {

                this.setOrder(btn);

                this.open();
            })
        })

        this.divModal.addEventListener('click', (e) => {
            if (!e.target.closest('.modal-body')) {
                this.close();
            }
        })

        this.buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const action = btn.getAttribute('data-action');
                if (action === 'close') {
                    this.close();
                }

                if (action === 'send-data') {

                    if (this.flagSend && this.validationData()) {

                        this.next();

                        this.sendData();

                    }
                }
            })
        })

        document.addEventListener('keydown', (e) => {

            if (this.divModal.classList.contains('open')) {

                if (e.key === 'Escape' || e.keyCode === 27) {
                    this.close();
                }

            }
        })


        // ? inputs
        this.inputs.forEach(input => {

            input.addEventListener('input', () => {

                const name = input.getAttribute('name');

                if (name === 'phone') {
                    let value = input.value.replace(/[^\d+-]/g, '');

                    input.value = value;
                }

                if (input.value.length > 0) {
                    this.removeClassError(input);
                }

                if (input.value.length > 0 && name == 'phone' || input.value.length > 0 && name == 'telegram') {

                    this.inputs.forEach(input => {
                        const name = input.getAttribute('name');

                        if (name === 'phone' || name === 'telegram') {
                            this.removeClassError(input);
                        }
                    })
                }
            })
        });


        this.textarea.addEventListener('input', () => {

            if (this.textarea.value.length > 10) {
                this.removeClassError(this.textarea);
            }
        })
    }



    addClassError(input) {

        const group = input.closest('.modal-order-form__group');
        group.classList.add('error');
    }
    removeClassError(input) {
        const group = input.closest('.modal-order-form__group');
        group.classList.remove('error');
    }

    show() {

        this.steps[this.currentIndex].classList.add('show');

    }

    hidden() {
        this.steps[this.currentIndex].classList.add('hidden');
        this.steps[this.currentIndex].classList.remove('show');
    }

    next() {

        if (this.nextStep > this.steps.length - 1) {
            return;
        }

        this.nextStep += 1;

        this.hidden();

        clearTimeout(this.timerId);

        this.timerId = setTimeout(() => {

            this.steps[this.currentIndex].classList.remove('hidden');
            this.steps[this.currentIndex].classList.remove('show');

            this.currentIndex += 1;
            this.show();

        }, this.delay);

    }

    setStyle() {
        this.modalBody.style.setProperty('--duration-show', this.options.speed + 'ms');
        this.modalBody.style.setProperty('--duration-hidden', (this.delay) + 'ms');

    }

    open() {

        let width1 = wrapper.offsetWidth;

        divBody.classList.add('fixed');

        this.divModal.classList.add('open');

        this.show();

        let width2 = wrapper.offsetWidth;
        let margin = width2 - width1;
        correctionWrapperMargin(margin);


    }

    close() {

        this.inputs.forEach(input => {
            if (input.getAttribute('name') != '_token') {
                this.removeClassError(input);
            }
        })

        this.removeClassError(this.textarea);

        this.formOrder.reset();
        this.modalAlert.classList.remove('open');

        this.default();

        this.divModal.classList.remove('open');

        this.steps.forEach(step => {
            step.classList.remove('show');
            step.classList.remove('hidden');
        })

        divBody.classList.remove('fixed');
        correctionWrapperMargin(0);

    }

    default() {
        this.currentIndex = 0;
        this.nextStep = 1;

        this.objDate = {};
        this.orderPartners = false;

        this.divPartnerBox.classList.remove('show');

        this.divOrderSelectName.innerHTML = '';
        this.divOrderSelectPrice.innerHTML = '';

    }
}

const divButtonsOpenModal = document.querySelectorAll('.order-btn');
const divOrderModal = document.querySelector('#modal-order');

if (divButtonsOpenModal && divOrderModal) {
    const orderModal = new OrderModal(divOrderModal, divButtonsOpenModal, {

        speed: 1000, // ms 
    });

}


class SquarePythagoras {
    constructor(divSquarePythagoras) {
        this.divSquarePythagoras = divSquarePythagoras;

        this.input = divSquarePythagoras.querySelector('#square-pythagoras-date');

        this.num_1 = this.divSquarePythagoras.querySelector('#pythagoras__num-1');
        this.num_2 = this.divSquarePythagoras.querySelector('#pythagoras__num-2');
        this.num_3 = this.divSquarePythagoras.querySelector('#pythagoras__num-3');
        this.num_4 = this.divSquarePythagoras.querySelector('#pythagoras__num-4');
        this.num_5 = this.divSquarePythagoras.querySelector('#pythagoras__num-5');
        this.num_6 = this.divSquarePythagoras.querySelector('#pythagoras__num-6');
        this.num_7 = this.divSquarePythagoras.querySelector('#pythagoras__num-7');
        this.num_8 = this.divSquarePythagoras.querySelector('#pythagoras__num-8');
        this.num_9 = this.divSquarePythagoras.querySelector('#pythagoras__num-9');
        this.num_10 = this.divSquarePythagoras.querySelector('#pythagoras__num-10');
        this.num_11 = this.divSquarePythagoras.querySelector('#pythagoras__num-11');
        this.num_12 = this.divSquarePythagoras.querySelector('#pythagoras__num-12');
        this.matrix__num_1 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-1');
        this.matrix__num_2 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-2');
        this.matrix__num_3 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-3');
        this.matrix__num_4 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-4');
        this.matrix__num_5 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-5');
        this.matrix__num_6 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-6');
        this.matrix__num_7 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-7');
        this.matrix__num_8 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-8');
        this.matrix__num_9 = this.divSquarePythagoras.querySelector('#pythagoras-matrix__num-9');

        this.init();

    }

    init() {

        this.events();

    }

    events() {

        this.input.addEventListener('keyup', (e) => {

            this.maskData(this.input, e);

        })
        this.input.addEventListener('keydown', (e) => {
            console.log(e.keyCode);

            if (e.keyCode === 8 || e.keyCode === 16 || e.keyCode === 36 || e.keyCode === 46 || e.keyCode === 37 || e.keyCode === 39) {
                return;
            }
            if (this.input.value.length >= 10) {
                e.preventDefault();
                return;
            }
            if (e.keyCode === 110) {
                e.preventDefault();
                return;
            }
        })

    }

    calculatePythagoras(day, month, year) {
        const value_num_1 = [...day, ...month, ...year].reduce((acc, value) => Number(acc) + Number(value));
        this.num_1.innerHTML = value_num_1;
        const value_num_2 = String(value_num_1).split('').reduce((acc, value) => Number(acc) + Number(value));
        this.num_2.innerHTML = value_num_2;
        const value_num_3 = Math.abs(value_num_1 - (2 * Number(day[0])));
        this.num_3.innerHTML = value_num_3;
        const value_num_4 = String(value_num_3).split('').reduce((acc, value) => Number(acc) + Number(value));
        this.num_4.innerHTML = value_num_4;
        const str_num = String(day) + String(month) + String(year) + String(value_num_1) + String(value_num_2) + String(value_num_3) + String(value_num_4);
        const obj = {};

        for (let i = 0; i < str_num.length; i++) {
            const num = str_num[i];
            if (!obj[num]) {
                obj[num] = '';
            }
            obj[num] += String(num);
        }

        const matrixNums = document.querySelectorAll('.pythagoras-matrix__num');
        matrixNums.forEach(num => {
            num.style.fontSize = '20px';
        })

        for (let item in obj) {
            if (obj[item].length >= 6) {
                matrixNums.forEach(num => {
                    num.style.fontSize = '16px';
                })
            }
        }

        this.matrix__num_1.innerHTML = obj[1] || '-';
        this.matrix__num_2.innerHTML = obj[2] || '-';
        this.matrix__num_3.innerHTML = obj[3] || '-';
        this.matrix__num_4.innerHTML = obj[4] || '-';
        this.matrix__num_5.innerHTML = obj[5] || '-';
        this.matrix__num_6.innerHTML = obj[6] || '-';
        this.matrix__num_7.innerHTML = obj[7] || '-';
        this.matrix__num_8.innerHTML = obj[8] || '-';
        this.matrix__num_9.innerHTML = obj[9] || '-';

        let str_1 = obj[1] || '';
        let str_2 = obj[2] || '';
        let str_3 = obj[3] || '';
        let str_4 = obj[4] || '';
        let str_5 = obj[5] || '';
        let str_6 = obj[6] || '';
        let str_7 = obj[7] || '';
        let str_8 = obj[8] || '';
        let str_9 = obj[9] || '';

        const value_num_5 = str_1.length + str_4.length + str_7.length;
        const value_num_6 = str_2.length + str_5.length + str_8.length;
        const value_num_7 = str_3.length + str_6.length + str_9.length;
        this.num_5.innerHTML = value_num_5 || '-';
        this.num_6.innerHTML = value_num_6 || '-';
        this.num_7.innerHTML = value_num_7 || '-';

        const value_num_8 = str_1.length + str_2.length + str_3.length;
        const value_num_9 = str_4.length + str_5.length + str_6.length;
        const value_num_10 = str_7.length + str_8.length + str_9.length;
        this.num_8.innerHTML = value_num_8 || '-';
        this.num_9.innerHTML = value_num_9 || '-';
        this.num_10.innerHTML = value_num_10 || '-';

        const value_num_11 = str_1.length + str_5.length + str_9.length;
        const value_num_12 = str_3.length + str_5.length + str_7.length;
        this.num_11.innerHTML = value_num_11 || '-';
        this.num_12.innerHTML = value_num_12 || '-';

    }
    resetPythagoras() {
        this.matrix__num_1.innerHTML = '';
        this.matrix__num_2.innerHTML = '';
        this.matrix__num_3.innerHTML = '';
        this.matrix__num_4.innerHTML = '';
        this.matrix__num_5.innerHTML = '';
        this.matrix__num_6.innerHTML = '';
        this.matrix__num_7.innerHTML = '';
        this.matrix__num_8.innerHTML = '';
        this.matrix__num_9.innerHTML = '';
        this.num_1.innerHTML = '';
        this.num_2.innerHTML = '';
        this.num_3.innerHTML = '';
        this.num_4.innerHTML = '';
        this.num_5.innerHTML = '';
        this.num_6.innerHTML = '';
        this.num_7.innerHTML = '';
        this.num_8.innerHTML = '';
        this.num_9.innerHTML = '';
        this.num_10.innerHTML = '';
        this.num_11.innerHTML = '';
        this.num_12.innerHTML = '';
    }

    maskData(input, e) {

        input.value = input.value.replace(/[^\d.]/g, '');

        let arrValue = input.value.split('.');

        let day = arrValue[0] || '';
        const month = arrValue[1] || '';
        const year = arrValue[2] || '';

        if (e.keyCode === 8) {

            if (day.length >= 1 && month.length >= 1 && year.length >= 1 && year.length <= 4) {

                day = String(Number(day));
                this.calculatePythagoras(day, month, year);
            } else {
                this.resetPythagoras();
            }
            if (day == '0' || month == '0') {
                this.resetPythagoras();
            }

            return;
        }

        if (day == '0' || month == '0') {
            this.resetPythagoras();
            return;
        }

        if (day.length == 2 && month === '') {
            e.target.value = day + '.';
        }

        if (month.length == 2 && year === '') {
            e.target.value = day + '.' + month + '.';
        }

        let str = '';

        if (Number(day) > 31) {
            str = 31 + '.';
            if (month != '') {
                str += `${month}`;
            }
            if (year != '') {
                str += `.${year.slice(0, 4)}`;
            }
            e.target.value = str;
        }

        if (Number(month) > 12) {
            str = `${day}.`;
            if (month != '') {
                str += 12 + '.';
            }
            if (year != '') {
                str += `${year.slice(0, 4)}`;
            }
            e.target.value = str;
            e.target.value = `${day}.12.${year.slice(0, 4)}`;
        }

        if (year.length > 4) {
            e.target.value = `${day}.${month}.${year.slice(0, 4)}`;
        }


        if (day.length >= 1 && month.length >= 1 && year.length >= 1 && year.length <= 4) {

            day = String(Number(day));

            this.calculatePythagoras(day, month, year);
        } else {
            this.resetPythagoras();
        }

    }

}

// ? square-pythagoras
const divSquarePythagoras = document.querySelector('#square-pythagoras');

if (divSquarePythagoras) {
    const squarePythagoras = new SquarePythagoras(divSquarePythagoras);
}


// ? lazy-images
const optionsLazyImages = {
    root: null,
    rootMargin: '500px',
    threshold: 0
}

const observerLazyImages = new IntersectionObserver(callbackLazyImages, optionsLazyImages);

const lazyImages = document.querySelectorAll('.lazy-image');

if (lazyImages.length > 0) {

    lazyImages.forEach(lazyImage => {
        observerLazyImages.observe(lazyImage);
    })
}

function callbackLazyImages(entries, observer) {
    entries.forEach((entry) => {
        const target = entry.target;
        const dataSrc = target.getAttribute('data-src');
        if (entry.isIntersecting) {
            target.setAttribute('src', dataSrc);
            observer.unobserve(target);
        }
    })
}


// ? GSAP animation
window.onload = () => {

    // ? celebrities
    const sectionCelebrity = document.querySelector('#celebrities');
    if (sectionCelebrity) {
        initCelebirties(sectionCelebrity);
    }

    const divPreloader = document.querySelector('#preloader');
    if (divPreloader) {

        divPreloader.classList.add('start');
    }

    const pageHome = document.querySelector('.page-home');
    const pagePythagoras = document.querySelector('.page-pythagoras');
    const pagePrivacy = document.querySelector('.page-privacy');
    const pageOffer = document.querySelector('.page-offer');
    const pageCelebrities = document.querySelector('.page-celebrities');


    let tlHero = gsap.timeline({

        delay: 2
    });


    let mm = gsap.matchMedia();

    mm.add('(min-width: 1101px)', () => {
        tlHero.from('.logo', { scale: 0, autoAlpha: 0, duration: 0.4 })
            .from('.header-menu__item', { stagger: 0.1, opacity: 0, duration: 0.4 })

    })

    // ? page-privacy or page-offer
    if (pagePrivacy || pageOffer) {
        tlHero.from('.document', { y: 50, opacity: 0, duration: 0.4 })
            .from('.document__title', { x: 100, autoAlpha: 0, duration: 0.4 })
    }

    // ? pagePythagoras
    if (pagePythagoras) {
        tlHero.from('.pythagoras__title', { x: 100, autoAlpha: 0, duration: 0.4 })
            .from('.pythagoras__desc', { y: 50, opacity: 0, duration: 0.4 })
            .from('.square-pythagoras', { scale: 0, opacity: 0, duration: 0.4 })
            .from('.pythagoras__text', { x: 50, opacity: 0, stagger: 0.1, duration: 0.4 })
            .from('.pythagoras-btn-anim', { y: 50, opacity: 0, duration: 0.4 })
    }

    // ? pageCelebrities
    if (pageCelebrities) {
        tlHero.from('.celebrities__title', { x: 100, autoAlpha: 0, duration: 0.4 })
            .fromTo('.celebrities__text', { y: 50, autoAlpha: 0 }, { y: 0, autoAlpha: 1, stagger: 0.2 })
            .from('.celebrities__items', { autoAlpha: 0 })
    }

    // ? Home page
    if (pageHome) {

        gsap.registerPlugin(ScrollTrigger);

        const svgArrow = document.querySelector('.svg-arrow path');
        const lenSvgArrow = Math.ceil(svgArrow.getTotalLength());

        gsap.set(svgArrow, { strokeDasharray: lenSvgArrow, strokeDashoffset: -lenSvgArrow });

        tlHero.from('.hero__subtitle', { y: 20, opacity: 0, duration: 0.4 })
            .from('.hero__title', { x: 100, autoAlpha: 0, duration: 0.4 })
            .from('.hero-btn-anim', { y: 20, opacity: 0, stagger: 0.2, duration: 0.4 })
            .from('.top-questions__desc', { opacity: 0, duration: 0.4 })
            .to(svgArrow, { strokeDashoffset: 0, duration: 0.4 })
            .from('.top-questions__box', { opacity: 0, duration: 0.4 })


        // ? scrollTrigger
        // ? title
        gsap.utils.toArray('.title-anim').forEach(title => {
            gsap.fromTo(title, {
                x: 100,
                opacity: 0
            }, {
                x: 0,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: title,
                    start: 'top 80%',
                }
            })
        })

        // ? text
        gsap.utils.toArray('.text-anim').forEach(text => {
            gsap.fromTo(text, {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: text,
                    start: 'top 80%',
                }
            })
        })

        // ? who__item
        gsap.utils.toArray('.who__item').forEach(item => {
            gsap.fromTo(item, {
                y: 100,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })

        // ? svg-who-decor          
        gsap.fromTo('.svg-who-decor', {
            opacity: 0
        }, {
            opacity: 1,
            duration: 1,
            scrollTrigger: {
                trigger: '.svg-who-decor',
                start: 'top 80%',
            }
        })

        // ? education
        gsap.fromTo('.education', {
            backgroundColor: "#F9F7E8",
        }, {
            backgroundColor: "#77917F",

            duration: 1,
            scrollTrigger: {
                trigger: '.education__title',
                start: 'top 80%',
            }
        })

        // ? education-gallery__image
        gsap.utils.toArray('.education-gallery__image').forEach((item, i) => {
            gsap.fromTo(item, {
                scale: 0,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                delay: 0.2 + (0.1 * i),
                duration: 0.8,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })

        // ? what__item
        gsap.utils.toArray('.what__item').forEach(item => {
            gsap.fromTo(item, {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.8,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })

        // ? how-works__icon
        gsap.utils.toArray('.how-works__icon').forEach(item => {
            gsap.fromTo(item, {
                scale: 0,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })

        // ? how-works__item-text
        gsap.utils.toArray('.how-works__item-text').forEach(item => {
            gsap.fromTo(item, {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: item.closest('.how-works__item'),
                    start: 'top 80%',
                }
            })
        })

        // ? test-btn-anim
        gsap.fromTo('.test-btn-anim', {
            y: 50,
            opacity: 0
        }, {
            y: 0,
            opacity: 1,

            duration: 0.4,
            scrollTrigger: {
                trigger: '.test-btn-anim',
                start: 'top 80%',
            }
        })

        // ? consultations__card
        gsap.utils.toArray('.consultations__card').forEach((item, i) => {
            gsap.fromTo(item, {
                scale: 0,
                opacity: 0
            }, {
                scale: 1,
                opacity: 1,
                delay: 0.2 + (0.1 * i),
                duration: 0.4,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })

        // ? consultations-info__box

        gsap.utils.toArray('.consultations-info__box').forEach(item => {
            gsap.fromTo(item, {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 0.4,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 80%',
                }
            })
        })


        // ? square gsap scroll
        const svgSquare = document.querySelector('#svg-square-anim');

        if (svgSquare && window.innerWidth > 1200) {

            gsap.fromTo(svgSquare, {
                top: '55%',
                left: '23%',
                opacity: 0.5,
                scale: 1,
                rotation: 0,
            }, {
                top: '200%',
                left: '100%',
                scale: 1.6,
                opacity: 1,
                rotation: 360,
                scrollTrigger: {
                    trigger: '.who',
                    start: 'top 60%',
                    end: 'top 10%',
                    scrub: 2,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '200%',
                left: '100%',
                rotation: 0,
            }, {
                top: '350%',
                left: '100%',
                rotation: 720,
                scrollTrigger: {
                    trigger: '.education',
                    start: 'top 60%',
                    end: 'top 10%',
                    scrub: 1,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '350%',
                left: '100%',
                rotation: 0,
            }, {
                top: '500%',
                left: '-10%',
                rotation: -360,
                scrollTrigger: {

                    trigger: '.what',
                    start: 'top 60%',
                    end: 'top 10%',
                    scrub: 2,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '500%',
                left: '-10%',
                rotation: 0,
            }, {
                top: '700%',
                left: '-10%',
                rotation: 720,
                scrollTrigger: {

                    trigger: '.how-works',
                    start: 'top 60%',
                    end: 'top 10%',
                    scrub: 1,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '700%',
                left: '-10%',
                rotation: 0,
            }, {
                top: '850%',
                left: '105%',
                rotation: 720,
                scrollTrigger: {

                    trigger: '.test',
                    start: 'top 60%',
                    end: 'top 20%',
                    scrub: 1,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '850%',
                left: '105%',
                rotation: 0,
            }, {
                top: '1000%',
                left: '105%',
                rotation: 720,
                scrollTrigger: {

                    trigger: '.consultations',
                    start: 'top 50%',
                    end: 'top 0%',
                    scrub: 1,
                }
            })
            gsap.fromTo(svgSquare, {
                top: '1000%',
                left: '105%',
                opacity: 1,
            }, {
                top: '1200%',
                left: '105%',
                rotation: 720,
                opacity: 0,
                scrollTrigger: {

                    trigger: '.warning',
                    start: 'top 50%',
                    end: 'top 0%',
                    scrub: 1,
                }
            })
        }
    }
}


// ?  Celebrity
class Celebrities {
    constructor(sectionCelebrity) {

        this.sectionCelebrity = sectionCelebrity;

        this.CelebritiesItems = this.sectionCelebrity.querySelector('.celebrities__items');

        this.preloaderFilters = this.sectionCelebrity.querySelector('#preloader-filters');
        this.preloaderFiltersBody = this.preloaderFilters.querySelector('.preloader-body');
        this.filters = this.sectionCelebrity.querySelectorAll('.filter');

        this.buttons = this.sectionCelebrity.querySelectorAll('.filter__btn');
        this.selects = this.sectionCelebrity.querySelectorAll('.filter-select');

        this.checkboxItems = null;
        this.itemCurrent = null;
        this.filterCurrent = null;
        this.textSelectCurrent = null;
        this.inputsCurrent = null;
        this.choiceCurrent = [];
        this.htmlCurrent = '';
        this.requestData = {};
        this.filterData = {};
        this.objData = {};
        this.objDataDetails = {};
        this.objSendEmail = {};

        this.inputSearch = this.sectionCelebrity.querySelector('#input-search');
        this.btnSearch = this.sectionCelebrity.querySelector('#btn-search');

        this.btnCancel = this.sectionCelebrity.querySelector('#filter-btn-cancel');
        this.btnSend = this.sectionCelebrity.querySelector('#filter-btn-send');

        this.filterSelectDay = this.sectionCelebrity.querySelector('#filter-select-day');
        this.filterSelectMonth = this.sectionCelebrity.querySelector('#filter-select-month');
        this.filterSelectYear = this.sectionCelebrity.querySelector('#filter-select-year');

        this.divItemResult = this.sectionCelebrity.querySelector('.celebrities__item-result');
        this.divResult = this.sectionCelebrity.querySelector('#celebrities-result');

        this.textResultError = this.divResult.querySelector('.celebrities-result-error');
        this.textResultEmpty = this.divResult.querySelector('.celebrities-result-empty');

        this.divResultShow = this.divResult.querySelector('#celebrities-result-show');
        this.divResultShowList = this.divResult.querySelector('#celebrities-result__list');

        this.btnsResult = this.divResult.querySelector('#result-buttons');
        this.btnResultPrev = this.divResult.querySelector('#btn-result-prev');
        this.btnResultNext = this.divResult.querySelector('#btn-result-next');

        this.indexResult = 0;
        this.stepResult = 20;
        this.stepMax = this.stepResult;

        this.divResultCount = this.divResult.querySelector('#result-count__number');

        this.lang = document.querySelector('html').getAttribute('lang') || 'uk';
        this.token = document.querySelector('[name="csrf-token"]').getAttribute('content');;

        this.divFilter = this.sectionCelebrity.querySelector('#celebrities-filters');


        this.letters = this.sectionCelebrity.querySelectorAll('.search-letter');

        this.flagSendData = true;

        this.currentShow = 'result';


        this.modalDetails = document.querySelector('#celebrities-modal-details');

        this.squareBirthday = this.modalDetails.querySelector('#square-birthday');

        this.extra_num_1 = this.modalDetails.querySelector('#pythagoras__num-1');
        this.extra_num_2 = this.modalDetails.querySelector('#pythagoras__num-2');
        this.extra_num_3 = this.modalDetails.querySelector('#pythagoras__num-3');
        this.extra_num_4 = this.modalDetails.querySelector('#pythagoras__num-4');

        this.num_1 = this.modalDetails.querySelector('#pythagoras-matrix__num-1');
        this.num_2 = this.modalDetails.querySelector('#pythagoras-matrix__num-2');
        this.num_3 = this.modalDetails.querySelector('#pythagoras-matrix__num-3');
        this.num_4 = this.modalDetails.querySelector('#pythagoras-matrix__num-4');
        this.num_5 = this.modalDetails.querySelector('#pythagoras-matrix__num-5');
        this.num_6 = this.modalDetails.querySelector('#pythagoras-matrix__num-6');
        this.num_7 = this.modalDetails.querySelector('#pythagoras-matrix__num-7');
        this.num_8 = this.modalDetails.querySelector('#pythagoras-matrix__num-8');
        this.num_9 = this.modalDetails.querySelector('#pythagoras-matrix__num-9');

        this.squareGoal = this.modalDetails.querySelector('#pythagoras__num-5');
        this.squareFamily = this.modalDetails.querySelector('#pythagoras__num-6');
        this.squareHabits = this.modalDetails.querySelector('#pythagoras__num-7');

        this.squareSelfEsteem = this.modalDetails.querySelector('#pythagoras__num-8');
        this.squareEverydayLife = this.modalDetails.querySelector('#pythagoras__num-9');
        this.squareTalents = this.modalDetails.querySelector('#pythagoras__num-10');

        this.squareSpirituality = this.modalDetails.querySelector('#pythagoras__num-11');
        this.squareTemperament = this.modalDetails.querySelector('#pythagoras__num-12');

        this.detailsCelebrity = document.querySelector('#details-celebrity');

        this.detailsSurnameName = this.detailsCelebrity.querySelector('.details-content__title');
        this.detailsDescriptions = this.detailsCelebrity.querySelector('.details-content-text');

        this.detailsMovies = document.querySelector('#details-movies');

        this.movieTranslate = {
            'uk': {
                'roles': 'Ролі:',
                'trailer': 'Дивись трейлер',
            },
            'ru': {
                'roles': 'Роли:',
                'trailer': 'Смотри трейлер',
            }
        }


        this.detailsConnections = document.querySelector('#details-connections');
        this.detailsConnectionsList = document.querySelector('#connections__list');

        this.inputRequestSend = this.sectionCelebrity.querySelector('#input-request');
        this.btnRequestSend = this.sectionCelebrity.querySelector('#btn-request-send');

        this.modalEmail = document.querySelector('#celebrities-modal-email');
        this.modalEmailBody = this.modalEmail.querySelector('.modal-email-body');
        this.btnModalEmailClose = this.modalEmail.querySelector('.btn-modal-email-close');

        this.init();
    }

    init() {

        this.getFilters();

    }

    setRequestDataDefault() {
        this.requestData = {};
        this.requestData['language'] = this.lang;
        this.requestData['_token'] = this.token;

    }

    events() {

        this.sectionCelebrity.addEventListener('click', e => {
            if (!e.target.closest('.filter')) {
                this.selects.forEach(select => {
                    select.classList.remove('open');
                })
            }
        })

        this.buttons.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                this.selects.forEach((select, i) => {
                    if (index != i) {
                        select.classList.remove('open');
                    }
                })
                this.selects[index].classList.toggle('open');
            })
        })

        this.checkboxItems = this.sectionCelebrity.querySelectorAll('.filter-checkbox');

        this.checkboxItems.forEach(input => {
            input.addEventListener('change', () => {
                this.setSelectionHTML(input);
            })
        })

        this.btnCancel.addEventListener('click', () => {
            this.checkboxItems.forEach(input => {
                input.checked = false;
            })
            this.filters.forEach(filter => {
                const filterText = filter.querySelector('.filter-text');
                filterText.innerHTML = '';
                filterText.classList.remove('active');
                const items = filter.querySelectorAll('.filter-select__item');
                items.forEach(item => {
                    item.classList.remove('active');
                })
            })
        })

        this.letters.forEach(letter => {
            letter.addEventListener('click', () => {
                const search = letter.getAttribute('data-search');
                if (search) {

                    this.setResultStyle();

                    this.isBlocking();

                    this.setRequestDataDefault();
                    this.requestData['search'] = search;

                    this.sendData();
                }

            })
        })

        this.btnSend.addEventListener('click', () => {
            this.getDataFilters();

        })

        this.btnSearch.addEventListener('click', () => {
            this.getDataInputSearch();

        })

        this.btnResultPrev.addEventListener('click', () => {

            this.btnResultNext.removeAttribute('disabled');

            if (this.stepMax == this.objData.data.length) {
                this.stepMax = this.indexResult;
            } else {
                this.stepMax -= this.stepResult;
            }


            this.indexResult -= this.stepResult;

            this.showResultList();

            if (this.indexResult == 0) {
                this.btnResultPrev.setAttribute('disabled', true);

            }

        });

        this.btnResultNext.addEventListener('click', () => {

            this.btnResultPrev.removeAttribute('disabled');

            if (this.indexResult + this.stepResult < this.objData.data.length) {
                this.indexResult += this.stepResult;
            }

            this.stepMax = this.indexResult + this.stepResult;

            if (this.stepMax > this.objData.data.length) {

                this.btnResultNext.setAttribute('disabled', true);
                this.stepMax = this.objData.data.length;
            }

            this.showResultList();

        });

        document.addEventListener('click', (e) => {

            if (e.target.closest('.details-item')) {

                const id = e.target.closest('.details-item').getAttribute('data-serch-details');

                if (id) {

                    let width1 = wrapper.offsetWidth;

                    divBody.classList.add('fixed');

                    let width2 = wrapper.offsetWidth;
                    let margin = width2 - width1;
                    if (margin > 0) {

                        correctionWrapperMargin(margin);
                    }

                    this.modalDetails.classList.remove('show');
                    this.modalDetails.classList.add('open');

                    this.currentShow = 'details';

                    this.flagSendData = false;
                    this.sectionCelebrity.classList.add('blocking');

                    this.setRequestDataDefault();

                    this.requestData['details'] = { 'id': id };

                    this.sendData();
                }

                return;
            }

            // ? close modal
            if (this.modalDetails.classList.contains('open') && !e.target.closest('.modal-details-body')) {
                console.log('close modal body');
                divBody.classList.remove('fixed');
                correctionWrapperMargin(0);
                this.modalDetails.classList.remove('open');
                this.modalDetails.classList.remove('show');
            }

            if (e.target.closest('.btn-modal-details-close')) {
                divBody.classList.remove('fixed');
                correctionWrapperMargin(0);
                this.modalDetails.classList.remove('open');
                this.modalDetails.classList.remove('show');
            }

            if (e.target.closest('.btn-request-send')) {
                if (this.inputRequestSend.value.length == 0) {
                    this.inputRequestSend.classList.add('error');
                    return;
                }
                this.inputRequestSend.classList.remove('error');

                this.flagSendData = false;
                this.sectionCelebrity.classList.add('blocking');
                this.setRequestDataDefault();
                this.requestData['celebrity'] = this.inputRequestSend.value;

                let width1 = wrapper.offsetWidth;

                divBody.classList.add('fixed');

                let width2 = wrapper.offsetWidth;
                let margin = width2 - width1;

                correctionWrapperMargin(margin);

                this.modalEmail.classList.add('open');

                this.sendEmail();
                return;
            }

            if (this.modalEmail.classList.contains('open') && !e.target.closest('.modal-email-body')) {

                divBody.classList.remove('fixed');
                correctionWrapperMargin(0);

                this.modalEmail.classList.remove('open');
                this.modalEmailBody.classList.remove('show');
                this.modalEmailBody.classList.remove('error');
            }

            if (e.target.closest('.btn-modal-email-close')) {

                divBody.classList.remove('fixed');
                correctionWrapperMargin(0);
                this.modalEmail.classList.remove('open');
                this.modalEmailBody.classList.remove('show');
                this.modalEmailBody.classList.remove('error');
            }
        })
    }

    sendEmail() {

        const url = window.location.href + '/send';

        this.objSendEmail = null;

        const options = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(this.requestData),

        };

        fetch(url, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');

                }
                return response.json();
            })
            .then(result => {

                this.objSendEmail = result;

                this.resultSendEmail();
            })
            .catch(error => {
                this.resultSendEmail();
                console.error('Fetch error:', error);
            });
    }

    resultSendEmail() {
        this.flagSendData = true;
        this.sectionCelebrity.classList.remove('blocking');

        this.modalEmailBody.classList.add('show');
        this.modalEmail.classList.add('open');

        if (this.objSendEmail == null) {
            console.log('Error network');
            this.modalEmailBody.classList.add('error');
            return;
        }

        if (this.objSendEmail['message']) {
            this.modalEmailBody.classList.add('error');
        }
        if (this.objSendEmail['status'] == 'ok') {
            this.modalEmailBody.classList.remove('error');
            this.modalEmailBody.classList.add('show');
        }


    }

    showResultList() {

        this.htmlCurrent = '';
        this.divResultShowList.innerHTML = this.htmlCurrent;

        for (let i = this.indexResult; i < this.stepMax; i++) {
            const data = this.objData.data[i];
            this.htmlCurrent += `
                <li>
                    <span class="details-item" data-serch-details="${data.id}">${data.surname} ${data.name}</span>
                </li>
            `;
        }


        this.divResultShowList.innerHTML = this.htmlCurrent;

    }

    setResultStyle() {
        this.currentShow = 'result';
        this.divItemResult.classList.add('search');
        this.divResult.classList.add('search');

        this.divResultShow.classList.remove('show');

    }

    setResultHTML() {

        this.isUnlocking();

        this.divResult.classList.remove('search');

        if (this.currentShow === 'result') {
            if (this.objData == null) {
                this.textResultError.classList.add('show');
                return;
            }
            if (this.objData.data.length == 0) {
                this.textResultEmpty.classList.add('show');
                return;
            }

            this.divResultShow.classList.add('show');

            this.divResultCount.innerHTML = this.objData.data.length;


            if (this.objData.data.length > this.stepResult) {
                this.btnsResult.classList.add('active');
                this.btnResultPrev.setAttribute('disabled', true);

                this.btnResultNext.removeAttribute('disabled');
            }
            this.htmlCurrent = '';

            for (let i = 0; i < this.objData.data.length; i++) {
                const data = this.objData.data[i];

                if (i >= this.stepResult) {
                    break;
                }

                this.htmlCurrent += `
                    <li>
                        <span class="details-item" data-serch-details="${data.id}">${data.surname} ${data.name}</span>
                    </li>
                `;
            }


            this.divResultShowList.innerHTML = this.htmlCurrent;

        }

        if (this.currentShow === 'details') {

            if (this.objDataDetails.data && this.objDataDetails.data.square) {

                const data = this.objDataDetails.data;
                const square = this.objDataDetails.data.square;

                const day = data.day < 10 ? `0${data.day}` : data.day;
                const month = data.month < 10 ? `0${data.month}` : data.month;

                this.squareBirthday.innerHTML = `${day}.${month}.${data.year}`;

                this.extra_num_1.innerHTML = square.extra_number_one || '-';
                this.extra_num_2.innerHTML = square.extra_number_two || '-';
                this.extra_num_3.innerHTML = square.extra_number_three || '-';
                this.extra_num_4.innerHTML = square.extra_number_four || '-';

                this.num_1.innerHTML = square.number_one || '-';
                this.num_2.innerHTML = square.number_two || '-';
                this.num_3.innerHTML = square.number_three || '-';
                this.num_4.innerHTML = square.number_four || '-';
                this.num_5.innerHTML = square.number_five || '-';
                this.num_6.innerHTML = square.number_six || '-';
                this.num_7.innerHTML = square.number_seven || '-';
                this.num_8.innerHTML = square.number_eight || '-';
                this.num_9.innerHTML = square.number_nine || '-';

                this.squareGoal.innerHTML = square.goal || '-';
                this.squareFamily.innerHTML = square.family || '-';
                this.squareHabits.innerHTML = square.habits || '-';

                this.squareSelfEsteem.innerHTML = square.self_esteem || '-';
                this.squareEverydayLife.innerHTML = square.everyday_life || '-';
                this.squareTalents.innerHTML = square.talents || '-';

                this.squareSpirituality.innerHTML = square.spirituality || '-';
                this.squareTemperament.innerHTML = square.temperament || '-';


                // ? desc
                this.detailsSurnameName.innerHTML = `${data.name} ${data.surname}`;
                this.detailsDescriptions.innerHTML = data.description;

                // ? movies
                this.detailsMovies.classList.remove('show');

                this.htmlCurrent = '';
                this.detailsMovies.innerHTML = this.htmlCurrent;


                if (data.movies.length > 0) {

                    data.movies.forEach(movie => {

                        const actors = movie.actors;

                        let htmlActors = '';
                        actors.forEach(actor => {
                            htmlActors += `
                            <li>
                                <span class="movie-role">${actor.name} ${actor.surname}</span>                            
                            </li>
                            `;
                        })

                        this.htmlCurrent = `
                        
                            <div class="movie">

                                <div class="movie__item movie__item-poster">
                                    <img src="/storage/${movie.poster}" alt="">
                                </div>
                                <div class="movie__item movie__item-details">
                                    <span class="movie__name">"${movie.title}" ${movie.year}</span>
                                    <span class="movie-roles">${this.movieTranslate[this.lang]['roles']}</span>
                                    <ul class="movie-roles__items">
                                        
                                        ${htmlActors}

                                    </ul>

                                    <a class="link-movie-trailer btn" href="${movie.trailer}" target="_blank"
                                        rel="noopener">${this.movieTranslate[this.lang]['trailer']}
                                    </a>

                                </div>

                            </div>
                        `;

                    })

                    this.detailsMovies.innerHTML = this.htmlCurrent;
                    this.detailsMovies.classList.add('show');
                }

                this.detailsConnections.classList.remove('show');

                this.htmlCurrent = '';
                this.detailsConnectionsList.innerHTML = this.htmlCurrent;

                if (data.connections.length > 0) {


                    data.connections.forEach(connection => {
                        this.htmlCurrent += `
                            <li>
                                <span class="details-item" data-serch-details="${connection.id}">
                                    ${connection.name} ${connection.surname}
                                </span>
                            </li>                        
                        `;
                    })

                    this.detailsConnectionsList.innerHTML = this.htmlCurrent;

                    this.detailsConnections.classList.add('show');
                }

            }

            this.modalDetails.classList.add('show');
        }


    }

    isBlocking() {
        this.flagSendData = false;

        this.sectionCelebrity.classList.add('blocking');
        scrollToElement(this.divItemResult);

        this.textResultError.classList.remove('show');
        this.textResultEmpty.classList.remove('show');

        this.btnsResult.classList.remove('active');

    }
    isUnlocking() {
        this.flagSendData = true;
        this.sectionCelebrity.classList.remove('blocking');


    }

    getDataInputSearch() {

        if (this.inputSearch.value.length == 0) {
            this.inputSearch.classList.add('error');
            return;
        }

        this.inputSearch.classList.remove('error');

        if (this.flagSendData) {
            this.isBlocking();

            this.setResultStyle();

            this.setRequestDataDefault();
            this.requestData['search'] = this.inputSearch.value;

            this.sendData();
        }

    }


    getDataFilters() {

        if (this.flagSendData) {

            this.setRequestDataDefault();

            this.requestData['filters'] = {};

            this.checkboxItems.forEach(input => {

                if (input.checked) {
                    const name = input.name;
                    const value = input.value == '-' ? 0 : input.value;

                    if (this.requestData['filters'][name]) {
                        this.requestData['filters'][name].push(value);
                    } else {
                        this.requestData['filters'][name] = [value];
                    }
                }
            })

            if (Object.keys(this.requestData['filters']).length == 0) {

                console.log('Error modal choise filter');
            } else {

                this.setResultStyle();

                this.isBlocking();

                this.sendData();
            }
        }
    }

    setSelectionHTML(input) {
        this.itemCurrent = input.closest('.filter-select__item');
        this.filterCurrent = input.closest('.filter');
        this.textSelectCurrent = this.filterCurrent.querySelector('.filter-text');

        input.checked ? this.itemCurrent.classList.add('active') : this.itemCurrent.classList.remove('active');

        this.inputsCurrent = this.filterCurrent.querySelectorAll('.filter-checkbox');

        this.htmlCurrent = '';
        this.choiceCurrent = [];

        this.inputsCurrent.forEach(inputCurrent => {

            if (inputCurrent.checked) {
                this.choiceCurrent.push(inputCurrent.value);
            }
        })

        this.choiceCurrent.forEach((value, index) => {
            if (index == 0) {

                this.htmlCurrent += `<span>${value}</span>`;
            } else {
                this.htmlCurrent += `<span>/</span><span>${value}</span>`;
            }
        })

        this.textSelectCurrent.innerHTML = this.htmlCurrent;

        if (this.choiceCurrent.length > 0) {
            this.textSelectCurrent.classList.add('active');
        } else {
            this.textSelectCurrent.classList.remove('active');

        }

    }

    setFiltersHTML() {

        if (this.filterData == null) {
            this.preloaderFiltersBody.innerHTML = 'Error network';
            return;
        }

        if (!this.filterData['occupations'] || !this.filterData['squares']) {
            this.preloaderFiltersBody.innerHTML = 'Помилка отримання данних';
            return;
        }
        if (this.filterData['occupations'].length == 0 || this.filterData['squares']['number_one'].length == 0) {
            this.preloaderFiltersBody.innerHTML = 'База даних ще не наповнена.';
            return;
        }


        if (this.filterData['message']) {

            this.preloaderFiltersBody.innerHTML = this.filterData['message'];
            return console.log(this.filterData['message']);
        }


        // ? set occupations
        if (this.filterData.occupations) {
            this.htmlCurrent = '';

            this.filterData.occupations.forEach(data => {
                this.htmlCurrent += `
                    <li class="filter-select__item">
                        <label class="filter-label">
                            <input type="checkbox" class="filter-checkbox" name="occupations" value="${data.id}">
                            <span>${data.title}</span>
                        </label>
                    </li>                
                `;
            })

            const filterOccupations = this.sectionCelebrity.querySelector('.occupations');
            const filterSelect = filterOccupations.querySelector('.filter-select');

            filterSelect.innerHTML = this.htmlCurrent;
        }

        // ? set filters day month years
        this.htmlCurrent = '';
        for (let i = 1; i <= 31; i++) {
            this.htmlCurrent += `
            <li class="filter-select__item">
                <label class="filter-label">
                    <input type="checkbox" class="filter-checkbox" name="day" value="${i}">
                    <span>${i}</span>
                </label>
            </li>
            `;
        }

        this.filterSelectDay.innerHTML = this.htmlCurrent;

        this.htmlCurrent = '';
        for (let i = 1; i <= 12; i++) {
            this.htmlCurrent += `
            <li class="filter-select__item">
                <label class="filter-label">
                    <input type="checkbox" class="filter-checkbox" name="month" value="${i}">
                    <span>${i}</span>
                </label>
            </li>
            `;
        }

        this.filterSelectMonth.innerHTML = this.htmlCurrent;

        this.htmlCurrent = '';
        let currentYear = new Date().getFullYear();
        for (let i = 1900; i <= currentYear; i++) {
            this.htmlCurrent += `
            <li class="filter-select__item">
                <label class="filter-label">
                    <input type="checkbox" class="filter-checkbox" name="year" value="${i}">
                    <span>${i}</span>
                </label>
            </li>
            `;
        }

        this.filterSelectYear.innerHTML = this.htmlCurrent;

        // ? set filters squares

        if (this.filterData.squares) {
            const squares = this.filterData.squares
            for (let key in squares) {

                this.htmlCurrent = '';

                const currentFilter = this.divFilter.querySelector(`.${key}`);

                if (currentFilter) {
                    const selectFilter = currentFilter.querySelector('.filter-select');

                    squares[key].forEach(valueFilter => {

                        const value = valueFilter || '-';
                        this.htmlCurrent += `
                            <li class="filter-select__item">
                                <label class="filter-label">
                                    <input type="checkbox" class="filter-checkbox" name="${key}" value="${value}">
                                    <span>${value}</span>
                                </label>
                            </li>                       
                        `;
                    })

                    selectFilter.innerHTML = this.htmlCurrent;
                }
            }
        }


        this.events();

        this.htmlCurrent = '';

        this.CelebritiesItems.classList.add('show');

    }

    getFilters() {

        this.setRequestDataDefault();

        const url = window.location.href + '/filters';
        this.requestData['getfilters'] = true;

        const options = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(this.requestData),

        };

        fetch(url, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');

                }
                return response.json();
            })
            .then(result => {

                this.filterData = result;

                this.setFiltersHTML();
            })
            .catch(error => {
                this.filterData = null;
                this.setFiltersHTML();
                console.error('Fetch error:', error);
            });

    }

    sendData() {

        const url = window.location.href;

        const options = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(this.requestData)

        };

        fetch(url, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');

                }
                return response.json();
            })
            .then(result => {

                if (this.currentShow === 'result') {

                    this.objData = result;
                }
                if (this.currentShow === 'details') {

                    this.objDataDetails = result;
                }

                this.setResultHTML();

            })
            .catch(error => {
                console.error('Fetch error:', error);
                this.setResultHTML();
            });
    }
}


function initCelebirties(sectionCelebrity) {

    new Celebrities(sectionCelebrity);
}
