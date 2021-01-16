cd ~
cd /root
rm -rf anticron.php
rm -rf anticron
wget -O anticron.php https://raw.githubusercontent.com/ninzahost/anticron/master/anticron.php
chmod 0755 anticron.php
wget -O anticron https://raw.githubusercontent.com/ninzahost/anticron/master/anticron
cp anticron /etc/cron.d/anticron
cd ~
rm -rf anticron
