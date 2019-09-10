<!--TEMPLATE FOR PROFILE WITHOUT EDITING ENABLED-->

<div class="pad ident name"><h4>Name:</h4><?=" " . $row['first_name'] . " " . $row['last_name']; ?></div>
<div class="pad lang"><h4>Language:</h4> <?= " <img style='border: 1px solid' width='40px' src='assets/svg/" . $flag . "' alt='language flag'>" ?></div>
<div class="pad email"><h4>Email-address: </h4> <?= $row['email']; ?></div>
<div class="pad linked"><h4>LinkedIn: </h4> <a href="<?= $row['linkedin']; ?>"><?= $row['linkedin']; ?></a></div>
<div class="pad Git"><h4>GitHub: </h4> <a href="<?= $row['github']; ?>"><?= $row['github']; ?></a></div>
<div class="pad vid"><h4>Video: </h4> <a href="<?= $row['video']; ?>"><?= $row['video']; ?></a></div>
<div class="wisdom">
    <div class="pad quote"><h4>Favourite quote: </h4><?= $row['quote']; ?></div>
    <div class="pad author"><h4>Author: </h4><?= $row['quote_author']; ?></div>
</div>
<div class="pad bill">
    <?= "<img height='360px' src='https://belikebill.ga/billgen-API.php?default=1&name=" . $row['first_name'] . "&sex=m' />"?>
</div>