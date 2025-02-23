<div align="center"><img src="https://github.com/bmoorefree/cuttlephish/blob/main/Sepiida.png" width="40%"></div>
<h2>Cuttlephish</h2>
The goal of this project is to provide an easy method for getting Squid setup on your network. <br>
We are not affiliated with the Squid project, we only provide the user experience and custom domain blocklist<br><br><br><br>


<strong>What This Does:</strong><br>
<ul>
  <li>Apache creates each user a virtual host file and configures an address or subdomain for the $USER.website.tld</li>
  <li>Apache authenticates users via LDAP.</li>
<li>Only the specific user assigned to the directory can access it.</li>
<li>Users must enter their LDAP username & password.</li>
  <li>User interface allows easy selection of categories of web content to block along with the ability to view the list to add\remove items.</li>
</ul>
<ul>
  <li>Domains.list  = global list of blocked domains and known advertisement networks</li>
<li>Documentation = How to get squid setup for your environment and how our list works.</li>
<li>Bash scripts = There are bash scripts you can use to automate the setup of squid along with setting up a cron job to run daily to check the list against the repo an pull any updated information.</li>
</ul>

<strong>What you will not find here: </strong><br>
*Squid documentation (please visit their project page) <br>https://www.squid-cache.org
