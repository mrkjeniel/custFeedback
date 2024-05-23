<?php
session_start();

if (!isset($_SESSION['userID'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit(); // Stop further execution
}

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "proto_comments";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // No need to check login status here since we already checked at the beginning

    $userID = $_SESSION['userID']; 

    $comment = $_POST['comment'];
    $suggestion = $_POST['suggestion'];
    $rating = $_POST['rating'];
    $date = $_POST['date'];

    $sql = "INSERT INTO reviews (user_ID, star_rating, comments, suggestion, datePublished) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issis', $userID, $rating, $comment, $suggestion, $date);

    if ($stmt->execute()) {
        echo 'Comment submitted successfully';
        $stmt->close();
        $conn->close();
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// query for counting comments
$queryCmtCount = "SELECT COUNT(*) AS cmtcount FROM reviews";
$resultCMTCount = $conn->query($queryCmtCount);

if (!$resultCMTCount) {
    die("Error: " . $conn->error);
}

$rowCMTCount = $resultCMTCount->fetch_assoc();
$cmtcount = $rowCMTCount['cmtcount'];

// fetch comments
$sqlShowCMT = "SELECT u.name, r.datePublished, r.comments, r.star_rating FROM reviews r INNER JOIN users u ON r.user_ID = u.id ORDER BY datePublished DESC";
$resultShowCMT = $conn->query($sqlShowCMT);

if (!$resultShowCMT) {
    die("Error: " . $conn->error);
}

$comments = array();
while ($row = $resultShowCMT->fetch_assoc()) {
    $comments[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@75,400;87.5,700;100,400;100,600;100,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Niramit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/feedback.css">
</head>

<body>
    <div class="navigation">
        <div class="left-nav">
            <nav>
                <ul class='nav-bar'>
                    <input type='checkbox' id='check' />
                    <span class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="promos/promosPage.html">Promos</a></li>
                        <li><a href="news-and-reviews.html">News and Reviews</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                    </span>
                    <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                </ul>
            </nav>
        </div>

        <div class="right-nav">
            <p> MITSUBISHI </p>
            <div class="logo-img">
                <img src="../images/Products/logo.svg">
            </div>
        </div>
    </div>

    <div class="body">
        <div class="hero-image">
            <div class="hero-title">
                <h1>We Value your Feedback!</h1>
            </div>
            <div class="hero-button">
                <button class="add-comment">ADD COMMENT > </button>
            </div>
        </div>
        <div class="count-comments">
            <h1>Comments (<?php echo $cmtcount ?>)</h1>
        </div>

        <!--form comments-->
        <form method="POST" action="feedback.php">
            <input type="hidden" name="uid" value="<?php echo isset($_SESSION['userID']) ? htmlspecialchars($_SESSION['userID']) : ''; ?>">
            <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
            <div class="comment">
                <div class="upper-comment">
                    <button type="button" class="suggestion" value="Efficient">Efficient</button>
                    <button type="button" class="suggestion" value="Impressive">Impressive</button>
                    <button type="button" class="suggestion" value="Frustrating">Frustrating</button>
                    <button type="button" class="suggestion" value="Incompetent">Incompetent</button>
                    <input type="hidden" name="suggestion" id="suggestion">
                </div>

                <div class="star">
                    <p>Leave A Star for Us:</p>
                    <div class="rateyo" id="rating" data-rateyo-num-stars="5" data-rateyo-score="3"></div>
                    <input type="hidden" name="rating" id="rating-value">
                </div>

                <div class="comment-box">
                    <img class="profile-img" src="images/Feedback/profile-image.svg" alt="Profile Image">
                    <textarea class="textbox" name="comment" id="comment" placeholder="&nbsp;Leave your comment"></textarea>
                    <button type="submit" name="submit"><img class="enter" src="images/Feedback/enter-image.svg" alt="Submit"></button>
                </div>
            </div>
        </form>

        <!--display comment-->
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <div class="upper-comment-descript">
                    <div class="left-side">
                        <img class="profile-img2" src="images/Feedback/profile-image.svg">
                    </div>
                    <div class="right-side">
                        <div class="star-comments">
                            <div class="rateyo" id="rating2"
                                data-rateyo-rating="<?php echo htmlspecialchars($comment['star_rating']); ?>"
                                data-rateyo-num-stars="5"
                                data-rateyo-score="<?php echo htmlspecialchars($comment['star_rating']); ?>">
                            </div>
                        </div>
                        <h1><?php echo htmlspecialchars($comment['name']); ?></h1>
                        <p><?php echo htmlspecialchars(date('F j, Y', strtotime($comment['datePublished']))); ?></p>
                        <div class="lower-comment-descript">
                            <p><?php echo htmlspecialchars($comment['comments']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    
        <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    
    <div class="content2">
        <!--CONTENT2_TEXT-->
        <div class="content2text">
            <p>For more information on Mitsubishi Motors financing options, please contact us or send us an email</p>
        </div>

        <!--CONTENT2_EMAIL-->
        <div class="content2email">
            <p>ryanbarreto.mitsubishi@gmail.com</p>
            <!--CONTENT2_SEND-->
            <div class="content2send">
                <a href="mailto:@ryanjoybarreto@gmail.com"><p>SEND EMAIL <b>></b></p></a>
            </div>
        </div>
    </div>

    <?php
        include('../footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); 
        });
    });

    $(".suggestion").on("click", function () {
    $(".suggestion").removeClass("selected");
    $(this).addClass("selected");
    $("#suggestion").val($(this).val());
});


    $('#commentForm').on('submit', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();
        $.post('process_comments.php', formData, function (response) {
            console.log(response);
                fetchComments();
            });
    });

    fetchComments();

    $(function () {
        $("#rating").rateYo({
            numStars: 5,
            rating: 3,
            fullStar: true,
            onSet: function (rating, rateYoInstance) {
                document.getElementById('rating-value').value = rating;
            }
        });
    });

    function highlight(button) {
    var buttons = document.querySelectorAll('.suggestion');
    buttons.forEach(function(btn) {
        btn.classList.remove('active');
    });
    button.classList.add('active');
}
</script>

	</body>
</html>