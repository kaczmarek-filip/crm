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
                                $pesel = $_GET['pesel'];
                                echo "<a href='personal.php?pesel=$pesel'>";
                                echo $row['name'].' '.$row['surname'];
                                echo '</a>';

                                echo '<span class="icon-right-open">';
                                // $zamowienie = $_GET['zamowienie'];
                                echo "<a href='zamowienia.php?pesel=$pesel'>";
                                echo 'Zamówienia';
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
            <?php 
                $pesel = $_GET['pesel'];
                echo "<a href='umowy.php?pesel=$pesel'>"; 
            ?>
            <div class="nav_box">Umowy</div>
            </a>
            <div class="nav_box_checked" class="nav_box">Zamówienia</div>
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
                if($_GET['pesel'] != "")
                {
                    $conn = mysqli_connect("localhost", "root", "", "crm");
                    $from_form = $_GET['pesel'];
                    // $sql = "SELECT * FROM `personal` WHERE `pesel` = $from_form";
                    $sql = "SELECT * FROM `personal`, `address`, `zamowienia` WHERE zamowienia.pesel = $from_form AND personal.pesel = $from_form AND address.pesel = $from_form;";
                    $query = mysqli_query($conn, $sql);
                    echo '<h3 class="half_main_personal_grid_description" style="grid-column: span 2;"><span class="icon-down-open">Zamówienia<span class="icon-down-open"></h3>';
                    echo '<div class="zamowienia_record_description"><a>'.'Numer zamówienia'.'</a><a>'.'Status'.'</a><a>'.'Data utworzenia'.'</a><a>'.'Kanał realizacji'.'</a></div>';
                    echo '<div class="zamowienia" style="grid-column: span 2;">';
                    $n = 0;
                    foreach($query as $row)
                    {

                        // echo "<a href='personal.php?pesel=$pesel'>";
                        echo '<div id="zamowienia_record'.$n.'"'.'class="zamowienia_record"><a class="zamowienia_record_a">'.$row['numer_zamowienia'].'</a><a class="zamowienia_record_a" style="grid-column: span 2;">'.$row['status'].'</a><a class="zamowienia_record_a">'.$row['data_utworzenia'].'</a><a class="zamowienia_record_a">'.$row['kanal_realizacji'].'</a></div>';
                        // echo "</a>";
                        echo '<script>';
                        $zamowienie = $row['numer_zamowienia'];
                        echo 'przycisk = document.querySelector("#zamowienia_record'.$n.'"); przycisk.addEventListener("click", function() ';
                        echo "{window.location.href = 'zamowienie.php?pesel=$pesel&zamowienie=$zamowienie';});";
                        echo '</script>';
                        $n = $n + 1;
                        // break;
                    }
                    echo '</div>';
                    mysqli_close($conn);
                }
                else
                {
                    echo '<script language="JavaScript" type="text/javascript">location.href="index.php";</script>';
                }
                ?>
            </div>
        </main>
    </div>
</body>
</html>