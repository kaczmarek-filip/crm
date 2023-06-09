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
            <?php
            echo '<a href="index.php">Strona Główna</a> <!-- CRM -->'
            ?>
        <?php
                    if(isset($_GET['pesel']))
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
                        }
                        mysqli_close($conn);
                    }
                ?>
        </header>
        <nav>
            <div class="nav_box_checked" class="nav_box">Dane osobowe</div>
            <?php 
            $pesel = $_GET['pesel'];
            echo "<a href='umowy.php?pesel=$pesel'>"; 
            ?>
            <div class="nav_box">Umowy</div>
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
        <div id="contracts">
            <div class="contract_number_checked" style="grid-column: span 2; margin: 3%; padding: 2%; width: 50%; justify-self: center;">
                <!-- 156443115 -->
                <?php
                if($_GET['pesel'] != "")
                {
                    $conn = mysqli_connect("localhost", "root", "", "crm");
                    $from_form = $_GET['pesel'];
                    $sql = "SELECT * FROM `personal`, `address` WHERE personal.pesel = $from_form AND address.pesel = $from_form";
                    $query = mysqli_query($conn, $sql);
                    foreach($query as $row)
                    {
                        $pesel = $_GET['pesel'];
                        echo "<a href='personal.php?pesel=$pesel'>";
                        echo $row['id_klienta'];
                        echo "</a>";

                    }
                    mysqli_close($conn);
                }
                ?>
            </div>
            <?php
                if($_GET['pesel'] != "")
                {
                    $conn = mysqli_connect("localhost", "root", "", "crm");
                    $from_form = $_GET['pesel'];
                    $sql = "SELECT * FROM `personal`, `address`, `umowy` WHERE personal.pesel = $from_form AND address.pesel = $from_form AND umowy.pesel = $from_form" ;
                    $query = mysqli_query($conn, $sql);
                    foreach($query as $row)
                    {
                        $pesel = $_GET['pesel'];
                        // $numer_umowy = $_GET['numer_umowy'];
                        echo "<a class='contract_number_a' href='umowa.php?pesel=$pesel&numer_umowy=".$row['numer_umowy']."'".'>';
                        echo '<div class="contract_number">';
                        echo $row['id_konta'];
                        echo "</div>";
                        echo "</a>";

                        echo "<a class='contract_number_a' href='personal.php?pesel=$pesel'>";
                        echo '<div class="contract_number">';
                        echo $row['id_kontraktu'];
                        echo "</div>";
                        echo "</a>";
                    }
                    mysqli_close($conn);
                }
                ?>
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
                    $sql = "SELECT * FROM `personal`, `address` WHERE personal.pesel = $from_form";
                    $query = mysqli_query($conn, $sql);
                    foreach($query as $row)
                    {
                        echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Dane osobowe<span class="icon-down-open"></h3>';
                        echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Dane kontaktowe<span class="icon-down-open"></h3>';
                        echo '<div class="half_main_personal_grid">';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Imię:<a class="main_personal_grid_record">'.$row['name'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Nazwisko:<a class="main_personal_grid_record">'.$row['surname'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">PESEL:<a class="main_personal_grid_record">'.$row['pesel'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">ID klienta:<a class="main_personal_grid_record">'.$row['id_klienta'].'</a></div>';
                        echo '</div>';
                        // echo '<h2 style="float: right;">Dane osobowe</h2><br>';
                        echo '<div class="half_main_personal_grid">';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">E-mail:<a class="main_personal_grid_record">'.$row['email'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Telefon:<a class="main_personal_grid_record">'."+48606980457".'</a></div>';
                        echo '</div>';
                        echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Adres zameldowania<span class="icon-down-open"></h3>';
                        echo '<h3 class="half_main_personal_grid_description"><span class="icon-down-open">Adres korespondencyjny<span class="icon-down-open"></h3>';
                        // echo '<h4>Adres Korespondencyjny</h4>';
                        echo '<div class="half_main_personal_grid">';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Adres:<a class="main_personal_grid_record">'.'ul. '.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'</a></div>';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Ulica:<a class="main_personal_grid_record">'.$row['ulica'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Numer budynku:<a class="main_personal_grid_record">'.$row['numer_domu'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Numer mieszkania:<a class="main_personal_grid_record">'.$row['numer_mieszkania'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['miasto'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Kod pocztowy:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Poczta:<a class="main_personal_grid_record">'.$row['miasto'].'</a></div>';
                        echo '</div>';
                        // echo '<h4>Adres Zameldowania</h4>';
                        echo '<div class="half_main_personal_grid">';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Adres:<a class="main_personal_grid_record">'.'ul. '.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'</a></div>';
                        // echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Ulica:<a class="main_personal_grid_record">'.$row['ulica'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Numer budynku:<a class="main_personal_grid_record">'.$row['numer_domu'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Numer mieszkania:<a class="main_personal_grid_record">'.$row['numer_mieszkania'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Miasto:<a class="main_personal_grid_record">'.$row['miasto'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Kod pocztowy:<a class="main_personal_grid_record">'.$row['kod_pocztowy'].'</a></div>';
                        echo '<div class="main_personal_grid" style="grid-column: span 2;">Poczta:<a class="main_personal_grid_record">'.$row['miasto'].'</a></div>';
                        echo '</div>';
                        // echo '<div class="main_personal_grid">Adres:<a class="main_personal_grid_record">'.$row['ulica'].' '.$row['numer_domu'].'/'.$row['numer_mieszkania'].'  '.$row['kod_pocztowy'].' '.$row['miasto'].'</a></div>';
                        // echo '<div class="main_personal_grid">Ulica:<a class="main_personal_grid_record">'.$row['ulica'].'</a></div>';
                        break;
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