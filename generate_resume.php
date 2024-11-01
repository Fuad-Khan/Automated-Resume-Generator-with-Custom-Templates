<?php
include 'database_connection.php';
include 'Resume.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $template = $_POST['template'];

    // Save resume details in the database
    try {
        $stmt = $pdo->prepare("INSERT INTO resumes (name, email, phone, education, skills, experience, template, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $phone, $education, $skills, $experience, $template]);
    } catch (Exception $e) {
        die("Error saving to database: " . $e->getMessage());
    }

    // Generate the resume PDF
    $resume = new Resume($name, $email, $phone, $education, $skills, $experience, $template);
    $resumeContent = $resume->generate();

    // Output the PDF as a downloadable file
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="resume.pdf"');
    echo $resumeContent;
}
?>
