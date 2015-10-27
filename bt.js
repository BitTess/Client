    var contentURL = window.location.pathname.replace(/%20/g," ");
    if (contentURL=="/"){ contentURL="index.php";}
    if(contentURL.charAt(0)=="/"){contentURL = contentURL.substring(1);}
    if(contentURL.charAt(contentURL.length - 1) =="/"){contentURL=contentURL+"index.html"}
    console.log("geting from peer server:"+contentURL);
    var peer = new Peer({host: '45.32.245.50', port: 9001, path: '/peerjs'}); //you will need to replace this with your own peer server. See https://github.com/BitTess/BitTess-Server
    peer.sendSM(contentURL)
    var hashes = {};//where all the data is stored. hashes in hirachical form dimension(10):thread(10)(o):comment(10)(o):data
    var canUpdate = true;
    var needsUpdate = true;
    var finishedLogin = false;
    var initialConns = [];
    var initalData = [];
    var scriptarr = [];
    var trueHeader = document.getElementsByTagName("HEAD")[0].innerHTML+" ";
    var needsEval = true;
    var htmlLoaded = false;
    var evalLater = [];
    var evalcount=0;
    var exI = [];
    var exc = [];
    var exO = [];
    var exSS = ["",""];
    
    
    
    
    //runs every time the peer connects to a peer server
    peer.on('open', function(id) { //Init peer
       console.log('My peer ID is: ' + id);
     });
     
     peer.on('close', function(id) { //Init peer
       console.log('peer has shut down');
     });
     
     //rund every time another peer connects to us
    peer.on( 'connection', function(nc) { //detect and handle new connections from other peers
        nc.on( 'open', function() {
            nc.on('data', function(ncd) { //data received from client gets processed here
                handleData(ncd,nc);
            }); 
        });
    });
    
    function removeAllexternal(doc){
        var scrs = doc.scripts;
        for(var i=0;i<scrs.length;i++){
            exSS[exSS.length]=scrs[i].cloneNode(true);
            scrs[i].src = "";
            scrs[i].innerHTML = "";
        }
        console.log("removed scripts:"+scrs.length);
        var imgs = doc.images;
        for(var i=0;i<imgs.length;i++){
            if(imgs[i].src.indexOf(window.location.hostname)!=-1){
                exI[i]=imgs[i].src.replace(/%20/g," ");
                imgs[i].src = "";
            }else{
                exI[i]="";
            }
        }
        var lnks = doc.links;
        lnks = doc.getElementsByTagName("LINK");
        console.log("removing links:"+lnks.length);
        for(i=0;i<lnks.length;i++){
            if(lnks[i].href.indexOf(window.location.hostname)!=-1){
                exc[i]=lnks[i].href.replace(/%20/g," ");
                lnks[i].href = "";
            }else{
                exc[i]="";
            }
        }
        var allothers = doc.getElementsByTagName("*");
        for(i=0;i<allothers.length;i++){
            exO[i]="";
            if(typeof(allothers[i].href)!='undefined'){
                if(allothers[i].href.indexOf(window.location.hostname)!=-1){
                    exO[i]=allothers[i].href.replace(/%20/g," ");
                    allothers[i].href = "";
                }
            }
            if(typeof(allothers[i].src)!='undefined'){
                if(allothers[i].src.indexOf(window.location.hostname)!=-1){
                    exO[i]=allothers[i].src.replace(/%20/g," ");
                    allothers[i].src = "";
                }
            }
        }
        console.log("removed others:"+exO.length);
    }
    function startEval(){
    var scretimer = setInterval(function () {
        //console.log("evaling scripts:"+evalcount);
        for(var i=evalcount;i<exSS.length;i++){
            if(exSS[i]=="")continue;
            if(exSS[i].src.indexOf(window.location.hostname)!=-1 && exSS[i].src.trim().length>window.location.hostname.length+9){
                //console.log("cant find script:"+exSS[i].src);
                return;
            }
            //console.log("eval script:"+exSS[i].src);
            var g = document.createElement('script');
            g.text = exSS[i].innerHTML;
            //if(typeof(exSS[i].src)!='undefined'&& exSS[i].src!="")
            g.src =exSS[i].src;
            //if(typeof(exSS[i].async)!='undefined'&& exSS[i].async!="")g.async =  "true";
            if(typeof(exSS[i].id)!='undefined'&& exSS[i].id!="")g.id=exSS[i].id;
            if(typeof(exSS[i].type)!='undefined'&& exSS[i].type!="")g.type=exSS[i].type;
            var oldscr = document.scripts[i];
            var loopbreaker = 10;
            while((oldscr.innerHTML.trim()!="" || oldscr.src.trim().length>window.location.hostname.length+8)&&loopbreaker-->0){
                //console.log(oldscr.src);
                //console.log(oldscr.innerHTML);
                oldscr = document.scripts[++i];
            }
            if(loopbreaker<=0)console.log("loop broken");
            //document.head.appendChild(g);
            oldscr.parentNode.insertBefore(g, oldscr);
            oldscr.parentNode.removeChild(oldscr);
            evalcount++;
            return;
        }
        clearInterval(scretimer);
        var g = document.createElement('script');
        g.text = 'alert("here");';
        //var oldscr = document.scripts[document.scripts.length-1];
        //oldscr.parentNode.insertBefore(g, oldscr);
        //document.body.appendChild(g);
        console.log("evaling scripts:Complete!");
    },20);
    }
    //sends a message to every memeber in your swarm that you have an open connection with
    function PeerBroadcast(msg,source){
        //console.log("broadcasting:"+msg);
        for (var k in peer.connections) {
            if (peer.connections.hasOwnProperty(k) && k!=peer.id && k!=source) {
                peer.connections[k][0].send(msg); //send the new connections a link to all the other connections in the 
            }
        }
    }
    function connectto(otherpeer){
        var conn = peer.connect(otherpeer); //when making a new connection handle comms back also 
        conn.on('open', function(){ 
            if(Object.keys(hashes).length==0){conn.send("j");}//ask for the swarm details
            conn.on('data', function(nda) { //data received fom server gets processed here
                handleData(nda,conn);
            }); 
        });
    }
