<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Email{
        private $Name;
        private $Email;
        private $Telephone_WhatsApp;
        private $RightEye;
        private $LeftEye;

        public function __construct($Name, $Email, $Telephone_WhatsApp, $RightEye, $LeftEye)
        {
            $this->Name = $Name;
            $this->Email = $Email;
            $this->Telephone_WhatsApp = $Telephone_WhatsApp;
            $this->RightEye = $RightEye;
            $this->LeftEye = $LeftEye;
        }
        
        public function Send()
        {
            require 'vendor/autoload.php';
			$Mailer = new PHPMailer(true);
			$Mailer->IsSMTP();
            $Mailer->CharSet = 'UTF-8';
            $Mailer->SMTPAuth = true;
            $Mailer->SMTPSecure = 'ssl';
            $Mailer->Host = 'iuri0069';
            $Mailer->Port = 465;
            $Mailer->Username = 'cadastros@argoshackvision.tech';
            $Mailer->Password = '';
            
            $Mailer->isHTML(true);
            $Mailer->From = 'cadastros@argoshackvision.tech';
            $Mailer->FromName = 'Argos';
            $Mailer->AddAddress($this->Email);
            $Mailer->Subject = 'Novo Cadastro Argos - '.$this->Name;
            $Mailer->Body = $this->EmailMessage();
            $Mailer->AltBody = 'Para ver essa mensagem, use um programa compatível com HTML.';
            $Mailer->send();
        }

        public function EmailMessage()
        {
            $Result = $this->RightEye <= $this->LeftEye ? $this->RightEye : $this->LeftEye;
            switch ($Result) 
            {
                case 200:
                case 150:
                case 100:
                case 80:
                case 60:
                    $ResultMessage = "Muito bom! Você finalizou seu teste e aparentemente você demonstrou alguma 
                                      dificuldade em realizá-lo. Lembrando que esse é apenas um teste rápido, 
                                      para um diagnóstico completo favor consultar um oftalmologista.";
                    break;

                case 50:
                case 40:
                case 30:    
                case 25:
                    $ResultMessage = "Muito bom! Você finalizou o teste e seu resultado foi regular, 
                                      aparentemente você demonstrou alguma dificuldade na realização do teste. 
                                      Lembrando que esse é apenas um teste rápido, para um diagnóstico completo favor consultar um oftalmologista.";
                    break;

                case 20:
                case 15:
                    $ResultMessage = "Muito bom! Você finalizou seu teste e o resultado foi satisfatório. 
                                      Lembrando que esse é apenas um teste rápido, para um diagnóstico 
                                      completo favor consultar um oftalmologista.";
                    break;
            }

            return "<html>
                        <body>
                            <h1>Argos - Teste de Snellen</h1>

                            <h3>$ResultMessage</h3>

                            <p>$this->Name</p>
                            <p>$this->Telephone_WhatsApp</p>
                            <p>$this->Email</p>
                        </body>
                    </html>";
        }
    }
?>
