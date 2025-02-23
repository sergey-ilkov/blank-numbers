// console.log('init Admin panel...');


// ?
// ?
//? add image for form
const imageGroupItems = document.querySelectorAll('.image-add-group')

if (imageGroupItems) {

    imageGroupItems.forEach(imageGroup => {

        const inputFile = imageGroup.querySelector('#input-file');
        const divPictureBlock = imageGroup.querySelector('.picture-block');

        inputFile.addEventListener('change', (e) => {

            readFile(imageGroup, inputFile, divPictureBlock);

        })
    })


}

function readFile(imageGroup, input, pictureBlock) {

    let file = input.files[0];
    const path = URL.createObjectURL(file);

    removeClass(pictureBlock, 'hidden');

    const img = document.createElement('img');
    img.setAttribute('src', path);

    pictureBlock.innerHTML = '';

    pictureBlock.appendChild(img);


    const label = imageGroup.querySelector('.file-input__label[data-js-label]');
    label.innerHTML = file.name;
    addClass(label, 'chosen');

}


function addClass(el, className = 'active') {

    el.classList.add(className);

}


function removeClass(el, className = 'active') {

    el.classList.remove(className);

}
//? the end add image for form
// ?
// ?

// ? poster-loaded


// ?
// ?
// ? modal delete
const body = document.querySelector('body');
const wrapper = document.querySelector('.wrapper');
const modalDelete = document.querySelector('#model-delete')
const formDelete = document.querySelector('#form-delete');


//? delete Page Settings
function setModalAttributes(btn) {

    const action = btn.getAttribute('data-action');
    const name = btn.getAttribute('data-name');

    formDelete.setAttribute('action', action);



    const divFormTitle = formDelete.querySelector('.modal__title');

    divFormTitle.innerHTML = divFormTitle.innerHTML + `<span class="modal__title-min"> ${name}</span>`;


    openModal(modalDelete);

}

// ? the end modal delete
// ?
// ?

// ?
// ?
// ? open modal
function openModal(modal, className = 'open') {
    let width1 = wrapper.offsetWidth;

    addClass(modal, className);
    addClass(body, 'fixed');

    let width2 = wrapper.offsetWidth;
    let margin = width2 - width1;
    margin = `${margin}px`;
    corrrectionMargin(margin);
}
// ? close modal
function closeModal(modal, className = 'open') {
    removeClass(modalDelete, 'open');
    removeClass(body, 'fixed');

    corrrectionMargin('0px');


    const modalTextMin = document.querySelector('.modal__title-min');
    if (modalTextMin) {
        modalTextMin.remove();
    }


}

function corrrectionMargin(margin = '0px') {
    wrapper.style.marginRight = margin;
}



// ? the end open modal
// ?
// ?


// ? aside accardion
function toggleDropdownMenu(dropdownToggle, start = false) {
    const dropdown = dropdownToggle.closest('.dropdown');
    const dropdownMenu = dropdown.querySelector('.dropdown-menu');


    if (start) {
        if (dropdownToggle.classList.contains('show')) {
            dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + 'px';
        }
        return;
    }


    if (dropdownToggle.classList.contains('show')) {
        removeClass(dropdownToggle, 'show');
        removeClass(dropdownMenu, 'show');
        dropdownMenu.style.maxHeight = 0 + 'px';
    } else {
        addClass(dropdownToggle, 'show');
        addClass(dropdownMenu, 'show');
        dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + 'px';
    }

}

const dropdownLinks = document.querySelectorAll('.dropdown-toggle');

dropdownLinks.forEach(link => {

    toggleDropdownMenu(link, true);
})


// ? Events click 


