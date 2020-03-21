(function() {
    const saveAsPng = () => {
        $.ajax({
            type: 'POST',
            url: '/img/png',
            data: {
                html: $('.main-svg').html()
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    };

    const saveAsJpeg = () => {
        $.ajax({
            type: 'POST',
            url: '/img/jpeg',
            data: {
                html: $('.main-svg').html()
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    }

    const saveAsPdf = () => {
        $.ajax({
            type: 'POST',
            url: '/img/pdf',
            data: {
                html: $('.main-svg').html(),
                width: parseInt($('.main-svg').css('width')),
                height: parseInt($('.main-svg').css('height'))
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    }

    let makeScreen = () => {
        // в html2canvas передаем id контента
        html2canvas($('.main-svg').get(0), {
            scale: 2 // Дополнительные опции
        }).then(function(canvas) {
            // когда canvas сформирован отправялем его скачиваться с помощью FileSaver
            canvas.toBlob(function(blob) {
                // тут можно установить название сохраняемого файла
                saveAs(blob, "application.png");
            });
        });
    };

    $('.format-save-item').click((event) => {
        let format = $(event.target).val();

        if (format == 'png') saveAsPng();
        if (format == 'jpeg') saveAsJpeg();
        if (format == 'pdf') saveAsPdf();
    })

    $('.save-button-menu').click((event) => {
        console.log('Here');

        $('.dropdown-menu-save').toggleClass('show-block');
    });
})();