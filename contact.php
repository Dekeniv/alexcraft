

<!-- INCLUDE HEADER -->
<?php include('header.inc.php'); ?>

<!-- MAIN -->
<main>
  <div class="backgroundMain">
    <div class="secondMain">
      <div class="divWhite container80">
        <section class="contact">
          <!-- formulaire -->
          <h1>Formulaire de contact</h1>
          <h2>Via téléphone</h2>
          <p>
            <strong><b>MOIGNOT Alexandre</b></strong>
          </p>
          <p>
            <i class="fas fa-sms fa-lg"></i>
            /
            <i class="fas fa-phone fa-lg"></i>
            : <a href="tel:" +33624042640>06 24 04 26 40</a>
          </p>
          <p class="hoursContact">
            Horaires : <br />
            Du lundi au vendredi de 09h à 18h, le samedi de 10h à 13h et de 14h
            à 17h (heure de Paris)
          </p>

          <h2>Via formulaire de contact</h2>

          <span class="errorInput">
            <?= $valueError1 . $valueError2 . $valueError3 . $valueError4 . $valueError5; ?>
          </span>

          <form action="sendMail.php" method="post" enctype="multipart/form-data">

            <p><span class="error">* champs requis</span></p>

            <!-- Prénom -->
            <div class="field">
              <label for="firstname" class="redStar">Prénom</label>
              <?= $inputError1; ?>
              <div class="value">
                <input <?=$inputBorder1; ?> type="text" id="firstname" placeholder="Prénom" name="prenom" value="<?= $valuePrenom ?>" maxlength="20" title="1 à 20 lettres minuscules/majuscules" />
              </div>

            </div>
            <!-- Nom -->
            <div class="field">
              <label for="lastname" class="redStar">Nom</label>
              <?= $inputError2; ?>
              <div class="value">
                <input <?= $inputBorder2; ?> type="text" id="lastname" placeholder="Nom" name="nom" value="<?= $valueNom ?>" pattern="^[a-zA-ZÀ-ÿ'-]+$" maxlength="20" title="1 à 20 lettres minuscules/majuscules" />
              </div>

            </div>
            <!-- Email -->
            <div class="field">
              <label for="email" class="redStar">Email</label>
              <?= $inputError3; ?>
              <div class="value">
                <input <?= $inputBorder3; ?> type="email" id="email" placeholder="Email" value="<?= $valueEmail ?>" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" name="mail" title="Exemple : adresse@nomdedomaine.com" />
              </div>

            </div>
            <!-- Pièce jointe -->
            <div class="field">
              <label for="fichier"></label>
              <?= $inputError4; ?>
              <div class="value">
                <input <?= $inputBorder4; ?> type="file" id="fichier" placeholder="Fichier" name="fichier" />
              </div>
            </div>
            <!-- Demande -->
            <div class="field">
              <label for="query" class="redStar">Votre demande</label>
              <?= $inputError5; ?>
              <div class="value">
                <textarea <?=$inputBorder5; ?> name="query" id="query" placeholder="Votre demande" pattern="[a-zA-ZÀ-ÿ0-9 \n\r\!\?\,\:\.\'\@]" maxlength="400" title="Maximum 400 caractères"><?= $valueQuery ?></textarea>
              </div>

            </div>
            <!-- Validation -->
            <div class="toolbar">
              <button type="submit" class="buttonForm">
                Valider le formulaire
              </button>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
  <!-- INCLUDE BUTTON TOP -->
  <?php include('buttonTop.inc.php'); ?>
</main>

<!-- INCLUDE FOOTER -->
<?php include('footer.inc.php'); ?>

<!-- je récupère mes variables communes -->
<?php require 'commonVars.php'; ?>

