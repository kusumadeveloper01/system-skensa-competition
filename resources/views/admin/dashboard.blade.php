<x-dashboard-layout>
    <div class="grid grid-cols-1 gap-5">
        <div>
            <div class="flex flex-col gap-2">
                <h2 class="page-title">Lomba</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
                    {{-- @dd($washed_vehicle_today) --}}
                    <div class="card-dashboard">
                        <p class="label-text">Bulan ini</p>
                        <h1 class="page-title">10
                        </h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Berlangsung</p>
                        <h1 class="page-title">10</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Akan datang</p>
                        <h1 class="page-title">10</h1>
                    </div>

                </div>
            </div>
            <div class="flex flex-col gap-2 mt-5">
                <h2 class="page-title">Siswa yang mengikuti lomba</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5">
                    {{-- @dd($washed_vehicle_today) --}}
                    <div class="card-dashboard">
                        <p class="label-text">Bulan ini</p>
                        <h1 class="page-title">10
                        </h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Berlangsung</p>
                        <h1 class="page-title">10</h1>
                    </div>
                    <div class="card-dashboard">
                        <p class="label-text">Akan datang</p>
                        <h1 class="page-title">10</h1>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-dashboard">
            <h2 class="page-title">Monthly Lomba</h2>
            <div id="calendar"></div>
        </div>

        {{-- @dd($upcoming_events) --}}
    </div>



    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // let dataEvent = [];

        // for (i = 0; i < events.length; i++) {
        //     dataEvent.push({
        //         title: events[i].name, // kolom 'name' di DB
        //         start: events[i].start_date,
        //         end: events[i].end_date
        //     })
        // }

        console.log(events);

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                // events: dataEvent
            });
            calendar.render();
        });
    </script>
</x-dashboard-layout>