//loops
    //main updating loop to show content delivered within the last second
    var initialConns = setInterval(function(){
        
        //also check initial connections
        if(initialConns.length>0 && finishedLogin){
            console.log("Finished loading so starting to peer");
            for(var i =0;i<initialConns.length;i++){
                var dc = initialConns[i];
                for (var k in peer.connections) {
                    if (peer.connections.hasOwnProperty(k) & k!=peer.id && k!=dc.peer) {
                        dc.send("c"+k); //send the new connections a link to all the other connections in the 
                        console.log("peering to: "+k);
                    }
                }
                for (var k in hashes) {
                    if (hashes.hasOwnProperty(k)) {
                        dc.send("s"+k+":"+hashes[k]);
                    }
                }
                dc.send("f");
            }
            initialConns = [];
        }
    },200);// limit the updating to only once every second
    //sends off requests to swarm memmbers or external swarms
    //every minute check on the connections in your swarm and update any who have left in the last minute
    var checkConnections = setInterval(function(){
        for (var k in peer.connections) {
            if (peer.connections.hasOwnProperty(k)) {
                if(peer.connections[k][0].open)continue;
                delete peer.connections[k];
            }
        }
    },10000);// limited to once every 10 sec
    
    var ProcessServerData = setInterval(function () {
        if(peer.SM.length >0){
            for(var i = 0;i<peer.SM.length;i++){
                try{
                handleSM(peer.SM[i]);
                }catch(e){
                    console.log("Error processing server message:"+e);
                }
            }
            peer.SM=[];
        }
    },200);
    var loadingDots = setInterval(function () {
        if(document.body.innerHTML.trim().length >13){clearInterval(loadingDots);}
        else{
            document.body.innerHTML+=".";
            if(document.body.innerHTML.indexOf("...")!=-1)document.body.innerHTML="Loading";
        }
    },200);
