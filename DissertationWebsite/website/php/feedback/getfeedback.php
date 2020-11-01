<?php
//Start Session
session_start();

  //Get database info fron config.php
  include_once __DIR__ . "/../config.php";


  //Select user id
  $userid = $_SESSION['u_id'];

  //Select supervisor id
  $supervisorid = $_SESSION['su_id'];

  //Select all students supervisor is responsbible for
  $sql2 = "SELECT * FROM users WHERE supervisor_id = '$supervisorid' ";
  $result2 = $conn->query($sql2);

    if (isset($_SESSION['su_id'])) {
        while ($row = $result2->fetch_assoc()) {
            $sql3 = "SELECT * FROM upload WHERE uploader_id = '$row[student_id]' ";
            $result3 = $conn->query($sql3);

            if ($result3->num_rows > 0) {
                echo '<table class="table table-hover">
    <tr>
    <th>Title </th>
    <th>Message</th>
    <th>Submitted User</th>
    <th>Offer Feedback</th>
    </tr>';
            }
            // output data of each row
            while ($row2 = $result3->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row2['title'] . "</td>";
                echo "<td>" . $row2['message'] . "</td>";


                echo "<td>" . $row2['uploader_id'] . "</td>";
                echo "<td> <button type='button' class='btn btn-primary remember' data-toggle='modal' data-target='#leaveFeedback' value='" . $row2['id'] . "'>Leave Feedback</button></td>";
                echo "</tr>";
            }
        }
        echo '</table>';
    } elseif (isset($_SESSION['u_id'])) {
        $student_sql = "SELECT * FROM upload WHERE uploader_id = '$userid' ";
        $student_result = $conn->query($student_sql);


        if ($student_result->num_rows > 0) {
            echo '<table class="table table-hover">
<tr>
<th>Title </th>
<th>Message</th>
<th>Feedback</th>
</tr>';

            // output data of each row
            while ($student_row = $student_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $student_row['title'] . "</td>";
                echo "<td>" . $student_row['message'] . "</td>";



                if ($student_row['feedback_recieved'] == 0) {
                    echo "<td> <button type='button' class='btn btn-primary remember2' data-toggle='modal' data-target='#getFeedback' value='" . $student_row['feedback'] . "'>Get Feedback</button></td>";
                } else {
                    echo "<td> Awaiting Feedback </td>";
                }

                echo "</tr>";
            }
            echo '</table>';
        }
    }



  ?>
  <script>
  $(".remember").click(function() {
      var selected = $(this).val();
      //alert(selected);
      $('#btn-select').val(selected);


  });
  </script>

  <script>
  $(".remember2").click(function() {
      var selected = $(this).val();
      //alert(selected);
      $('#studentfeedback').val(selected);


  });
  </script>


  <!--Select Topic-->
  <div class="modal fade" id="getFeedback" role="dialog" aria-labelledby="get feedback modal" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="get feedback modal">Get Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Feedback</label>
          <textarea class="form-control" id="studentfeedback" readonly></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-primary" name="btn-select" id="btn-select">Save changes</button>

      </div>
    </div>
  </div>
</div>


  <!--Select Topic-->
  <div class="modal fade" id="leaveFeedback" role="dialog" aria-labelledby="leave feedback modal" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <!-- Modal content-->
    <div class="modal-content">
        <form action="../../php/feedback/leave_feedback.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="leave feedback modal">Leave Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Feedback</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body" id="feedback"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-primary" name="btn-select" id="btn-select">Save changes</button>

      </div>
    </form>
    </div>
  </div>
</div>


    <script>
    			CKEDITOR.replace( 'editor1' );
    		</script>
