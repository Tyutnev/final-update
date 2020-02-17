/**
 * Скрипт для работы с изображениями
 */
(function() {
    /**
     * Получение категорий изображений
     * 
     * @return object
     */
    const getImgCategory = () => {
        let categories = {};

        $.ajax({
            type: 'GET',
            url: '/img/category',
            async: false,
            success: (html) => {
                categories = JSON.parse(html);
            }
        });

        return categories;
    };

    /**
     * Отображение контейнера с определеной категорией
     * 
     * @param object category
     */
    const renderImageContainer = (category) => {
        $('.category-container').append(`
            <li class="accordion__item accordion__item--is-open js-accordion__item">
            <button class="accordion__header js-tab-focus pl-0 pr-0" type="button">
                <span class="accordion__header-title">${category.title}</span>
                <em aria-hidden="true" class="accordion__header-icon"><i></i></em>
            </button>

            <div class="accordion__panel js-accordion__panel">
                <div class="accordion__panel-content p-0">
                    <div class="text-component margin-bottom-md">
                        <div class="row d-flex justify-content-around p-0 block-${category.title}">

                        </div>
                    </div>
                </div>
                </div>
            </li>
        `);
    };

    /**
     * Отображение изображения
     * 
     * @param {object} image
     * @param {string} container
     */
    const renderImage = (image, container) => {
        $(container).append(`
            <div class="content-block" data-id="${image.id}" style="cursor: pointer;">
                <img src="${image.src}">
            </div>
        `)
    };

    /**
     * Получение изображений
     * 
     * @param object imgCategory
     * 
     * @return void
     */
    const getImg = (category) => {
        let imgs = {};
        let pivot = $(`.block-${category.title}`);
        pivot = $(pivot[pivot.length - 1]).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/img/index',
            async: false,
            data: {
                id_category: category.id,
                pivot: pivot
            },
            success: (html) => {
                imgs = JSON.parse(html);
            }
        });

        return imgs;
    };

    const main = () => {
        let categories = getImgCategory();

        categories.forEach(category => {
            renderImageContainer(category);

            let imgs = getImg(category);
            imgs.forEach(img => {
                renderImage(img, `.block-${category.title}`);
            })
        });
    };

    main();
})();