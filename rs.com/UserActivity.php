<?php
                     include "connect.php";
                      if(isset($_SESSION['username'])){
                            $dt = date('Y-m-d H:i:s'); 
                            $user = $_SESSION['username'];
                            $statement = $conn->prepare("UPDATE users SET last_activity = (?) WHERE username = ?");
                            $statement->bind_param("ss",$dt,$user);
                            $statement->execute();
                            mysqli_close($conn);
                      }
              ?>
