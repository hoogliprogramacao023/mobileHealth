</main>

<?php
require_once "Class/textos.class.php";
$textosRodape = Textos::getInstance(Conexao::getInstance());
$footer = $textosRodape->rsDados(8);
?>

<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area default-style bg-img">
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="widget-copyright text-center">
                            <?php include('copy.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--== End Footer Area Wrapper ==-->

<!--== Scroll Top Button ==-->
<div class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

<!--== Start Side Menu ==-->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
        <div class="off-canvas-overlay d-none"></div>
        <!-- Start Off Canvas Content Wrapper -->
        <div class="off-canvas-content">
            <!-- Off Canvas Header -->
            <div class="off-canvas-header">
                <div class="close-action">
                    <button class="btn-close"><i class="pe-7s-close"></i></button>
                </div>
            </div>

            <div class="off-canvas-item">
                <!-- Start Mobile Menu Wrapper -->
                <div class="res-mobile-menu">
                    <!-- Note Content Auto Generate By Jquery From Main Menu -->
                </div>
                <!-- End Mobile Menu Wrapper -->
            </div>
            <!-- Off Canvas Footer -->
            <div class="off-canvas-footer"></div>
        </div>
        <!-- End Off Canvas Content Wrapper -->
    </div>
</aside>
<!--== End Side Menu ==-->
</div>

<!--=== Modernizr Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery-migrate.js"></script>
<!--=== Popper Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/popper.min.js"></script>
<!--=== Bootstrap Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.min.js"></script>
<!--=== jquery Appear Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery.appear.js"></script>
<!--=== jquery Swiper Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/swiper.min.js"></script>
<!--=== jquery Fancybox Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/fancybox.min.js"></script>
<!--=== jquery Aos Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/aos.min.js"></script>
<!--=== jquery Slicknav Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery.slicknav.js"></script>
<!--=== jquery Countdown Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery.countdown.min.js"></script>
<!--=== jquery Tippy Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/tippy.all.min.js"></script>
<!--=== Isotope Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/isotope.pkgd.min.js"></script>
<!--=== jquery Vivus Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/vivus.js"></script>
<!--=== Parallax Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/parallax.min.js"></script>
<!--=== Slick  Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/slick.min.js"></script>
<!--=== jquery Wow Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/wow.min.js"></script>
<!--=== jquery Zoom Min Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/jquery-zoom.min.js"></script>

<!--=== ApexCharts ===-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!--=== Custom Js ===-->
<script src="<?php echo SITE_URL; ?>/assets/js/custom.js"></script>

<!--=== Graficos ===-->
<script>

    var options = {
          series: [{
          name: 'Alunos em Milhões',
          data: [4.7, 5.4, 6.7, 7.2, 7.6, 7.9, 8.0, 8.2, 9.1, 9.6]
        }],
          annotations: {
          points: [{
            x: 'Alunos',
            seriesIndex: 0,
            label: {
              borderColor: '#F2D205',
              offsetY: 0,
              style: {
                color: '#F2D205',
                background: '#F2D205',
              },
              text: 'Alunos',
            }
          }]
        },
        chart: {
          height: 400,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 2
        },
        grid: {
          row: {
            colors: ['transparent', 'transparent']
          },
          column: {
            colors: ['transparent', 'transparent']
          }
        },
        xaxis: {
          labels: {
            rotate: -45
          },
          categories: ['2010', '2011', '2012', '2013', '2014', '2015',
            '2016', '2017', '2018', '2019'
          ],
          tickPlacement: 'on',
          colors: ['white']
        },
        yaxis: {
          title: {
            text: 'Alunos em Milhões',
            colors: ['white']
          },
        },
        dataLabels: {
            style: {
                colors: ['white']
            }
        },
        fill: {
          type: 'fill',
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 1,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            colors: ['white'],
            stops: [50, 0, 100]
          },
        }
        };

        var chart = new ApexCharts(document.querySelector("#graficoAlunos"), options);
        chart.render();

        // Segundo Grafico (Pizza)

        var options2 = {
          series: [47, 53],
          chart: {
          width: 380,
          type: 'pie',
        },
        fill: {
            colors: ['#FFF','#F2D205']
        },
        dataLabels: {
            style: {
                colors: ['#333']
            }
        },
        legend: {
            show: false,
        },
        labels: ['', 'População'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              show: false,
            }
          }
        }]
        };

        var chart2 = new ApexCharts(document.querySelector("#graficoPopulacao"), options2);
        chart2.render();
      

</script>

<script>
    var valor1 = Math.floor((Math.random() * 10) + 1);

    var valor2 = Math.floor((Math.random() * 10) + 1);
    document.getElementById("valor1").innerHTML = valor1;
    document.getElementById("valor2").innerHTML = valor2;

    document.getElementById("enviar").setAttribute("disabled", "");
    document.getElementById('totalvalores').onchange = function() {
        validar()
    }

    function validar() {
        var totalvalores = document.getElementById("totalvalores").value;

        if (totalvalores == valor1 + valor2) {

            document.getElementById('aviso').innerHTML = "reCAPTCHA válido";

            document.getElementById("enviar").removeAttribute("disabled");

        } else {

            document.getElementById('aviso').innerHTML = "reCAPTCHA inválido";

            document.getElementById("enviar").setAttribute("disabled", "");

        }

    }
    
    document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;    

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.src = image.dataset.src;
          image.classList.remove("lazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".lazy");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }    

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
})

</script>


<?php include "flutuante/flutuante.php" ?>

</body>

</html>