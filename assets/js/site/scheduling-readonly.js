(function ($, PATH, Helpers) {

    const calendar = async () => {

        // var calendarEl = document.getElementById('calendar');
        // var calendar = new FullCalendar.Calendar(calendarEl, {
        //     initialView: 'dayGridMonth',
        //     selectable: true,
        //     editable: true, 
        // });
        // calendar.render();

        await $("#loader-overlay").fadeIn(500);

        let response = await $.ajax({
            url: PATH + "/getEvents",
            data: {
                id: window.location.href.split("/").pop()
            },
            type: "POST",
            dataType: "JSON"
        })

        let events = await Promise.all(
            response.events.map((event) => {
                return {
                    id: event.idEvent,
                    title: event.title,
                    description: event.description,
                    from: new Date(event.dateFrom),
                    to: new Date(event.dateTo)
                }
            })
        );

        var calendarInstance = new calendarJs("calendar", {
            manualEditingEnabled: false,
            exportEventsEnabled: false,
            useAmPmForTimeDisplays: false,
            fullScreenModeEnabled: false,
            dayHeaderNames: ["Seg", "Ter", "Quar", "Qui", "Sex", "Sab", "Dom"],
            dayNames: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
            dayNamesAbbreviated: ["Seg", "Ter", "Quar", "Qui", "Sex", "Sab", "Dom"],
            monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
            monthNamesAbbreviated: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            startOfWeekDay: 6,
            workingHoursStart: "18:00",
            workingHoursEnd: "24:00",
            defaultEventDuration: 120,
            showHolidays: false,
            events: events
        });

        await $("#loader-overlay").fadeOut(500);
    }

    $(document).ready(() => {
        calendar();
    })

})($, PATH, Helpers)