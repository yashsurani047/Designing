<?php
$path = "../..";
$user = "Student";

// Include necessary files
require_once "$path/Function/Basic.php";
require_once "$path/Function/Database.php";

// Create a new Database instance
$db = new Database();

// Step 1: Fetch 10 random questions from the database
$query = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
$result = $db->Execute($query);

// Check if the query was successful and fetch the data
$questions = [];
if ($result) {
    // Fetch all questions into an array
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    die('Error fetching questions from the database.');
}

// Step 2: Store the questions in the session for later use
$_SESSION['questions'] = $questions;

// Render the page header
startContainer($path, $user);
?>

<main>
    <div class="container card p-5">
        <section class="aptitude-test">
            <h1>Aptitude Reasoning Practice Test</h1>
            <p>Answer the following questions to test your reasoning ability:</p>

            <!-- Start the form to submit answers -->
            <form action="result.php" method="POST">
                <?php foreach ($questions as $index => $question): ?>
                    <div class="question mt-4">
                        <h2><?php echo ($index + 1) . '. ' . htmlspecialchars($question['question_text']); ?></h2>

                        <!-- Option A -->
                        <div class="form-check mt-3">
                            <input name="q<?php echo $index; ?>" class="form-check-input" type="radio" value="A" id="optionA_<?php echo $index; ?>" />
                            <label class="form-check-label" for="optionA_<?php echo $index; ?>">
                                <?php echo htmlspecialchars($question['option_A']); ?>
                            </label>
                        </div>

                        <!-- Option B -->
                        <div class="form-check mt-3">
                            <input name="q<?php echo $index; ?>" class="form-check-input" type="radio" value="B" id="optionB_<?php echo $index; ?>" />
                            <label class="form-check-label" for="optionB_<?php echo $index; ?>">
                                <?php echo htmlspecialchars($question['option_B']); ?>
                            </label>
                        </div>

                        <!-- Option C -->
                        <div class="form-check mt-3">
                            <input name="q<?php echo $index; ?>" class="form-check-input" type="radio" value="C" id="optionC_<?php echo $index; ?>" />
                            <label class="form-check-label" for="optionC_<?php echo $index; ?>">
                                <?php echo htmlspecialchars($question['option_C']); ?>
                            </label>
                        </div>

                        <!-- Option D -->
                        <div class="form-check mt-3">
                            <input name="q<?php echo $index; ?>" class="form-check-input" type="radio" value="D" id="optionD_<?php echo $index; ?>" />
                            <label class="form-check-label" for="optionD_<?php echo $index; ?>">
                                <?php echo htmlspecialchars($question['option_D']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary mt-4">Submit Test</button>
            </form>
        </section>
    </div>
</main>

<?php
// Render the footer
endContainer($path);
?>
