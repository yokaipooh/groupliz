<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Directorpage</title>
  </head>
  <body>
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
      <form action="directoractivity.php" method="POST">
        <div class="form-row justify-content-center">
          <div class="col-auto">
            <input type ="integrity" id="id" name="id" class="form-control" placeholder="Enter id here">
          </div>
          <div class="col-auto">
            <input type ="text" id="name" name="name" class="form-control" placeholder="Enter name here">
          </div>
          <div class="col-auto">
            <input type ="text" id="type" name="type" class="form-control" placeholder="Enter type here">
          </div>
          <div class="col-auto">
            <input type ="text" id="serial" name="serial" class="form-control" placeholder="Enter serial here">
          </div>
          <div class="col-auto">
            <input type ="text" id="model" name="model" class="form-control" placeholder="Enter model here">
          </div>
          <div class="col-auto">
            <input type ="date" id="date" name="date" class="form-control" placeholder="Enter date here">
          </div>
          <div class="col-auto">
            <button type="submit" name="save" class="btn btn-info">SAVE</button>
          </div>
        </div>
        
      </form>

      <?php require_once("directoractivity.php"); ?>


      <div class="container">


        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Machine</th>
              <th>Type</th>
              <th>Serial</th>
              <th>Model</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <form action="directoractivity.php" method="POST">
            <?php

            #code for display data 
            $qry = "SELECT * FROM deviceinfo LIMIT 20";
            $result = $conn->query($qry);
            #for btn
            $x = 1;

            while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['machine_id']; ?></td>
                <td><?= $row['machine_name']; ?></td>
                <td><?= $row['Type']; ?></td>
                <td><?= $row['serials']; ?></td>
                <td><?= $row['Model']; ?></td>
                <td><?= $row['dates']; ?></td>
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
            $("#name").val($(this).find('td').eq(2).text());
            $("#type").val($(this).find('td').eq(3).text());
            $("#serial").val($(this).find('td').eq(4).text());
            $("#model").val($(this).find('td').eq(5).text());
            $("#date").val($(this).find('td').eq(6).text());
            $(".btn-info").val($(this).find('td').eq(0).text());
          });
          $("btn-info").attr("name","edit");
        });
      });
    </script>
  </body>
</html>
