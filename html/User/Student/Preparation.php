<?php
$path = "../..";
$user = "Student";

require_once "$path/Function/Basic.php";
startContainer($path, $user);
?>
<main>
    <div class="container card p-5">
    <section class="aptitude-reasoning">
        <h1>Prepare for the Aptitude Reasoning Test</h1>
        <p>The Aptitude Reasoning section tests your ability to think logically and solve problems efficiently. Below, we will go over some common topics covered in reasoning tests:</p>

        <h2>Topics Covered</h2>
        <ul>
            <li>Numerical Reasoning</li>
            <li>Verbal Reasoning</li>
            <li>Logical Reasoning</li>
            <li>Pattern Recognition</li>
            <!-- <li>Data Interpretation</li> -->
        </ul>

        <h2>Tips for Preparation</h2>
        <ul>
            <li>Practice regularly with mock tests.</li>
            <li>Improve your time management skills.</li>
            <li>Focus on understanding the reasoning behind the answer rather than memorizing solutions.</li>
            <li>Review basic math concepts (percentages, ratios, etc.).</li>
            <li>Take breaks during practice to avoid burnout.</li>
        </ul>

        <h2>Sample Question</h2>
        <p>Consider the following question:</p>
        <blockquote>
            If 5 workers can complete a task in 10 days, how many days will it take for 10 workers to complete the same task, assuming efficiency remains the same?
        </blockquote>

        <p><strong>Solution:</strong> The total work done is constant. If the number of workers is doubled, the time required will be halved. Therefore, the task will be completed in 5 days by 10 workers.</p>
        
        <a href="test.php" class="btn btn-info start-test-btn">Start a Practice Test</a>
    </section>
    </div>
</main>
<?php endContainer($path); ?>
