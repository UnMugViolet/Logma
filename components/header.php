<?php
if(isset($_SESSION['userAdmin']) && isset($_SESSION['userDev'])) {
    $userAdmin = $_SESSION['userAdmin'];
    $userDev = $_SESSION['userDev'];
    $user= $_SESSION['user'];
} else {
    $userAdmin = false;
    $userDev = false;
    $user = false;
}
?>


<header class="header-content top-0 w-full">
    <nav class="container flex-container spacing-nav">
        <div class="logo-size">
            <a href="./index.php"><img src="./ressources/img/Logo-logma.png" alt="Logo société Logma" aria-label="Retour à la page d'accueil"></a>
        </div>
        <div class="vertical-align w-trois-quart nav-menu w-full h-full">
            <ul class="flex-end w-full spacing-components-header">
                <li class="nav-item">
                    <a class="link-style-nav" href="./a-propos" aria-label="Voir notre page a propos">A propos</a>
                </li>
                <li class="nav-item vertical-align ">
                    <a class="link-style-nav" href="./contacts" aria-label="Nous contacter">Contacts</a>
                </li>
                <li class="nav-item vertical-align ">
                    <a class="link-style-nav" href="./galerie-photo" aria-label="Voir notre galerie photo">Galerie Photo</a>
                </li>
            </ul>
            <ul class="flex-container vertical-align spacing-icon-header">
                <li class="nav-item">
                    <a href="https://www.instagram.com/logma_production/" target="_blank" aria-label="Lien Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="vertical-align" viewBox="0 0 24 24">
                            <path fill="#ffffff" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z" />
                            <!-- Instagram Icon -->
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.youtube.com/@logma_production" target="_blank" aria-label="Lien chaine Youtube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" class="vertical-align" viewBox="0 0 24 24">
                            <g fill="none">
                                <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                <path fill="#ffffff" d="M12 4c.855 0 1.732.022 2.582.058l1.004.048l.961.057l.9.061l.822.064a3.802 3.802 0 0 1 3.494 3.423l.04.425l.075.91c.07.943.122 1.971.122 2.954c0 .983-.052 2.011-.122 2.954l-.075.91c-.013.146-.026.287-.04.425a3.802 3.802 0 0 1-3.495 3.423l-.82.063l-.9.062l-.962.057l-1.004.048A61.59 61.59 0 0 1 12 20a61.59 61.59 0 0 1-2.582-.058l-1.004-.048l-.961-.057l-.9-.062l-.822-.063a3.802 3.802 0 0 1-3.494-3.423l-.04-.425l-.075-.91A40.662 40.662 0 0 1 2 12c0-.983.052-2.011.122-2.954l.075-.91c.013-.146.026-.287.04-.425A3.802 3.802 0 0 1 5.73 4.288l.821-.064l.9-.061l.962-.057l1.004-.048A61.676 61.676 0 0 1 12 4Zm0 2c-.825 0-1.674.022-2.5.056l-.978.047l-.939.055l-.882.06l-.808.063a1.802 1.802 0 0 0-1.666 1.623C4.11 9.113 4 10.618 4 12c0 1.382.11 2.887.227 4.096c.085.872.777 1.55 1.666 1.623l.808.062l.882.06l.939.056l.978.047c.826.034 1.675.056 2.5.056s1.674-.022 2.5-.056l.978-.047l.939-.055l.882-.06l.808-.063a1.802 1.802 0 0 0 1.666-1.623C19.89 14.887 20 13.382 20 12c0-1.382-.11-2.887-.227-4.096a1.802 1.802 0 0 0-1.666-1.623l-.808-.062l-.882-.06l-.939-.056l-.978-.047A60.693 60.693 0 0 0 12 6Zm-2 3.575a.6.6 0 0 1 .819-.559l.081.04l4.2 2.424a.6.6 0 0 1 .085.98l-.085.06l-4.2 2.425a.6.6 0 0 1-.894-.43l-.006-.09v-4.85Z" />
                            </g>
                            <!-- Youtube Icon -->
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://www.linkedin.com/company/logma-agency/" target="_blank" aria-label="Lien du compte Linkedin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="vertical-align" viewBox="-2 -2 24 24">
                            <g fill="#ffffff">
                                <path d="M15 11.13v3.697h-2.143v-3.45c0-.866-.31-1.457-1.086-1.457c-.592 0-.945.398-1.1.784c-.056.138-.071.33-.071.522v3.601H8.456s.029-5.842 0-6.447H10.6v.913l-.014.021h.014v-.02c.285-.44.793-1.066 1.932-1.066c1.41 0 2.468.922 2.468 2.902zM6.213 5.271C5.48 5.271 5 5.753 5 6.385c0 .62.466 1.115 1.185 1.115h.014c.748 0 1.213-.496 1.213-1.115c-.014-.632-.465-1.114-1.199-1.114zm-1.086 9.556h2.144V8.38H5.127v6.447z" />
                                <path d="M4 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4zm0-2h12a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z" />
                            </g>
                            <!-- Linkedin Icon -->
                        </svg>
                    </a>
                </li>
    <?php
        if($userAdmin || $userDev)
        {
    ?>

                <li class="nav-item">
                    <a href="./access-admin-logma">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" class="vertical-align" viewBox="0 0 24 24">
                            <path fill="#ffffff" d="M5.85 17.1q1.275-.975 2.85-1.538T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.337T4 12q0 1.475.488 2.775T5.85 17.1ZM12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.012-2.488T12 6q1.475 0 2.488 1.012T15.5 9.5q0 1.475-1.012 2.488T12 13Zm0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                        </svg>
                    </a>
                </li>
    <?php
        }
    ?>
            </ul>
        </div>
        <!-- Add the burger menu -->
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
</header>