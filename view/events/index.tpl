{extends file=$EXTENDER_TPL}
{block name="userBody"}
{strip}


        <div id='calendar'></div>
        {literal}
            <script>

                $(document).ready(function() {

                    $('#calendar').fullCalendar({
                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        events: [
                            {
                                title: 'All Day Event',
                                start: '2016-06-01'
                            },
                            {
                                title: 'Long Event',
                                start: '2016-06-07',
                                end: '2016-06-10'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: '2016-06-09T16:00:00'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: '2016-06-16T16:00:00'
                            },
                            {
                                title: 'Conference',
                                start: '2016-06-11',
                                end: '2016-06-13'
                            },
                            {
                                title: 'Meeting',
                                start: '2016-06-12T10:30:00',
                                end: '2016-06-12T12:30:00'
                            },
                            {
                                title: 'Lunch',
                                start: '2016-06-12T12:00:00'
                            },
                            {
                                title: 'Meeting',
                                start: '2016-06-12T14:30:00'
                            },
                            {
                                title: 'Happy Hour',
                                start: '2016-06-12T17:30:00'
                            },
                            {
                                title: 'Dinner',
                                start: '2016-06-12T20:00:00'
                            },
                            {
                                title: 'Birthday Party',
                                start: '2016-06-13T07:00:00'
                            },
                            {
                                title: 'Click for Google',
                                url: 'http://google.com/',
                                start: '2016-06-28'
                            }
                        ]
                    });

                });

            </script>
        {/literal}

{/strip}
{/block}


{block name="css"}

    <link rel="stylesheet" href="/custom/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="/custom/fullcalendar/fullcalendar.print.css" media='print'>
{/block}

{block name="scriptb"}

    <script src="/custom/lib/moment.min.js" ></script>
{/block}


{block name="script"}
    <script src="/custom/fullcalendar/fullcalendar.js" ></script>
{/block}