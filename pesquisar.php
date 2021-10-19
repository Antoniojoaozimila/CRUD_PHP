<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >

    <title>CRUD</title>
  </head>
  <body>
      <?php  include "conexao.php";

      if(isset($_POST['busca'])){
          $pesquisa=$_POST['busca'];
      }else
      $pesquisa='';

      $sql="SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

      $result= mysqli_query($conn,$sql);
     /* FORMA ALTERNATIVA DE FAZER A BUSCA DE DADOS NO BD 
     $result = $conn->query($sql);
      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){    
       }
    } else{
        echo 'Nao ha registos.';
    }
    */
    ?>
   
    <div class="Container">
    <div class="row"> 
        <div class="col">
        <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex" action ="pesquisar.php" method="POST">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="bd-example">
  <table class="table table-hover">
      <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Endereco</th>
      <th scope="col">Telefone</th>
      <th scope="col">email</th>
      <th scope="col">Data_Nascimento</th>
      <th scope="col">Funções</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($linha=mysqli_fetch_assoc($result)){
   /* foreach($linha as $key=> $value){
      echo "$key: $value <br>";
    }
    */
    $pessoa_cod=$linha['cod_pessoa'];
    $nome=$linha['nome'];
    $endereco=$linha['endereco'];
    $telefone=$linha['telefone'];
    $email=$linha['email'];
    $data_nascimento=$linha['data_nascimento'];
    $data_nascimento=mostra_data($data_nascimento);

    echo "<tr>
            <th scope='row'>$nome</th>
            <td>$endereco</td>
            <td>$telefone</td>
            <td>$email</td>
            <td>$data_nascimento</td>
            <td>
            <a href='#' class='btn btn-success'>editar</a> <a href='' class='btn btn-danger'>excluir</a>
            </td>
          </tr>
 ";
    }
      ?>
    
  </tbody>

  </table>
  <a href="index.php" class="btn btn-success">voltar ao inicio</a>
</div>
         </div>

    </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>