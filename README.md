      ----------------------------------  How To Install ----------------------------------
      
      curl https://raw.githubusercontent.com/ninzahost/anticron/master/insatll.sh | sh
      
      
     ---------------------------- Check All Active Cron On Server ----------------------------
      
      cd ~
      php -q anticron.php check
      
      
      ---------------------------- Remove Cron On Server Less Than 10 Minute ----------------------------
     cd ~
     php -q anticron.php do
      
