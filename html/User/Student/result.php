<?php
$path = "../..";
$user = "Student";

// Start the session at the beginning of the script
session_start();

require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";

// Assuming the Database class is used for DB handling
$db = new Database();

// Step 1: Check if the questions are available in the session
if (!isset($_SESSION['questions'])) {
    die('Error: No questions found. Please start the test.');
}

// Retrieve questions from session
$questions = $_SESSION['questions'];

// Step 2: Calculate the score based on the submitted answers
$score = 0;
$correctAnswers = [];

// Loop through the questions and check the submitted answers
foreach ($questions as $index => $question) {
    // Check if the user has answered this question and compare the answer
    if (isset($_POST["q$index"]) && $_POST["q$index"] === $question['correct_option']) {
        $score++; // Increment score for correct answer
    }
}

startContainer($path, $user);
?>

<main>
    <div class="container card p-5">
        <section class="result">
            <h1>Test Results</h1>
            <p>You answered <?php echo $score; ?> out of 10 questions correctly.</p>
            
            <p>Here are your answers:</p>
            <ul>
                <?php foreach ($questions as $index => $question): ?>
                    <li><strong>Question <?php echo ($index + 1); ?>:</strong> 
                        You answered: <?php 
                            echo isset($_POST["q$index"]) ? htmlspecialchars($_POST["q$index"]) : 'No answer'; 
                        ?>. 
                        <span class="text-info">Correct answer: <?php echo htmlspecialchars($question['correct_option']); ?>.</span>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <p>For more practice, <a href="test.php">take the test again</a>.</p>
        </section>
    </div>
</main>

<?php
// Optional: Clear session after test is completed (If you need to reset data for the next test)

endContainer($path);
?>
