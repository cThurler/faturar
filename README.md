# Sistema de Gerenciamento de Clientes - Full Stack Jr

 Projeto para teste técnico de vaga Desenvolvedor(a) Full Stack Jr.
 Por razões de simplicidade, as leis de criptografia de dados sensiveis no banco de dados
foram ignoradas nesse teste.

 OBS: O modal é reutilizado para edit, através da edição do nome dos campos via JS, a função de salvamento é a mesma (salvar).

 Disponibilizado no host gratuito [testefaturar.infinityfreeapp.com](testefaturar.infinityfreeapp.com) **(possivelmente fora do ar devido à propagação de DNS de hosts gratuitos.)**

## Tecnologias usadas

- PHP 7+
- MySQL
- Bootstrap 5
- JavaScript puro (máscaras e validação)
- Arquitetura MVC simples

---

## Funcionalidades

- Adicionar, editar e excluir clientes
- Formulários de cadastro e edição via modais Bootstrap
- Validação e máscaras de CPF/CNPJ, telefone, e-mail
- Disponibilizado em [testefaturar.infinityfreeapp.com](testefaturar.infinityfreeapp.com) **(possivelmente fora do ar devido à propagação de DNS de hosts gratuitos.)**

---

## Como rodar localmente com XAMPP

1. **Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)** para seu sistema operacional.

2. **Copie o projeto** para uma pasta dentro `htdocs` do XAMPP.  
   Exemplo: `C:\xampp\htdocs\faturar`

3. **Inicie o Apache e o MySQL** no painel de controle do XAMPP.

4. **Criar banco de dados e tabela:**

   - Acesse o phpMyAdmin em:  
     [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   
   - Clique em "SQL" no menu superior e cole o seguinte comando:

     ```sql
     CREATE DATABASE IF NOT EXISTS faturar;
     USE faturar;

     CREATE TABLE IF NOT EXISTS clientes (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(100) NOT NULL,
       cpf_cnpj VARCHAR(20) NOT NULL,
       email VARCHAR(100),
       telefone VARCHAR(20)
     );
     ```

   - Clique em "Executar".


5. **Acessar a aplicação**

   - No navegador, acesse:  
     [http://localhost/faturar/index.php](http://localhost/faturar/index.php)

OBS. **Caso necessário, configurar conexão com banco de dados**

   - Abra o arquivo `config/database.php` dentro da pasta `C:\xampp\htdocs\faturar`.
   - Altere as credenciais para as suas, por padrão são:

     ```php
     private $host = "localhost";
     private $db_name = "faturar";
     private $username = "root";
     private $password = "";
     ```

---

## Como usar

- Clique em **Adicionar Cliente** para cadastrar um novo cliente.
- Clique em **Editar** para alterar os dados.
- Clique em **Excluir** para remover um cliente.
- Os formulários possuem validação e máscaras para CPF/CNPJ, telefone e e-mail.

---

## Estrutura do projeto

```
/config Configurações do banco e rotas
/controllers Controladores MVC
/models Modelos para acesso ao banco
/views Páginas e templates HTML (com Bootstrap)
```

---

## Contato

Para dúvidas ou sugestões, estou disponível via caiothurlerrr@gmail.com.

**Obrigado pela oportunidade!**
