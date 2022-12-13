<style>
/* @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'); */

#copyright-hoogli{
    position: relative;
    display: inline-block;
    justify-content: center;
    align-items: center;
    margin-top: 1em;
    font-size: 14px;
}

#copyright-hoogli img{
    width: 53px;
    position: absolute;
    margin-top: 6px;
    /* filter: drop-shadow(1px 0px 1.4px #fbfbfb); */
}
#copyright-hoogli a{
    margin-right: 53px;
    margin-left: 4px;
}
#copyright-hoogli i{
    font-size: 12px;
    color: red;
}
#copyright-hoogli.container{
    text-align: right;
    font-size: 14px;
    line-height:normal;
}
#copyright-hoogli .pulse {
    animation: pulse 1s infinite;
}
#copyright-hoogli .dark{
    color: white;
    line-height: 26px;
}
#copyright-hoogli .light{
    color: black;
}

#copyright-hoogli small{
    font-weight: 400;
    font-family: 'Open Sans';
}
#copyright-hoogli p{
    margin-bottom:0px !important;
}

@keyframes pulse {
  0% {
    transform:scale(1);
  }
  5% {
    transform:scale(1.25);
  }
  20% {
    transform:scale(1);
  }
  30% {
    transform:scale(1);
  }
  35% {
    transform:scale(1.25);
  }
  50% {
    transform:scale(1);
  }
  55% {
    transform:scale(1.25);
  }
  70% {
    transform:scale(1);
  }
}
@media only screen and (max-width: 767px) {
#copyright-hoogli.container {
    text-align: center;
}
}

.text-right1{text-align: right;}
</style>

    <!-- <i class="fa fa-heart pulse"></i> Font Awesome 4-->
    <!-- Classe dark para fudo escuro-->
    <div class="container">
    <div class="row ">
                <div class="col-md-3">
                    <img src="<?php echo SITE_URL; ?>/img/<?php echo $infoSistema->logo_rodape;?>" alt="footer-logo">
                    <!-- <div class="clearfix">&nbsp;</div> -->
                </div>
                <div class="col-md-9 text-right1">
                <div id="copyright-hoogli" class="">
        <div class="row">
            <div class="dark">
                <p>© 2009 - <?php echo date('Y');?> Feito com <i class="fa fa-heart pulse"></i> por<a href="https://www.hoogli.com.br/"><img src="<?php echo SITE_URL;?>/flutuante/hoogli_logo.svg" alt="Hoogli" title="Hoogli"></a>. Todos os direitos reservados.</p>
                <small>Este site está protegido pela Lei de Direitos Autorais. (Lei 9610 de 19/02/1998), sua reprodução total ou parcial é proibida nos termos da Lei.</small>
            </div>
        </div>
    </div>
                </div>
            </div>
            </div>
    
