<?php
    error_reporting(0);
    include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" sizes="32x32" href="../../resources/images/1.png">
        <link rel="stylesheet" href="../../resources/css/docIndex.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/36defbaad1.js" crossorigin="anonymous"></script>
        <title>Medical History</title>
    </head>
    <body>

      <div class="container-fluid">
        <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column px-3 pt-2 text-white min-vh-100">
              <a href="/" class="d-flex align-items-center justify-content-center pb-3 mb-md-0 me-m  text-decoration-none">
                <img class="img-fluid logo" src="../../resources/images/3.png" alt="">
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                  <a href="dashboard.php" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-house-user me-2"></i>Panel principal
                  </a>
      
                  <a href="addDoctor.php" class="nav-link align-middle px-0">
                    <i class= "fa-solid fa-address-book me-2"></i>Añadir doctor
                  </a>
      
                  <a href="listDoctors.php" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-calendar-days me-2"></i>Lista de doctores
                  </a>

                  <a href="doctorSearch.php" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-calendar-days me-2"></i>Buscador
                  </a>
      
                  <a href="configuration.html" class="nav-link align-middle disabled px-0">
                    <i class="fa-solid fa-gear me-2"></i>Configuracion
                  </a>
                </li>
                
                <li class="mt-4 mb-1">
                  <a href="index.html">
                    <button type="button" class="btn btn-primary btn-sm ps-3 pe-3 me-sm-2 buttonsNav">
                      <a href="logout.php" class="logoutButton" style="text-decoration: none;"> 
                        Cerrar sesion
                      </a>
                    </button>     
                  </a>
                </li>
              </ul>
              
              <div class="align-items-center pb-4">
                <div class="d-flex align-items-center justify-content-center flex-column bd-highlight bottom-0 start-0" style="margin-top: 100%;">
                  <div class="p-2 bd-highlight align-items-center" style="padding:0 !important;">
                    <div class="card align-items-center pt-4 pb-3" style="border: none; background-color: #c8d2e6;width: 13rem !important; border-radius: 30px;">
                    <img src="../../resources/images/sideBarImage.png" class="card-img-top img-fluid" style="max-width: 7rem;" alt="...">
                    <div class="card-body text-center text-black">
                      <h5 class="card-title">Medical History</h5>
                      <p class="card-text">medicalihistory@info.com</p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col py-3" style="background-color:#c8d2e6">
            <header class="navbar justify-content-start sticky-top flex-md-nowrap p-0">
              <div>
                <h3 class="navbarText">Buscador</h3>
              </div>
          
              <div class="topnav">
                <input type="text" class="searchBar" placeholder="Buscar">
          
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
              
              <div class="dropdown d-flex flex-row-reverse">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../resources/images/profile.jpg" alt="" width="32" height="32" class="rounded-circle me-2 ms-2 border border-white border-3">
                <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end" aria-labelledby="dropdownMenuButton1"> 
                <li><a class="dropdown-item" href="#">Editar perfil</a></li>
                </ul>
          
                <a class="d-flex align-items-center text-decoration-none notificationsIcon">
                <i class="fa-solid fa-bell me-2 ms-2"></i>
                <i class="fa-solid fa-user me-2 ms-2"></i>
                </a>
              </div>
            </header>
            
            <div class="containerSearcher">
              <!--
                <h3>Buscar por nombre/especializacion/numero de telefono</h3>-->

                <form role="form" method="post" name="search">
                    <div class="form-group">
                      
                        <label for="doctorName">
                            Buscar por nombre/especializacion/numero de telefono
                        </label>

                        <input type="text" name="searchData" id="searchData" class="form-control" value="" required='true' style="border-radius:30px !important;"> 
                    </div>

                    <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                        Buscar
                    </button>
                </form>

                <?php
                  if(isset($_POST['search'])){ 

                  $sdata=$_POST['searchData'];
                ?>

                <h4 allign="center">Resultados por la busqueda de "<?php echo $sdata;?>"</h4>

                <table class="table table-hover" id="tableDoctorManagement">
                    <thead>
                        <tr>
                            <th scope="col">Especializacion</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Creacion</th>
                            <th scope="col">Ultimo upd.</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--specialization like '%$sdata%'||-->
                        <?php
                          $userType = "doctor";
                          $sql=mysqli_query($con,"select * from principalusers where userType='$userType' and doctorName like '%$sdata%'|| doctorSpecilization like '%$sdata%'|| doctorContact like '%$sdata%'");
                          $num=mysqli_num_rows($sql);
                          if($num>0){
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql))
                          {
                        ?>

                        <tr>
                          <td class="hidden-xs"><?php echo $row['doctorSpecilization'];?></td>
                          <td><?php echo $row['doctorName'];?></td>
                          <td><?php echo $row['doctorContact'];?></td>
                          <td><?php echo $row['creationDate'];?></td>
                          <td><?php echo $row['updationDate'];?></td>
                          <td><a title="Editar doctor" href="editDoctor.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a><td>
                          <!--<td><a href="view-patient.php?viewid=<php echo $row['ID'];?>"><i class="fa fa-eye"></i></a></td>-->
                        </tr>

                        <?php 
                          $cnt=$cnt+1;
                          }} else { 
                        ?>
                        <tr>
                          <td colspan="8"> No se encontraron resultados para la busqueda</td>
                        </tr>
                        
                        <?php } }?>
                    </tbody>
                </table>
            </div>
            
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="../../resources/js/main.js"></script>
      <!-- start: JavaScript Event Handlers for this page -->
      <script src="../../resources/js/form-elements.js"></script>
      <!--
      <script>
        jQuery(document).ready(function() {
          Main.init();
          FormElements.init();
        });
      </script>-->
    </body>
</html>