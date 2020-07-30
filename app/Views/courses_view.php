<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="jumbotron" style="background-color: white">
            <div>
                <?php
                if ($_SESSION['logged_in']['type'] == 'student') {
                    echo "<div><h1>Your Registered Courses</h1> <button onclick=\"location.href = '"; echo base_url('Courses/viewAll'); echo "'\" class=\"btn btn-primary float-right\">View All Courses</button> </div>
                <p>A list of your courses</p>";
                } else {
                    echo "<h1>Courses</h1>
                <p>A list of all courses and available spots</p>";
                }
                ?>
            </div>
                <?php if ($_SESSION['logged_in']['type'] == 'student') echo "<p>Contact the academic division to drop/register a course.</p>"?>
        </div>
        <div class="container">
            <hr class="my-4">
            <!--NEWS&EVENTS-->
            <div class="row mx-auto justify-content-between" style="max-width: 1200px;">
                <table style="width: 100%">
                    <tr class="text-white" style="background: #163269">
                        <th>Course code</th>
                        <th>Course Name</th>
                        <th>Course Detail</th>
                        <?php if ($_SESSION['logged_in']['type'] == 'staff') echo "<th>Available Spots</th>";?>
                        </thead>
                        <tbody>
                            <?php
                            if (!is_null($courses)) {
                                foreach ($courses->getResult() as $row)
                                if ($_SESSION['logged_in']['type'] == 'staff')
                                    echo "<tr><td>" . $row->courseCode . "</td><td>" . $row->courseName . "</td><td>" . $row->courseDetails . "</td><td>" . $row->availableNumbers . "</td></tr>";
                                else echo "<tr><td>" . $row->courseCode . "</td><td>" . $row->courseName . "</td><td>" . $row->courseDetails . "</td></tr>";
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "</tbody>";
                                echo "</table>";
                                echo "<h3>No Data</h3>";
                                echo "<p>Unable to find any data for you.</p>";
                            }
                            ?>


            </div>


            <hr class="my-4">
        </div>
    </main>
</body>