<?php
  session_start();
  error_reporting(0);
  include('config.php');

  $doctorid=$_SESSION['id'];
  $resultsDoctor = mysqli_query($con,"SELECT dotorSpecilization, doctorName, doctorAddress, doctorContact FROM principalUsers WHERE id='$doctorid'");
  $rowDoctor = mysqli_fetch_array($resultsDoctor);

  $user = $rowDoctor['doctorName'];

  if(isset($_POST['submit'])){ 
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
    $diagnostic=$_POST['diagnostic'];

    if($_FILES==0){
      $recipe= '../../resources/images/Default.png';
    }else{
      $recipe=addslashes(file_get_contents($_FILES['recipe']['tmp_name']));
    }
   
    $query = mysqli_query($con, "INSERT INTO tblmedicalhistory(patientId,bloodPressure,bloodSugar,weightKg,temperature,diagnostic,recipe) VALUES ('$vid','$bp','$bs','$weight','$temp','$diagnostic','$recipe')");

    if ($query){
      echo '<script>alert("Historia clinica añadida con exito")</script>';
      echo "<script>window.location.href ='listPatients.php'</script>";
    }
  }
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
            
            <div class="containerViewPatient mt-3">
              <!--<h5 class="over-title margin-bottom-15 firstTitle">Manage <span class="text-bold">Patients</span></h5>-->
  
              <?php
                  $eid=$_GET['viewid'];
                  $resultsPatient=mysqli_query($con,"SELECT * FROM tblpatient WHERE id='$eid'");
                  $cnt=1;
                  while ($rowPatient=mysqli_fetch_array($resultsPatient)) {
              ?>

              <table class="table table-bordered" style="border-color: #c8d2e6;">
                  <tr allign="center">
                      <td colspan="4" style="font-size:20px;">
                          Detalles del paciente
                      </td>
                  </tr>

                  <tr>
                      <th scope>Nombre</th>
                      <td><?php  echo $rowPatient['patientName'];?></td>
                      <th scope>Email</th>
                      <td><?php  echo $rowPatient['patientEmail'];?></td>
                  </tr>

                  <tr>
                      <th scope>Numero de telefono</th>
                      <td><?php  echo $rowPatient['patientContact'];?></td>
                      <th>Direccion</th>
                      <td><?php  echo $rowPatient['patientAddress'];?></td>
                  </tr>

                  <tr>
                      <th>Genero</th>
                      <td><?php  echo $rowPatient['patientGender'];?></td>
                      <th>Edad</th>
                      <td><?php  echo $rowPatient['patientAge'];?></td>
                  </tr>

                  <tr> 
                      <th>Enfermedades previas</th>
                      <td><?php  echo $rowPatient['patientMedHis'];?></td>
                      <th>Primera visita</th>
                      <td><?php  echo $rowPatient['creationDate'];?></td>
                  </tr>
              
                <?php }?>
              </table>

                <?php
                  $cid=$_GET['viewid'];
                  $resultsMedHis=mysqli_query($con,"SELECT * FROM tblmedicalhistory WHERE patientId='$cid'");
                ?>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <tr allign="center">
                      <th colspan="8" >Registros medicos</th> 
                  </tr>

                  <tr>
                      <th></th>
                      <th>Presion arterial</th>
                      <th>Peso</th>
                      <th>Azucar en sangre</th>
                      <th>Temperatura corporal</th>
                      <th>Diagnostico</th>
                      <th>Receta</th>
                      <th>Dia de visita</th>
                  </tr>

                  <?php  
                    while ($rowMedHis=mysqli_fetch_array($resultsMedHis)) { 
                  ?>

                  <tr>
                      <td><?php echo $cnt;?></td>
                      <td><?php  echo $rowMedHis['bloodPressure'];?></td>
                      <td><?php  echo $rowMedHis['bloodSugar'];?></td> 
                      <td><?php  echo $rowMedHis['weightKg'];?></td>
                      <td><?php  echo $rowMedHis['temperature'];?></td>
                      <td><?php  echo $rowMedHis['diagnostic'];?></td>
                      <td> <img  width="100px" src="data:image/jpg;base64, <?php echo base64_encode($rowMedHis['recipe']);?> "/></td> <!--RECIPÈ IMAGE TO DOWNLOAD -->
                      <td><?php  echo $rowMedHis['creationDate'];?></td> 
                  </tr>

                  <?php $cnt=$cnt+1;} ?>
                </table>

                <p allign="center">                            
                    <!--<button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button>-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Añadir registro medico</button>
                </p>  

                <!--<php  >-->

                <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                  
                    <!-- Modal content-->
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title">Añadir registro medico</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form method="post" name="submit" enctype="multipart/form-data">
                          <tr>
                              <th>Presion arterial</th>
                              <td>
                                  <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true">
                              </td>
                          </tr>       

                          <tr>
                              <th>Azucar en sangre</th>
                              <td>
                                  <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                              </td>
                          </tr> 

                          <tr>
                              <th>Peso</th>
                              <td>
                                  <input name="weight" placeholder="Weight" class="form-control wd-450" required="true">
                              </td>
                          </tr>

                          <tr>
                              <th>Temperatura corporal</th>
                              <td>
                                  <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                              </td>
                          </tr>
                                          
                          <tr>
                              <th>Diagnostico</th>
                              <td>
                                  <textarea name="diagnostic" placeholder="Medical Diagnostic" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                              </td>
                          </tr> 

                          <tr>
                              <th>Subir receta</th>
                              <td>
                                <input type="file" class="form-control" name="recipe" placeholder="Elegir imagen de la receta">
                              </td>
                          </tr> 

                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                      </div>

                      <div class="modal-footer">
                          <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                      </div>
                    </div>              
                  </div>
                </div>
            </div>    
          </div>
        </div>
      </div>
                      
      <script>
        $(document).ready(function() {
          $("#MyModal").modal();
        });
      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    </body>
</html>
