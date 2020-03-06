/**
 * Скрипт для редактирования изображения
 */

/**
 * Атрибут редактируемого элемента
 */
const CURRENT_EDIT = 'currentEditable';

/**
 * Атрибут для получения текущего редактируемого элемента
 */
const CURRENT_EDIT_ELEMENT = `[${CURRENT_EDIT}="true"]`;

const EMPTY = '';

/**
 * Обновление панели инструментов
 * @param {object} event 
 */
const updateTools = (event) => {
    const attrs = {
        'data-style-italic': '#style',
        'data-style-underline': '#underline',
        'data-style-weight': '#weight'
    };
    let currentEditable = $(CURRENT_EDIT_ELEMENT);

    for (attr in attrs) {
        if (currentEditable.attr(attr)) {
            $(attrs[attr]).addClass('active-style-button');
        } else {
            $(attrs[attr]).removeClass('active-style-button');
        }
    }

    if (currentEditable.prop('tagName') == 'svg') {
        if (currentEditable.find('[data-edit-item="true"]').attr('stroke')) {
            $('.pcr-button').css('color', currentEditable.find('[data-edit-item="true"]').attr('stroke'));
        } else {
            $('.pcr-button').css('color', currentEditable.find('[data-edit-item="true"]').attr('fill'));
        }
    } else {
        $('.pcr-button').css('color', currentEditable.css('color'));
    }

    let fontSize = currentEditable.css('font-size').replace('px', '');
    $('.quantity').attr('value', fontSize);
};

/**
 * События начала редактирования текста
 */
const editableHandler = (event) => {
    let target = $(event.target);
    let svg = ['path', 'g', 'svg'];

    for (let i = 0; i < svg.length; i++) {
        if (target.prop('tagName') == svg[i]) {
            while (target.prop('tagName') != 'svg') {
                target = target.parent();
            }
            continue;
        }
    }

    console.log(target.prop('tagName'));

    //Убираем атрибут редактирования с прошлого редактируемого элемента
    $(CURRENT_EDIT_ELEMENT).attr(CURRENT_EDIT, 'false');
    //Указываем, что данный элемент редактируется
    target.attr(CURRENT_EDIT, 'true');
    updateTools();
    console.log('Update editable element');
};

/**
 * Получение выделенного текста
 */
const getSelection = () => {
    return window.getSelection().toString();
};

/**
 * Обернуть текст в span
 * TODO: доработать
 */
const wrapText = () => {
    if (getSelection() == EMPTY) return false;


    let range = window.getSelection().getRangeAt(0);
    let selectionContents = range.extractContents();
    let span = document.createElement('span');
    span.appendChild(selectionContents);

    //Убираем атрибут редактирования с прошлого редактируемого элемента
    $(CURRENT_EDIT_ELEMENT).attr(CURRENT_EDIT, 'false');
    //Указываем, что данный элемент редактируется
    $(span).attr(CURRENT_EDIT, 'true');

    range.insertNode(span);
};

const toggleCss = (attrPointer, cssProperty, cssValueOn, cssValueOff, item = null) => {
    let editableElement = $(CURRENT_EDIT_ELEMENT);

    if (editableElement.attr(attrPointer)) {
        editableElement.css(cssProperty, cssValueOff);
        editableElement.removeAttr(attrPointer);
        $(item).removeClass('active-style-button');
        return;
    }

    editableElement.attr(attrPointer, 'true');
    editableElement.css(cssProperty, cssValueOn);
    $(item).addClass('active-style-button');
}

/**
 * Добавления к тексту жирного
 * @param {object} event 
 */
const editWeightText = (event) => {
    wrapText();
    toggleCss('data-style-weight', 'font-weight', 'bold', 'normal', '#weight');
}

/**
 * Курсив для текста
 * @param {object} event 
 */
const editItalicText = (event) => {
    toggleCss('data-style-italic', 'font-style', 'italic', 'normal', '#style');
}

const editUnderlineText = (event) => {
    toggleCss('data-style-underline', 'text-decoration', 'underline', 'none', '#underline');
}

const editSizeText = (event) => {
    $(CURRENT_EDIT_ELEMENT).css('font-size', $('.quantity').val() + 'px');
}

/**
 * Изменение цвета
 * 
 * @param {object} event 
 */
const editColor = (event) => {
    if ($(CURRENT_EDIT_ELEMENT).prop('tagName') == 'svg') {
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('stroke', $('.pcr-result').val());
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('fill', $('.pcr-result').val());
        return;
    }
    $(CURRENT_EDIT_ELEMENT).css('color', $('.pcr-result').val());
};

/**
 * Масштаба
 * @param {object} event 
 */
const scaleCanvas = (event) => {
    let scale = +$('.scale').val();
    $('.main-svg').css('transform', `scale(${scale / 100})`);
}

/**
 * 
 * 
 * @param {object} event 
 */
const getToolsPanel = (event) => {
    let type = $(CURRENT_EDIT_ELEMENT).attr('data-type');
    $('.tools-panel-default').hide();
    $('.tools-panel-text').show();
    $('.tool-item').hide();

    console.log("Type tools panel: " + type);

    if (type == 'text') {
        console.log('In text');
        $('.font-tool').show();
        $('.color-tool').show();
        $('.size-tool').show();
        $('.style-tool').show();
        $('.delete-tool').show();
        return;
    }
    if (type == 'element') {
        console.log('In element');
        $('.color-tool').show();
        $('.delete-tool').show();
        return;
    }
    if (type == 'img') {
        console.log('In img');
        $('.file-tool').show();
        $('.delete-tool').show();
        return;
    }

    $('.tools-panel-default').show();
}

const removeNode = (event) => {
    $(CURRENT_EDIT_ELEMENT).remove();
}

/**
 * Загрузка файлов
 */
$('[type="file"]').change((event) => {
    let img = $('[type="file"]')[0].files[0];
    let reader = new FileReader();
    reader.readAsDataURL(img);

    reader.onloadend = () => {
        $(CURRENT_EDIT_ELEMENT).attr('src', reader.result);
    }
});

$('#weight').click(editWeightText);
$('#style').click(editItalicText);
$('#underline').click(editUnderlineText);
$('.quantity').keyup(editSizeText);
$('.size-tool').click(editSizeText);
$('.pcr-save').click(editColor);
$('.scale').keyup(scaleCanvas);
$('.pcr-picker').mousemove(editColor);
$('.delete-button').click(removeNode);

$('.size-tool-button').click((event) => {
    let isPlus = $(event.target).hasClass('plus');
    let currentScale = +$('.scale').val();

    if (isPlus) {
        currentScale += 10;
    } else if (currentScale > 10) {
        currentScale -= 10;
    }

    $('.scale').val(currentScale);
    $('.main-svg').css('transform', `scale(${currentScale / 100})`);
});

$('.pcr-swatches').click((event) => {
    if (event.target.tagName != 'BUTTON') return;

    let color = $(event.target).css('color');

    if ($(CURRENT_EDIT_ELEMENT).prop('tagName') == 'svg') {
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('stroke', color);
        return;
    }
    $(CURRENT_EDIT_ELEMENT).css('color', color);
});