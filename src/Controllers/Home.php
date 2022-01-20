<?php
$bachelorsDegree = new BachelorsDegree();
$degrees = $bachelorsDegree->getBachelorsDegrees();
$corporateTraining = new CorporateTraining();
$corporateTrainings = $corporateTraining->getCorporateTrainings();

$degreesButtons = '';
$degreesHTML = '';
$corporateTrainingHTML = '';

$statusMsg = '';
$showStatus = '';

foreach ($degrees as $bd) {
    $id = 'degree_'.$bd->__get('id');
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
        <div class="$id         ">
            <h1 class="el">$title</h1>
            <h2 class="el">$subtitle</h2>
            <div class="el btn-degree-exit"> 
                <img 
                    src="./public/img/arrow_back_black_36dp.svg" 
                    alt="arrow_forward_white">
                Back
            </div>

            <div class="el" id="bachelors-degree-more-info">
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

            <p class="el" id="bachelors-degree-description">$description</p>

            <h3 class="el">What You Will Learn</h3>
            <p class="el" id="bachelors-degree-wywl">$wywl</p>

            <h3 class="el">Specialized Subjects We Offer</h3>
            <div class="el" id="bachelors-degree-specializedSubjects">
                $specializedSubjectsHTML
            </div>
            
            <h3 class="el">What Scholarships You Can Access</h3>
            <div class="el" id="bachelors-degree-scholarships">
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
            <div class="el" id="corporate-training-more-info">
                <div>
                    <h4>PROGRAM DURATION</h4>
                    <p>$ctProgramDuration</p>
                </div>
                <div>
                    <h4>ADMISSION CONTACT</h4>
                    <p>$ctAdmisionContact</p>
                </div>
            </div>

            <p class="el" id="corporate-degree-description">$ctDescription</p>
            
            <div>
                <h3>Programs Offered</h3>
                <div class="el" id="corporate-training-programs">
                    <ul>$programsOfferedHTML</ul>
                </div>
            </div>

            <div class="el container-btn-ct-register"><button id="btn-open-register">REGISTER</button></div>
        </div>
    HTML;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);

    $createdAt = date('Y-m-d H:i:s a', time());
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
            $statusMsg = 'Registration successful!';
            $showStatus = 'display: flex;';
        }
    }
}
?>

<!-- HOME HTML -->
<video id="home-bg-vid" autoplay muted>

    <source src="./public/videos/ciit_animation.mp4"
            type="video/mp4">

    Sorry, your browser doesn't support embedded videos.
</video>

<div id="home">
    <img id="ciit-logo" src="./public/img/CIIT-logo.png" alt="CIIT-logo">
    <div id="home-btn">
        Learn More 
        <img src="./public/img/arrow_forward_white_36dp.svg" alt="arrow_forward_white">
    </div>
</div>

<div id="home-container">
    <span class="btn btn-close">
        <img src="./public/img/close_black_48dp.svg" alt="close_black">
    </span>

    <div id="home-content-left">
        <div id="home-content-btns">
            <div class="sideway-btn active" id="btn-school">School</div>
            <div class="sideway-btn" id="btn-college">College</div>
            <div class="sideway-btn" id="btn-corporate-training">Corporate Training</div>
        </div>

        <div id="home-content-body">
            <div id="container-school">
                <h1>CIIT College of Arts and Technology</h1>
                <p>
                    We welcome you to CIIT College of Arts and Technology! We aim to 
                    provide you with an affordable college program that puts you on 
                    the pathway to career success. And while you progress down this 
                    pathway, we hope that our campus can serve as a place you would 
                    love to call yo ur second home. Compared to other universities, 
                    we're a relatively small school and young to boot with only 15 
                    years under our belt. However, we believe that having a younger 
                    management team allows us to be dynamic, innovative, efficient, 
                    and tech-savvy in the way we educate our students.
                </p>
            </div>

            <div id="container-college">
                <h1>Bachelor's Degree</h1>

                <div>
                    <?= $degreesButtons ?>
                </div>

                <?= $degreesHTML ?>
            </div>

            <div id="container-corporate-training">
                <h1>Corporate Training</h1>
                <?= $corporateTrainingHTML ?>
            </div>
        </div>
    </div>

    <div id="home-content-right">
        <img src="./public/img/ciit_building3.jpg" alt="">
    </div>
</div>

<div id="container-form-ct">
    <form method="POST" id="form-ct-register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span id="form-btn-close">
            <img src="./public/img/close_black_48dp.svg" alt="close_black">
        </span>
        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" required>

        <label for="age">Age</label>
        <input 
            id="ct-age-input" 
            type="number" 
            name="age" 
            maxlength="3"
            required
        >

        <label for="program">Program</label>
        

        <div class="select-dropdown">
            <select name="program" id="program-select" required>
                <option value="">Select a program</option>
                <?= $programsOptionHTML ?>
            </select>
        </div>

        <button type="submit">Register</button>
    </form>
</div>

<div id="home-status" style="<?= $showStatus ?>" >
    <?= $statusMsg ?>
    <img 
        id="status-btn-close" 
        src="./public/img/close_black_48dp.svg" 
        alt="close_black"
    >
</div>