window.addEventListener('click', (e) => {

    // ? modal delete
    if (modalDelete) {
        if (modalDelete.classList.contains('open') && !e.target.closest('.modal-body')) {
            closeModal(modalDelete);
        }

        if (e.target.closest('.btn-modal-close')) {
            closeModal(modalDelete);
        }

        if (e.target.closest('.btn-modal-delete')) {
            setModalAttributes(e.target);
        }
    }
    // ? the end modal delete



    // ? dropdown menu
    if (e.target.closest('.dropdown-toggle')) {

        const link = e.target.closest('.dropdown-toggle');

        toggleDropdownMenu(link);

        // const dropdown = link.closest('.dropdown');
        // const dropdownMenu = dropdown.querySelector('.dropdown-menu');




        // if (link.classList.contains('show')) {
        //     removeClass(link, 'show');
        //     removeClass(dropdownMenu, 'show');
        //     dropdownMenu.style.maxHeight = 0 + 'px';
        // } else {
        //     addClass(link, 'show');
        //     addClass(dropdownMenu, 'show');
        //     dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + 'px';
        // }

    }




    // ? thew end dropdown menu

})

// ? Events keyboerd
window.addEventListener('keydown', (e) => {
    // console.log(e.key);
    if (modalDelete) {
        if (e.key === 'Escape') {
            closeModal(modalDelete);
        }
    }
})








// ? burger-menu

const burgermenu = document.querySelector('#burger-menu');
const divAside = document.querySelector('.aside');
const divAdminPanelContent = document.querySelector('.admin-panel-content');
if (burgermenu && divAside && divAdminPanelContent) {
    burgermenu.addEventListener('click', () => {
        divAside.classList.toggle('hidden');
        divAdminPanelContent.classList.toggle('show-all');
    })
}




// ?
// ?
// ?
// ?
// ?
// ?
// ? SquaryPythagoras


class SquarePythagoras {
    constructor(divSquarePythagoras, divSquareInputs) {
        this.divSquarePythagoras = divSquarePythagoras;

        // this.input = divSquarePythagoras.querySelector('#square-pythagoras-date');

        this.inputDay = divSquareInputs.querySelector('#square-input-day');
        this.inputMonth = divSquareInputs.querySelector('#square-input-month');
        this.inputYear = divSquareInputs.querySelector('#square-input-year');


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
        this.inputDay.addEventListener('input', () => {
            const value = this.inputDay.value;

            if (value > 31) {
                this.inputDay.value = 31;
            }

            this.checkData();
        })

        this.inputMonth.addEventListener('input', () => {
            const value = this.inputMonth.value;

            if (value > 12) {
                this.inputMonth.value = 12;
            }

            this.checkData();
        })

        this.inputYear.addEventListener('input', () => {
            const value = this.inputYear.value;

            if (value > 3000) {
                this.inputYear.value = 3000;
            }

            if (value.length > 0) {
                this.checkData();
            } else {
                this.resetPythagoras();
            }
        })



    }

    checkData() {

        if (this.inputDay.value > 0 && this.inputMonth.value > 0 && this.inputYear.value > 0) {
            // console.log('calculatePythagoras()');
            this.calculatePythagoras(this.inputDay.value, this.inputMonth.value, this.inputYear.value);
        }
    }

