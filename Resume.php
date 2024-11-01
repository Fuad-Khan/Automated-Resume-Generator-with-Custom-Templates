<?php
require('fpdf.php');

class Resume {
    private $name, $email, $phone, $education, $skills, $experience, $template;

    public function __construct($name, $email, $phone, $education, $skills, $experience, $template) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->education = $education;
        $this->skills = $skills;
        $this->experience = $experience;
        $this->template = $template;
    }

    public function generate() {
        $pdf = new FPDF();
        $pdf->AddPage();

        // Template Selection
        switch ($this->template) {
            case 'simple':
                $this->simpleTemplate($pdf);
                break;
            case 'professional':
                $this->professionalTemplate($pdf);
                break;
            case 'creative':
                $this->creativeTemplate($pdf);
                break;
            default:
                $this->simpleTemplate($pdf); // Default to simple
        }

        return $pdf->Output('S'); // Return PDF as a string
    }

    // Template 1: Simple
    private function simpleTemplate($pdf) {
        $pdf->SetFont('Arial', 'B', 24);
        $pdf->Cell(0, 10, $this->name, 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $this->email, 0, 1, 'C');
        $pdf->Cell(0, 10, $this->phone, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Education', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, $this->education);
        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Skills', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, $this->skills);
        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Experience', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, $this->experience);
    }

    // Template 2: Professional
    private function professionalTemplate($pdf) {
        // Header with Name
        $pdf->SetFont('Times', 'B', 26);
        $pdf->SetTextColor(33, 37, 41); // Dark color
        $pdf->Cell(0, 15, strtoupper($this->name), 0, 1, 'C');
        $pdf->SetFont('Times', '', 14);
        $pdf->SetTextColor(100, 100, 100);
        $pdf->Cell(0, 10, $this->email . " | " . $this->phone, 0, 1, 'C');
        $pdf->Ln(10);

        // Section Header Style
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(0, 10, 'Education', 0, 1, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(0, 10, $this->education);
        $pdf->Ln(5);

        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(0, 10, 'Skills', 0, 1, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(0, 10, $this->skills);
        $pdf->Ln(5);

        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(0, 10, 'Experience', 0, 1, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(0, 10, $this->experience);
    }

    // Template 3: Creative
    private function creativeTemplate($pdf) {
        // Gradient-like Background
        $pdf->SetDrawColor(50, 50, 255);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 10, 200, 10);
        $pdf->Line(10, 290, 200, 290);

        // Name with Custom Font Style
        $pdf->SetFont('Courier', 'B', 24);
        $pdf->SetTextColor(50, 50, 255); // Accent color
        $pdf->Cell(0, 15, $this->name, 0, 1, 'C');
        
        $pdf->SetFont('Courier', '', 12);
        $pdf->SetTextColor(128, 128, 128); // Secondary color
        $pdf->Cell(0, 10, $this->email . " | " . $this->phone, 0, 1, 'C');
        $pdf->Ln(10);

        // Colorful Section Headers
        $pdf->SetFont('Courier', 'B', 16);
        $pdf->SetTextColor(50, 50, 255);
        $pdf->Cell(0, 10, 'Education', 0, 1, 'L');
        
        $pdf->SetFont('Courier', '', 12);
        $pdf->SetTextColor(0, 0, 0); // Text color
        $pdf->MultiCell(0, 10, $this->education);
        $pdf->Ln(5);

        $pdf->SetFont('Courier', 'B', 16);
        $pdf->SetTextColor(50, 50, 255);
        $pdf->Cell(0, 10, 'Skills', 0, 1, 'L');
        
        $pdf->SetFont('Courier', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(0, 10, $this->skills);
        $pdf->Ln(5);

        $pdf->SetFont('Courier', 'B', 16);
        $pdf->SetTextColor(50, 50, 255);
        $pdf->Cell(0, 10, 'Experience', 0, 1, 'L');
        
        $pdf->SetFont('Courier', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(0, 10, $this->experience);
    }
}
?>
