<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Cetak Data Filter</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
 <div class="container">
  <br>
  <h1 align="center"><?php echo $title; ?></h1>
  <br>
  <div class="row">
   <div class="col-md-3">
    <form action="" id="FormLaporan">
     <select name="" id="hasil" class="form-control">
      <option value="0">Show All</option>
      <?php foreach ($hasil as $row): ?>
       <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
      <?php endforeach ?>
     </select>
     <br>
     <button type="submit" class="btn btn-primary">Show Data</button>
    </form>
   </div>
   <div class="col-md-9">
    <div id="result"></div>
   </div>
  </div>
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
  $(document).ready(function() {
   $("#FormLaporan").submit(function(e) {
    e.preventDefault();
    var id = $("#angkatan").val();
    // console.log(id);
    var url = "<?= site_url('Cetak_Filter/filter/') ?>" + id;
    $('#result').load(url);
   })
  });
 </script>
</body>
</html>