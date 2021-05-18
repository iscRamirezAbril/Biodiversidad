<?php
$Year = date("Y");
?>

<img class="open-button" onclick="openForm()" src="assets/img/Profiles/profileAjolotito.png" alt="">

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
  <img class="open-button" onclick="closeForm()" src="assets/img/Profiles/profileAjolotito.png" alt="">
    <iframe
        src='https://webchat.botframework.com/embed/AxolotlBioBot?s=Re_Ke82I1XI.IALak-Yhjb9RnFsm4V5ik7xAtB8Nn0WnWHbGqGQokpE' style='min-width: 100px; width: 100%; min-height: 350px;'>
    </iframe>
  </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto">
            <ul class="list-inline text-center">
                <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></li>
                <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></li>
                <li class="list-inline-item"><a href="https://github.com/orgs/Axolotl-Team-mx/"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-github fa-stack-1x fa-inverse"></i></span></a></li>
            </ul>
            <p class="text-muted copyright">Copyright&nbsp;©&nbsp;AxolotlTeam <?php echo $Year ?></p>
        </div>
    </div>
</div>