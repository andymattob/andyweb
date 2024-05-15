<div class="reply">
  <h4><?php echo $data['name']; ?></h4>
  <h5><?php echo $data['date']; ?></h5>
  <h5><?php echo $data['comment']; ?></h5>
  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick = "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>');">Svara</button>
  <?php
  unset($datas);
  $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = $reply_id");
  if(mysqli_num_rows($datas) > 0) {
    foreach($datas as $data){
      require 'reply.php';
    }
  }
  ?>
</div>
