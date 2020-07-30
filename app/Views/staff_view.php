<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="jumbotron" style="background-color: white">
            <div>
                <h1>Staff</h1>
                <p>A list of all Staff.</p>
            </div>
        </div>
        <div class="container">
            <hr class="my-4">
            <!--NEWS&EVENTS-->
            <div class="row mx-auto justify-content-between" style="max-width: 1200px;">
            <form id="formUpdate" action="<?= base_url('Staff/search') ?>" method="post">
                <div class="form-group">
                  <label for="staffNumber"></label>
                  <input type="text" name="staffNumber" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Search Staff by ID</small>
                  <button class="btn btn-primary float-right" type="submit">Search</button>
                </div>
            </form>
                <table style="width: 100%">
                    <tr class="text-white" style="background: #163269">
                        <th>Staff Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Supervisor</th>
                        </thead>
                        <tbody>
                            <?php
                            if (!is_null($staff)) {
                                foreach ($staff->getResult() as $row)
                                    echo "<tr><td>" . $row->staffNumber . "</td><td>" . $row->staffFirstName . "</td><td>" . $row->staffLastName . "</td><td>" . $row->reportsTo . "</td></tr>";
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