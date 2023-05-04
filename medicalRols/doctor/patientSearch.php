<?php
  session_start();
  error_reporting(0);
  include('config.php');

  $doctorid=$_SESSION['id'];
  $ret = mysqli_query($con,"SELECT doctorSpecilization, doctorName, doctorAddress, doctorContact FROM principalUsers WHERE id='$doctorid'");
  $row = mysqli_fetch_array($ret);

  $user = $row['doctorName'];
  
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
              <a href="principalPanel.php" class="d-flex align-items-center justify-content-center pb-3 mb-md-0 me-m  text-decoration-none">
                <img class="img-fluid logo" src="../../resources/images/3.png" alt="">
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                  <a href="principalPanel.php" class="nav-link align-middle px-0">
                    <i class="fa-solid fa-house-user me-2"></i>Panel principal
                  </a>

                  <a href="addPatient.php" class="nav-link align-middle px-0">
                    <i class= "fa-solid fa-address-book me-2"></i>Añadir paciente
                  </a>

                  <a href="listPatients.php" class="nav-link align-middle px-0">
                    <i class= "fa-solid fa-address-book me-2"></i>Lista de pacientes
                  </a>

                  <a href="patientSearch.php" class="nav-link align-middle px-0">
                    <i class= "fa-solid fa-address-book me-2"></i>Buscador
                  </a>
      
                  <a href="calendar.php" class="nav-link align-middle disabled px-0">
                    <i class="fa-solid fa-calendar-days me-2"></i>Turnos
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
                <h3 class="navbarText">Mis pacientes</h3>
              </div>
          
              <div class="topnav">
                <input type="text" class="searchBar" placeholder="Buscar">
          
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
              
              <div class="dropdown d-flex flex-row-reverse">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../resources/images/profile.jpg" alt="" width="32" height="32" class="rounded-circle me-2 ms-2 border border-white border-3">
                <strong><?php  echo $user;?></strong>
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
              <h3 class="firstTitle">Buscar por nombre/especializacion/numero de telefono</h3>	

              <form role="form" method="post" name="search" class="row g-3 formSearcher" style="padding-bottom: 0% !important;">
                <div class="col-md-6">
                  <input type="text" name="searchData" id="searchData" class="form-control" value="" required='true'>
                </div>
                <div class="col-md-6">
                  <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">Buscar</button>
                </div>
              </form>

              <div class="row">
                <div class="col">
                  <form method="GET" action="ordering.php">
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Ordenar por edad:</label>
                      <select name="order" id="order" class="form-select">
                        <option selected>Elegir</option>
                        <option value="mayor_a_menor">De mayor a menor</option>
                        <option value="menor_a_mayor">De menor a mayor</option>
                      </select>
                      <button class="btn btn-o btn-primary" type="submit">Ordenar</button>
                    </div>
                  </form> 
                </div>
                <div class="col">
                  <form method="GET" action="filtering.php">
                    <div class="col-md-3">
                      <label for="filter">Filtrar por género:</label>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="mujer" name="filter" value="Mujer">
                        <label class="form-check-label" for="mujer">Mujer</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="hombre" name="filter" value="Hombre">
                        <label class="form-check-label" for="hombre">Hombre</label>
                      </div>

                      <button class="btn btn-o btn-primary" type="submit">Filtrar</button>
                    </div>
                  </form> 
                </div>
              </div>

              <?php
                if(isset($_POST['search'])){ 

                $sdata=$_POST['searchData'];
              ?>

              <h4 allign="center">Resultados por la busqueda de "<?php echo $sdata;?>"</h4>

              <table class="table table-hover" id="tableDoctorManagement">
                <thead>
                  <tr>
                    <th scope="col">Nombre del paciente</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Genero del paciente</th>
                    <th scope="col">Dia de creacion</th>
                    <th scope="col">Ultimo upd.</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <!--specialization like '%$sdata%'||-->
                  <?php
                    $docid=$_SESSION['id'];
                    $sql=mysqli_query($con,"SELECT * FROM tblpatient WHERE docId='$docid' && (patientName like '%$sdata%'|| patientContact like '%$sdata%')");
                    $num=mysqli_num_rows($sql);
                    if($num>0){
                        $cnt=1;
                        while($row=mysqli_fetch_array($sql))
                    {
                  ?>

                  <tr>
                      <td
                        class="hidden-xs"><?php echo $row['patientName'];?>
                        <a title="Editar perfil" href="editPatient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a>
                      </td>
                      <td><?php echo $row['patientContact'];?></td>
                      <td><?php echo $row['patientGender'];?></td>
                      <td><?php echo $row['creationDate'];?></td>
                      <td><?php echo $row['updationDate'];?></td>
                      <td>
                        <a title="Ver ultimo registro" href="viewPatient.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-edit"></i></a> || 
                        <a title="Agregar registro" href="viewPatient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>
                      </td>            
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
    </body>

</html>

