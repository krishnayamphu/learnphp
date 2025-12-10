<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-5">
        <input type="text" id="srch" placeholder="e.g: admin">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#srch").on('input', function() {
                let str = $("#srch").val();
                showHint(str);
            });
        });
        loadData();

        function loadData() {
            $.get("get-users.php?q=", function(data, status) {
                $("tbody").html(data);
            });
        }

        function showHint(str) {
            if (str.length == 0) {
                $.get("get-users.php?q=", function(data, status) {
                    $("tbody").html(data);
                });
                return;
            } else {
                $.get("get-users.php?q=" + str, function(data, status) {
                    $("tbody").html(data);
                });
            }
        };
    </script>
</body>

</html>