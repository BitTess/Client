# BitTess Alpha
##Peer to Peer Website Client

BitTess is a new type of website that is based on the bit torrent protocol.
It connects users to a swarm that feeds them data and they can then interact with.
A demo site can be played with [here](http://www.bittess.com/demo/)
If you have any questions contact us at git@bittess.com

##Installation
To get started you need to have a peer server set up see [here](https://github.com/BitTess/Server)

This assumes that you already have a apache server running and can add the two extra files into the server web host folder.

When you have that set up you need to add two JavaScript files to your webpage - BT.js and peer.js
See the minimal file for an example.
If you would like to intergrate it into another site check out the index.php file.
The first fet lines has the following line
```
if((strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome')!== false|| strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox')!== false)&&strpos($_SERVER["HTTP_USER_AGENT"], 'Edge')== false&&
```
This will determine if the user is running a BitTess capable client (chrome,firefox, opera or edge) and send them the client or if they have a legacy browser it will host the page as normal.

This file also has the peerjs and BT.js files minified and stored within the single file to speed up processing and reduce connections. 

Replace the server in the first line of the client bt.js file with your server IP and you should be good to go.

##Where to go from here

The main processing is done in the BT.js file so start understanding it there. 
The peer.js file is mostly the same as from peerjs.com with a few additions for better client server communications.


##Troubleshooting

Some commonly found issues are as follows

* Can't connect - there are several reasons you might not be able to connect. Check your firewalls and try pinging the server to check connectivity. Try a html request and check the browser console
* Error in JS execution - The javascript files are executed in the order they appear in the page. Adding further scripts might change the order. 

If you have any further questions send us an email at help@bittess.com and we will try to help you out.
