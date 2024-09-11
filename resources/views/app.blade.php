<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Todo app</title>

</head>

<body>
    <header></header>
    <main>
        <div style="display: none" id="loader" class="LoadingOverlay">
            <div class="Line-Progress">
                <div class="indeterminate"></div>
            </div>
        </div>

        <div id="container">
            <div class="header-title-div">
                <h2 class="header-title">TODO</h2>
                <img class="theme-icon" src="images/icon-sun.svg" />
            </div>


            <div class="input-div">
                <div class="add-btn"></div>
                <input type="text" placeholder="Create a new todo..." />
            </div>

            <div id="list-div">
                <ul class="list">
                    <!--list is populated from localStorage array "listItems"-->
                </ul>

                <div class="list-footer">
                    <span class="item-left-counter">0 items left</span>

                    <div class="list-filters">
                        <span class="filter-item filter-active">All</span>
                        <span class="filter-item">Active</span>
                        <span class="filter-item">Completed</span>
                    </div>

                    <span class="clear-completed">Clear Completed</span>
                </div>


            </div>

            <div class="list-filters-mobile">
                <span class="filter-item filter-active">All</span>
                <span class="filter-item">Active</span>
                <span class="filter-item">Completed</span>
            </div>


            <h3 class="drag-drop-text">Drag and drop to reorder list</h3>
        </div>


    </main>

    <!--import Axios-->
    <script src="{{ asset('js/axios.min.js') }}"></script>

    <!--import JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--import JQuery IU-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <!--import main script-->
    <script src="js/main.js"></script>

    <!--Script for making the list sortable-->
    <script>
        $(".list").sortable({
            update: function(event, ui) {
                //when order of an item is changed call the "updateLocalStorageArray" function
                updateLocalStorageArray();
            },
            containment: "parent",
            cursor: "move",
            distance: 5,
            forceHelperSize: true,
            forcePlaceholderSize: true,
            opacity: 0.5,
            tolerance: "pointer"
        });
    </script>

</body>

</html>