    calculatePythagoras(day, month, year) {
        const value_num_1 = [...day, ...month, ...year].reduce((acc, value) => Number(acc) + Number(value));
        this.num_1.value = value_num_1;
        const value_num_2 = String(value_num_1).split('').reduce((acc, value) => Number(acc) + Number(value));
        this.num_2.value = value_num_2;
        const value_num_3 = Math.abs(value_num_1 - (2 * Number(day[0])));
        this.num_3.value = value_num_3;
        const value_num_4 = String(value_num_3).split('').reduce((acc, value) => Number(acc) + Number(value));
        this.num_4.value = value_num_4;
        const str_num = String(day) + String(month) + String(year) + String(value_num_1) + String(value_num_2) + String(value_num_3) + String(value_num_4);
        const obj = {};



        for (let i = 0; i < str_num.length; i++) {
            const num = str_num[i];
            if (!obj[num]) {
                obj[num] = '';
            }
            obj[num] += String(num);
        }



        this.matrix__num_1.value = obj[1] || 0;
        this.matrix__num_2.value = obj[2] || 0;
        this.matrix__num_3.value = obj[3] || 0;
        this.matrix__num_4.value = obj[4] || 0;
        this.matrix__num_5.value = obj[5] || 0;
        this.matrix__num_6.value = obj[6] || 0;
        this.matrix__num_7.value = obj[7] || 0;
        this.matrix__num_8.value = obj[8] || 0;
        this.matrix__num_9.value = obj[9] || 0;

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
        this.num_5.value = value_num_5 || 0;
        this.num_6.value = value_num_6 || 0;
        this.num_7.value = value_num_7 || 0;

        const value_num_8 = str_1.length + str_2.length + str_3.length;
        const value_num_9 = str_4.length + str_5.length + str_6.length;
        const value_num_10 = str_7.length + str_8.length + str_9.length;
        this.num_8.value = value_num_8 || 0;
        this.num_9.value = value_num_9 || 0;
        this.num_10.value = value_num_10 || 0;

        const value_num_11 = str_1.length + str_5.length + str_9.length;
        const value_num_12 = str_3.length + str_5.length + str_7.length;
        this.num_11.value = value_num_11 || 0;
        this.num_12.value = value_num_12 || 0;

    }
    resetPythagoras() {
        this.matrix__num_1.value = '';
        this.matrix__num_2.value = '';
        this.matrix__num_3.value = '';
        this.matrix__num_4.value = '';
        this.matrix__num_5.value = '';
        this.matrix__num_6.value = '';
        this.matrix__num_7.value = '';
        this.matrix__num_8.value = '';
        this.matrix__num_9.value = '';
        this.num_1.value = '';
        this.num_2.value = '';
        this.num_3.value = '';
        this.num_4.value = '';
        this.num_5.value = '';
        this.num_6.value = '';
        this.num_7.value = '';
        this.num_8.value = '';
        this.num_9.value = '';
        this.num_10.value = '';
        this.num_11.value = '';
        this.num_12.value = '';
    }


}



// ? square-pythagoras
const divSquarePythagoras = document.querySelector('#square-pythagoras');
const divSquareInputs = document.querySelector('#square-inputs');

if (divSquarePythagoras && divSquareInputs) {

    // console.log('init SquarePythagoras...');
    const squarePythagoras = new SquarePythagoras(divSquarePythagoras, divSquareInputs);
}






// ? search

class SearchData {
    constructor(selectGroup) {
        this.selectGroup = selectGroup;

        this.inputSearch = selectGroup.querySelector('.input-search');
        this.btnSearch = selectGroup.querySelector('.search-btn');

        this.divSelectShowList = selectGroup.querySelector('.select-show__list');
        this.divSearchList = selectGroup.querySelector('.select-checkbox__list');

        this.url = document.querySelector('#url-search').value;

        this.token = document.querySelector('input[name="_token"]').value;

        this.flagSearh = true;
        this.requestData = {};

        this.objData = {};
        this.currentTable = this.btnSearch.getAttribute('data-table');

        this.arrayShowList = [];
        this.tempObj = {};

        this.surname = '';

        this.valueSearch = '';

        this.cardBody = document.querySelector('.card-body');
        this.init();

    }

    init() {
        this.searchItems();

        this.events();
    }

    searchItems() {
        const searchItems = this.selectGroup.querySelectorAll('.select-show__item');
        searchItems.forEach(item => {


            this.tempObj = { id: item.getAttribute('data-id'), 'name': item.getAttribute('data-name') };

            this.addShowList();

        })
    }

