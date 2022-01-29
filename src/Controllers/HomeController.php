<?php
$bachelorsDegree = new BachelorsDegree();
$degrees = $bachelorsDegree->getBachelorsDegrees();
$corporateTraining = new CorporateTraining();
$corporateTrainings = $corporateTraining->getCorporateTrainings();

$degreesButtons = '';
$degreesHTML = '';
$corporateTrainingHTML = '';

$status = ['msg' => '', 'style' => ''];

foreach ($degrees as $bd) {
    $id = 'degree-'.$bd->__get('id');
    $title = $bd->__get('title');
    $subtitle = $bd->__get('subtitle');
    $description = $bd->__get('description');
    $wywl = $bd->__get('wywl');
    $programDuration = $bd->__get('programDuration');
    $admisionContact = $bd->__get('admisionContact');
    $downloads = $bd->__get('downloads');
    $specializedSubjects = $bd->__get('specializedSubjects');
    $scholarships = $bd->__get('scholarships');
    
    $degreesButtons = $degreesButtons.<<<HTML
        <button class='btn-bd' id=$id>$title</button>
    HTML;

    $specializedSubjectsHTML = '';
    $scholarshipsHTML = '';

    foreach ($specializedSubjects as $specializedSubject) {
        $subjects = '';
        $year = $specializedSubject["year"];

        foreach($specializedSubject['subjects'] as $subject) {
            $subjects = $subjects.<<<HTML
                <li>$subject</li>
            HTML;
        }

        $specializedSubjectsHTML = $specializedSubjectsHTML.<<< HTML
            <div>
                <h4>$year</h4>
                <ul>$subjects</ul>
            </div>
        HTML;
    }
    foreach ($scholarships as $scholarship) {
        $desc = '';
        $sType = $scholarship['type'];
        
        foreach($scholarship['description'] as $des) {
            $desc = $desc.<<<HTML
                <li>$des</li>
            HTML;
        }

        $scholarshipsHTML = $scholarshipsHTML.<<< HTML
            <div>
                <h4>$sType</h4>
                <ul>$desc</ul>
            </div>
        HTML;
    }

    $degreesHTML = $degreesHTML.<<<HTML
        <div class="$id bachelors-degree">
            <h1 class="el">$title</h1>
            <h2 class="el">$subtitle</h2>
            <div class="el btn-degree-exit"> 
                <img 
                    src="./public/img/arrow_back_black_36dp.svg" 
                    alt="arrow_forward_white">
                Back
            </div>

            <div class="el" id="bachelors_degree_more_info">
                <div>
                    <h4>PROGRAM DURATION</h4>
                    <p>$programDuration</p>
                </div>
                <div>
                    <h4>ADMISSION CONTACT</h4>
                    <p>$admisionContact</p>
                </div>
                <div>
                    <h4>DOWNLOADS</h4>
                    <p><a target="_blank" href=$downloads>Course Brochure</a></p>
                </div>
            </div>

            <p class="el" id="bachelors_degree_description">$description</p>

            <h3 class="el">What You Will Learn</h3>
            <p class="el" id="bachelors_degree_wywl">$wywl</p>

            <h3 class="el">Specialized Subjects We Offer</h3>
            <div class="el" id="bachelors_degree_specializedSubjects">
                $specializedSubjectsHTML
            </div>
            
            <h3 class="el">What Scholarships You Can Access</h3>
            <div class="el" id="bachelors_degree_scholarships">
                $scholarshipsHTML
            </div>
        </div>
    HTML;
}

foreach ($corporateTrainings as $ct) {
    $ctTitle = $ct->__get('title');
    $ctDescription = $ct->__get('description');
    $ctProgramDuration = $ct->__get('programDuration');
    $ctAdmisionContact = $ct->__get('admisionContact');
    $ctProgramsOffered = $ct->__get('programsOffered');

    $programsOfferedHTML = '';
    $programsOptionHTML = '';

    foreach($ctProgramsOffered as $po) {
        $programsOfferedHTML = $programsOfferedHTML.<<<HTML
            <li>$po</li>
        HTML;
        $programsOptionHTML = $programsOptionHTML.<<<HTML
            <option value="$po">$po</option>
        HTML;
    }

    $corporateTrainingHTML = $corporateTrainingHTML.<<<HTML
        <div class="corporate-training">
            <div class="el" id="corporate_training_more_info">
                <div>
                    <h4>PROGRAM DURATION</h4>
                    <p>$ctProgramDuration</p>
                </div>
                <div>
                    <h4>ADMISSION CONTACT</h4>
                    <p>$ctAdmisionContact</p>
                </div>
            </div>

            <p class="el" id="corporate_degree_description">$ctDescription</p>
            
            <div>
                <h3>Programs Offered</h3>
                <div class="el" id="corporate_training_programs">
                    <ul>$programsOfferedHTML</ul>
                </div>
            </div>

            <div class="el container-btn-ct-register">
                <button id="btn_open_register">REGISTER</button>
            </div>
        </div>
    HTML;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $createdAt = gmdate("Y-m-d H:i:s");
    $email = $_REQUEST['email'];
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $age = $_REQUEST['age'];
    $program = $_REQUEST['program'];

    if (!empty($email) && !empty($firstName) &&
        !empty($lastName) && !empty($age) &&
        !empty($program)) {

        $obj = (object)[
            'createdAt' => $createdAt,
            'email' => $email, 
            'firstName' => $firstName, 
            'lastName' => $lastName, 
            'age' => $age, 
            'program' => $program
        ];

        $result = $corporateTraining->ctRegister($obj);

        if (!empty($result)) {
            $status['msg'] = 'Registration successful!';
            $status['style'] = 'display: flex; color: green;';
        }
        else {
            $status['msg'] = 'Request error...';
            $status['style'] = 'display: flex; color: red;';
        }
    }
}

include './src/Views/Home.php';
?>
