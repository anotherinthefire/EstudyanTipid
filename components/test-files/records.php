
<?php
$conn = mysqli_connect('localhost', 'root', '', 'estudyantipid');

// Select the data
$query = "SELECT * FROM goal";
$result = mysqli_query($conn, $query);
?>
<style>
    ul {
  list-style: none;
  padding: 0;
}

li {
  margin-bottom: 20px;
  border: 1px solid #ccc;
  padding: 20px;
}

h2 {
  margin: 0;
}

p {
  margin: 0;
  font-size: 14px;
  color: #999;
}
</style>


<ul>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <li>
    <h2><?php echo $row['gtitle']; ?></h2>
    <p>Price: <?php echo $row['gtamount']; ?></p>
    <p>Description: <?php echo $row['gddate']; ?></p>
  </li>
  <?php } ?>
</ul>













?>