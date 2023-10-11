<?php
include "header.inc";
include "menu.inc";
?>
<div id="mainbody">
    <h2>What are IP addresses?</h2>

    <p>The Internet Protocol address is what your computer uses to communicate with other devices. It is used to address traffic to the correct target, similar to how you must write a street address on a letter before sending it. Having an address associated with the device allows it to communicate across the internet and local networks.</p>
    <h2>Image Map</h2>

    <div >
        <img id="imagemap" src="images/imagemap.png" alt="imagemap" usemap="#workmap">
        <map name="workmap">
        <area shape="rect" coords="45,70,340,110" alt="Ipv4" href="topic1.php">
        <area shape="rect" coords="50,180,340,200" alt="IPv6" href="topic2.php">
        <area shape="rect" coords="130,230,480,290" alt="IPv6" href="topic2.php">
        </map>
        <p>Click on parts corresponding to IPv4 or IPv6 for more detail information on the topic</p>
    </div>

    <h2>Image Slideshow</h2>

    <div class="mySlides">
        <figure>
        <img src="images/img3.png" alt="img1"/>
        <img src="images/img4.png" alt="img2"/>
        <img src="images/img5.png" alt="img3"/>
        <img src="images/img6.png" alt="img4"/>
        <img src="images/img7.png" alt="img5"/>
        </figure>
    </div>

    <h3><a href="https://www.youtube.com/watch?v=V_GguSFUqrY">Video demonstration Assignment 1: HTML and CSS </a></h3>
    <h3><a href="https://www.youtube.com/watch?v=HpIO-ozXIio">Video demonstration Assignment 2: PHP and MySQL </a></h3>
</div>

<?php
    include "footer.inc";
?>