    events() {


        this.btnSearch.addEventListener('click', () => {

            if (!this.inputSearch.value.length > 0) {
                this.inputSearch.classList.add('error');
                return;
            }
            this.inputSearch.classList.remove('error');

            this.divSearchList.innerHTML = 'Пошук...';
            this.divSearchList.classList.add('open');

            if (this.flagSearh) {
                this.btnSearch.setAttribute('disabled', 'disabled');
                this.getData();
            }

        })

        this.inputSearch.addEventListener('click', () => {
            this.divSearchList.classList.remove('open');

            document.querySelectorAll('.select-checkbox__list').forEach(select => {

                select.classList.remove('open');
            });
        })


        this.divSearchList.addEventListener('click', e => {
            const item = e.target.closest('.select-checkbox__item');

            if (item) {


                this.tempObj = { id: item.getAttribute('data-id'), 'name': item.getAttribute('data-name') };

                if (item.classList.contains('active')) {

                    this.removeShowList();
                } else {
                    this.addShowList();
                }

                item.classList.toggle('active');

                this.setShowListHtml();
            }
        })

        this.divSelectShowList.addEventListener('click', e => {
            const btn = e.target.closest('.btn-remove-input');
            if (btn) {
                const item = e.target.closest('.select-show__item');
                if (item) {
                    this.tempObj = { id: item.getAttribute('data-id'), 'name': item.getAttribute('data-name') };

                    item.remove();

                    this.removeShowList();
                }

            }
        })

        this.cardBody.addEventListener('click', e => {
            if (!e.target.closest('.select-checkbox')) {
                this.divSearchList.classList.remove('open');
            }
        })


    }
    removeShowList() {
        // console.log('remove');
        this.arrayShowList.forEach((item, index) => {
            if (item['id'] === this.tempObj['id']) {
                this.arrayShowList.splice(index, 1);
            }
        })

    }
    addShowList() {

        // console.log('add');
        if (this.arrayShowList.length == 0) {
            this.arrayShowList.push(this.tempObj);
        }

        let arrayId = [];

        this.arrayShowList.forEach((item, index) => {
            arrayId.push(item['id']);

        })

        if (!arrayId.includes(this.tempObj['id'])) {
            // console.log('da');
            this.arrayShowList.push(this.tempObj);
        }



    }


    setShowListHtml() {
        // console.log('setShowListHtml()');

        let html = '';



        this.arrayShowList.forEach(item => {
            html += `
            <li class="select-show__item" data-id="${item['id']}" data-name="${item['name']}">
                <input type="hidden" name="${this.currentTable}[]" value="${item['id']}" />
                <span>${item['name']}</span>
                <button class="btn-remove-input" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                </button>
            </li>
        `;

        });




        this.divSelectShowList.innerHTML = html;

    }

    setSearchListHTML() {
        // console.log('table: ', this.currentTable);
        // console.log('data: ', this.objData);

        if (this.objData.length == 0) {
            this.divSearchList.innerHTML = 'Нічого не знайдено';
            return;
        }
        if (this.objData['status'] == 'error') {
            this.divSearchList.innerHTML = 'Помилка пошуку';
            return;
        }


        let html = '';

        let dataNameValue = '';

        this.objData.forEach(item => {
            this.surname = item['surname_uk'] ? item['surname_uk'] : '';

            if (this.currentTable === 'occupations') {
                dataNameValue = item['title_uk'];
            }
            if (this.currentTable === 'actors') {
                dataNameValue = this.surname + ' ' + item['name_uk'];
            }
            if (this.currentTable === 'movies') {
                dataNameValue = item['title_uk'] + ' ' + item['year'];
            }
            if (this.currentTable === 'connections') {
                dataNameValue = this.surname + ' ' + item['name_uk'] + ' ' + item['year'];
                // dataNameValue = item['surname_uk'] + ' ' + item['name_uk'] + ' ' + item['year'];
            }


            html += `
                <li class="select-checkbox__item" data-id="${item['id']}" data-name="${dataNameValue}">
                    <span>${dataNameValue}</span>
                </li>
            `;

        })






        this.divSearchList.innerHTML = html;

    }

    getData() {


        this.flagSearh = false;

        this.currentTable = this.btnSearch.getAttribute('data-table');
        this.requestData = {};
        this.requestData['table'] = this.btnSearch.getAttribute('data-table');
        this.requestData['_token'] = this.token;


        this.valueSearch = this.inputSearch.value.replace(/\s+/g, ' ').trim();

        this.inputSearch.value = this.valueSearch;

        this.requestData['search'] = this.valueSearch;

        // console.log(this.requestData)
        // return console.log(this.requestData);


        const options = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(this.requestData),

        };

