(function() {
    /**
     * Атрибут редактируемого элемента
     */
    const CURRENT_EDIT = 'currentEditable';

    /**
     * Атрибут для получения текущего редактируемого элемента
     */
    const CURRENT_EDIT_ELEMENT = `[${CURRENT_EDIT}="true"]`;


    $('.content-block').click((event) => {
        let element = $(event.target);


        while (element.prop('tagName') != 'DIV') {
            element = element.parent();
        }

        $.ajax({
            type: 'GET',
            url: 'img/html',
            data: {
                id: element.attr('data-id')
            },
            success: (html) => {
                html = JSON.parse(html);
                $('.main-svg').empty();
                $('.main-svg').append(html);

                $('[contenteditable="true"]').click(editableHandler);
                $('[data-set="true"').click(getToolsPanel);

                $('aside').removeClass('sidebar--is-visible');
            }
        })
    });

    $('.fonts').click((event) => {
        $('.format-container').addClass('collapse');
        $('.format-container').removeClass('show');

        $('.fonts-list').empty();
        $.ajax({
            type: 'GET',
            url: '/img/font',
            data: {
                pivot: 0
            },
            success: (html) => {
                html = JSON.parse(html);

                html.filter((font) => {
                    $('.fonts-list').append(`
                    <li data-src="${font.src}">
                        <input data-src="${font.src}" class="fonts-item radio" type="radio" name="radioButton" id="radio1">
                        <label data-src="${font.src}" for="radio1">${font.title}</label>
                    </li>
                    `);
                })

                $('.fonts-list').click((event) => {
                    if (event.target.tagName != 'LABEL') return;

                    let pathToFont = $(event.target).attr('data-src');
                    let title = $(event.target).html();

                    $('head').append(`
                        <style class="fonts-style">
                            @font-face {
                                font-family: ${title};
                                src: url(${pathToFont});
                            }
                        </style>
                    `);

                    $(CURRENT_EDIT_ELEMENT).css('font-family', title);
                });
            }
        })
    });

    $('.format-button').click((event) => {
        $('.font-container').addClass('collapse');
        $('.font-container').removeClass('show');
    })
})();