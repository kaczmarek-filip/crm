<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="fontello/css/fontello.css">
</head>
<body>
    <div id="container">
        <header>
            <a href="index.php">Strona Główna</a>
        </header>
        <nav>
            <div class="nav_box_index">Dane osobowe</div>
            <div class="nav_box_index">Umowy</div>
            <div class="nav_box_index">Zamówienia</div>
            <div class="nav_box_index">Aktywności</div>
            <div class="nav_box_index">Sprawy</div>
            <div class="nav_box_index">Sprawy</div>
            <div class="nav_box_index">Sprawy</div>
            <div class="nav_box_index">Sprawy</div>
            <div class="nav_box_index">Sprawy</div>
            <div class="nav_box_index">Sprawy</div>
        </nav>
        <div id="personal">
            <div id="name_surname" class="personal_parts">
                <!-- Filip Kaczmarek -->
            </div>
            <div id="pesel" class="personal_parts">
                <!-- 02322106075 -->
            </div>
            <div id="email" class="personal_parts">
                <!-- fkaczmarekf@gmail.com -->
            </div>
            <div id="address" class="personal_parts">
                <!-- Ul. Reymonta 67/13<br>
                Otwock 05-400 -->
            </div>
            <?php

            ?>
        </div>
        <div id="search">
            <h3 style="margin-bottom: 1%">Szukaj</h3>
            <form action="personal.php" method="get">
                <div class="search_block">
                    <input type="text" placeholder="PESEL" maxlength="11" name="pesel"> <!--only numbers -->
                    <button type="submit" class="search_search_button"><span class="icon-right-open"></span></button>
                </div>
                <div class="search_block">
                    <input type="text" placeholder="ID kontraktu" maxlength="11">
                    <button type="submit" class="search_search_button"><span class="icon-right-open"></span></button>
                </div>
                <div class="search_block">
                    <input type="text" placeholder="ID konta" maxlength="11">
                    <button type="submit" class="search_search_button"><span class="icon-right-open"></span></button>
                </div>
                <div class="search_block">
                    <input type="text" placeholder="Nr. karty" maxlength="11">
                    <button type="submit" class="search_search_button"><span class="icon-right-open"></span></button>
                    </div>
                <div class="search_block">
                    <input type="text" placeholder="MSISDN" maxlength="11">
                    <button type="submit" class="search_search_button"><span class="icon-right-open"></span></button>
                </div>
            </form>
        </div>
        <main style="visibility: hidden;">
            <div id="main_personal">
                <!-- Filip Kaczmarek
                02322106075 -->
                <?php
                // $conn = mysqli_connect("localhost", "root", "", "crm");
                // $query = "SELECT * FROM `personal`";
                // $odp = mysqli_query($conn, $query);
                //     foreach($odp as $row)
                //     {
                //         echo $row['name'];
                //         echo $row['surname'];
                //     }
                // mysqli_close($conn);
                ?>
            </div>
        </main>
    </div>
</body>
</html>