
<div id="calendar-index">
    {{ partial('reception/calendar',['curent_day':curent_day, 'curent_month' : curent_month,'curent_month_id' : curent_month_id, 'start_month_day':start_month_day, 'cells_count' : cells_count]) }}
</div>
<br>
<div class="text-center">
    <a href="{{ url.get(['for' : 'create-reception' ]) }}" class="btn btn-success">Создать запись</a>
</div>
