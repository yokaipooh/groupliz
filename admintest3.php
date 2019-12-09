<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Adminpage</title>
  </head>
  <body>
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
      <form action="adminactivity.php" method="POST">
        <div class="form-row justify-content-center">
          <div class="col-auto">
            <input type ="text" id="id" name="id" class="form-control" placeholder="Enter id here">
          </div>
          <div class="col-auto">
            <input type ="text" id="user" name="user" class="form-control" placeholder="Enter username here">
          </div>
          <div class="col-auto">
            <input type ="text" id="pass" name="pass" class="form-control" placeholder="Enter password here">
          </div>
          <div class="col-auto">
              <select id="usertype" name="usertype">
                <option value="admin"> admin </option>
                <option value="director"> director </option>
                <option value="maintainer"> maintainer </option>
              </select>
          </div>
          <div class="col-auto">
            <input type ="text" id="email" name="email" class="form-control" placeholder="Enter email here">
          </div>
          <div class="col-auto">
            <input type ="text" id="number" name="number" class="form-control" placeholder="Enter phone number here">
          </div>
          <div class="col-auto">
            <button type="submit" name="save" class="btn btn-info">SAVE</button>
          </div>
        </div>
        
      </form>

      <?php require_once("adminactivity.php"); ?>


      <div class="container">


        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>Usertype</th>
              <th>Email</th>
              <th>Phonenumber</th>
            </tr>
          </thead>
          <tbody>
            <form action="adminactivity.php" method="POST">
            <?php
            #code for display data 
            $qry = "SELECT * FROM userlogin LIMIT 20";
            $result = $conn->query($qry);
            #for btn
            $x = 1;

            while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['ID']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['password']; ?></td>
                <td><?= $row['usertype']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['phone_number']; ?></td>
                <td style="width:20%"> 
                  <button type="submit" name="delete" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>

                  <button type="button" name="edit" value="<?= $x; $x++ ;?> " class="btn btn-primary">Edit</button>
                </td>
              </tr>

            <?php endwhile; ?>

          </form>
          </tbody>
        </table>
        
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){
          $(".alert").remove();
        }, 3000);

        $(".btn-primary").click(function(){
          $(".table").find('tr').eq(this.value).each(function(){
            $("#id").val($(this).find('td').eq(1).text());
            $("#user").val($(this).find('td').eq(2).text());
            $("#pass").val($(this).find('td').eq(3).text());
            $("#email").val($(this).find('td').eq(5).text());
            $("#phone_number").val($(this).find('td').eq(6).text());
            $(".btn-info").val($(this).find('td').eq(0).text());
          });
          $("btn-info").attr("name","edit");
        });
      });
    </script>
  </body>
</html>
