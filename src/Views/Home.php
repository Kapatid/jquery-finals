<!-- HOME HTML -->
<video id="home-bg-vid" autoplay muted loop>

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
    <form 
        method="POST" id="form-ct-register" 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

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

        <button id="btn-submit" type="submit">Register</button>
        <button id="btn-submit-loading">
            <img src="./public/img/three-dots.svg" alt="loading-icon">
        </button>
    </form>
</div>

<div id="home-status" style="<?= $status['style'] ?>" >
    <?= $status['msg'] ?>
    <img 
        id="status-btn-close" 
        src="./public/img/close_black_48dp.svg" 
        alt="close_black"
    >
</div>