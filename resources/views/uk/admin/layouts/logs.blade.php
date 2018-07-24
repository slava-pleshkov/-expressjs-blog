<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{__('admin.admin-panel')}}</title>
    <link rel="author" href="{{ asset ('humans.txt')}}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#bd2d2d">
    <meta name="msapplication-TileColor" content="#bd2d2d">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#bd2d2d">
    <link href="{{ asset ('css/logs.css')}}" rel="stylesheet">
</head>

<body>
<header>
    @include('admin.includes.nav')
</header>

<main role="main" class="container">
    @yield('content')
</main>
<footer class="footer">
    <div class="container text-center">
        <span class="text-muted">Керування посиланнями ©{{ date('Y') }}. Всі права захищені.</span>
    </div>
</footer>
<script src="{{ asset('js/logs.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.table-container tr').on('click', function () {
            $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
            "language": {
                "sProcessing": "Зачекайте...",
                "sLengthMenu": "Показати _MENU_ записів",
                "sZeroRecords": "Записи відсутні.",
                "sInfo": "Записи з _START_ по _END_ із _TOTAL_ записів",
                "sInfoEmpty": "Записи з 0 по 0 із 0 записів",
                "sInfoFiltered": "(відфільтровано з _MAX_ записів)",
                "sInfoPostFix": "",
                "sSearch": "Пошук:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Перша",
                    "sPrevious": "Попередня",
                    "sNext": "Наступна",
                    "sLast": "Остання"
                },
                "oAria": {
                    "sSortAscending": ": активувати для сортування стовпців за зростанням",
                    "sSortDescending": ": активувати для сортування стовпців за спаданням"
                }
            },
            "order": [$('#table-log').data('orderingIndex'), 'desc'],
            "stateSave": true,
            "stateSaveCallback": function (settings, data) {
                window.localStorage.setItem("datatable", JSON.stringify(data));
            },
            "stateLoadCallback": function (settings) {
                var data = JSON.parse(window.localStorage.getItem("datatable"));
                if (data) data.start = 0;
                return data;
            }
        });
        $('#delete-log, #delete-all-log').click(function () {
            return confirm('Are you sure?');
        });
    });
</script>
</body>
