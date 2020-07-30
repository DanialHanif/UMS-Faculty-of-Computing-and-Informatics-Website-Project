<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="jumbotron" style="background-color: white">
            <div>
                <h1>Exams</h1>
                <p>A list of all exams taken.</p>
            </div>
        </div>
        <div class="container">
            <hr class="my-4">
            <!--NEWS&EVENTS-->
            <div class="row mx-auto justify-content-between" style="max-width: 1200px;">
                <table style="width: 100%">
                    <tr class="text-white" style="background: #163269">
                        <th>Exam code</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Comments</th>
                        </thead>
                        <tbody>
                            <?php
                            if (!is_null($exams)) {
                                foreach ($exams->getResult() as $row)
                                    echo "<tr><td>" . $row->examNumber . "</td><td>" . $row->examDate . "</td><td>" . $row->status . "</td><td>" . $row->comments . "</td></tr>";
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