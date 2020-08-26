# Backend-Argos

##### Instale o Banco de dados MySQL.
##### Use o código do arquivo "ArgosDB.sql" para criar o banco de dados do projeto.
##### Acesse o arquivo "DB_Config.php" e altere os dados de host, usuário e senha conforme sua configuração local.
##### Na variavel "$database" insira o nome do banco (ArgosDB).
##### Acesse o arquivo "Email.php" e configure o mesmo com as informações de configurações de E-mail do seu servidor.
##### Rode a aplicação e envie através do método POST o seguinte conjunto de dados:

    Name: 'teste',
    Email: 'teste@teste.com',
    Telephone_WhatsApp: 99887766,
    SnellenResult: {
                      Right: 100,
                      Left: 50
                   },
    Questions:{
                Glasses_Lens: 'Não',
                HealthConditions: ['Diabetes', 'Glaucoma', 'Degeneração Macular'],
                VisualDifficulty: 'Nenhuma dificuldade',
                Surgery: 'Não'
              }
              
##### Após isso a aplicação irá armazenar os dados no banco MySQL e enviar um e-mail para o usuário.
