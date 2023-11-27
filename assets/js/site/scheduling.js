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
            manualEditingEnabled: true,
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
            events: events,
            onEventAdded: (event) => {
                
                $.ajax({
                    url: PATH + "/addEvent",
                    type: "POST",
                    data: {
                        idEvent: event.id,
                        title: event.title,
                        description: event.description,
                        dateFrom: new Date(event.from).toISOString().replace("T", " ").split(".")[0],
                        dateTo: new Date(event.to).toISOString().replace("T", " ").split(".")[0],
                    }
                })

            },
            onEventUpdated: (event) => {
                $.ajax({
                    url: PATH + "/updateEvent",
                    type: "POST",
                    data: {
                        idEvent: event.id,
                        title: event.title,
                        description: event.description,
                        dateFrom: new Date(event.from).toISOString().replace("T", " ").split(".")[0],
                        dateTo: new Date(event.to).toISOString().replace("T", " ").split(".")[0],
                    }
                })
            },
            onEventRemoved: (event) => {
                $.ajax({
                    url: PATH + "/removeEvent",
                    type: "POST",
                    data: {
                        idEvent: event.id
                    }
                })
            }
        });

        await $("#loader-overlay").fadeOut(500);
    }

    $(document).ready(() => {
        calendar();
    })

})($, PATH, Helpers)