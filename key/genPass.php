<?php
 
// Output: 36e5e490f14b031e
echo substr(md5(time()), 0, 16);
 
// Output: aa88ef597c77a5b3
echo substr(sha1(time()), 0, 16);
 
// Output: 447c13ce896b820f353bec47248675b3
echo md5(time());
 
// Output: 6c2cef9fe21832a232da7386e4775654b77c7797
echo sha1(time());
 
?>