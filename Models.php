<?php
    class Inserts{
        private $DB_Connection;
        private $Name;
        private $Email;
        private $Telephone_WhatsApp;
        private $HealthConditions;
        private $Glasses_Lens;
        private $VisualDifficulty;
        private $Surgery;
        private $RightEye;
        private $LeftEye;
        private $LastID;
        
        public function __construct($DB_Connection, $Name, $Email, $Telephone_WhatsApp, $HealthConditions, 
                                    $Glasses_Lens, $VisualDifficulty, $Surgery, 
                                    $RightEye, $LeftEye)
        {
            $this->DB_Connection = $DB_Connection;
            $this->Name = $Name;
            $this->Email = $Email;
            $this->Telephone_WhatsApp = $Telephone_WhatsApp;
            $this->HealthConditions = $HealthConditions;
            $this->Glasses_Lens = $Glasses_Lens;
            $this->VisualDifficulty = $VisualDifficulty;
            $this->Surgery = $Surgery;
            $this->RightEye = $RightEye;
            $this->LeftEye = $LeftEye;
        }

        public function Patient()
        {
            $stmt = $this->DB_Connection->prepare("INSERT INTO Patient (Name, Email, Telephone_WhatsApp) VALUES(?, ?, ?)");
            $stmt->bind_param('sss', $this->Name, $this->Email, $this->Telephone_WhatsApp);
            $stmt->execute();

            $this->LastID = $this->DB_Connection->insert_id;
        }

        public function VisualConditions()
        {
            $stmt = $this->DB_Connection->prepare("INSERT INTO VisualConditions (ID_Patient, Glasses_Lens, VisualDifficulty, Surgery) VALUES(?, ?, ?, ?)");
            $stmt->bind_param('isss', $this->LastID, $this->Glasses_Lens, $this->VisualDifficulty, $this->Surgery);
            $stmt->execute();
        }

        public function HealthConditions()
        {
            $ArraySize = count($this->HealthConditions) - 1;
            for ($index = 0; $index <= $ArraySize; $index++) 
            {
                $stmt = $this->DB_Connection->prepare("INSERT INTO HealthConditions (ID_Patient, HealthConditions) VALUES(?, ?)");
                $stmt->bind_param('is', $this->LastID, $this->HealthConditions[$index]);
                $stmt->execute();
            }
        }

        public function SnellenResult()
        {
            $stmt = $this->DB_Connection->prepare("INSERT INTO SnellenResult (ID_Patient, RightEye, LeftEye) VALUES(?, ?, ?)");
            $stmt->bind_param('iii', $this->LastID, $this->RightEye, $this->LeftEye);
            $stmt->execute();
        }
    }
?>