<html>

<head>
    <?php
    # Навигационное меню
    include("../navbar_admin.php");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <br />
        <div class="table-responsive">
            <h3 style="text-align:center">Informācija par visiem pasutījumiem</h3><br />
            <div id="grid_table"></div>
        </div>
    </div>
</body>

</html>
<script>
    $('#grid_table').jsGrid({

        width: "100%",
        height: "750px",

        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: "Vai tiešām vēlaties dzēst datus?",

        controller: {
            loadData: function(filter) {
                return $.ajax({
                    type: "GET",
                    url: "fetch_data.php",
                    data: filter
                });
            },
            insertItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "fetch_data.php",
                    data: item
                });
            },
            updateItem: function(item) {
                return $.ajax({
                    type: "PUT",
                    url: "fetch_data.php",
                    data: item
                });
            },
            deleteItem: function(item) {
                return $.ajax({
                    type: "DELETE",
                    url: "fetch_data.php",
                    data: item
                });
            },
        },


    fields: [{
                name: "kods",
                type: "text",
                width: 125
            },
            {
                name: "klients_kods",
                type: "text",
                width: 125
            },
            {
                name: "datums",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "laiks",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "piegades_veids_kods",
                type: "text",
                width: 175,
                validate: "required"
            },
            {
                name: "maksajuma_veids_kods",
                type: "text",
                width: 200,
                validate: "required"
            },
            {
                name: "cena",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "darbinieks_kods",
                type: "text",
                width: 150,
            },
            {
                type: "control",
                width: 75,
            }
        ]

    });
</script>
 