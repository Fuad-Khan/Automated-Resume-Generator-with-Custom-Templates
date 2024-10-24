<?php
include 'Resume.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $template = $_POST['template'];

    $resume = new Resume($name, $email, $phone, $education, $skills, $experience, $template);

    // Generate resume content based on selected template
    $resumeContent = $resume->generate();

    // Output the resume as a downloadable file
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="resume.pdf"');
    echo $resumeContent;
}
?>