        fetch(this.url, options)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');

                }
                return response.json();
            })
            .then(result => {

                this.objData = result;

                this.setSearchListHTML();


                this.btnSearch.removeAttribute('disabled');
                this.flagSearh = true;

            })
            .catch(error => {
                console.error('Fetch error:', error);
                this.btnSearch.removeAttribute('disabled');
                this.flagSearh = true;
            });
    }

}

const selectCheckboxGroups = document.querySelectorAll('.select-checkbox-groups');

if (selectCheckboxGroups.length > 0) {
    // console.log(selectCheckboxGroups);
    selectCheckboxGroups.forEach(selectGroup => {
        new SearchData(selectGroup);
    })
}


// ? trix
document.addEventListener('trix-before-paste', function (e) {
    if (e.paste.hasOwnProperty('html')) {
        let div = document.createElement("div");
        div.innerHTML = e.paste.html;
        e.paste.html = div.textContent;
    }
});




// ? modal editor links



const htmlModalEditorlinks = `
    <div id="modal-editor-links" class="modal-editor-links">
        <div class="modal-editor-links-body">
            <button class="modal-editor-links__btn-close">X</button>
            <div class="modal-editor-links-group">
                <span>Текст посилання</span>
                <input id="modal-editor-input-txt" type="text">
            </div>
            <div class="modal-editor-links-group">
                <span>URL адреса</span>
                <input id="modal-editor-input-url" type="text">
            </div>
            <button id="modal-editor-btn-save" class="modal-editor-links__btn-save">Зберегти</button>
        </div>
    </div>
`;



function addModalEditor() {

    body.insertAdjacentHTML('beforeend', htmlModalEditorlinks);

}


class EditorLinks {
    constructor(editor) {
        this.divEditor = editor;

        this.inputEditor = this.divEditor.querySelector('.editor-links-input');

        this.divOut = this.divEditor.querySelector('.editor-links-out');


        this.btnAdd = this.divEditor.querySelector('.editor-links__btn-add');
        this.btnEdit = this.divEditor.querySelector('.editor-links__btn-edit');
        this.btnDelete = this.divEditor.querySelector('.editor-links__btn-del');

        this.modalEditor = document.querySelector('#modal-editor-links');


        this.inputs = null;
        this.modalInputText = null;
        this.modalInputUrl = null;

        this.btnSave = null;

        this.flagSave = false;
        this.html = '';

        this.divOutLength = this.divOut.innerHTML.length;

        this.currentLink = null;
        this.coordsCurrentLink = null;

        this.popupLinks = this.divEditor.querySelector('#popup-editor-links');
        this.popupLinksText = this.divEditor.querySelector('.popup-editor-links-text');



        this.flagEditDelete = false;
        this.currentSeparator = null;

        this.btnSaveAction = 'add';

        this.init();
    }