//end loops

    function processData(hsID){
        var found = false;
        if(hsID.indexOf(".jpg")!=-1 || hsID.indexOf(".png")!=-1 || hsID.indexOf(".gif")!=-1 || hsID.indexOf(".jpeg")!=-1){
            //console.log(hsID);
            for(var i = 0;i<exI.length;i++){
                if(exI[i].indexOf(hsID)!=-1){
                    document.images[i].src = hashes[hsID].replace(/"/g,"");
                    //console.log("matched Image");
                    found = true;
                }
            }
            if(!found)console.log("unmatched image:"+hsID);
        }
        if(hsID.indexOf("css")!=-1 && !found){
            //console.log(hsID);
            for(var i = 0;i<exc.length;i++){
                if(exc[i].indexOf(hsID)!=-1){
                    document.getElementsByTagName("LINK")[i].href = hashes[hsID].replace(/"/g,"");
                    //console.log("matched link");
                    found = true;
                }
            }
            if(!found)console.log("unmatched css:"+hsID);
        }
        if((hsID.indexOf(".js")!=-1||hsID.indexOf(".")==-1) && !found){
            //console.log(hsID);
            for(var i = 0;i<exSS.length;i++){
                if(exSS[i]=="")continue;
                //console.log(exSS[i].src);
                if(exSS[i].src.replace(/%20/g," ").indexOf(hsID)!=-1){
                    exSS[i].removeAttribute("src");
                    exSS[i].innerHTML = b64_to_utf8(hashes[hsID].replace(/"/g,"").substring(28));
                    //eval(exSS[i].innerHTML);
                    found = true;
                }
            }
            
            if(!found){
                console.log("unmatched js:"+hsID);
                var g = document.createElement('script');
                g.src=hashes[hsID].replace(/"/g,"");
                document.body.appendChild(g);
            }
        }
        if(hsID.indexOf(".html")!=-1 && !found){
            if(hsID.indexOf(contentURL)!=-1){
                console.log("page found:"+hsID);
                var ND = document.cloneNode(true);
                var page = b64_to_utf8(hashes[contentURL].split(",")[1].replace(/"/g,""));
                ND.head.innerHTML = page.substring(page.indexOf("<head>"),page.indexOf("</head>"));
                ND.body.innerHTML = page.substring(page.indexOf("<body"),page.indexOf("</body>"));
                removeAllexternal(ND);
                document.head.innerHTML = trueHeader + ND.head.innerHTML;
                if(document.body==null)document.body = document.createElement("body");
                document.body.innerHTML = ND.body.innerHTML;
                htmlLoaded = true;
                found=true;
                for (var k in hashes) {
                    if (hashes.hasOwnProperty(k)) {
                        if(k!=hsID){
                            processData(k);
                        }
                    }
                }
                startEval();
            }else{
                
            }
            if(!found)console.log("unmatched html:"+hsID);
        }
        if(!found){
            console.log("cant clasify:"+hsID);
        }
    }

    function b64_to_utf8(str) {
        try{
        return decodeURIComponent(escape(window.atob(str)));
        }catch(e){
           console.log(e);
           console.log(str.substring(0,100)+str.substring(str.length-100));
        }
    }
    function atob2(str) {
        return new Buffer(str, 'base64').toString('utf8');
    }

    function checkCon(){
        console.log(peer.disconnected);
    }
    
    //kill off the peer if the user leaves the page. not clean but better than nothing.
    window.onunload = window.onbeforeunload = function(e) {
        peer.destroy();
    };
	//Server messages get handeled here
	function handleSM(Msg){
	    //console.log("handeling SM:"+Msg);
        switch(Msg.charAt(0)){
            case "I":
                var truemsg = Msg.substring(1,Msg.length);
                var msgarr = truemsg.split(":");
                var hsID = msgarr.shift();
                hashes[hsID]=msgarr.join(":");
                processData(hsID);
                needsUpdate = true;
                break;
            case "S": //swarm details so connect to the rest of the swarm
                console.log("my swarm is:"+Msg.split(":")[0]);
                var splitMsg = Msg.split(":");
                console.log(Msg);
                for(var i =1;i<splitMsg.length;i++){
                    if(splitMsg[i]!="0"&&typeof splitMsg[i]!="undefined"&&splitMsg[i]!=""){
                        connectto(splitMsg[i]);
                    }
                }
                if(Object.keys(hashes).length!=0){
                    finishedLogin = true;
                }
                needsEval = true;
                break;
            default:
            console.log("Unknonwn SM received:"+Msg);
        }
	}
	//peer messages get handled here
	function handleData(nda,dc){
        //console.log("received peer message:"+nda);
        switch(nda.substring(0,1)) {//handle responses based on the first digit
            case "c": //join swarm successfull here are the rest of the swarm to connect to
                //console.log("connecting to :"+nda.substring(1,nda.length));
                var cd = peer.connect(nda.substring(1,nda.length));
                cd.on('open', function(){ 
                    cd.on('data',function(ndb){
                        handleData(ndb,cd);
                    });
                });
                break;
            case "f": //finished sending all of the swarm addresses so start requesting the home page now
                finishedLogin = true;
                needsEval = true;
                break;
            case "j": //a new memeber is trying to join the swarm
                if (finishedLogin){
                    for (var k in peer.connections) {
                        if (peer.connections.hasOwnProperty(k) & k!=peer.id && k!=dc.peer) {
                            dc.send("c"+k); //send the new connections a link to all the other connections in the 
                            //console.log("Sending peer connections:"+k);
                        }
                    }
                    for (var k in hashes) {
                        if (hashes.hasOwnProperty(k)) {
                            dc.send("s"+k+":"+hashes[k]);
                            //console.log("sent off:"+k+", woth data:"+hashes[k]);
                        }
                    }
                    dc.send("f");
                }else{
                    initialConns[initialConns.length] = dc;
                    console.log("Not able to peer at the moment, saving for later");
                }
                break;
            case "s": //receiving a peice of data that I have requested
                var hsID = nda.substring(1).split(":")[0];
                hashes[hsID] = nda.substring(1+nda.split(":")[0].length);
                processData(hsID);
                break;
            default:
                console.log("unknown data string:"+nda.substring(0,1)+", full:"+nda);
        }
	}
	//This is a prototype built as a proof of concept project not as a professional software design.
	//If you want to complain about the formatting/bad practices please just fix them and submit a pull request.
	//this file will usually be minified and placed directly into the html for convenience.