<?php
include "header.inc";
include "menu.inc";
?>
<div id="mainbody">
    <section>
        <h2> What is IPv6? </h2>
        <p>IPv6 is the next generation of IP addresses, created to address some of the concerns with the IPv4 addressing. IPv6 addresses are 128 bits long, and are written in 8 sections, each containing 16 bits. <a class="in-para-citation" href="#footnotes">[1]</a></p>
        <p> When written in hexadecimal form, an IPv6 address may look like the following: </p>
        <p> 2001:0DA6:23FE:03F5:A246:BC34:0035:6709 </p>
    </section>

    <figure>
        <a href="https://en.wikipedia.org/wiki/File:Ipv6_address_leading_zeros.svg">
            <img id="img" src="images/img1.png" alt="Ipv6 address example image 1">
        </a>
        <figcaption>Fig 2: The anatomy of IPV6</figcaption>
    </figure>
    <p><em>Source: Ipv6 address leading zeros - Glanthor Reviol via Wikimedia Commons</em><a class="in-para-citation" href="#footnotes">[2]</a></p>

    <section>
        <h2> Why do we use IPv6? </h2>

        <ol>
            <li>IPv6 was created because of the limited capacity of the IPv4 addressing system. The widespread global adoption of internet devices means that there are more devices than there are IPv4 addresses available.</li>
            <li>The way address allocation exhaustion is currently addressed is through the use of shared public IP addresses. The protocol that handles this process is Dynamic Host Configuration Protocol.</li>
            <li>When a device wants to connect to the internet using a IPv4 address, the DHCP server (often managed by your internet service provider) pulls a random address from the pool of available addresses and assigns it to the device. When the device is no longer using the address, it is returned to pool of available addresses for reuse.</li>
        </ol>
    </section>

    <section>
        <h2>Understanding hexadecimal</h2>
        <p> IPv6 addresses are not written in decimal (a base 10 number system) or binary (a base 2 numbering system) they are written in hexadecimal. This means that for each digit position there are 16 possible numbers that can go there. In binary, each digit can either be a “0” or a “1”. This means there are 2 possible options for each digit. In decimal numbering we have the digits 0-9, meaning there are 10 possible options for each digit. In hexadecimal, there are 16 options for each digit, and numbers 0-15 are represented as 0-F. </p>
        <p> Hexadecimal numbering uses single digit alphabet characters in place of double-digit numerals: </p>
            <table>
            <tr>
                <th> Decimal </th>
                <th> Hexadecimal </th>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <td>3</td>
                <td>3</td>
            </tr>
            <tr>
                <td>4</td>
                <td>4</td>
            </tr>
            <tr>
                <td>5</td>
                <td>5</td>
            </tr>
            <tr>
                <td>6</td>
                <td>6</td>
            </tr>
            <tr>
                <td>7</td>
                <td>7</td>
            </tr>
            <tr>
                <td>8</td>
                <td>8</td>
            </tr>
            <tr>
                <td>9</td>
                <td>9</td>
            </tr>
            <tr>
                <td>10</td>
                <td>A</td>
            </tr>
            <tr>
                <td>11</td>
                <td>B</td>
            </tr>
            <tr>
                <td>12</td>
                <td>C</td>
            </tr>
            <tr>
                <td>13</td>
                <td>D</td>
            </tr>
            <tr>
                <td>14</td>
                <td>E</td>
            </tr>
            <tr>
                <td>15</td>
                <td>F</td>
            </tr>
            </table>
    </section>

    <section id="footnotes">
        <h6>References</h6>
        <p><a class="footnote-link" href="https://www.avsystem.com/blog/IPv6/">[1]</a> AVSystem: What’s the fuss with IPv6. (2021). Retrieved 31 March 2022 </p>
        <p><a class="footnote-link" href="https://en.wikipedia.org/wiki/File:Ipv6_address_leading_zeros.svg">[2]</a> IPv6 address - Wikipedia. En.wikipedia.org. (2011). Retrieved 31 March 2022 </p>
    </section>
</div>

<?php
    include "footer.inc";
?>