    init() {
        if (!this.inputEditor || !this.divOut || !this.popupLinks || !this.btnAdd || !this.btnEdit || !this.btnDelete || !this.modalEditor) {
            console.error('Error init EditorLinks');
            return;
        };

        this.inputs = this.modalEditor.querySelectorAll('input');

        this.modalInputText = this.modalEditor.querySelector('#modal-editor-input-txt');
        this.modalInputUrl = this.modalEditor.querySelector('#modal-editor-input-url');
        this.btnSave = this.modalEditor.querySelector('#modal-editor-btn-save');
        this.btnSave.setAttribute('disabled', true);

        console.log('init EditorLinks');

        // this.inputEditor.innerHTML = this.divOut.innerHTML.trim();
        console.log(this.inputEditor.innerHTML);

        // this.divOut.innerHTML = this.inputEditor.value;

        if (this.inputEditor.value) {
            this.divOut.innerHTML = this.inputEditor.value;

            // this.html = `${this.inputEditor.value}`;
            // this.divOut.insertAdjacentHTML('beforeend', this.html);
        }

        this.events();

    }
    events() {
        this.btnAdd.addEventListener('click', () => {
            this.clearInputs();

            this.btnSave.setAttribute('data-action', 'add');
            this.btnSave.setAttribute('disabled', true);

            this.openModal();
        })

        this.modalEditor.addEventListener('click', (e) => {

            if (!e.target.closest('.modal-editor-links-body') || e.target.closest('.modal-editor-links__btn-close')) {
                this.closeModal();
            }
        })

        this.inputs.forEach(input => {
            input.addEventListener('input', () => {
                this.validate();
            })

        })

        this.btnSave.addEventListener('click', () => {

            this.btnSaveAction = this.btnSave.getAttribute('data-action');
            if (this.btnSaveAction == 'add') {

                this.addLink();
            }
            if (this.btnSaveAction == 'edit') {

                this.editLink();
            }

            this.closeModal();
        })


        this.divEditor.addEventListener('click', (e) => {
            e.preventDefault();

            // console.log(e.target.tagName);
            if (e.target.tagName === 'A') {
                this.currentLink = e.target;
                this.popupLinksText.innerText = this.currentLink.innerText;


                this.popupLinks.classList.add('open');
                this.flagEditDelete = true;
            } else {
                this.popupLinks.classList.remove('open');
                this.flagEditDelete = false;
            }

        })


        this.btnDelete.addEventListener('click', () => {
            this.removeLink();
        })

        this.btnEdit.addEventListener('click', () => {
            this.editModal();

            this.btnSave.setAttribute('data-action', 'edit');

            this.openModal();
        })

    }

    editLink() {


        this.currentLink.innerText = this.modalInputText.value;
        this.currentLink.href = this.modalInputUrl.value;

        this.currentLink = null;

        this.inputEditor.value = this.divOut.innerHTML.trim();
    }

    editModal() {
        if (this.flagEditDelete && this.currentLink) {

            this.modalInputText.value = this.currentLink.innerText;
            this.modalInputUrl.value = this.currentLink.href;
        }
    }

    removeLink() {
        if (this.flagEditDelete) {

            this.currentSeparator = this.currentLink.previousElementSibling;


            if (!this.currentSeparator) {
                this.currentSeparator = this.currentLink.nextSibling;
            }

            if (this.currentSeparator && this.currentSeparator.tagName == 'SPAN') {
                this.currentSeparator.remove();
            }



            this.currentLink.remove();


            // console.log('this.currentLink ', this.currentLink);
            // console.log('this.currentSeparator ', this.currentSeparator);

            this.currentLink = null;
            this.currentSeparator = null;


            this.inputEditor.value = this.divOut.innerHTML.trim();
        }

    }

    clearInputs() {
        this.inputs.forEach(input => {
            input.value = '';
        })
    }

    openModal() {
        this.modalEditor.classList.add('open');
        body.classList.add('fixed');
    }

    closeModal() {
        this.modalEditor.classList.remove('open');
        body.classList.remove('fixed');

    }

    validate() {
        this.flagSave = true;
        this.btnSave.removeAttribute('disabled');
        this.inputs.forEach(input => {
            if (input.value.length < 3) {
                this.flagSave = false;
                this.btnSave.setAttribute('disabled', true);
            }
        });

    }

    addLink() {
        // console.log(this.divOut.innerHTML.length);
        // console.log(this.divOutLength);

        this.html = '';
        if (this.divOut.innerHTML.length > this.divOutLength) {
            this.html += '<span>, </span>';
        }
        this.html += `<a href="${this.modalInputUrl.value}" target="_blank">${this.modalInputText.value}</a>`;
        this.divOut.insertAdjacentHTML('beforeend', this.html);

        this.inputEditor.value = `${this.divOut.innerHTML.trim()}`;


        // console.log(this.divOut.innerHTML.trim());
        // console.log(this.inputEditor.value);


    }
}


const editorLinksItems = document.querySelectorAll('.editor-links');
if (editorLinksItems.length > 0) {
    addModalEditor();

    editorLinksItems.forEach(editor => {
        new EditorLinks(editor);
    })
}
