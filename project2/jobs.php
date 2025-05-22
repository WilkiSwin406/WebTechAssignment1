<?php // print errors if they are there
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require_once('settings.php');
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Connor Wright" />
    <meta name="description" content="Descriptions of open job positions at CyberBytes" />
    <meta name="keywords" content="job listings, cyberbytes, applications, employment, software development" />
    <title>CyberBytes Available Positions</title>

    <link href="../styles/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include 'header.inc'?>;

    <aside> <!-- this aside is meant to be an employee review board, where employees can give reviews of their job in order to encourage potential applicants to apply-->
        <h3>...But don't just take our word for it!</h3>
        <p>Below, find quotes from some of our CyberBytes employees! Read their glowing reviews, and let them help you to discover the right job for you - at CyberBytes!</p>
        <h4>Jacob Mackey, Data Analyst (employed 2 years)</h4>
        <p><em>"Before I started working at CyberBytes, my life was miserable. I had no money - how was I supposed to afford anything? Luckily, CyberBytes swooped in and granted me a position as a Data Analyst, and now I have money! Truly, this job is a dream come true."</em></p>
        <h4>Macob Jackey, UX Designer (employed 2 years)</h4>
        <p><em>"I used to be an art school student. Sadly, it turns out nobody really wants to hire artists anymore! Thankfully, while I was fresh out of a job, CyberBytes was there to help, and gave me a job as one of their UX designers, which pays 25 cents above minimum wage! Since then, I've never been strapped for cash again. Thanks CyberBytes!"</em></p>
        <h4>John Bytes, CEO</h4>
        <p><em>"CyberBytes was the brainchild of two broke college students - Me, John Bytes, and my dear old friend Cyber Greg. It was always our dream to create a company that would specialise in creating software. Sadly, Cyber Greg is no longer with us...but his dream lives on, in CyberBytes! Let's thrive together!</em></p>
        <h4>Sharon Spoon, Cloud Engineer (employed 6 years)</h4>
        <p><em>"CyberBytes has been a really good job for me. There's many opportunities for growth and you're paid quite well in the as a senior employee. On top of that, you're allowed a lot of freedom with your work, so the job doesn't really get boring. I haven't really worked with any company before that feels like they actually care about their employees, but CyberBytes feels like a family. In only fourteen more years I'll have worked here long enough to take my eight days of long-service leave!"</em></p>
    </aside>

    <section class="jobs-tiles">
            <?php if ($result && $result->num_rows > 0): ?> <!-- see if there are job listings -->
            <!-- Fetch_assoc() is a neat way to loop through a db and turn data into an assoc-array -->
                <?php while ($row = $result->fetch_assoc()): ?> <!-- loop through each job -->
                    <section class="jobs-descriptions"> <!-- For each job make a new section -->
                        <!-- specialchars stops XSS attacks - add this to report -->
                        <h2><?php echo htmlspecialchars($row['Position']) . " - " . htmlspecialchars($row['JRN']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($row['Description'])); ?></p> <!-- literally stands for new line to br -->
                        <ul> <!--start a unordered list -->
                            <li><strong>Salary range:</strong> <?php echo htmlspecialchars($row['Salary_range']); ?></li>
                            <li><strong>Essential requirements:</strong>
                                <ol> <!--start an ordered list-->
                                    <?php foreach (explode("\n", $row['Requirements']) as $req): ?> <!--explode splits a string into an array based on a delimiter-->
                                        <li><?php echo htmlspecialchars($req); ?></li> 
                                    <?php endforeach; ?>
                                </ol>
                            </li>
                            <li><strong>Preferable:</strong>
                                <ol>
                                    <?php foreach (explode("\n", $row['Preferences']) as $pref): ?>
                                        <li><?php echo htmlspecialchars($pref); ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </li>
                        </ul>
                        <p class="applylink">Click <a href="apply.php?job_id=<?php echo $row['id']; ?>" class="applylink">here</a> to apply!</p>
                    </section>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No job listings found.</p>
            <?php endif; ?>
        </section>

   <?php include 'footer.inc'?>;
</body>
</html>