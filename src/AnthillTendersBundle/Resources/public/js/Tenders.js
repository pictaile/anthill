/**
 * Created with JetBrains PhpStorm.
 * User: yuri
 * Date: 9/14/15
 * Time: 11:53 AM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(default_init);

function default_init(){
    $('body').pagination();
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false
    };
    $.datepicker.setDefaults($.extend(
        $.datepicker.regional["ru"])
    );
    $( "[name=date_end]" ).datepicker({
        minDate: "+1",
        maxDate: "+1y",
        dateFormat: "dd-mm-yy"
    });
    $('[name=date_start]').datepicker({
        minDate: "-1y",
        maxDate: "+1y",
        dateFormat: "dd-mm-yy"
    })
}
