<body class="d-flex flex-column h-100">
    <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
        <div class="jumbotron" style="background-color: white">
        <div>   
            <h1>Hello <?= $_SESSION['logged_in']['firstname'] ?>!</h1>
            <p>Welcome back!</p>
        </div>
        <div class= "float-right">
            <h2>Your current CGPA:</h2>
        </div>
        </div>
        <div class="container">
            <hr class="my-4">
            <!--NEWS&EVENTS-->
            <div class="row mx-auto justify-content-between" style="max-width: 1200px;">
                <!--NEWS-->
                <div id="sectionBox" class="w-100">
                    <div style="background-color: #163269;">
                        <h3 class="p-3 text-white"><a href="#" class="text-white">NEWS & UPDATES</a></h3>
                    </div>

                    <ul class="news-list m-3" id="newsContent"></ul>
                    <?php
                    if (!is_null($news->getResult())) {
                        foreach ($news->getResult() as $row)
                            echo "<li style=\"list-style-type: none;\"><h6 class=\"text-justify\"><a class=\"text-body\" href=\"\">" . $row->title . "</a><p class=\"text-right font-weight-normal\">—" . $row->date . "<p></h6><br></li>";
                    } else {
                        echo "<h3>No News</h3>";
                        echo "<p>Unable to find any news for you.</p>";
                    }
                    ?>

                </div>
                <div id="sectionBox" class="w-100">
                    <div style="background-color: #163269;">
                        <h3 class="p-3 text-white"><a href="#" class="text-white">UPCOMING EVENTS</a></h3>
                    </div>
                    <div>
                        <ul class="news-list m-3" id="eventsContent"></ul>
                        <?php
                        if (!is_null($events->getResult())) {
                            foreach ($events->getResult() as $row)
                                echo "<li style=\"list-style-type: none;\"><h6 class=\"text-justify\"><a class=\"text-body\" href=\"\">" . $row->title . "</a><p class=\"text-right font-weight-normal\">—" . $row->date . "<p></h6><br></li>";
                        } else {
                            echo "<h3>No News</h3>";
                            echo "<p>Unable to find any news for you.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>


            <hr class="my-4">
        </div>
    </main>
</body>