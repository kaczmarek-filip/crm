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
                                $numer_umowy = $_GET['numer_umowy'];
                                echo "<a href='umowy.php?pesel=$pesel'>";
                                echo 'Umowy';
                                echo '</a>';

                                echo '<span class="icon-right-open">';
                                $numer_umowy = $_GET['numer_umowy'];
                                echo "<a href='umowa.php?pesel=$pesel&numer_umowy=$numer_umowy'>";
                                echo $numer_umowy;
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
            <div class="nav_box_checked" class="nav_box">Umowy</div>
            </a>
            <?php 
                $pesel = $_GET['pesel'];
                echo "<a href='zamowienia.php?pesel=$pesel'>"; 
            ?>
            <div class="nav_box">Zamówienia</div>
            </a>
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
                    $numer_umowy = $_GET['numer_umowy'];
                    // $sql = "SELECT * FROM `personal` WHERE `pesel` = $from_form";
                    $sql = "SELECT * FROM `personal`, `address`, `umowy` WHERE umowy.pesel = $from_form AND personal.pesel = $from_form AND address.pesel = $from_form AND `umowy`.`numer_umowy` = '$numer_umowy'";
                    $query = mysqli_query($conn, $sql);
                    foreach($query as $row)
                    {
                        echo '<h3 class="half_main_personal_grid_description" style="grid-column: span 2;"><span class="icon-down-open">Dane podstawowe zamówienia<span class="icon-down-open"></h3>';
                        echo '<div class="zamowienie" class="half_main_personal_grid" style="grid-column: span 2;">';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Numer umowy:<a class="main_personal_grid_record">'.$row['numer_umowy'].'</a></div>';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Status:<a class="main_personal_grid_record">'.$row['status'].'</a></div>';
                        // echo '<div class="main_personal_grid">Proces:<a class="main_personal_grid_record">'.$row['proces'].'</a></div>';
                        echo '<div class="main_personal_grid">Data utworzenia:<a class="main_personal_grid_record">'.$row['data_utworzenia'].'</a></div>';
                        echo '<div class="main_personal_grid">System tworzący:<a class="main_personal_grid_record">'.$row['system_tworzacy'].'</a></div>';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Osoba tworząca:<a class="main_personal_grid_record">'.$row['osoba_tworzaca'].'</a></div>';
                        // echo '<div class="main_personal_grid">Kanał Ofertowania:<a class="main_personal_grid_record">'.$row['kanal_ofertowania'].'</a></div>';
                        // echo '<div class="main_personal_grid">Kanał Realizacji:<a class="main_personal_grid_record">'.$row['kanal_realizacji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Sprzęt:<a class="main_personal_grid_record">'.$row['sprzet'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Data przekazania do realizacji:<a class="main_personal_grid_record">'.$row['data_przekazania_do_realizacji'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">System przekazujący do realizacji:<a class="main_personal_grid_record">'.$row['system_przekazujacy_do_realizacji'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Osoba przekazująca do realizacji:<a class="main_personal_grid_record">'.$row['osoba_przekazujaca_do_realizacji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Kanał akceptacji:<a class="main_personal_grid_record">'.$row['kanal_akceptacji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Numer listu przewozowego:<a class="main_personal_grid_record">'.$row['numer_listu_przewozowego'].'</a></div>';
                        // echo '<div class="main_personal_grid">Status weryfikacji:<a class="main_personal_grid_record">'.$row['status_weryfikacji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Numer sprawy CRM:<a class="main_personal_grid_record">'.$row['numer_sprawy_crm'].'</a></div>';
                        // echo '<div class="main_personal_grid">Komórka przetwarzająca:<a class="main_personal_grid_record">'.$row['komorka_przetwarzajaca'].'</a></div>';
                        // echo '<div class="main_personal_grid">Typ migracji:<a class="main_personal_grid_record">'.$row['typ_migracji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Poziom negocjacji:<a class="main_personal_grid_record">'.$row['poziom_negocjacji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Kwota kaucji:<a class="main_personal_grid_record">'.$row['kwota_kaucji'].'</a></div>';
                        // echo '<div class="main_personal_grid">Oferta gotowa:<a class="main_personal_grid_record">'.$row['oferta_gotowa'].'</a></div>';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Generacja:<a class="main_personal_grid_record">'.$row['generacja'].'</a></div>';
                        // echo '<div class="main_personal_grid">Kontrakty:<a class="main_personal_grid_record">'.$row['kontrakty'].'</a></div>';
                        echo '<div class="main_personal_grid">Kontrakty:<a class="main_personal_grid_record">'.$row['kontrakty'].'</a></div>';
                        echo '</div>';
                        // break;
                    }
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