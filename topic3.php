<?php
include "header.inc";
include "menu.inc";
?>

<div id="mainbody">
    <section>
        <h2> Differences between IPv4 and IPv6</h2>

        <table>
            <tr>
                <th></th>
                <th>IPv4</th>
                <th>IPv6</th>
            </tr>
            <tr>
                <td>Address Length</td>
                <td>32 bit address length <br>
                    Manual and DHCP address configuration <br>
                    Header of 20-60 bytes<br>
                </td>
                <td>128 Bit address length <br>
                    Auto and renumbering address configuration <br>
                    Header of 40 bytes<br>
                </td>
            </tr>
            <tr>
                <td>Address type</td>
                <td>Unicast, broadcast and multicast</td>
                <td>Unicast, multicast and anycast</td>
            </tr>
            <tr>
                <td>Classes</td>
                <td>Class a to e</td>
                <td>Unlimited IP addresses</td>
            </tr>
            <tr>
                <td>VLSM</td>
                <td>Support</td>
                <td>No Support</td>
            </tr>
            <tr>
                <td>Address Mask</td>
                <td>Use for the designated network from host portion.</td>
                <td>Not used</td>
            </tr>
            <tr>
                <td>Addressing Method</td>
                <td>A numeric address, and its binary bits are separated by a dot (.)</td>
                <td>An alphanumeric address whose binary bits are separated by a colon (:). It also contains hexadecimal.</td>
            </tr>
        </table>
    </section>

    <section>
        <h2> What are the Advantages and Disadvantages of using IPv4 and IPv6? </h2>

        <table>
            <tr>
                <th></th>
                <th>IPv4</th>
                <th>IPv6</th>
            </tr>
            <tr>
                <td>Advantages</td>
                <td>
                    <ul>
                        <li>Flexibility</li>
                        <li>Reliable security</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>Auto-configuration</li>
                        <li>No more private address collisions</li>
                        <li>Better multicast routing</li>
                        <li>Simplified, more efficient routing</li>
                        <li>True quality of service (QoS), also called "flow labeling"</li>
                        <li>Easier administration (no more DHCP)</li>
                        <li>No more NAT</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Disadvantages</td>
                <td>
                    <ul>
                        <li>The lack of address space</li>
                        <li>Weak protocol extensibility</li>
                        <li>Lack of quality-of-service support</li>
                        <li>Problem of security of communications</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li>Takes time is convert over to IPv6</li>
                        <li>System issues</li>
                        <li>Complexity in Network Topology drawings</li>
                    </ul>
                </td>
            </tr>
        </table>
    <section>
        <p><em>Source: Differences between IPv4 and IPv6 - GeeksforGeeks (2021) </em><a class="in-para-citation" href="#footnotes">[1]</a></p>
    </section>
        <aside>
            <h3><strong>Glossary</strong></h3>
            <p>NAT - Network Address Translation</p>
            <p>DHCP - Dynamic Host Configuration Protocol</p>
        </aside>
    </section>

    <section>
        <h2> What groups are responsible for managing it? </h2>
        <dl>
            <dt id="line1"><strong>IANA<a class="in-para-citation" href="#footnotes">[2]</a></strong> is responsible for the global management of IP addresses. Some of these responsibilities include: </dt>
            <dd>- Managing “top-level” domains (e.g. .com, .net, .gov, .edu, .org)</dd>
            <dd>- Delegating responsibility for region-specific domains (e.g. .uk, .fr, .de, .in)</dd>
            <dt id="line2"><strong>APNIC<a class="in-para-citation" href="#footnotes">[3]</a></strong> is the organisation repsonsible for the Asia-Pacific region</dt>
            <dd>- Managing the distribution of IP addresses within the region</dd>
            <dd>- Providing the APNIC Whois Database</dd>
        </dl>
    </section>

    <section id="footnotes">
        <h6>References</h6>
        <p> <a class="footnote-link" href="https://www.geeksforgeeks.org/differences-between-ipv4-and-ipv6">[1]</a> GeeksforGeeks. Differences between IPv4 and IPv6 - GeeksforGeeks. (2021). Retrieved 31 March 2022</p>
        <p> <a class="footnote-link" href="https://www.iana.org/">[2]</a> Internet Assigned Numbers Authority. (2022). Retrieved 31 March 2022 </p>
        <p> <a class="footnote-link" href="https://www.apnic.net/">[3]</a> Asia Pacific Network Information Centre. (2022). Retrieved 31 March 2022 </p>
    </section>

</div>

<?php
    include "footer.inc";
?>



