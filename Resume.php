<?php
class Resume {
    private $name;
    private $email;
    private $phone;
    private $education;
    private $skills;
    private $experience;
    private $template;

    public function __construct($name, $email, $phone, $education, $skills, $experience, $template) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->education = $education;
        $this->skills = explode(',', $skills); // Convert string to array
        $this->experience = $experience;
        $this->template = $template;
    }

    public function generate() {
        // Load the selected template and replace placeholders
        $templateContent = file_get_contents('templates/' . $this->template . '.html');

        $templateContent = str_replace('{{name}}', $this->name, $templateContent);
        $templateContent = str_replace('{{email}}', $this->email, $templateContent);
        $templateContent = str_replace('{{phone}}', $this->phone, $templateContent);
        $templateContent = str_replace('{{education}}', $this->education, $templateContent);
        $templateContent = str_replace('{{skills}}', implode(', ', $this->skills), $templateContent);
        $templateContent = str_replace('{{experience}}', $this->experience, $templateContent);

        return $templateContent;
    }
}
?>
