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
            <a href="index.php">Strona Główna</a> <!-- CRM -->
        <?php
                        // echo '<span class="icon-right-open">';
                        // echo '<a href="#">';
                        // echo $_GET['name'].' '.$_GET['surname'];
                        // echo '</a>';
                        if($_GET['pesel'] != "")
                        {
                            $conn = mysqli_connect("localhost", "root", "", "crm");
                            $from_form = $_GET['pesel'];
                            $sql = "SELECT * FROM `personal` WHERE `pesel` = $from_form";
                            $query = mysqli_query($conn, $sql);
                            foreach($query as $row)
                            {
                                echo '<span class="icon-right-open">';
                                echo '<a href="#">';
                                echo $row['name'].' '.$row['surname'];
                                echo '</a>';
                            }
                            mysqli_close($conn);
                        }
                        
                ?>
        </header>
        <nav>
            <?php 
                $pesel = $_GET['pesel'];
                echo "<a href='personal.php?pesel=$pesel'>"; 
            ?>
            <div class="nav_box">Dane osobowe</div>
            </a>
            <div class="nav_box_checked" class="nav_box">Umowy</div>
            <div class="nav_box">Zamówienia</div>
            <div class="nav_box">Aktywności</div>
            <div class="nav_box">Sprawy</div>
            <div class="nav_box">Sprawy</div>
            <div class="nav_box">Sprawy</div>
            <div class="nav_box">Sprawy</div>
            <div class="nav_box">Sprawy</div>
            <div class="nav_box">Sprawy</div>
        </nav>
        <div id="personal">
            <!-- <div id="name_surname" class="personal_parts">
                Filip Kaczmarek
            </div>
            
            <div id="pesel" class="personal_parts">
                02322106075
            </div>
            <div id="email" class="personal_parts">
                fkaczmarekf@gmail.com
            </div>
            <div id="address" class="personal_parts">
                Ul. Reymonta 67/13<br>
                Otwock 05-400
            </div> -->
            <?php
                if($_GET['pesel'] != "")
                {
                    $conn = mysqli_connect("localhost", "root", "", "crm");
                    $from_form = $_GET['pesel'];
                    // $sql = "SELECT personal.name, personal.surname, personal.pesel, personal.email, address.ulica, address.numer_domu, address.numer_mieszkania, address.kod_pocztowy FROM `personal`, `address` WHERE personal.pesel = $from_form";
                    $sql = "SELECT * FROM `personal`, `address` WHERE personal.pesel = $from_form";
                    $query = mysqli_query($conn, $sql);
                    foreach($query as $row)
                    {
                        echo '<div id="name_surname" class="personal_parts">'.$row['name'].' '.$row['surname'].'</div>';
                        echo '<div id="pesel" class="personal_parts">'.$row['pesel'].'</div>';
                        echo '<div id="email" class="personal_parts">'.$row['email'].'</div>';
                        echo '<div id="address" class="personal_parts">'.'ul. '.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'<br>'.$row['kod_pocztowy'].' '.$row['miasto'].'</div>';
                        break;
                    }
                    mysqli_close($conn);
                }
            ?>
        </div>
        <div id="search">
            <h3 style="margin-bottom: 1%">Szukaj</h3>
            <form action="personal.php" method="get">
                <div class="search_block">
                    <input type="text" placeholder="PESEL" maxlength="11" name="pesel"> <!--only numbers -->
                    <button type="submit" class="search_search_button" name="search"><span class="icon-right-open"></span></button>
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
        <main>
            <div id="main_personal">
                <!-- <div class="main_personal_grid">Nazwisko:<p class="main_personal_grid_record">Kaczmarek</p></div>
                <div class="main_personal_grid">Imię:<br>Filip</div>
                <div class="main_personal_grid">02322106075</div>
                <div class="main_personal_grid">ul. Reymonta</div> -->
                <?php
                // if($_POST['pesel'] != "")
                // {
                //     $conn = mysqli_connect("localhost", "root", "", "crm");
                //     $from_form = $_POST['pesel'];
                //     // $sql = "SELECT * FROM `personal` WHERE `pesel` = $from_form";
                //     $sql = "SELECT * FROM `personal`, `address` WHERE personal.pesel = $from_form";
                //     $query = mysqli_query($conn, $sql);
                //     foreach($query as $row)
                //     {
                //         echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Dane osobowe<span class="icon-down-open"></h3>';
                //         echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Dane kontaktowe<span class="icon-down-open"></h3>';
                //         echo '<div class="half_main_personal_grid">';
                //         echo '<div class="main_personal_grid">Imię:<a class="main_personal_grid_record">'.$row['name'].'</a></div>';
                //         echo '<div class="main_personal_grid">Nazwisko:<a class="main_personal_grid_record">'.$row['surname'].'</a></div>';
                //         echo '<div class="main_personal_grid">PESEL:<a class="main_personal_grid_record">'.$row['pesel'].'</a></div>';
                //         echo '</div>';
                //         // echo '<h2 style="float: right;">Dane osobowe</h2><br>';
                //         echo '<div class="half_main_personal_grid">';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">E-mail:<a class="main_personal_grid_record">'.$row['email'].'</a></div>';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">Telefon:<a class="main_personal_grid_record">'."+48606980457".'</a></div>';
                //         echo '</div>';
                //         echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Adres zameldowania<span class="icon-down-open"></h3>';
                //         echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Adres korespondencyjny<span class="icon-down-open"></h3>';
                //         // echo '<h4>Adres Korespondencyjny</h4>';
                //         echo '<div class="half_main_personal_grid">';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">Adres:<a class="main_personal_grid_record">'.'ul. '.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'</a></div>';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                //         echo '</div>';
                //         // echo '<h4>Adres Zameldowania</h4>';
                //         echo '<div class="half_main_personal_grid">';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">Adres:<a class="main_personal_grid_record">'.'ul. '.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'</a></div>';
                //         echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                //         echo '</div>';
                //         // echo '<div class="main_personal_grid">Adres:<a class="main_personal_grid_record">'.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'  '.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                //         // echo '<div class="main_personal_grid">Ulica:<a class="main_personal_grid_record">'.$row['ulica'].'</a></div>';
                //         break;
                //     }
                //     mysqli_close($conn);
                // }
                // else
                // {
                //     echo '<script language="JavaScript" type="text/javascript">location.href="index.php";</script>';
                // }
                ?>
            </div>
        </main>
    </div>
</body>
</html>