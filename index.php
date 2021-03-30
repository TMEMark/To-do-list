<!DOCTYPE html>
<html lang="en" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/464e80c499.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <title>To-do-list</title>
</head>
<body>
    <div class="grid">
        <div class="nav_bar_up">
            <div class="lajna">
            </div>
            <div class="logo">
                <h2>TO-DO-LIST</h2>
            </div>
            <div class="search_bar">

            </div>
            <div class="profile">
                <li><a href="#"><i class="far fa-user-circle"></i>
                </a></li>
                <li><a href="#"><i class="fas fa-medal"></i>
                </a></li>
                <li><a href="#"><i class="far fa-bell"></i>
                </a></li>
            </div>
        </div>
        <div class="today">
            <ul>
                <li><a href=""><i class="fas fa-calendar-day"></i>
                </a></li>
                <p>Today</p>
            </ul>
        </div>
        <div class="planer">
            <ul>
                <li><a href=""><i class="fas fa-calendar-alt"></i>
                </a></li>
                <p>Plan ahead</p>
            </ul>
        </div>
        <div class="projekt">
            <ul>
                <li><a href=""><i class="fas fa-project-diagram"></i>
                </a></li>
                <p>Project</p>
            </ul>
        </div>
        <div class="vazno">
            <ul>
                <li><a href=""><i class="fas fa-exclamation"></i></i>
                </a></li>
                <p>Important</p>
            </ul>
        </div>
        <div class="kratke_inf">
            <ul>
                <li><a href=""></a></li>
            </ul>
        </div>
        <div class="body">
            <header>
                <h2>Stay organized</h2>
            </header>
            <section>
                <h3>Today</h3> 
                <p id="date"></p>
            </section>
            <section>
                <p>Add task</p>
            </section>
        </div>
    </div>
    <script>
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML = d + "." + m + "." + y + ".";
    </script>
</body>
</html>