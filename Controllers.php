<?php
    require_once 'DB_Config.php';
    require_once 'Models.php';
    require_once 'Email.php';
    
    $Insert = new Inserts($mysqli, 
                          $Dataset->Name, 
                          $Dataset->Email, 
                          $Dataset->Telephone_WhatsApp, 
                          $Dataset->Questions->HealthConditions,
                          $Dataset->Questions->Glasses_Lens,
                          $Dataset->Questions->VisualDifficulty, 
                          $Dataset->Questions->Surgery,
                          $Dataset->SnellenResult->Right,
                          $Dataset->SnellenResult->Left
                         );
    $Insert->Patient();
    $Insert->VisualConditions();
    $Insert->HealthConditions();
    $Insert->SnellenResult();

    $SendEmail = new Email($Dataset->Name, 
                           $Dataset->Email, 
                           $Dataset->Telephone_WhatsApp,
                           $Dataset->SnellenResult->Right,
                           $Dataset->SnellenResult->Left
                          );
    $SendEmail->Send();
?>