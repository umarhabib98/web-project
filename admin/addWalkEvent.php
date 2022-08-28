<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';

if($_SESSION['loggedinuserrole']=="User") {
  header('Location: ../index.php');
  die();
}

if (isset($_POST['save'])) {
  $walk_event_name = $_POST['walk_event_name'];
  $date = $_POST['date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $meeting_point = $_POST['meeting_point'];
  $distance = $_POST['distance'];
  $leader_name = $_POST['leader_name'];
  $comments = $_POST['comments'];
  $query = "INSERT INTO `walk_events` (`walk_event_name`, `date`, `start_time`, `end_time`, `meeting_point`, `distance`, `leader_name`, `comments`) 
  VALUES ('$walk_event_name', '$date', '$start_time', '$end_time', '$meeting_point', '$distance', '$leader_name', '$comments')"; 
  if (mysqli_query($db, $query)) {
    header("Location: allWalkEvents.php");
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert Item.</p>";
  }
} ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-12 mt-12">
                <!-- Account page navigation-->


                <div style="justify-content: center;margin-top: 20px" class="row">

                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Add New Walk Event</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <!--  Name of Walk: e.g. Watcombe to Sheldon
                                           Date: e.g. 23/02/2022
                                           Start time: e.g. 10.30am
                                           End time: e.g. 15.30pm
                                           Meeting point: e.g. Watcombe Car Park
                                           Distance in kilometres: e.g. 9
                                           Name of leader: e.g. Helen Smith
                                           Comments: e.g. Grade A walk with steep hills
                                           Status: e.g. Proposed, Approved or Rejected. -->

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="Walk Event Name">Walk Event Name</label>
                                            <input class="form-control" required name="walk_event_name" type="text"
                                                placeholder="Enter event name" />
                                        </div>
                                        <!-- date -->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="date">Date</label>
                                            <input class="form-control" required name="date" type="date"
                                                placeholder="Enter date" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="start_time">Start Time</label>
                                            <input class="form-control" required name="start_time" type="time"
                                                placeholder="Enter start time" />
                                        </div>
                                        <!-- end time -->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="end_time">End Time</label>
                                            <input class="form-control" required name="end_time" type="time"
                                                placeholder="Enter end time" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="meeting_point">Meeting Point</label>
                                            <input class="form-control" required name="meeting_point" type="text"
                                                placeholder="Enter meeting point" />
                                        </div>
                                        <!-- distance -->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="distance">Distance in kilometres</label>
                                            <input class="form-control" required name="distance" type="text"
                                                placeholder="Enter distance" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="leader_name">Leader Name</label>
                                            <input class="form-control" required name="leader_name" type="text"
                                                placeholder="Enter leader name" />
                                        </div>
                                        <!-- comments -->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="comments">Comments</label>
                                            <input class="form-control" required name="comments" type="text"
                                                placeholder="Enter comments" />
                                        </div>
                                        <input type="submit" class="btn btn-primary mt-5" name="save" type="button"
                                            value="save">


                                    </div>


                                    <!-- Save changes button-->

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
    include '../admin/footer.php';
    ?>
    </div>

</div>



<style>
.form-check.form-check-solid {
    float: left;
    margin-right: 15px;
}
</style>