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
            <h3 align="center">Informācija par visiem automašīniem</h3><br />
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
                width: 75
            },
            {
                name: "piegadata_noliktava",
                type: "text",
                width: 180,
                validate: "required"
            },
            {
                name: "valsts_kods",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                name: "automasinas_marka_kods",
                type: "text",
                width: 220,
            },
            {
                name: "modelis",
                type: "text",
                width: 150,
            },
            {
                name: "izlaiduma_gads",
                type: "text",
                width: 150,
            },
            {
                name: "krasa_kods",
                type: "text",
                width: 150,
            },
            {
                name: "virsbuves_tips_kods",
                type: "text",
                width: 180,
            },
            {
                name: "piedzinas_tips_kods",
                type: "text",
                width: 180,
            },
            {
                name: "parnesumkarbas_tips_kods",
                type: "text",
                width: 220,
            },
            {
                name: "durvju_skaits",
                type: "text",
                width: 150,
            },
            {
                name: "sedvietu_skaits",
                type: "text",
                width: 150,
            },
            {
                name: "dzineja_tips_kods",
                type: "text",
                width: 150,
            },
            {
                name: "degvielas_padeves_sistemas_tips_kods",
                type: "text",
                width: 330,
            },
            {
                name: "dzineja_novietojuma_tips_kods",
                type: "text",
                width: 270,
            },
            {
                name: "dzineja_tilpums",
                type: "text",
                width: 150,
            },
            {
                name: "VIN",
                type: "text",
                width: 180,
            },
            {
                name: "preces_cena",
                type: "text",
                width: 150,
            },
            {
                name: "attels",
                type: "text",
                width: 700,
            },
            {
                type: "control",
                width: 75,
            }
        ]

    });
</script>
 